<?php
/**
 * User Model
 */
App::uses('AppModel', '.Model');
App::uses('CakeEmail', 'Network/Email');


class User extends AppModel {
    public $name = 'User';
    public $useTable = "users";
    public $actsAs = array('Acl' => array('type' => 'requester'));
    public $validate = array(
        'name' => array(
            'required' => true,
            'allowEmpty' => false,
            'rule' => 'notEmpty',
            'message' => 'You must enter your real name.'
        ),
        'email' => array(
            'email' => array(
                'required' => true,
                'allowEmpty' => false,
                'rule' => 'email',
                'message' => 'Invalid email.',
                'last' => true
            ),
            'unique' => array(
                'required' => true,
                'allowEmpty' => false,
                'rule' => 'isUnique',
                'message' => 'Email already in use.'
            )
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => 'notEmpty',
                'message' => 'Password cannot be left blank'
            ),
            'comparePwd' => array(
                'required' => false,
                'allowEmpty' => false,
                'rule' => 'comparePwd',
                'message' => 'Password mismatch or less than 6 characters.'
            )
        )
    );

    function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
    /**
     * Group-only ACL
     * This method will tell ACL to skip checking User Aro’s and to check only Group Aro’s.
     * Every user has to have assigned group_id for this to work.
     *
     * @param <type> $user
     * @return array
     */
    function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }

/*    public function beforeValidate() {
        if (isset($this->data['User']['id'])) {
            $this->validate['password']['allowEmpty'] = true;
        }

        return true;
    }*/

    public function beforeSave($options = array()) {
        App::uses('Security', 'Utility');
        App::uses('String', 'Utility');

        if (empty($this->data['User']['password'])) { # empty password -> do not update
            unset($this->data['User']['password']);
        } else {
            $this->data['User']['password'] = Security::hash($this->data['User']['password'], null, true);
        }

        //$this->data['User']['key'] = String::uuid();

        return true;
    }

    public function comparePwd($check) {
        $check['password'] = trim($check['password']);

        if (!isset($this->data['User']['id']) && strlen($check['password']) < 6) {
            return false;
        }

        if (isset($this->data['User']['id']) && empty($check['password'])) {
            return true;
        }

        $r = ($check['password'] == $this->data['User']['password2'] && strlen($check['password']) >= 6);

        if (!$r) {
            $this->invalidate('password2', __d('user', 'Password missmatch.'));
        }

        return $r;
    }

    function forgotPassword($email) {
        $user = $this->find('first', array("conditions" => array("User.email"=> $email)));
        if ($user) {
            $id = $user['User']['id'];
            $password = $user['User']['password'];

            $salt = Configure::read("Security.salt");
            $activate_key = md5($password . $salt);
            $expiredTime = strtotime(date('Y-m-d H:i', strtotime('+24 hours')));

            $link = Router::url("/users/activate_password/$id/$activate_key/$expiredTime", true);
            $link = "<a href='".$link."' target='_blank'>".$link."</a>";

            $message = __("Forgot your password, %s ?<br> We received a request to reset the password for your account (%s) .<br> If you want to reset your password, please click on the link below (or copy and paste the URL into your browser).
            <br><br>%s<br><br>This link takes you to a secure page where you can change your password. <br>However, if you don’t want to reset your password, please ignore this message.
            <br><br>Yours sincerely,<br>", $user['User']['name'], $user['User']['email'], $link);

            $cake_email = new CakeEmail();
            $cake_email->from(array('no-reply@example.com' => 'Please Do Not Reply'));
            $cake_email->to($email);
            $cake_email->subject(''.__('Forgot Password'));
            $cake_email->emailFormat('html');
            $cake_email->send($message);

            return true;
        }
        else {
            return false;
        }
    }

    function confirmRegister($id, $token) {
        $user = $this->find('count', array('conditions'=>array('User.id' => $id, 'User.token' => $token)));
        if ($user) {
           $this->saveAll(array('User'=>array('id'=>$id, 'status'=>1, 'token'=>'')), array('validate'=>false));
           return true;
        }
        return false;
    }

    function activatePassword($data) {
        $user = $this->read(null, $data['User']['ident']);
        if ($user) {
            $password = $user['User']['password'];
            $salt = Configure::read("Security.salt");
            $thekey = md5($password . $salt);

            if ($thekey == $data['User']['activate']) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

   
}
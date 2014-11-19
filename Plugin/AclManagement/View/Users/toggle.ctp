<?php echo $this->Html->image('/acl_management/img/icons/allow-' . $status . '.png',
                            array('onclick' => 'published.toggle("status-'.$user_id.'", "'.$this->Html->url('/acl_management/users/toggle/').$user_id.'/'.$status.'");',
                                  'id' => 'status-'.$user_id
        ));
?>
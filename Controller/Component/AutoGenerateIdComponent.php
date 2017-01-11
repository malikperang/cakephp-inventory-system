<?php
App::uses('Component', 'Controller');
/**
* 
*/
class AutoGenerateIdComponent extends Component
{
	
	public function randomID(){
		//set the random id length 
		$random_id_length = 10; 

		//generate a random id encrypt it and store it in $rnd_id 
		$rnd_id = crypt(uniqid(rand(),1)); 

		//to remove any slashes that might have come 
		$rnd_id = strip_tags(stripslashes($rnd_id)); 

		//Removing any . or / and reversing the string 
		$rnd_id = str_replace(".","",$rnd_id); 
		$rnd_id = strrev(str_replace("/","",$rnd_id)); 

		//finally I take the first 10 characters from the $rnd_id 
		$rnd_id = substr($rnd_id,0,$random_id_length); 

		return $rnd_id;
	}

	public function randomString($length = 10){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 50)];
	    }
	    return $randomString;
	}
}


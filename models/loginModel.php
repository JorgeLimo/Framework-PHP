<?php 

class loginModel extends Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function loginUsuarios($email, $pass){
	$datos = $this->_db->query("SELECT * FROM usuarios where email = '". $email ."' AND  password = '". $pass ."'");
	return $datos->fetch();
	}



}


?>
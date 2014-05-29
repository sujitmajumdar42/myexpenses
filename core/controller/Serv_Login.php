<?php
/*
* Class  	: Serv_Login.php
* Type   	: Servlet
* Author 	: Sujit
* Developed	: 30th March,2014	   
*/
require_once("../config/appconfig/Path_Loader.php");
loadPath("User_Login");
class Serv_Login{
	var $uname;
	var $pass;
	public function __construct($uname,$pass){
		$loginObj = new UserLoginTO();
		$userLoginBo = new UserLoginBo();
		
		$loginObj->setUserName($uname);
		$loginObj->setPassword($pass);
		$status = $userLoginBo->doLogin($loginObj);
		if($status)
		 echo "true";
		else
		 echo "false";	
	}
}
new Serv_Login($_POST['username'],$_POST['password']);
?>

<?php
class userLoginDAO{
	
	function __construct(){
		dbConnect();
	}
	
	function doLogin(UserLoginTO $userLoginObj){
		$userDetailsTO=null;
		$query = "SELECT COUNT(*) AS USER FROM `user_login` WHERE USER_NAME='".$userLoginObj->getUserName()."' AND PASSWORD='".$userLoginObj->getPassword()."'";
		 
	$result = mysql_query($query) or die(mysql_error());
	$resp =   mysql_fetch_array( $result );
	if($resp['USER']==1){
		$userDetailsDAO = new userDetailsDAO();
		$userDetailsTO = $userDetailsDAO->getUserDetails($userLoginObj->getUserName());
	}
	return $userDetailsTO;
	}
}
?>
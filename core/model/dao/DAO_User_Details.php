<?php
//require_once("../to/TO_User_Details.php");
class userDetailsDAO{
	private $userDetailsTO;
	
	function __construct(){
		dbConnect();
	}
	
	function getUserDetails($userName){
		$query = "select * FROM user_details where USER_ID='".$userName."'";
		$result = mysql_query($query) or die(mysql_error());
		$resp =   mysql_fetch_array( $result );
		$userDetailsTO = new UserDetailsTO();
		if(!is_null($resp))
			$userDetailsTO = self::setUserDetails($resp,$userDetailsTO);
		return $userDetailsTO;
	}
	static function setUserDetails($resp,$userDetailsTO){
		
		
		$userDetailsTO->setUserName($resp['USER_ID']);
		$userDetailsTO->setName($resp['NAME']);
		$userDetailsTO->setRole($resp['ROLE']);
		$userDetailsTO->setEmail($resp['EMAIL']);
		$userDetailsTO->setLastLogin($resp['LAST_LOGIN']);
		$userDetailsTO->setTotalPay($resp['TOTAL_PAY']);
		$userDetailsTO->setTotalTake($resp['TOTAL_TAKE']);
		$userDetailsTO->setPhone($resp['PHONE']);
		$userDetailsTO->setAddress($resp['ADDRESS']);
		$userDetailsTO->setSocial($resp['SOCIAL']);
		self::setLastLogin(($resp['USER_ID']));
		return $userDetailsTO;
	}
	static function setLastLogin($userName){
		date_default_timezone_set("Asia/Kolkata");
		$query = "UPDATE  `user_details` SET  `LAST_LOGIN` =  '".date('Y/m/d H:i:s')."' WHERE  `USER_ID` =  '".$userName."';";
		$result = mysql_query($query) or die(mysql_error());
	}
}
?>
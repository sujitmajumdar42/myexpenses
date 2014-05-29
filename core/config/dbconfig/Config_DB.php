<?php

function dbConnect(){
	$db_host="mysql5.000webhost.com";
	$db_username="a7519541_admin";
	$db_pass="Sujit@42";
	$db_name="a7519541_expdb";
	mysql_connect($db_host, $db_username,$db_pass) or die(mysql_error());
	mysql_select_db($db_name) or die(mysql_error());
}
function dbDisconnect(){
}
function checkDb(){
	dbConnect();
	echo "Connected to MySQL<br />";
}
function dbChkUser($uname,$pass){
	$query = "SELECT COUNT(*) AS USER FROM `user_login` WHERE USER_NAME='".$uname."' AND PASSWORD='".$pass."'";
	$result = mysql_query($query) or die(mysql_error());
	$resp =   mysql_fetch_array( $result );
	return $resp['USER'];
}
?>
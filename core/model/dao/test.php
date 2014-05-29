<?php
   date_default_timezone_set("Asia/Kolkata");
echo date("Y/m/d H:i:s");
	$db_host="localhost";
	$db_username="root";
	$db_pass="";
	$db_name="expense";
	mysql_connect($db_host, $db_username,$db_pass) or die(mysql_error());
	mysql_select_db($db_name) or die(mysql_error());
	
	$query="select DATE_FORMAT(LAST_LOGIN, '%d/%m/%Y') AS LAST_LOGIN FROM user_details where USER_NAME='admin'";
	$result = mysql_query($query) or die(mysql_error());
	$resp =   mysql_fetch_array( $result );
	echo $resp['LAST_LOGIN'];

?>
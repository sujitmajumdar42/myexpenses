<?php

require_once("../config/dbconfig/Config_DB.php");
dbConnect();
class Mod_login{
function doLogin($uname,$pass){
	
	return dbChkUser($uname,$pass);
}
}
?>
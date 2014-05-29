<?php

class UserLoginTO{
var $userName;
var $password;

function getUserName(){
	return $this->userName;
}
function setUserName($userName){
	$this->userName=$userName;
}

function getPassword(){
	return $this->password;
}
function setPassword($password){
	$this->password=$password;
}

}

?>
<?php
if(isset($_GET['req'])){
	$req = $_GET['req'];
	 
	 if($req=="user_Home"){ 
		require_once('view/user/User_Home.php');
	 }
	 else{
		require_once('view/home.php');
	 }
}else{
	require_once('view/home.php');
}
?>
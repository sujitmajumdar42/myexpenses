<?php

if(isset($_GET['route'])){
	
	$route = $_GET['route'];
	echo $route;
	
	if($route == "userHome"){
		echo "hello";
		header('Location:../../index.php?req=user_Home');	
	}
}
?>
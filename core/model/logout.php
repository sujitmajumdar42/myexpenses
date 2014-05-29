<?php
require_once '../config/appconfig/Session_Config.php';
destroyGlobalSession();
//header("Location:../../index.php");
/*if(isset($_SESSION['loginStatus'])){
	$_SESSION['loginStatus']=false;
	header("Location:../../");
}
else{
	header("Location:../../index.php");
}*/
?>
<head>
<script>
function logout()
{
 var Backlen=history.length;   
  history.go(-Backlen);
  //window.location.replace("../../index.php");
  //location.reload();
  //window.location.href="../../index.php";
}
</script>
<meta http-equiv="refresh" content="0; url=../../index.php">
</head>
<body onload="logout()">
    
</body>
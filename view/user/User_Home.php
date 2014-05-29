<?php
session_start();
if(isset($_SESSION['loginStatus'])){
 if($_SESSION['loginStatus']){
?>
<!DOCTYPE html> 
<html> 
<head> 
  <title>My Expense Manager</title> 
  <link rel="stylesheet" href="css/jquery.mobile-1.3.1.css" />
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery.mobile-1.3.1.min.js"></script>
</head> 
<body> 

<div data-role="page">

  <div data-role="header" data-position="fixed">
  <a href="core/model/logout.php" data-role="button">Logout</a>
  <a href="#popupInfo" data-rel="popup" data-role="button" data-inline="true" data-icon="grid" data-position="right">Tooltip</a>
    <h1>My Expense Manager</h1>
  </div><!-- /header -->
<div data-role="popup" id="popupInfo" class="ui-content" data-theme="e" style="max-width:450px;">
<p style="width:300px">
Name : <?php echo $_SESSION['name'];?><br/>
Last Login : <?php echo $_SESSION['lastLogin'];?><br/>
</p>
</div>
  <div data-role="content"> 
  <?php
  if(isset($_GET['user_req'])){
	  $userReq=$_GET['user_req'];
	  if($userReq=="addExpense"){
		   require_once('view/user/User_Add_Expense.php');
	  }
	  else if($userReq=="viewExpense"){
		  require_once('view/user/User_View_Expenses.php');
	  }
	   else if($userReq=="updateExpense"){
		  require_once('view/user/User_Update_Expenses.php');
	  }
	  else{
		  require_once('view/user/User_Default.php');
	  }
  }
  else{
	  require_once('view/user/User_Default.php');
  }
  ?>
  </div><!-- /content -->

  <div data-role="footer" data-position="fixed">
    <div data-role="navbar">
      <ul>
        <li><a href="index.php?req=user_Home" data-icon="home" class="ui-btn-active ui-state-persist">Home</a></li>
        <li><a href="#" data-icon="star">Help</a></li>
        <li><a href="#" data-icon="refresh">Refresh</a></li>
      </ul>
    </div>
  </div>
<div data-role="panel" id="monthlyPanel">
    
            <h3>Monthly View </h3>
            <p>This panel is positioned on the left with the reveal display mode. The panel markup is <em>after</em> the header, content and footer in the source order.</p>
            <p>To close, click off the panel, swipe left or right, hit the Esc key, or use the button below:</p>
            <a href="#demo-links" data-rel="close" data-role="button" data-theme="a" data-icon="delete" data-inline="true">Close panel</a>
			
</div>
</div><!-- /page -->

</body>
</html>
<?php
}
else{
	//header("Location:../../");
}
}
?>
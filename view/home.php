<!DOCTYPE html>
<html>
<head>
<title>My Page</title>
<link rel="stylesheet" href="css/jquery.mobile-1.3.1.css" />
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery.mobile-1.3.1.min.js"></script>
<script>
$(document).ready(function(){
	$("#err_login").css('display', 'none', 'important');
	 $("#login_submit").click(function(){	
		  username=$("#username").val();
		  password=$("#password").val();
		  $.ajax({
		   type: "POST",
		   url: "core/controller/Serv_Login.php",
			data: "username="+username+"&password="+password,
		   success: function(html){
			if(html=="true")    {
			  window.location="core/controller/Serv_router.php?route=userHome";
			}
			else    {
				$("#err_login").css('display', 'inline', 'important');
			 	$("#err_login").html("Wrong username or password");
			}
		   },
		   beforeSend:function()
		   {
			$("#err_login").css('display', 'inline', 'important');
			$("#err_login").html("<img src='images/ajax-loader.gif' /> Loading...")
		   }
		  });
		return false;
	});
});
</script>
</head>
<body>
<div data-role="page">
<div data-role="header" data-position="fixed">
  <h1>My Expense Manager</h1>
</div>
<!-- /header -->

<div data-role="content">
<ul data-role="listview" data-inset="true">
<li data-role="list-divider">Login</li>
<li> 
  <!-- core/controller/Serv_Login.php -->
  <form method="post" action="./" data-ajax="false">
    <table>
      <tr>
        <td><label for="username">Username:</label>
          <input type="text" name="username" id="username"/></td>
      </tr>
      <tr>
        <td><label for="password">Password:</label>
          <input type="password" name="password" id="password"/></td>
      </tr>
      <tr>
        <td id="err_login"></td>
      </tr>
      <tr>
        <td><input type="submit" id="login_submit" data-inline="true" value="Login"></td>
      </tr>
    </table>
  </form>
</li>
</div>
<!-- /content -->

<div data-role="footer" data-position="fixed">
  <div data-role="navbar">
    <ul>
      <li><a href="#" class="ui-btn-active ui-state-persist">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">More App</a></li>
    </ul>
  </div>
</div>
</div>
<!-- /page -->
</body>
</html>

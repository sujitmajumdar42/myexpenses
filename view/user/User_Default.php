<p>Welcome <?php echo $_SESSION['name'];?>.<br/>
  Here you can track and manage your expenses.</p>
  <p>
  <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">Expenses</li>
      <li><a href="index.php?req=user_Home&user_req=addExpense" data-icon="plus">Add Expenses</a></li>
      <li><a href="index.php?req=user_Home&user_req=viewExpense">View Expenses</a></li>
      <li><a href="index.php?req=user_Home&user_req=updateExpense">Update Expenses</a></li>
    </ul>
   <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">Profile</li>
      <li><a href="#">View Profile</a></li>
      <li><a href="#">Update Profile</a></li>
   </ul> 
   <ul data-role="listview" data-inset="true">
      <li data-role="list-divider">Settings</li>
      <li><a href="#">Settings</a></li>
      <li><a href="#">Query to Admin</a></li>
      <li><a href="#">Logout</a></li>
   </ul> 
  </p>
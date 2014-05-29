<?php
require_once("core/model/to/TO_User_Expenses.php");
?>
<script>
$(document).ready(function(){
	$("#updateStatus").click(function(){
		expenseID=$("#status").val();
		userID=$("#userID").val();
		$.ajax({
			type: "POST",
			url: "core/controller/Serv_Update_Expenses.php",
			data: "expenseID="+expenseID+"&userID="+userID,
			success: function(html){
			if(html==1)
				alert("Successfully updated...");
			},
			beforeSend:function(){},
			error:function(html){
				alert("Error: "+html);
				}
		});
	 });
});
</script>
<div data-role="navbar">
      <ul>
        <li><a href="#" data-icon="grid" class="ui-btn-active ui-state-persist">Daily</a></li>
        <li><a href="#" data-icon="grid">weekly</a></li>
        <li><a href="#" data-icon="grid">Monthly</a></li>
      </ul>
    </div>
    <form method="post" data-ajax="false" action="./" method="post">
    <table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke">
	              <thead>
	                <tr>
	                  <th data-priority="2">Date</th>
	                  <th>Expense ID</th>
	                  <th data-priority="4">Pay</th>
                      <th data-priority="5">Receive</th>
                      <th data-priority="6">Stataus</th>
                      <th>Update Status</th>
	                </tr>
	              </thead>
	              <tbody>
                  <?php
					  for($i=0;$i<count($_SESSION['expenseToList']);$i++){
	  					 $tempTO = unserialize($_SESSION['expenseToList'][$i]);
	 					// echo $tempTO->getExpenseID()."  ***<br/>";
						if($tempTO->getStatus()=="Pending")
						{
                  ?>
	                <tr>
                     
	                  <td><?php echo $tempTO->getDate(); ?></td>
                      <td id="expenseID"><?php echo $tempTO->getExpenseID(); ?></td>
                       
                     
                      <td><img src="images/nGbfO.png" width="8" height="10"><?php echo $tempTO->getUserPay(); ?></td>
                      <td><img src="images/nGbfO.png" width="8" height="10"><?php echo $tempTO->getUserTake(); ?></td>
                      <td><?php echo $tempTO->getStatus(); ?></td>
                      <td>
                     <input type="hidden" id="status" name="expenseID" value="<?php echo $tempTO->getExpenseID(); ?>"/>	
                     <input type="hidden" id="userID" name="userID" value="<?php echo $_SESSION['userID']; ?>"/>
                      <input type="submit" id="updateStatus" data-inline="true" value="Update"/>
                     
                      </td>
                       
	                </tr>
	                <?php
						}
					  }
					?>
	              </tbody>
	            </table>
                </form>
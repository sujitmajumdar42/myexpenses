<script>
    $(document).ready(function(){
        /*$(".labelreceive").click(function(){
            $(".payerDetail").click();
        });*/
        $("#monthlyView").hide();
        $("#yearlyView").hide();
        $("#monthlylink").click(function(){
            $("#yearlyView").hide();
            $("#dailyView").hide();
            $("#monthlyView").show();
        });
        $("#dailylink").click(function(){
            $("#yearlyView").hide();
            $("#dailyView").show();
            $("#monthlyView").hide();
        });
        $("#yearlylink").click(function(){
            $("#yearlyView").show();
            $("#dailyView").hide();
            $("#monthlyView").hide();
        });
        $.ajax({
        url: 'http://myexpense.comoj.com/test/myexpense/core/json/ViewExpense_JSON.json',
        dataType: 'json',
        success: function( data ) {
        alert( "SUCCESS:  " + data.expenseList[0].expenseID );
        },
    error: function( data ) {
      alert( "ERROR:  " + data );
    }
  });
        $.getJSON('core/json/ViewExpense_JSON.json', function(data) {
            alert("path getting");
            for (var index in data.expenseList) {
             alert(data.expenseList[i].expenseID);    
            }
        }).error(function(html){
            alert("---"+html);
        });
    $(".labelreceive").click(function() {
    element = $(this);
            expenseID = element.attr("id");
            $.ajax({
            type: "POST",
            url: "core/controller/Serv_View_Expenses.php",
            data: {expenseID : expenseID},
            success: function(html) {
                    $("#payerDetlPopup").html(html);
                    $("#Link"+expenseID).show();
                    $("#Link"+expenseID).click();
            },
                    beforeSend: function()
                    {

                    $("#payerDetlPopup").html("<img src='images/loading.gif' /> Loading...")
                    $("#Link"+expenseID).click();
                    }
            });
            return false;
    });
    });
</script>
<?php
require_once("core/model/to/TO_User_Expenses.php");
?>
<div data-role="navbar">
    <ul>
        <li><a href="#" data-icon="grid" class="ui-btn-active ui-state-persist" id="dailylink">Daily</a></li>
        <li><a href="#" data-icon="grid" id="monthlylink">weekly</a></li>
        <li><a href="#" data-icon="grid" id="yearlylink">Monthly</a></li>
    </ul>
</div>
<div id="dailyView">
<table data-role="table" id="table-column-toggle" data-mode="columntoggle" class="ui-responsive table-stroke">
    <thead>
        <tr>
            <th data-priority="2">Date</th>
            <th>Expense ID</th>
            <th data-priority="3">Purpose</th>
            <th data-priority="1">Total</th>
            <th data-priority="4">Pay</th>
            <th data-priority="5">Receive</th>
            <th data-priority="6">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        for ($i = 0; $i < count($_SESSION['expenseToList']); $i++) {
            $tempTO = unserialize($_SESSION['expenseToList'][$i]);
            // echo $tempTO->getExpenseID()."  ***<br/>";
            ?>
            <tr>
                <td><?php echo $tempTO->getDate(); ?></td>
                <td><?php echo $tempTO->getExpenseID(); ?></td>
                <td><?php echo $tempTO->getPurpose(); ?></td>
                <td><img src="images/nGbfO.png" width="8" height="10"><?php echo $tempTO->getTotExpense(); ?></td>
                <td><img src="images/nGbfO.png" width="8" height="10"><?php echo $tempTO->getUserPay(); ?></td>
                <td>
                    <?php
                   
                    if ($tempTO->getUserTake() > 0) {
                        ?>
                        <form method="post" action="./" data-ajax="false">
                            <img src="images/nGbfO.png" width="8" height="10"><label class="labelreceive" style="color: blue" id="<?php echo $tempTO->getExpenseID(); ?>"><?php  echo $tempTO->getUserTake(); ?></label>  
                            <a href="#payerDetlPopup" data-rel="popup" type="submit" id="Link<?php echo $tempTO->getExpenseID(); ?>" style="visibility: hidden"></a>
                            
                            <div data-role="popup" id="payerDetlPopup" class="ui-content" data-theme="e" style="max-width:450px;">

                            </div>
                        </form>
                        <?php
                    } else{
                         echo $tempTO->getUserTake();
                    }
                    ?>
                </td>
                <td><?php echo $tempTO->getStatus(); ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
</div>
<div id="monthlyView">
    Monthly View
    <a href="#monthlyPanel" data-role="button" data-inline="true" data-mini="true">Select Month</a>
</div>
<div id="yearlyView">Yearly View</div>


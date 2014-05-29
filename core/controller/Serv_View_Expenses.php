<?php
require_once("../config/appconfig/Path_Loader.php");
loadPath("User_Expenses");
class ServViewExpense{
	public function __construct(){
		$expensesDetailBO = new ExpensesDetailBO();
		//$expensesDetailBO->updateExpense($_POST['expenseID'],$_POST['userID']);
                $expensesDetailBO->viewPayer($_POST['expenseID']);
	}
}
new ServViewExpense();
?>
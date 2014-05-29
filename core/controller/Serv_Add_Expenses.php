<?php
require_once("../config/appconfig/Path_Loader.php");
loadPath("User_Expenses");
class ServAddExpense{
	public function __construct(){
		$userExpenseTO = new userExpensesTO();
		$userExpenseTO->setUserID($_POST['user']);
		//$userExpenseTO->setUser($_POST['user']);
		$userExpenseTO->setDate($_POST['dateYear']."-".$_POST['dateMonth']."-".$_POST['dateDay']);
		$userExpenseTO->setPurpose($_POST['purpose']);
		$userExpenseTO->setTotExpense($_POST['totAmount']);
		$index=0;
		foreach($_POST['includeUser'] as $includeUser)
			$includeUserList[$index++]=$includeUser;
		$userExpenseTO->setIncludeUser($includeUserList);	
		$expensesDetailBO = new ExpensesDetailBO();
		$expensesDetailBO->addExpenses($userExpenseTO);
	}
}
new ServAddExpense();
?>
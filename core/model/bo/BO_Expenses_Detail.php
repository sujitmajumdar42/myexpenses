<?php
class ExpensesDetailBO{
	function addExpenses(userExpensesTO $userExpensesTO){
		$expensesDetailDao = new ExpensesDetailDao();
		$userExpensesTO->setExpenseID(self::getExpenseID($userExpensesTO));
		$expensesDetailDao->addExpense($userExpensesTO);
                $this->viewExpenses($userExpensesTO->getUserID());
	}
	
	private static function getExpenseID(){
		return time();
                
	}
	function viewExpenses($userID){
		$expensesDetailDao = new ExpensesDetailDao();
		$userExpensesTOList = $expensesDetailDao->viewExpense($userID);
                if (!is_null($userExpensesTOList)) {
            setExpnsSession($userExpensesTOList);
        }
    }
        function viewPayer($expenseID){
            $expensesDetailDao = new ExpensesDetailDao();
            $expensesDetailDao->viewPayer($expenseID);
        }
	function updateExpense($expenseID,$userID){
		$expensesDetailDao = new ExpensesDetailDao();
		$expensesDetailDao->updateExpense($expenseID,$userID);
	}
}
?>
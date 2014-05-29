<?php
class UserLoginBo{

	function doLogin(UserLoginTO $loginObj){
		$userLoginDao = new userLoginDAO();
		$userDetailsTO = $userLoginDao->doLogin($loginObj);
		
		if(is_null($userDetailsTO)){
			$status = false;
		}
		else{
			setUserSession($userDetailsTO);
			$expensesDetailBO = new ExpensesDetailBO();
			$expensesDetailBO->viewExpenses($_SESSION['userID']);
			$status= true;
		}
		return $status;
	}
}
?>
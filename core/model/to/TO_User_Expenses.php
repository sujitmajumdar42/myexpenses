<?php

class userExpensesTO{
	
private $expenseID;
private $owner;
private $userID;
private $user;
private $date;
private $purpose;
private $totExpense;
private $userPay;
private $userTake;
private $status;
private $includeUser;

function setExpenseID($expenseID) { $this->expenseID = $expenseID; }
function getExpenseID() { return $this->expenseID; }
function setOwner($owner) { $this->owner = $owner; }
function getOwner() { return $this->owner; }
function setUserID($userID) { $this->userID = $userID; }
function getUserID() { return $this->userID; }
function setUser($user) { $this->user = $user; }
function getUser() { return $this->user; }
function setDate($date) { $this->date = $date; }
function getDate() { return $this->date; }
function setPurpose($purpose) { $this->purpose = $purpose; }
function getPurpose() { return $this->purpose; }
function setTotExpense($totExpense) { $this->totExpense = $totExpense; }
function getTotExpense() { return $this->totExpense; }
function setUserPay($userPay) { $this->userPay = $userPay; }
function getUserPay() { return $this->userPay; }
function setUserTake($userTake) { $this->userTake = $userTake; }
function getUserTake() { return $this->userTake; }
function setStatus($status) { $this->status = $status; }
function getStatus() { return $this->status; }
function setIncludeUser($includeUser) { $this->includeUser = $includeUser; }
function getIncludeUser() { return $this->includeUser; }
}
?>
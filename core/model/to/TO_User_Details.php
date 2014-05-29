<?php
class UserDetailsTO{

private $userName;
private $name;
private $role;
private $email;
private $lastLogin;
private $totalPay;
private $totalTake;
private $phone;
private $address;
private $social;

function setUserName($userName) { $this->userName = $userName; }
function getUserName() { return $this->userName; }
function setName($name) { $this->name = $name; }
function getName() { return $this->name; }
function setRole($role) { $this->role = $role; }
function getRole() { return $this->role; }
function setEmail($email) { $this->email = $email; }
function getEmail() { return $this->email; }
function setLastLogin($lastLogin) { $this->lastLogin = $lastLogin; }
function getLastLogin() { return $this->lastLogin; }
function setTotalPay($totalPay) { $this->totalPay = $totalPay; }
function getTotalPay() { return $this->totalPay; }
function setTotalTake($totalTake) { $this->totalTake = $totalTake; }
function getTotalTake() { return $this->totalTake; }
function setPhone($phone) { $this->phone = $phone; }
function getPhone() { return $this->phone; }
function setAddress($address) { $this->address = $address; }
function getAddress() { return $this->address; }
function setSocial($social) { $this->social = $social; }
function getSocial() { return $this->social; }
}
?>
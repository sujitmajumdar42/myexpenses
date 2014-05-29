<?php
/*
 * Class : Dependants
 * Purpose : TO for Dependants Table
 * Date : 26th May, 2014 
 * Owner  : Sujit
 * Version : 1.0
 */

class Dependants {
    private $userID;
    private $totDep;
    private $dependants;

    function setUserID($userID) { $this->userID = $userID; }
    function getUserID() { return $this->userID; }
    function setTotDep($totDep) { $this->totDep = $totDep; }
    function getTotDep() { return $this->totDep; }
    function setDependants($dependants) { $this->dependants = $dependants; }
    function getDependants() { return $this->dependants; }
}
?>
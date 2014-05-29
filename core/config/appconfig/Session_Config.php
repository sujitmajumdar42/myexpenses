<?php

session_start();

function setExpnsSession($expenseToList) {
    //$_SESSION['expenseObjList'] = serialize($expenseToList);
    $_SESSION['expenseToList'] = array();
    $index = 0;
    foreach ($expenseToList as $expenseTO) {
        $_SESSION['expenseToList'][$index++] = serialize($expenseTO);
    }
}

function destroyExpnsSession() {
    $_SESSION['expenseObj'] = null;
}

function setUserSession(UserDetailsTO $userDetailsTO) {
    $_SESSION['name'] = $userDetailsTO->getName();
    $_SESSION['lastLogin'] = $userDetailsTO->getLastLogin();
    $_SESSION['loginStatus'] = true;
    $_SESSION['userID'] = $userDetailsTO->getUserName();
}

function destroyUserSession() {
    $_SESSION['user'] = null;
}

function destroyGlobalSession() {
    session_destroy();
}

?>
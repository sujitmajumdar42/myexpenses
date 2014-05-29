<?php

class ExpensesDetailDao {

    function __construct() {
        dbConnect();
        $this->_file = $file;
    }
    function addExpense(userExpensesTO $userExpenses) {
        $owner = $userExpenses->getUserID();
        $userExpenses->setUser(self::getUserName($userExpenses->getUserID(), true));
        $includeUserList = $userExpenses->getIncludeUser();
        $userNameList = self::getUserName($includeUserList, false);
        $totalExpense = $userExpenses->getTotExpense();
        $indiVidualAmount = round($totalExpense / count($includeUserList), 2);
        $ownerAmount = round($totalExpense - $indiVidualAmount, 2);
        $userExpenses->setStatus("Pending");
        $stakeHolder = count($includeUserList);
        $query = "INSERT INTO  `a7519541_expdb`.`expense_master` (
                          `EXPENSE_ID` ,`OWNER`,`DATE` ,`PURPOSE` ,`TOTAL` ,
                          `RECEIVED` ,`STAKEHOLDER` ,`STATUS`)
                           VALUES (
                           '".$userExpenses->getExpenseID()."',  '".$owner."','".$userExpenses->getDate()."',  '".$userExpenses->getPurpose()."'
                               ,".$userExpenses->getTotExpense().",  ". $indiVidualAmount.",  ".$stakeHolder.",  'Pending'
                           );";                        
              
                mysql_query($query) or die(mysql_error());
        ?>
        <p>
            Expense ID : <?php echo $userExpenses->getExpenseID(); ?><br/>
            Total Expense Amount : <?php echo $userExpenses->getTotExpense(); ?><br/>
            Date : <?php echo $userExpenses->getDate(); ?><br/>
            Purpose : <?php echo $userExpenses->getPurpose(); ?><br/>
            Owner : <?php echo $owner ?><br/>
        <table border="1">
            <tr>
                <th>User</th>
                <th>Pay</th>
                <th>Receive</th>
                <th>Status</th>
            <tr>
                <?php
                foreach ($includeUserList as $includeUserID) {

                    if ($includeUserID == $userExpenses->getUserID()) {

                        $userExpenses->setUser($userNameList[$includeUserID]);
                        $userExpenses->setUserTake($ownerAmount);
                        $userExpenses->setUSerPay(0);
                        $userExpenses->setStatus("NA");
                    } else {

                        //$userExpenses->setUserID($includeUserID);
                        $userExpenses->setUser($userNameList[$includeUserID]);
                        $userExpenses->setUserTake(0);
                        $userExpenses->setUSerPay($indiVidualAmount);
                        $userExpenses->setStatus("Pending");
                    }
                    ?>
                <tr>
                    <td><?php echo $userExpenses->getUser(); ?></td>
                    <td><?php echo $userExpenses->getUserPay(); ?></td>
                    <td><?php echo $userExpenses->getUserTake(); ?></td>
                    <td><?php echo $userExpenses->getStatus(); ?></td>
                </tr>
                <?php
               $transQuery = "INSERT INTO  `a7519541_expdb`.`exp_trans` (`EXPENSE_ID` ,`USERNAME` ,`PAY` ,`RECEIVE` ,`STATUS`)
                              VALUES ('".$userExpenses->getExpenseID()."',  '".$includeUserID."',  ".$userExpenses->getUserPay().",  ".$userExpenses->getUserTake().",  'Pending');";
                mysql_query($transQuery) or die(mysql_error());
            }
            ?>
        </table></p>
        <?php
    }

    private static function getUserName($UserIDList, $isSingle) {
        if ($isSingle) {
            $query = "SELECT `NAME` FROM `user_details` WHERE `USER_ID`='" . $UserIDList . "'";
            $result = mysql_query($query) or die(mysql_error());
            $resp = mysql_fetch_array($result);

            return $resp['NAME'];
        } else {
            $userNameList = null;
            foreach ($UserIDList as $UserID) {

                $query = "SELECT `NAME` FROM `user_details` WHERE `USER_ID`='" . $UserID . "'";
                $result = mysql_query($query) or die(mysql_error());
                $resp = mysql_fetch_array($result);
                $userNameList[$UserID] = $resp['NAME'];
            }
            return $userNameList;
        }
    }

    function viewExpense($userID) {
        $query = "select `a`.`EXPENSE_ID`,`a`.`PAY`,`a`.`RECEIVE`,`a`.`STATUS`,`b`.`PURPOSE`,`b`.`Date`,`b`.`TOTAL` from `exp_trans` `a` inner join `expense_master` `b` on `a`.`expense_id`=`b`.`expense_id` where `a`.`username`=\"".$userID."\"";
        $result = mysql_query($query) or die(mysql_error());
        $expenseList = null;
        $index = 0;
        $json_txt='{"expenseList": [';
        while ($resp = mysql_fetch_array($result)) {
            $userExpenses = new userExpensesTO();
            $userExpenses->setExpenseID($resp['EXPENSE_ID']);
            $userExpenses->setuserID($userID);
            $userExpenses->setDate($resp['Date']);
            $userExpenses->setPurpose($resp['PURPOSE']);
            $userExpenses->setTotExpense($resp['TOTAL']);
            $userExpenses->setUserPay($resp['PAY']);
            $userExpenses->setUserTake($resp['RECEIVE']);
            $userExpenses->setStatus($resp['STATUS']);
            $expenseList[$index++] = $userExpenses;
            $json_txt.='{ "expenseID":"'.$resp['EXPENSE_ID'].'" , "userID":"'.$userID.'" , "date":"'.$resp['Date'].'", "purpose":"'.$resp['PURPOSE'].'", "total":"'.$resp['TOTAL'].'", "pay":"'.$resp['PAY'].'", "receive":"'.$resp['RECEIVE'].'", "status":"'.$resp['STATUS'].'"},';               
        }
        rtrim($json_txt,",");
        $json_txt.=']}';
        $fp = fopen('../../core/json/ViewExpense_JSON.json', 'w');
        fwrite($fp,  json_encode($json_txt));
        fclose($fp);
        return $expenseList;
    }

    function updateExpense($expenseID, $userID) {
        $query = "UPDATE  `expense`.`expenses_detail` SET  `STATUS` =  'Cleared' WHERE  `expenses_detail`.`EXPENSE_ID` =  '" . $expenseID . "' AND `expenses_detail`.`USER_ID` =  '" . $userID . "';";
        //echo $query."<br/>";
        $result = mysql_query($query) or die(mysql_error());
        echo $result;
    }

    function viewPayer($expenseID) {
        $query = "SELECT USERNAME, PAY FROM  `exp_trans` WHERE expense_id =  '".$expenseID."' AND STATUS =  'Pending' AND PAY>0";
        $result = mysql_query($query) or die(mysql_error());
        while ($resp = mysql_fetch_array($result)) {
            echo self::getUserName($resp['USERNAME'],true) . " : " . $resp['PAY'] . "<br/>";
        }
    }

}
?>
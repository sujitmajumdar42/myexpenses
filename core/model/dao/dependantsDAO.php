<?php

class dependantsDAO{
    function __construct(){
		dbConnect();
	}
     //CRUD Applications
        //read
        //insert
        //update
        //delete
    function read(Dependants $dependants){
        
        $query = "SELECT * FROM DEPENDANTS WHERE USER_ID = '".$dependants->getUserID()."'";
        $result = mysql_query($query) or die(mysql_error());
       while ($resp = mysql_fetch_array($result)) {
           $dependants->setTotDep($resp["TOT_DEP"]);
           $dependants->setUserID($resp["USER_ID"]);
           $dependants->setDependants($resp["DEPNDNTS"]);
       }
       return $dependants;
    }    
}

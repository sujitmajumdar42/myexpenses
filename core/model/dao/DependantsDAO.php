<?php

//Temporarily requirig. This will be deleted at later stage
require_once '../../config/dbconfig/Config_DB.php';

/**
 * DAO for DEPENDANTS Table.
 */
class DependantsDAO {
    
    public static $dbo = null;
    /**
     * Default constructor
     * It creates a DbConfig object
     */
    function __construct() {
        self::$dbo = new DbConfig();
    }
    
    /**
     * Insert dependants to DB
     */
    function insert($dependantsTO){
        $sql = "INSERT INTO DEPENDANTS";
        self::$dbo->execute("...");
    }
}

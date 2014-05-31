<?php

/**
 * Database credentials
 */
define('DB_HOST', 'mysql5.000webhost.com');
define('DB_USER_NAME', 'a7519541_admin');
define('DB_USER_PASS', 'admin@123');
define('DB_NAME', 'a7519541_dbexp');

/**
 * <u>Database Configuration</u>
 * This class creates a database connection and<br/>
 * this class is used to execute SQL Query
 */
class dbConfig {
    /* Default constructor
     * It is used to load the database and create a connection pool
     */

    function __construct() {
        mysql_connect(DB_HOST, DB_USER_NAME, DB_USER_PASS) or die(mysql_error());
        mysql_select_db(DB_NAME);
    }

    /**
     * executes sql statement.
     * @param String $sql SQL statement
     * @throws SQL Exception
     */
    function execute($sql) {
        return mysql_query($sql) or die(mysql_error());
    }

}

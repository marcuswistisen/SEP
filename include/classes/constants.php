<?php
/**
 * Database Constants - these constants are required
 * in order for there to be a successful connection
 * to the MySQL database. Make sure the information is
 * correct if you going to try it out!
 */
define("DB_SERVER", "localhost");
define("DB_USER", "projectdb");
define("DB_PASS", "");
define("DB_LOGIN", "LoginDB");
define("DB_APPLICATION", "ApplicationDB");

/**
 * Database Table Constants - the name of the tables used in the DB
 */
define("TBL_USER", "User");
define("TBL_APPLICATION", "Application");
define("TBL_CONFERANCE", "Conferance");
define("TBL_COST", "Cost");
define("TBL_JUSTIFICATION", "Justification");
define("TBL_TRAVEL", "Travel");
define("TBL_UNIVERSITY", "University");

/**
 * Not logged in costant -  just for validating if a user is logged in or not.
 */
define("NOT_LOGGED_IN", "NULL");

/**
 * Cookie constants - Expire and Path
 */
define("COOKIE_EXPIRE", 60*60*24*100);  //100 days by default
define("COOKIE_PATH", "/");  //Avaible in whole domain
?>

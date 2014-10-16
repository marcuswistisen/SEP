<?php

require("constants.php");
      
class MySQLDB
{
   var $connection;         //The MySQL database connection
   /* Class constructor */
   function MySQLDB(){
      /* Make connection to database */
      $this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die(mysql_error());
      mysql_select_db(DB_NAME, $this->connection) or die(mysql_error());
   }
   
   /**
    * confirmUser - confirm the utsid and utspassword with
    * the LoginDB
    */
   function confirmUser($utsid, $utspassword){
   	/* Verify that user is in the database */
   	$q = "SELECT uts_password FROM ". TBL_USER . " WHERE uts_id = '$utsid'";
   	$result = mysql_query($q, $this->connection);
   	if(!$result || (mysql_numrows($result) < 1)){
   
   		return 1; //Indicates that the user is not in the database
   	}
   
   	/* Retrieve password from result */
   	$dbarray = mysql_fetch_array($result);
   	/* Validate that password is correct */
   	if($utspassword == $dbarray['uts_password']){
   		return 0; // All good utsid and utspassword confirmed
   	}
   	else{
   		return 2; // Indicates password failure
   	}
   }
   
   /**
    * getUser - get all columns for a user from the LoginDB
    */
   
   function getUser($utsid) {
   	$q = "SELECT * FROM ". TBL_USER . " WHERE uts_id = '$utsid'";
   	$result = mysql_query($q, $this->connection);
   	return mysql_fetch_array($result);
   }
   
   /**
    * loggedIn - set the uts_cookie variable so that 
    * the user is logged in
    */
   function loggedIn($utsid, $utscookie) {
   	$q = "UPDATE " . TBL_USER . " SET uts_cookie = '$utscookie' WHERE uts_id = '$utsid'";
   	return mysql_query($q, $this->connection);
   }
   
   /**
    * confirmUserCookie - confirm that the users cookie is the
    * same as the uts_cookie entry in LoginDB
    */
   function confirmUserCookie($utsid, $utscookie) {
   	$q = "SELECT uts_id, uts_cookie FROM ". TBL_USER . " WHERE uts_id = '$utsid'";
   	$result = mysql_query($q, $this->connection);
   	$dbarray = mysql_fetch_array($result);
   	if($dbarray['uts_id'] == $utsid && $dbarray['uts_cookie'] == $utscookie)
   		return true;
   	else 
   		return false;
   }
};

/* Create database connection */
$database = new MySQLDB;

   ?>
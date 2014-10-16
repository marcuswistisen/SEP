<?php
include("database.php");
include("form.php");
class Session
{
   var $utsid;        // UTSID variable
   var $utscookie;    // Cookie generated on login
   var $logged_in;    // True if user is logged in
   var $userinfo = array();  // The array holding an users info
   var $url;          // The page url that is currently being viewd
   var $referrer;     // Last recorded page that was viewd

   /* Class constructor */
   function Session(){
      $this->startSession(); // start a new session
   }

   /**
    * startSession - Performs all the actions necessary to 
    * initialize this session object. Also determines if 
    * a user is logged in, or not
    */
   function startSession(){
      global $database;  // Database connection
      session_start();   // Call a new session by PHP
      
      /* Determine if user is logged in */
      $this->logged_in = $this->checkLogin();
      
      /**
       * Set a user to not logged in if he is not logged in
       */
      if(!$this->logged_in){
         $this->utsid = $_SESSION['$utsid'] = NOT_LOGGED_IN;
      }
      	
      /* Set referrer page */
      if(isset($_SESSION['url'])){
         $this->referrer = $_SESSION['url'];
      }else{
         $this->referrer = "/";
      }
      
      /* Set current url */
      $this->url = $_SESSION['url'] = $_SERVER['PHP_SELF'];
      
   }
   
   /**
    * loginUTS - A user have submitted his utsid and password 
    * and is validated in the database. If invalid setError in form
    */
   function loginUTS($utsid, $utspassword){
	   	global $database, $form;  //The database and form object
	   	/* Prevents a SQL injection */
	   	$utsid = mysql_real_escape_string($utsid);
	   	$utspassword = mysql_real_escape_string($utspassword);
	   	/* Checks that username is in database and password is correct */
	   	$result = $database->confirmUser($utsid, $utspassword);
	   	/* Check error codes */
	   	if($result == 1 || $result == 2){
	   		$field = "pass";
	   		$form->setError($field, "Invalid username or password");
	   	}
	   	
	   	/* Return if form errors exist */
	   	if($form->num_errors > 0){
	   		return false;
	   	}
	   	
	/* Utsid and password correct, register session variables */
	$this->userinfo  = $database->getUser($utsid); // get the whole User table
	$this->utsid  = $_SESSION['utsid'] = $this->userinfo['uts_id']; // set session variable utsid
	$this->utscookie   = $_SESSION['cookieid'] = $this->generateRandStrCookie(); // generate a cookie
	setcookie("cookname", $this->utsid, time()+COOKIE_EXPIRE, COOKIE_PATH); //set cookie cookname as utsid
	setcookie("cookid", $this->utscookie, time()+COOKIE_EXPIRE, COOKIE_PATH); // set cookid as the generated cookie
	
	/* Insert cookie into DB*/
	$database->loggedIn($this->utsid, $this->utscookie);
	
	/* Login complete */
	return true;
   }
   
   /**
    * checkLogin - Checks if the user is logged in
    */
   function checkLogin(){
      global $database;  //The database connection
      /* Check if cookies are set*/
      if(isset($_COOKIE['cookname']) && isset($_COOKIE['cookid'])){
      	
         $this->utsid = $_SESSION['utsid'] = $_COOKIE['cookname'];
         $this->utscookie   = $_SESSION['cookieid']   = $_COOKIE['cookid'];
      }

      /* utsid and cookie have been set and the user is logged in */
      if(isset($_SESSION['utsid']) && isset($_SESSION['cookieid']) &&
         $_SESSION['utsid'] != NOT_LOGGED_IN){
         /* Confirm that utsid and cookieid are valid */
         if(!$database->confirmUserCookie($_SESSION['utsid'], $_SESSION['cookieid'])){
            /* If not user is not logged in, hence unset cookies */
            unset($_SESSION['utsid']);
            unset($_SESSION['cookieid']);
            return false;
         }
         /* User is logged in, set class variables */
         $this->userinfo  = $database->getUser($_SESSION['utsid']);
         $this->utsid  = $this->userinfo['uts_id'];
         $this->utscookie    = $this->userinfo['uts_cookie'];
         return true;
      }
      /* User not logged in */
      else{
         return false;
      }
   }

   /**
    * generateRandStrCookie - Generates a string made up of randomized
    * letters (lower and upper case) and digits of 16 characters length
    */
   function generateRandStrCookie(){
   	$length = 16;
   	$randstr = "";
   	for($i=0; $i<$length; $i++){
   		$randnum = mt_rand(0,61);
   		if($randnum < 10){
   			$randstr .= chr($randnum+48);
   		}else if($randnum < 36){
   			$randstr .= chr($randnum+55);
   		}else{
   			$randstr .= chr($randnum+61);
   		}
   	}
   	return $randstr;
   }
};

/**
 * Initialize session object - This must be initialized before
 * the form object because the form uses session variables,
 * which cannot be accessed unless the session has started.
 */
$session = new Session;

/* Initialize form object */
$form = new Form;
   ?>
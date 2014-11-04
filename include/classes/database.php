<?php

require("constants.php");
      
class MySQLDB
{
    var $connection;         //The MySQL database connection

   /* Class constructor */
   function MySQLDB(){
       /* Make connection to databases */
       $this->connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die(mysql_error());
       mysql_select_db(DB_LOGIN, $this->connection) or die(mysql_error());
      // mysql_select_db(DB_APPLICATION, $this->connection) or die(mysql_error());
   }
   
   /**
    * confirmUser - confirm the utsid and utspassword with
    * the connection
    */
   function confirmUser($utsid, $utspassword){
   	/* Verify that user is in the database */
       mysql_select_db(DB_LOGIN, $this->connection) or die(mysql_error());
       $q = "SELECT uts_password FROM ". TBL_USER . " WHERE uts_id = '$utsid'";
   	   $result = mysql_query($q,  $this->connection);
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
    * getUser - get all columns for a user from the connection
    */
   
   function getUser($utsid) {
       mysql_select_db(DB_LOGIN, $this->connection) or die(mysql_error());
   	   $q = "SELECT * FROM ". TBL_USER . " WHERE uts_id = '$utsid'";
   	   $result = mysql_query($q, $this->connection);
   	   return mysql_fetch_array($result);
   }
   
   /**
    * loggedIn - set the uts_cookie variable so that 
    * the user is logged in
    */
   function loggedIn($utsid, $utscookie) {
       mysql_select_db(DB_LOGIN, $this->connection) or die(mysql_error());
       $q = "UPDATE " . TBL_USER . " SET uts_cookie = '$utscookie' WHERE uts_id = '$utsid'";
   	   return mysql_query($q,  $this->connection);
   }
   
   /**
    * confirmUserCookie - confirm that the users cookie is the
    * same as the uts_cookie entry in connection
    */
   function confirmUserCookie($utsid, $utscookie) {
       mysql_select_db(DB_LOGIN, $this->connection) or die(mysql_error());
   	   $q = "SELECT uts_id, uts_cookie FROM ". TBL_USER . " WHERE uts_id = '$utsid'";
   	   $result = mysql_query($q,  $this->connection);
   	   $dbarray = mysql_fetch_array($result);
   	   if($dbarray['uts_id'] == $utsid && $dbarray['uts_cookie'] == $utscookie)
   		    return true;
     	else
   	    	return false;
   }
    function submitApplication($applicationArray)
    {
        // Get All variables
        $firstname = $applicationArray[0];
        $preferredfirst = $applicationArray[1];
        $lastname = $applicationArray[2];
        $email = $applicationArray[3];
        $phone = $applicationArray[4];
        $schoolcentre = $applicationArray[5];
        $utsid = $applicationArray[6];
        $supervisor = $applicationArray[7];
        $booresearchstudent = $applicationArray[8];
        $booresearchgrant = $applicationArray[9];
        $booresearchstrength = $applicationArray[10];
        $papertitle = $applicationArray[11];
        $evidence = $applicationArray[12];
        $boojournalaccepted = $applicationArray[13];
        $boopeerreviewhappend = $applicationArray[14];
        $boojournaldeclared = $applicationArray[15];
        $peerreviewurl = $applicationArray[16];
        $copypaperurl = $applicationArray[17];
        $conferanceurl = $applicationArray[18];
        $conferancename = $applicationArray[19];
        $cstart = $applicationArray[22] . '-' . $applicationArray[20] . '-' . $applicationArray[21];
        $cend = $applicationArray[25] . '-' . $applicationArray[23] . '-' . $applicationArray[24];
        $conferancecountry = $applicationArray[26];
        $conferancequality = $applicationArray[27];
        $specialinvite = $applicationArray[28];
        $peparrangement = $applicationArray[29];
        $travelstart = $applicationArray[32] . '-' . $applicationArray[30] . '-' . $applicationArray[31];
        $travelend = $applicationArray[35] . '-' . $applicationArray[33] . '-' . $applicationArray[34];
        $travellocation = $applicationArray[36];
        $traveljustification = $applicationArray[37];
        $aircostd = $applicationArray[38] + ($applicationArray[39] / 100);
        $meald = $applicationArray[40] + ($applicationArray[41] / 100);
        $accomondationd = $applicationArray[42] + ($applicationArray[43] / 100);
        $conferancecd = $applicationArray[44] + ($applicationArray[45] / 100);
        $localfaresd = $applicationArray[46] + ($applicationArray[47] / 100);
        $carmileaged = $applicationArray[48] + ($applicationArray[49] / 100);
        $otherd = $applicationArray[50] + ($applicationArray[51] / 100);

        $conferenceid = '';
        $costid = '';
        $justificationid = '';
        $travelid = '';
        $universityid = '';

        $q = "INSERT INTO " . TBL_CONFERANCE . " ( `conference_url`, `conference_name`, `conference_start`, `conference_end`, `conference_country`, `conferance_quality`, `special_invitation`, `pep_arrangement`)
            VALUES ('$conferanceurl','$conferancename','$cstart','$cend','$conferancecountry','$conferancequality','$specialinvite','$peparrangement')";
        mysql_select_db(DB_APPLICATION, $this->connection) or die(mysql_error());
        if (mysql_query($q, $this->connection)) { // if inserted into Conference insert into Cost
            $conferenceid = mysql_insert_id();
            $q = "INSERT INTO " . TBL_COST . " (`air_fares`, `meal_cost`, `accomondation_cost`, `conferance_cost`, `local_fares_cost`, `car_milage_cost`, `other_cost`)
                VALUES ('$aircostd','$meald','$accomondationd','$conferancecd','$localfaresd','$carmileaged','$otherd')";
            if (mysql_query($q, $this->connection)) { // if inserted into Cost insert into Justification
                $costid = mysql_insert_id();
                $q = "INSERT INTO " . TBL_JUSTIFICATION . "( `paper_title`, `evidence`, `journal_accepted`, `peer_review_happend`, `journal_declared`, `peer_review_url`, `copy_paper_url`)
                  VALUES ('$papertitle', '$evidence','$boojournalaccepted','$boopeerreviewhappend','$boojournaldeclared','$peerreviewurl','$copypaperurl')";
                if (mysql_query($q, $this->connection)) { // if inserted into Justification insert into Travel
                    $justificationid = mysql_insert_id();
                    $q = "INSERT INTO ".TBL_TRAVEL." (`travel_start`, `travel_end`, `travel_loc`, `travel_justification`)
                      VALUES ('$travelstart','$travelend','$travellocation','$traveljustification')";
                    if (mysql_query($q, $this->connection)) { // if inserted into Travel insert into University
                        $travelid = mysql_insert_id();
                        $q = "INSERT INTO ".TBL_UNIVERSITY." (`supervisor`, `research_student`, `research_grant`, `research_stregth`)
                          VALUES ('$supervisor','$booresearchstudent','$booresearchgrant','$booresearchstrength')";
                        if (mysql_query($q, $this->connection)) { // if inserted into University insert into Application
                            $universityid = mysql_insert_id();
                            $q = "INSERT INTO ".TBL_APPLICATION." (`uts_id`, `university_id`, `justification_id`, `cost_id`, `conferance_id`, `travel_id`)
                              VALUES ('$utsid','$universityid','$justificationid','$costid','$conferenceid','$travelid')";
                            if (mysql_query($q, $this->connection)) { // if Application into University we are done so return true :)
                                return true;
                            }
                        }
                    }

                }

            }
        }
    }
};

/* Create database connection */
$database = new MySQLDB;

   ?>
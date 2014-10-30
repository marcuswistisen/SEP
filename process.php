<?php
include("include/classes/session.php");
class Process
{
	/* Class constructor */
	function Process(){
		/* Initialize session object */
		global $session;
		/* User submitted login form */
		if(isset($_POST['sublogin'])){
			$this->proLogin();
		}

        /* User submitted application form */
        else if(isset($_POST['subapplication'])){
            $this->proApplication();
        }
	}
	
	/**
	 * proLogin - Processes the user submitted login form, if errors
	 * are found, the user is redirected to correct the information
	 * if not, the user is logged in
	 */
	function proLogin(){
		/* Initialize objects */
		global $session, $form;
		/* Login attempt */
		$retval = $session->loginUTS($_POST['login'], $_POST['password']);
		
		/* Login successful */
		if($retval){
			header("Location: ".$session->referrer);
		}
		/* Login failed */
		else{
			$_SESSION['value_array'] = $_POST;
			$_SESSION['error_array'] = $form->getErrorArray();
			header("Location: ".$session->referrer);
		}
	}

    /**
     * proApplication - Processes the user submitted application form, if errors
     * are found, the user is redirected to correct the information
     */
    function proApplication(){
        /* Initialize objects */
        global $session, $form;
        $applicationArray = $_REQUEST['application'];
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
        $cstart = $applicationArray[22].'-'.$applicationArray[20].'-'.$applicationArray[21];
        $cend =  $applicationArray[25].'-'.$applicationArray[23].'-'.$applicationArray[24];
        $conferancecountry = $applicationArray[26];
        $conferancequality = $applicationArray[27];
        $specialinvite = $applicationArray[28];
        $peparrangement = $applicationArray[29];
        $travelstart = $applicationArray[32].'-'.$applicationArray[30].'-'.$applicationArray[31];
        $travelend  = $applicationArray[35].'-'.$applicationArray[33].'-'.$applicationArray[34];
        $travellocation = $applicationArray[36];
        $traveljustification = $applicationArray[37];
        $aircostd = $applicationArray[38];
        $aircostc = $applicationArray[39];
        $meald = $applicationArray[40];
        $mealc = $applicationArray[41];
        $accomondationd = $applicationArray[42];
        $accomondationc = $applicationArray[43];
        $conferancecd  = $applicationArray[44] + ($applicationArray[45]/100);
        $localfaresd = $applicationArray[46] + ($applicationArray[47]/100);
        $carmileaged = $applicationArray[48] + ($applicationArray[49]/100);
        $otherd = $applicationArray[50] + ($applicationArray[51]/100);
        $field = "utsid";
//
//        /* Registration Successful */
//        if($retval == 0){
//            header("Location: registrationcomplete.php");
//        }
//        /* Error found with form */
//        else if($retval == 1){
//            $_SESSION['value_array'] = $_POST;
//            $_SESSION['error_array'] = $form->getErrorArray();
//            header("Location: ".$session->referrer);
//        }
//        $_SESSION['aaaa'] = $localfaresd;


        return true;

    }
};
/* Initialize process */
$process = new Process;
?>
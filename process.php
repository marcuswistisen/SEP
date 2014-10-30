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
        global $session;
        $applicationArray = $_REQUEST['application'];
        $field = "utsid";
        if ($session->submitApplication($applicationArray))
            return true;

    }
};
/* Initialize process */
$process = new Process;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
    <script type="text/javascript" src="js/view.js"></script>
    <script type="text/javascript" src="js/calendar.js"></script>
</head>
<div id="application" class="hidden">
<body id="application_body">

<img id="top" src="images/top.png" alt="">
<div id="form_container">
<form id="applicationform" class="appnitro"  method="post" action="">
<div class="form_description">
    <h2>Online Travel Funding Application</h2>
    <p></p>
</div>
<ul >

<li id="li_1" >
    <label class="description" for="firstname">First Name </label>
    <div>
        <input id="firstname" name="First Name" class="element text medium" type="text" maxlength="255" value="<?php echo $session->userinfo['first_name']; ?>"/>
    </div>
</li>		<li id="li_2" >
    <label class="description" for="preferredfirst">Preferred First Name  </label>
    <div>
        <input id="preferredfirst" name="Preferred First Name" class="element text medium" type="text" maxlength="255" value="<?php echo $session->userinfo['prefered_first_name']; ?>"/>
    </div>
<li id="li_22" >
    <label class="description" for="lastname">Last Name  </label>
    <div>
        <input id="lastname" name="Last Name" class="element text medium" type="text" maxlength="255" value="<?php echo $session->userinfo['last_name']; ?>"/>
    </div>
</li>		<li id="li_3" >
    <label class="description" for="email">Email </label>
    <div>
        <input id="email" name="Email" class="element text medium" type="text" maxlength="255" value="<?php echo $session->userinfo['email']; ?>"/>
    </div>
</li>		<li id="li_4" >
    <label class="description" for="phone">Phone </label>
    <div>
        <input id="phone" name="Phone" class="element text medium" type="text" maxlength="255" value="<?php echo $session->userinfo['phone_number']; ?>"/>
    </div>
</li>		<li id="li_5" >
    <label class="description" for="schoolcentre">School Centre </label>
    <div>
        <input id="schoolcentre" name="Scholl Centre" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
</li>		<li id="li_6" >
    <label class="description" for="utsid">UTS ID </label>
    <div>
        <input id="utsid" name="UTS Id" class="element text medium" type="text" maxlength="255" value="<?php echo $session->userinfo['uts_id']; ?>"/>
    </div>
</li>		<li id="li_7" >
    <label class="description" for="supervisor">Supervisor </label>
    <div>
        <input id="supervisor" name="Supervisor" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
</li>		<li id="li_28" >
    <label class="description" for="element_28"> </label>
		<span>
			<input id="booresearchstudent" name="Research Student" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_28_1">I am a research student</label>
<input id="booresearchgrant" name="Research Grant" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_28_2">I have research grant</label>
<input id="booresearchstrength" name="Reseach Strength" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_28_3">I have research strength</label>

		</span>
</li>		<li id="li_8" >
    <label class="description" for="element_8">Paper Title </label>
    <div>
        <input id="papertitle" name="Paper Title" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
</li>		<li id="li_9" >
    <label class="description" for="element_9">Evidence </label>
    <div>
        <textarea id="evidence" name="Evidence" class="element textarea medium"></textarea>
    </div>
</li>		<li id="li_29" >
    <label class="description" for="element_29"> </label>
		<span>
			<input id="boojournalaccepted" name="Journal Accepted" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_29_1">Journal Accepted</label>
<input id="boopeerreviewhappend" name="Peer Review Happend" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_29_2">Peer Review Happend</label>
<input id="boojournaldeclared" name="Journal Declared" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_29_3">Journal Declared</label>

		</span>
</li>		<li id="li_10" >
    <label class="description" for="element_10">Peer Review URL </label>
    <div>
        <input id="peerreviewurl" name="Peer Review URL" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
</li>		<li id="li_11" >
    <label class="description" for="element_11">Copy Paper URL </label>
    <div>
        <input id="copypaperurl" name="Copy Paper URL" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
</li>		<li id="li_12" >
    <label class="description" for="element_12">Conference URL </label>
    <div>
        <input id="conferanceurl" name="Conference URL" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
</li>		<li id="li_13" >
    <label class="description" for="element_13">Conference Name </label>
    <div>
        <input id="conferancename" name="Conference Name" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
</li>		<li id="li_14" >
    <label class="description" for="element_14">Conferance Start </label>
		<span>
			<input id="element_14_1" name="MM" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_14_1">MM</label>
		</span>
		<span>
			<input id="element_14_2" name="DD" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_14_2">DD</label>
		</span>
		<span>
	 		<input id="element_14_3" name="YYYY" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_14_3">YYYY</label>
		</span>
	
		<span id="calendar_14">
			<img id="cal_img_14" class="datepicker" src="images/calendar.gif" alt="Pick a date.">
		</span>
    <script type="text/javascript">
        Calendar.setup({
            inputField	 : "element_14_3",
            baseField    : "element_14",
            displayArea  : "calendar_14",
            button		 : "cal_img_14",
            ifFormat	 : "%B %e, %Y",
            onSelect	 : selectDate
        });
    </script>

</li>		<li id="li_15" >
    <label class="description" for="element_15">Conference  End </label>
		<span>
			<input id="element_15_1" name="MM" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_15_1">MM</label>
		</span>
		<span>
			<input id="element_15_2" name="DD" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_15_2">DD</label>
		</span>
		<span>
	 		<input id="element_15_3" name="YYYY" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_15_3">YYYY</label>
		</span>
	
		<span id="calendar_15">
			<img id="cal_img_15" class="datepicker" src="images/calendar.gif" alt="Pick a date.">
		</span>
    <script type="text/javascript">
        Calendar.setup({
            inputField	 : "element_15_3",
            baseField    : "element_15",
            displayArea  : "calendar_15",
            button		 : "cal_img_15",
            ifFormat	 : "%B %e, %Y",
            onSelect	 : selectDate
        });
    </script>

</li>		<li id="li_16" >
    <label class="description" for="element_16">Conference Country </label>
    <div>
        <input id="conferancecountry" name="Conference Country" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
</li>		<li id="li_17" >
    <label class="description" for="element_17">Conference Quality </label>
    <div>
        <input id="conferancequality" name="Conference Quality" class="element text medium" type="text" maxlength="255" value=""/>
    </div>
</li>		<li id="li_30" >
    <label class="description" for="element_30"> </label>
		<span>
			<input id="specialinvite" name="Special Invitation" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_30_1">Special Invitation</label>
<input id="peparrangement" name="PEP Arrangement" class="element checkbox" type="checkbox" value="1" />
<label class="choice" for="element_30_2">PEP Arrangement</label>

		</span>
</li>		<li id="li_18" >
    <label class="description" for="element_18">Travel Start </label>
		<span>
			<input id="element_18_1" name="MM" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_18_1">MM</label>
		</span>
		<span>
			<input id="element_18_2" name="DD" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_18_2">DD</label>
		</span>
		<span>
	 		<input id="element_18_3" name="YYYY" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_18_3">YYYY</label>
		</span>
	
		<span id="calendar_18">
			<img id="cal_img_18" class="datepicker" src="images/calendar.gif" alt="Pick a date.">
		</span>
    <script type="text/javascript">
        Calendar.setup({
            inputField	 : "element_18_3",
            baseField    : "element_18",
            displayArea  : "calendar_18",
            button		 : "cal_img_18",
            ifFormat	 : "%B %e, %Y",
            onSelect	 : selectDate
        });
    </script>

</li>		<li id="li_19" >
    <label class="description" for="element_19">Travel End </label>
		<span>
			<input id="element_19_1" name="MM" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_19_1">MM</label>
		</span>
		<span>
			<input id="element_19_2" name="DD" class="element text" size="2" maxlength="2" value="" type="text"> /
			<label for="element_19_2">DD</label>
		</span>
		<span>
	 		<input id="element_19_3" name="YYYY" class="element text" size="4" maxlength="4" value="" type="text">
			<label for="element_19_3">YYYY</label>
		</span>
	
		<span id="calendar_19">
			<img id="cal_imif_19" class="datepicker" src="images/calendar.gif" alt="Pick a date.">
		</span>
    <script type="text/javascript">
        Calendar.setup({
            inputField	 : "element_19_3",
            baseField    : "element_19",
            displayArea  : "calendar_19",
            button		 : "cal_img_19",
            ifFormat	 : "%B %e, %Y",
            onSelect	 : selectDate
        });
    </script>

</li>		<li id="li_31" >
    <label class="description" for="element_31">Travel Location </label>
    <div>
        <select class="element select medium" id="travellocation" name="Travel Location">
            <option value="" selected="selected"></option>
            <option value="1" >Domestic</option>
            <option value="2" >International</option>

        </select>
    </div>
</li>		<li id="li_20" >
    <label class="description" for="element_20">Travel Justification </label>
    <div>
        <textarea id="traveljustification" name="Travel Justification" class="element textarea medium"></textarea>
    </div>
</li>		<li id="li_21" >
    <label class="description" for="element_21">Air Fares Cost </label>
    <span class="symbol">$</span>
		<span>
			<input id="aircost" name="Dollars" class="element text currency" size="10" value="" type="text" /> .
			<label for="element_21_1">Dollars</label>
		</span>
		<span>
			<input id="aircostc" name="Cents" class="element text" size="2" maxlength="2" value="" type="text" />
			<label for="element_21_2">Cents</label>
		</span>

</li>		<li id="li_22" >
    <label class="description" for="element_22">Meals Cost </label>
    <span class="symbol">$</span>
		<span>
			<input id="meald" name="Dollars" class="element text currency" size="10" value="" type="text" /> .
			<label for="element_22_1">Dollars</label>
		</span>
		<span>
			<input id="element_22_2" name="Cents" class="element text" size="2" maxlength="2" value="" type="text" />
			<label for="mealc">Cents</label>
		</span>

</li>		<li id="li_23" >
    <label class="description" for="element_23">Accomondation Cost </label>
    <span class="symbol">$</span>
		<span>
			<input id="accomondationd" name="Dollars" class="element text currency" size="10" value="" type="text" /> .
			<label for="element_23_1">Dollars</label>
		</span>
		<span>
			<input id="accomondationc" name="Cents" class="element text" size="2" maxlength="2" value="" type="text" />
			<label for="element_23_2">Cents</label>
		</span>

</li>		<li id="li_24" >
    <label class="description" for="element_24">Conferance Cost </label>
    <span class="symbol">$</span>
		<span>
			<input id="conferancecd" name="Dollars" class="element text currency" size="10" value="" type="text" /> .
			<label for="element_24_1">Dollars</label>
		</span>
		<span>
			<input id="conferancecc" name="Cents" class="element text" size="2" maxlength="2" value="" type="text" />
			<label for="element_24_2">Cents</label>
		</span>

</li>		<li id="li_25" >
    <label class="description" for="element_25">Local Fares Cost </label>
    <span class="symbol">$</span>
		<span>
			<input id="localfaresd" name="Dollars" class="element text currency" size="10" value="" type="text" /> .
			<label for="element_25_1">Dollars</label>
		</span>
		<span>
			<input id="localfaresc" name="Cents" class="element text" size="2" maxlength="2" value="" type="text" />
			<label for="element_25_2">Cents</label>
		</span>

</li>		<li id="li_26" >
    <label class="description" for="element_26">Car Mileage Cost </label>
    <span class="symbol">$</span>
		<span>
			<input id="carmileaged" name="Dollars" class="element text currency" size="10" value="" type="text" /> .
			<label for="element_26_1">Dollars</label>
		</span>
		<span>
			<input id="carmileagec" name="Cents" class="element text" size="2" maxlength="2" value="" type="text" />
			<label for="element_26_2">Cents</label>
		</span>

</li>		<li id="li_27" >
    <label class="description" for="element_27">Other Cost </label>
    <span class="symbol">$</span>
		<span>
			<input id="otherd" name="Dollars" class="element text currency" size="10" value="" type="text" /> .
			<label for="element_27_1">Dollars</label>
		</span>
		<span>
			<input id="otherc" name="Cents" class="element text" size="2" maxlength="2" value="" type="text" />
			<label for="element_27_2">Cents</label>
		</span>

</li>

<li class="buttons">
    <input type="hidden" name="form_id" value="919735" />

    <input id="saveForm" class="button_text" type="button" name="submit" onclick="Validate()" value="Submit" />
    <input id="Cancel" class="button_text" type="button" onclick="ShowApplication()" name="cancel" value="Cancel" />
</li>
</ul>
<div id="footer">
</div>
</div>
<img id="bottom" src="images/bottom.png" alt="">
</body>
</div>
</html>

<script>
    function Validate()
    {
        var msg= "", fields = document.getElementById("applicationform").getElementsByTagName("input");
        /*<![CDATA[*/
        for (i=0; i < fields.length; i++){
            if (fields[i].value == "")
                msg += fields[i].name + ' is required. \n';
        }
        /*]]>*/
        if(msg) {
            alert(msg);
            return false;
        }
        else
            return SubmitApplication();
    }
</script>
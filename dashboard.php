
<body>
<p>You are logged in as <b><?php echo $_SESSION['utsid']; ?></b></p>
<div id="button-blue" class="centered">

    <a id="applicationbutton" onclick="ShowApplication()" class="btn">Create New Application</a>

</div>

</body>
<?php require("application.php"); ?>
<script>

    function ShowApplication(){
        if($('#application').is(":visible"))
        {
            $(function () {
                $('#application').hide();
                $('#button-blue').show();
            });
        }
        else
        $(function () {
            $('#application').show();
            $('#button-blue').hide();
        });
    }

    function SubmitApplication(){
        var x = document.getElementById("applicationform");
        var application = [];
        for (var i = 0; i < x.length; i++) {
            application[i] = x.elements[i].value;
        }
        var value = "1"
        var r=confirm("Are you sure you want to submit this application?");
        if (r==true)
        {
            $.ajax({
                type: "POST",
                url: "process.php",
                data: {subapplication : value, application:application},
                success: function(){
                    alert("Your application have been submitted");
		    location.reload();
                }
            });

        }
    }
</script>

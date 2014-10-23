
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
</script>
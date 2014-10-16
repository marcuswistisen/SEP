<script type="text/javascript">
$(document).ready(function(){
$('#submit').click(function(){
var username=$('#login').val();
var password=$('#password').val();

if(username=="")
{
$('#dis').slideDown().html("<span>Please type UTSID</span>");
return false;
}
if(password=="")
{
$('#dis').slideDown().html('<span id="error">Please type Password</span>');
return false;
}
});
});
</script>
	<section class="main">
				<form class="form-1" action="process.php" method="post">
					<label id="dis"><?php echo $form->error("pass"); ?></label><br>
					<p class="field">
						<input type="text" name="login" id="login" placeholder="UTSID">
						<i class="icon-user icon-large"></i>
					</p>
						<p class="field">
							<input type="password" name="password" id="password" placeholder="Password">
							<i class="icon-lock icon-large"></i>
					</p>
					<p class="submit">
						<button type="submit" id="submit" name="sublogin"><i class="icon-arrow-right icon-large"></i></button>
					</p>
				</form>
			</section>
			

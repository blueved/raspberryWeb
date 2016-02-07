<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        <link rel="stylesheet" href="css/main1.css" />
		
		<!--CryptoJS -->
		<!-- <script type="text/JavaScript" src="js/CryptoJS v3.1.2/components/core-min.js"></script>
		<script type="text/JavaScript" src="js/CryptoJS v3.1.2/components/sha512-min.js"></script>
		<script type="text/JavaScript" src="js/CryptoJS v3.1.2/rollups/sha512.js"></script>
		-->
		<script type="text/JavaScript" src="js/jquery-2.1.3.min.js"></script> 
		
		<script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>

		<hr />
		<?php
				if (isset($_GET['error'])) {
					echo '<p class="error">Error Logging In!</p>';
				}
			?> 
		<div class="container">
			<section id="content">
				<!-- <form action="includes/process_login.php" method="post" name="login_form"> -->
				<form  action="includes/process_login.php" id="login_form">
					<h1>Login Form</h1>
					<div>
						<input type="email" name='email' placeholder="Email" required=""  />
					</div>
					<div>
						<input type="password" name='password' placeholder="Password" required=""  />
					</div>
					<div class="acc">
						<input type="password" placeholder="renter password">
					</div>
					<input class='acc' name='p' />
					<div>
						<input  type='submit'  value="Log In" /> <!-- onclick="formhash();" /> -->
						<a href="#">Lost your password?</a>
						<a href="register.php">Register</a>
					</div>
				</form>
				
			</section>
			<div id="requestResponse" style="hidden">
			</div>
		</div>
		<hr />

<script type='text/javascript'>
$(document).ready(function(){
	debugger;
	var params = getUrlVars();
	if(params !== null){
		$('#requestResponse').html('ERROR').show();
		return;
	}
	// Attach a submit handler to the form

	$( "#login_form" ).submit(function( event ) {
	  // Stop form from submitting normally
	  event.preventDefault();
 
	  // Get some values from elements on the page:
	  var $form = $( this ),
		emailVal = $form.find( "input[name='email']" ).val(),
		url = $form.attr( "action" );
 
		var $pp = $('#content input[name=password]');
		var pval = hex_sha512($pp.val());
		// Make sure the plaintext password doesn't get sent. 
		$pp.val('');
		var param = { p: pval, email: emailVal };
		// Finally submit the form. 
		console.log('submitting the form');
		$.post( url,param)
    	.done(function (data) { 
			var res = JSON.parse(data);
			switch(res.result){
				case 'success':
					window.location = '../homePage.php';
					break;
				case 'error':
					window.location = '../index.php?error=1';
					break;
				default:
					window.location = '../index.php?error=2';
			}
			//$('#content').hide();
			
		;})
		.fail(function (status) {
			window.location = '../index.php?error=3';
		});
		return true;
	});
});
</script>	

		
 
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        /*echo '<p>Currently logged ' . $logged . '.</p>';*/
                        /*echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";*/
                }
?>      
    </body>
</html>
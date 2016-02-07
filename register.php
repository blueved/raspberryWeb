<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<link rel="stylesheet" href="css/main1.css" />
        <title>Blueved</title>
		<script type="text/JavaScript" src="js/jquery-2.1.3.min.js"></script> 
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
		<script type="text/javascript" src="js/validate.js"></script>
		

    </head>
    <body>
		<?php
			/*if (!empty($error_msg)) {
				echo '**>';
				echo $error_msg;
				echo '<**';
			}*/
        ?>
		<div class="container">
			<!-- <ul>
				<li>Usernames may contain only digits, upper and lower case letters and underscores</li>
				<li>Emails must have a valid email format</li>
				<li>Passwords must be at least 6 characters long</li>
				<li>Passwords must contain
					<ul>
						<li>At least one uppercase letter (A..Z)</li>
						<li>At least one lower case letter (a..z)</li>
						<li>At least one number (0..9)</li>
					</ul>
				</li>
				<li>Your password and confirmation must match exactly</li>
			</ul> -->
			<section id="content">
				<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"  method="post"  name="registration_form">
					<h1>Register</h1>
					<div id='registerError'></div>
					<div>
						<input type='text'  placeholder="User Name"  name='username'  id='username' />
					</div>
					<div>
						<input placeholder="Email" name="email" id="email" />
					</div>
					<div>
						<input type="password" placeholder="Password"  name="password"   id="password"/>
					</div>
					<div >
						<input type="password"  placeholder="Confirm Password" name="confirmpwd"  id="confirmpwd" />
					</div>
					
					<div>
						<input 	type="submit"  value="Register" 
								onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd);" 
								 /> 
						<a href="index.php">Return to Login Page</a>
					</div>
				</form>
				
			</section>
		</div>
		<hr />
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        
        
        
        
        
		<script type='text/javascript'>
		//$(document).ready(function(){
			$('#registerError').html('');
			var validator = new FormValidator('registration_form', [{
				name: 'username',
				display:'User Name',
				rules: 'required'
			}, {
				name: 'email',
				display:'Email',
				rules: 'required|valid_email'
			},{
				name: 'password',
				display:'Password',
				rules: 'min_length[3]'
			}, {
				name: 'confirmpwd',
				display: 'Password Confirmation',
				rules: 'matches[password]'
			}], function(errors, event) {
				if (errors.length > 0) {
					var errorListHtml = '';
					$.each(errors, function(k,v){
						errorListHtml += '<div>'+v.message+'</div>';
					});
					$('#registerError').html(errorListHtml).show();
				}
			});
			//});
		</script>
    </body>
</html>
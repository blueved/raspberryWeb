<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" href="css/main1.css" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
		<script type="text/JavaScript" src="js/jquery-2.1.3.min.js"></script> 
		<script src="js/bootstrap.min.js"></script>
		<script src="js/resizer.js"></script>
        <script type="text/JavaScript" src="js/forms.js"></script> 
        <meta charset="UTF-8">
        <title>Blueved</title>
        
    </head>
    <body>
	<?php include_once 'includes/menu.php'; ?>
	<div id='content'>
        <?php if (login_check($mysqli) == true) : ?>
            <p>Welcome <?php echo htmlentities($_SESSION['username']); ?>!</p>
           
            <p>Return to <a href="index.php">login page</a></p>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
	</div>
	
	<script>
	$(document).ready(function(){
		$('#navBarId .navbar-nav li').removeClass('active');
		$('#homePageId').addClass('active');
		resizeContent();
		$(window).resize(function(){ resizeContent();});
	})
	</script>
	</body>
</html>
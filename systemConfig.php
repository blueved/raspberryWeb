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
		<hr />
			<iframe src="http://192.168.1.7:8080"></iframe>
		<hr />
	</div>
	<script>
		$(document).ready(function(){
			$('#navBarId .navbar-nav li').removeClass('active');
			$('#configPageId').addClass('active');
			resizeContent();
			$(window).resize(function(){ resizeContent();});
		})
	</script>
</body>
</html>
    
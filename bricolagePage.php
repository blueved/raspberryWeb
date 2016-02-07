<?php
    if (isset($_POST['button']))
    {
        system("gpio mode 0 out");
        system("gpio write 7 1");
    }
    else if (isset($_POST['btn']))
    {
        system("gpio write 7 0");
    }
?>
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
		<div id='content'>
			<?php include_once 'includes/menu.php'; ?>
			<form method="post">
				<p>
					<button name="button">On</button>
				</p>
				<p>
					<button name="btn">Off</button>
				</p>
			</form>
		</div>
		
		<script>
			$(document).ready(function(){
				debugger;
				$('#navBarId .navbar-nav li').removeClass('active');
				$('#bricolagePageId').addClass('active');
				resizeContent();
				$(window).resize(function(){ resizeContent();});
			})
		</script>
	</body>

</html>
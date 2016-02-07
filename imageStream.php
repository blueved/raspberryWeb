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
		<hr />
		<div id="content" style="width:1290px; height: 1500px;">
		<?php
			//get all images
			
			$images = glob('./images/*.jpg', GLOB_BRACE); //formats to look for
			krsort($images);
			$totalImages = count($images);
			$num_of_files = 3; //number of images to display
			echo "<div >Total Images: ". $totalImages. " - Reloading in <span id='reloadingIn'></span> sec. </div>";	
			echo "<div id='imageCount'>";
			
			$lastImage = new DateTime(date('Y-m-d h:i', filemtime(end($images))));
			$firstImage =  new DateTime(date('Y-m-d h:i', filemtime($images[0])));
			$interval = $lastImage->diff($firstImage);
			echo $interval->format('Timespan between first and last image: %a d %h h %i mn.');
			echo "</div>";
			echo '<br />';
			//show photos
			foreach($images as $image)
			{
				 $num_of_files--;
				 if($num_of_files > -1){
					echo $image." 
					".date('d M H:i:s', filemtime($image)) ."<br/><img src='$image' /><br/><br/>" ; 
				 }
				 else
				   break;
			}
			print '<meta http-equiv="refresh" content="15">';
		?>
		</div>
	<script>
		$(document).ready(function(){
			$('#navBarId .navbar-nav li').removeClass('active');
			$('#imageStreamPageId').addClass('active');
			var start = 15;
			setInterval(function(){ 
				start -= 1;
				$('#reloadingIn').text(start);
			}, 1000);
			//resizeContent();
			//$(window).resize(function(){ resizeContent();});
			$('#content').height(1000).width(500);
			
		})
	</script>
    </body>

</html>
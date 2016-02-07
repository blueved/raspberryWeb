<html>
    <head>
		<link rel="stylesheet" href="css/main1.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
		<script type="text/JavaScript" src="js/jquery-2.1.3.min.js"></script> 
		<script type="text/JavaScript" src="js/underscore.1.8.3.js"></script> 
		<script src="js/bootstrap.min.js"></script>
		<script src="js/resizer.js"></script>
        <script type="text/JavaScript" src="js/jquery.paginate.js"></script> 
		<script type="text/JavaScript" src="js/continuousPagination.js"></script>
        <meta charset="UTF-8">
        <title>Blueved</title>
        
    </head>
    <body>
		<?php include_once 'includes/menu.php'; ?>
		<div id="content">
			<div id='imageScrollerContainer'>
				<div style="overflow:auto;height:100%;width:100%;"   onscroll="OnDivScroll()" id="scrollContainer">
					<div class="entry">Initial Entry 1</div>
			  </div>
				<div id="loadingDiv" style="position:absolute;bottom:2px;right:20px;	padding:5px; display:none;background-color:Black;color:White;">
					Loading...
				</div>		
			</div>
			<hr />
		
			<div id="paginator">
				<h1>Image Viewer</h1>
				<div id='imageViewer'>
					<div class='theImage'></div>
					<div class='theImageInfo'></div>
					<div id="demoContainer">
						<div id="pager" >   </div>
					</div>
				</div>
			</div>
			<hr />
			<?php
				//get all images				
				$images = glob('./images/*.jpg', GLOB_BRACE); //formats to look for
				krsort($images);
				$totalImages = count($images);
				echo "<div id='imageCount'>".$totalImages. " images.<br />";
				
				$lastImage = new DateTime(date('Y-m-d h:i', filemtime(end($images))));
				$firstImage =  new DateTime(date('Y-m-d h:i', filemtime($images[0])));
				$interval = $lastImage->diff($firstImage);
				/*echo $interval->format('Timespan between first and last image: %a d %h h %i mn.');*/
				echo "</div>";
			?>
			
		</div>
		
		<script type='text/template' id="fileInfoTmpl">
			<div class='entry'>
				<table>
					<% _.each(rc.listItem, function(item){ %>
						<tr>
							<td><img src="<%= item.src %>" /></td>
							<td> <%= item.fileInfo %> </td>
							<td><%= item.imageNumber %></td>
						</tr>
					<% }); %>
				</table>
			</div>
		</script>
		
	<script>
		console = console || {log:function(){}};
		_.templateSettings.variable = "rc";
		var imageList = [],
			totalImages = 0,
			imageNumber = 0;
		var templater =  _.template(
            $( "#fileInfoTmpl" ).html()
        );	
		
			
		$(document).ready(function(){
			$('#navBarId .navbar-nav li').removeClass('active');
			$('#imageStreamPageId').addClass('active');
			totalImages = <?php echo $totalImages; ?>;			
			<?php 
				$js_array = json_encode($images);
				echo "imageList  = ". $js_array . ";\n";
			?>;
			 imageList = revertSortFileList(imageList); 

			$(window).resize(function(){ 
				resizeContent();
				var totalW = $('#content').width(),
					pagerW = $('#pager').width() ,
					leftRightW = (totalW-pagerW)/2 ;
				$("#demoContainer").css({left:leftRightW});
			});
			
			if(totalImages === 0){
				console.log('No images. Forget about it');
				return;
			}
			var imageStr = '<img src="'+imageList[0]+'" />';			
			// initialize the image scroller
			var data = {listItem:[]};
			$.each(imageList, function(k,v){
				if(k > 3){
					return false;
				}
				imageNumber++;
				var d = getDate(v);
					
				fileInfo = fileInfoFormat (d);										
				data.listItem.push({src:v ,fileInfo:fileInfo, imageNumber:imageNumber});
			});
			$('#scrollContainer').html( templater(data));
		
			$("#pager").paginate({
				count 		: totalImages,
				start 		: 1,
				display     : 10,
				border					: true,
				border_color			: '#fff',
				text_color  			: '#fff',
				background_color    	: 'black',	
				border_hover_color		: '#ccc',
				text_hover_color  		: '#000',
				background_hover_color	: '#fff', 
				images					: false,
				mouse					: 'press',
				onChange     			: function(pageStr){
											var page = parseInt(pageStr);
											console.log(page, ' imageNumber:', imageNumber);
											var start = page;
												
											if(page === totalImages){			start = totalImages-3;}
											else if(page === totalImages - 1) { start = totalImages-2;}
											imageNumber = start;
											/*var imageContainerStr = '';
											for(i = start; i< start+3;i++){
												var v = imageList[i];
												imageNumber++;
												var d = getDate(v);
												imageContainerStr += "<div class='entry'><table><tr><td><img src='"+v+"' /></td><td>"+fileInfoFormat (d)+"</td><td>"+imageNumber+"</td></tr></table></div>";
											}
											$('#scrollContainer').html(imageContainerStr);
											*/
											var data = {listItem:[]};
											for(i = start; i< start+3;i++){
												var v = imageList[i],
													d = getDate(v);
													fileInfo = fileInfoFormat (d);
												imageNumber++;												
												data.listItem.push({src:v ,fileInfo:fileInfo, imageNumber:imageNumber});
											}
											$('#scrollContainer').html( templater(data));
										 }
			});
			
			$(window).trigger('resize');
		})
	</script>
	
    </body>

</html>
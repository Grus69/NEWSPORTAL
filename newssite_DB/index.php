<?php //this is for database connectivity, connection string is written in database.php
include("includes/database.php"); 
include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>NEWS</title>
	<link rel="stylesheet" type="text/css" media="all" href="styles/style.css"> <!--to include style.css file -->
</head>
<body>
		<div class="main_box"><!--main container start-->
			
			<div class="header_box"><!--header starts-->
				<a href="index.php"><img src="imgs/newslogo.png" height="130" width="500"></a> <!--logo image-->
			</div><!--header end-->

			<div id="spacetofixheader"></div><!--to fix position of header at same place when scroling, it need more space(jitni header ki height width he utna hi space). so thats why this div tag is made-->
			
			<div id="navbar"><!--navigation bar starts-->
				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="#">All News</a></li>
					<li><a href="#">Contact-us</a></li>

				</ul>
				
			</div><!--navigation bar end-->
			
			<div class="content_box"><!--content wrapper starts-->
				<div id="left_content"><!--this div is for making of left partition of content_wrapper-->
					<div id="sidebar_title"><!--this div is for making categories etc.-->
						Categories
					</div><!--this close div is for categories etc.-->
						<ul id="cats">
							
							<?php //this is used to retrive categories list from database
							getcategories();
							
							?>
						</ul>
					
						<hr size="5" color="black" /> <!--this is line to show end of categories-->
						<div>
							<img src="imgs/ad.gif" height="170" width="189">
						</div><!--this div is for ads showing-->
				</div><!--this close div is for left partition of content_wrapper-->
				<div id="right_content">
					
					<div id="headline"> <!--this is to make headline on right content-->
						
						<div id="headline_content">
							
							<marquee>
							<b style="color: yellow; text-align: center;">*ममता के मंत्री ने कहा जीएसटी के जरिए हवाला कारोबार चल रहा</b></marquee>

						</div>

					</div>
					<div id="post_box">
					<?php //this is for database connectivity, connection string is written in database.php 
					getposts(); 
					getcategorisedpost();
					readmore();
					?> 
						
					</div>

				</div>

			</div><!--content wrapper end-->
			<div>
				<div class="footer"><!--footer starts-->
					<h1 align="center" style="color: white; padding-top: 45px;">©2018-All Rights Are Reserved by WWW.GOGGSPEC.COM</h1>
				</div><!--footer end-->
			</div>


		</div><!--main container start-->
</body>
</html>
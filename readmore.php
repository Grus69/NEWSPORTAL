<?php //this is for database connectivity, connection string is written in database.php
include("includes/database.php"); 
include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>NEWS</title>
	<link rel="stylesheet" type="text/css" media="all" href="styles/style.css"> <!--to include style.css file -->
	<style type="text/css">
		 .fa { 
  margin-top: 0px;
  padding-top: -5px;
  padding-right: 5px;
  font-size: 20px;
  width: 20px;
  text-align: center;
  text-decoration: none;
  border-radius: 50%;
  }

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  margin-left: 540px;
  margin-right: 2px;
  background: black;
  color: white;
}

.fa-twitter {
  margin-right: 2px;
  background: black;
  color: white;
}

.fa-google {
  background: black;
  color: white;
}
	</style>
</head>
<header><!--header starts-->
				
    <div id="logo">
				<h1>TRUE NEWS<span id="iisrt"> </span></h1>
				<div id="tagline">
					<h2>A PLACE YOU GET TRUTH OF WORLD</h2>
                   
				</div> 
				</div>
                <hr>
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
					    <li><a href="allnews.php">All News</a></li>
					    <li><a href="contact.php">Contact us</a></li>
				        <li><a style="float: right;" href="www.facebook.com" class="fa fa-facebook"></a></li>
                        <li><a style="float: right;" href="www.twitter.com" class="fa fa-twitter"></a></li>
                        <li><a style="float: right;" href="www.google.com" class="fa fa-google"></a></li>
          <!-- Social Media Icons End -->
                
					</ul>
				</nav>
                <hr>
    </header>

<body id="home">
		<div id="wrapper"><!--main container start-->
			
			
			
			<div class="row">
			<div class="rightcolumn">
                <div class="card">
                  <h2>Categories</h2><!--this div is for making of left partition of content_wrapper-->
					<!--this div is for making categories etc.-->
						
					<!--this close div is for categories etc.-->
						<div class="cat">
							
							<?php //this is used to retrive categories list from database
							getcategories();
							
							?>
                            </div>
						
					</div>
						<hr size="5" color="black" /> <!--this is line to show end of categories-->
						<div class="card">
							<img src="imgs/ad.gif" height="270" width="250">
						</div><!--this div is for ads showing-->
				</div><!--this close div is for left partition of content_wrapper-->
                
			<div class="leftcolumn">
					
					<div id="post_box">
					<?php
						 
						readmore();
					?>
						
					</div>

				</div>

			</div><!--content wrapper end-->
			<div class="footer"><!--footer starts-->
					<h1 align="center" style="color: white; padding-top: 45px; font-size: 20px;">©2018-All Rights Are Reserved by TRUENEWS.com</h1>
				</div><!--footer end-->


		</div>
</body>
</html>
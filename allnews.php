 	<?php //this is for database connectivity, connection string is written in database.php
include("includes/database.php"); 
include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>TrueNews NEWS</title>
    <meta name="viewport"  content="width=devive-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" media="all" href="styles/style2.css"> <!--to include style.css file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- for social icons -->
    <style >
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
				<h1 >True News<span id="iisrt"> </span> <div class="search-container">
                               	<form method="get" action="result.php" enctype="multipart/form-data"> <!-- SEARCH ENGINE FORM-->
                                <input type="submit" name="search" value="search"/> 
                                <input type="text" name="user_query" placeholder="search news"/>
                                
                                </form>
                              </div>
</h1>
				<div id="tagline">
					<h2>A PLACE YOU GET TRUTH OF WORLD</h2>
                   
				</div> 
				</div>

					         

                <hr>
				<nav>
					<ul>
						<li><a href="index.php">Home</a></li>
					    <li><a class="active" href="allnews.php">All News</a></li>
					    <li><a href="contact.php">Contact Us</a></li>
				       
                        
                         <!-- Social Media Icons Start -->
                        <li><a href="http:www.facebook.com" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-google"></a></li>
          <!-- Social Media Icons End -->

					</ul>
				</nav>
                <hr>
            <div id="headline"> <!--this is to make headline on right content-->
						
						<div id="headline_content">
							
							<marquee>
							<b style="color: yellow; text-align:center;">*ममता के मंत्री ने कहा जीएसटी के जरिए हवाला कारोबार चल रहा</b></marquee>

						</div>

					</div>
			</header>
<body>
    <div id="wrapper"><!--main container start-->
        <div class="row">
					<div id="allnewsbox">
					<?php //this is for database connectivity, connection string is written in database.php 
						if (!isset($_GET['categories'])) //1 if categories arn't selected. 2'categories' is url variable
					    {
						
							$get_post = "select * from  posts"; 
							$run_post = mysqli_query($con,$get_post);
							while ($row_post = mysqli_fetch_array($run_post))
							{
								$post_id = $row_post['post_id'];
								$post_title = $row_post['postt_title'];
								$post_category = $row_post['category_id'];
								$post_description = $row_post['post_desc'];
								$post_image1 = $row_post['post_img1'];

								echo 
									"
										<div id = 'allnewsshow'>

										
											<img src = 'admin/post_img/$post_image1'/><br>
											<h1> $post_title </h1>
											<a href = 'readmore.php?pst_id=$post_id' style = 'float : right;'>read more..</a>

										</div>

									";
							}
						}
					?> 
						
					</div>

        </div>

			<!--content wrapper end-->
			<div>
				<div class="footer"><!--footer starts-->
					<h1 align="center" style="color: white; padding-top: 55px; font-size: 20px;">©2018-All Rights Are Reserved by TrueNews.Com</h1>
				</div><!--footer end-->
			</div>
        </div>


		
</body>
</html>
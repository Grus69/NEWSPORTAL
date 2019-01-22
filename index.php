<?php //this is for database connectivity, connection string is written in database.php
include("includes/database.php"); 
include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>True News</title>
    <meta name="viewport"  content="width=devive-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" media="all" href="styles/style.css"> <!--to include style.css file -->
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
				<h1>True News<span id="iisrt"> </span><div class="search-container">
                                <form method="get" action="result.php" enctype="multipart/form-data"> <!-- SEARCH ENGINE FORM-->
                                <input type="submit" name="search" value="search"/> 
                                <input type="text" name="user_query" placeholder="search news"/>
                                
                                </form>
                              </div></h1>
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
				       
         <!-- Social Media Icons Start -->
                        <li><a style="float: right;" href="www.facebook.com" class="fa fa-facebook"></a></li>
                        <li><a style="float: right;" href="www.twitter.com" class="fa fa-twitter"></a></li>
                        <li><a style="float: right;" href="www.google.com" class="fa fa-google"></a></li>
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
            <!--navigation bar end-->
<body id="home">
		<div id="wrapper"><!--main container start-->

			
            <!--__--__--__--__--  T H E    S L I D E R --__--__--__--___--__--__--__-->
			<div class="row">
                <div class="wet">
                <a class="weatherwidget-io" href="https://forecast7.com/en/28d0273d31/bikaner/" data-label_1="BIKANER" data-label_2="WEATHER" data-theme="dark" data-suncolor="#11bad1" style="width:1072px; border-radius:4px;" data-mooncolor="#3c44ac" ><p align="center">No Internet Connection</p></a>
<script>
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
</script></div>
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
				<hr size="5" color="black" />
                <div class="card" style="height: 350px">
              <div class="fb-page" data-href="https://www.facebook.com/Shri-Jain-PG-College-357137307670983/" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Shri-Jain-PG-College-357137307670983/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Shri-Jain-PG-College-357137307670983/">Shri Jain PG College</a></blockquote></div>
              <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
            </div><!--this div is for ads showing-->
        </div><!--this close div is for left partition of content_wrapper-->
			<div class="leftcolumn">
					<div style="width:790px; height:350px; backgroung-color:red;" class="boxa">
                        <div class="slideshow-container">

                                <div class="mySlides fade">
                                  
                                       <?php //this is for fetching pics from database for slider
                                       
                                        
                                          $get_post = "select post_img1 from posts where post_id=(select max(post_id) from posts) ORDER BY post_id DESC LIMIT 1"; 
                                          $run_post = mysqli_query($con,$get_post);
                                          while ($row_post = mysqli_fetch_array($run_post))
                                          {
                                           
                                            $post_image1 = $row_post['post_img1'];

                                            echo 
                                              "
                                                <div>

                                                
                                                  <img src = 'admin/post_img/$post_image1'  style='width:790px; height:350px;'/><br>
                                                 

                                                </div>

                                              ";
                                          }
                                        
                                      ?>  
                                  <div class="text">
                                     <?php //this is for fetching title from database for slider
                                       
                                        
                                          $get_post = "select postt_title from posts where post_id=(select max(post_id) from posts) ORDER BY post_id DESC LIMIT 1"; 
                                          $run_post = mysqli_query($con,$get_post);
                                          while ($row_post = mysqli_fetch_array($run_post))
                                          {
                                           
                                            $post_title = $row_post['postt_title'];

                                            echo 
                                              "
                                                <div>

                                                
                                                  <h3> $post_title </h3>
                                                 

                                                </div>

                                              ";
                                          }
                                        
                                      ?>  
                                  </div>
                                </div>

                                <div class="mySlides fade">
                                  <div class="numbertext">2 / 3</div>
                                         <?php //this is for fetching pics from database for slider
                                       
                                        
                                          $get_post = "select post_img1 from posts where post_id=(select max(post_id)-1 from posts) ORDER BY post_id DESC LIMIT 1"; 
                                          $run_post = mysqli_query($con,$get_post);
                                          while ($row_post = mysqli_fetch_array($run_post))
                                          {
                                           
                                            $post_image1 = $row_post['post_img1'];

                                            echo 
                                              "
                                                <div>

                                                
                                                  <img src = 'admin/post_img/$post_image1'  style='width:790px; height:350px;'/><br>
                                                 

                                                </div>

                                              ";
                                          }
                                        
                                      ?>  
                                  <div class="text">
                                      <?php //this is for fetching title from database for slider
                                       
                                        
                                          $get_post = "select postt_title from posts where post_id=(select max(post_id)-1 from posts) ORDER BY post_id DESC LIMIT 1"; 
                                          $run_post = mysqli_query($con,$get_post);
                                          while ($row_post = mysqli_fetch_array($run_post))
                                          {
                                           
                                            $post_title = $row_post['postt_title'];

                                            echo 
                                              "
                                                <div>

                                                
                                                  <h3> $post_title </h3>
                                                 

                                                </div>

                                              ";
                                          }
                                        
                                      ?>  
                                  </div>
                                </div>

                                <div class="mySlides fade">
                                  <div class="numbertext">3 / 3</div>
                                      <?php //this is for fetching pics from database for slider
                                       
                                        
                                          $get_post = "select post_img1 from posts where post_id=(select max(post_id)-2 from posts) ORDER BY post_id DESC LIMIT 1"; 
                                          $run_post = mysqli_query($con,$get_post);
                                          while ($row_post = mysqli_fetch_array($run_post))
                                          {
                                           
                                            $post_image1 = $row_post['post_img1'];

                                            echo 
                                              "
                                                <div>

                                                
                                                  <img src = 'admin/post_img/$post_image1'  style='width:790px; height:350px;'/><br>
                                                 

                                                </div>

                                              ";
                                          }
                                        
                                      ?>  
                                  <div class="text">
                                         <?php //this is for fetching title from database for slider
                                       
                                        
                                          $get_post = "select postt_title from posts where post_id=(select max(post_id)-2 from posts) ORDER BY post_id DESC LIMIT 1"; 
                                          $run_post = mysqli_query($con,$get_post);
                                          while ($row_post = mysqli_fetch_array($run_post))
                                          {
                                           
                                            $post_title = $row_post['postt_title'];

                                            echo 
                                              "
                                                <div>

                                                
                                                  <h3> $post_title </h3>
                                                 

                                                </div>

                                              ";
                                          }
                                        
                                      ?>  
                                  </div>
                                </div>

                                <a class="prev" style="float:left;" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next" style="float:right;" onclick="plusSlides(1)">&#10095;</a>

                                </div>
                                <br>

                                <div style="text-align:center">
                                  <span class="dot" onclick="currentSlide(1)"></span> 
                                  <span class="dot" onclick="currentSlide(2)"></span> 
                                  <span class="dot" onclick="currentSlide(3)"></span> 
                                </div>

                                <script>
                                var slideIndex = 1;
                                showSlides(slideIndex);

                                function plusSlides(n) {
                                  showSlides(slideIndex += n);
                                }

                                function currentSlide(n) {
                                  showSlides(slideIndex = n);
                                }

                                function showSlides(n) {
                                  var i;
                                  var slides = document.getElementsByClassName("mySlides");
                                  var dots = document.getElementsByClassName("dot");
                                  if (n > slides.length) {slideIndex = 1}    
                                  if (n < 1) {slideIndex = slides.length}
                                  for (i = 0; i < slides.length; i++) {
                                      slides[i].style.display = "none";  
                                  }
                                  for (i = 0; i < dots.length; i++) {
                                      dots[i].className = dots[i].className.replace(" active", "");
                                  }
                                  slides[slideIndex-1].style.display = "block";  
                                  dots[slideIndex-1].className += " active";
                                }
                                    
                                </script>
                </div>
						
                <div class="ourserv" >
             
					
                        
					<?php //this is for database connectivity, connection string is written in database.php 
					getposts(); 
					getcategorisedpost();
					?> 
                        
				    
                </div>

			</div>
                </div>
                
            

			<!--content wrapper end-->
			

			<div>
				<div class="footer"><!--footer starts-->
					<h1 align="center" style="color: white; padding-top: 55px; font-size: 20px;">©2018-All Rights Are Reserved by TrueNews.Com</h1>
				</div><!--footer end-->
			</div>
		</div><!--main container start-->
    
</body>
</html>
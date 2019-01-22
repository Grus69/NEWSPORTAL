<?php //this is for database connectivity, connection string is written in database.php
include("includes/database.php"); 
include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>TRUE CONTACT</title>
    <meta name="viewport"  content="width=devive-width,initial-scale=1">
  <link rel="stylesheet" type="text/css" media="all" href="styles/style.css"> <!--to include style.css file -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- for social icons -->
<style>


input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid aqua;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #37b4ec;
      text-shadow: -1px 0px 7px #6826de;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #4CAF50;
}

.form {
  padding-top: 3px;
  width: 1050px; 
  border-radius: 3px;
  background-color: black;
  padding: 10px;
}

#addr{
  margin-top: 10px; 
  border: 1px solid aqua; 
  background-color: black;
   
  padding: 5px;
  width: 100%; 
  border-radius: 4px;
}

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
    iframe{
        margin-left: 10px;
    }


}
</style>
    
</head>
    

     <header><!--header starts-->
				
				<div id="logo">
				<h1>True News<span id="iisrt"> </span></h1>
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
			
                        <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-google"></a></li>
               
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
                                        
<body id="home">
  <div id="wrapper">
      
          
<h3 style="margin-top:15px; padding-bottom: 8px;">CONTACT US</h3>

<div class="form">
  <form method="post" action="contact.php">
    <label for="fname"><b>UserName</b></label>
   <input type="text" id="fname" name="usrname" placeholder="Your Name">

    <label for="lname"><b>E-mail</b></label>
    <input type="text" id="lname" name="email" placeholder="eg: xyz@hashtag.com">

    <label for="country"><b>Country</b></label>
    <input type="text" id="country" name="country" placeholder="enter country name">
      

    <label for="subject"><b>Subject</b></label>
    <textarea id="subject" name="subject" placeholder="Write Your Respective Query" style="height:200px"></textarea>

    <input type="submit" value="Submit" name="makecontact">
       
</form>
            <?php //this is for storing data which is sent by user in contactus
              global $con;
                  if(isset($_POST['makecontact']))
                  {

                    $username = $_POST['usrname']; //text type data collecting  
                    $mail = $_POST['email'];
                    $country = $_POST['country'];
                    $subject = $_POST['subject'];
                  
                    if ($username == '' OR $mail == '' OR $country == '' OR $subject == '') 
                      {
                        echo "<script> alert('please fill all the fields!') </script>"; //this is javascript for showing error on blank field
                        exit();
                      }

                    else
                      {

                        $store = "INSERT INTO contactquery(name,email,country,subject)VALUES('$username','$mail','$country','$subject')";

                        $run_store = mysqli_query($con,$store);

                        if($run_store)
                          {
                            echo "<script> alert('contact suc. done') </script>";
                          } 
                        else
                          {
                            echo "<script> alert('contact failed') </script>";
                            exit();
                          }
                      }
                  }

            ?>
    

      </div>
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14091.967157682546!2d73.3071327!3d27.9941476!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9e502d4199f967e9!2sShri+Jain+P.G.+College!5e0!3m2!1sen!2sin!4v1546603087645" width="1050px" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
             
        
<div id="addr">
  <table>
    <tr>
  <td><address>
    <span style="margin-bottom: 2px; text-decoration: underline; color: aqua;">ADDRESS:-</span><br>
    Shree Jain P.G College<br>
    Nokha Road<br>
    Bikaner(Raj.)<br>
    334001
  </address></td>

  <td style="float: right; padding-left: 680px;">
   <span style="text-decoration: underline; color: aqua;"> Call Us:-</span> <br>
    : +91-7073790350(O) <br>
    : 0151-2231705(R)  
  </td>
</tr>
</table>
</div>

  <div class="footer"><!--footer starts-->
          <h1 align="center" style="color: white; padding-top: 45px; font-size: 20px;">©2018-All Rights Are Reserved by Truenews.com</h1>
        </div><!--footer end-->
      
    </div>    
</body>
</html>
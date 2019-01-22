<?php
$con = mysqli_connect("localhost","root","","newssite");
if (mysqli_connect_errno())
{
	echo "fail to connect sql";
	mysqli_connect_errno();
}
global $con;

?>

<!DOCTYPE html>
<html>
<head>
    <title>admin area</title>
    <style type="text/css">
        </style>
</head>
<body>
	<!-- <div style="height: 200px; width: 1350px; background-color: cyan;"><H1 align="center">WELCOME ADMIN</H1></div> -->
    <div style="height: 1000px; width: 1345px; background-color: green; margin-left: -9px; margin-top: -10px; border: 5px solid blue;">

        <div style="height: 1000px; width: 1150px; background-color: black; float:right;">
        <h1 align="center" style="text-shadow: -1px 0px 7px #2ebcff; color: #ffffff; text-decoration: underline;">MANAGE BOX</h1>
        <?php
        if(isset($_GET['insert_post']))
        {
        	include("insert_post.php");
        }
        if(isset($_GET['view_post']))
        {
        	include("viewalldata.php");
        }
        if(isset($_GET['edit_post']))
        {
        	include("edit_post.php");
        }
        if(isset($_GET['delete_post']))
        {
        	include("delete_post.php");
        }
        ?>


        </div>

         <div style="height: 1000px; width: 195px; background-color: white; float:right;">

         	     <h3 style="color: black; text-align: center; font-size: 24px;">MANAGE</h3>

         	<div class="manage_admin" style="text-align: center; border: 1px solid black; background-color: #1C1F24;
             height: 350px; margin-top: 28px; font-size: 24px;" >

                 <a href="index.php?view_post" style=" color: white; text-decoration: underline; font-family: LeagueGothic, sans-serif;"><h4 style="margin-top: 25px;">View All Post</h4></a>

                 <a href="index.php?insert_post" style=" color: white; text-decoration: underline; font-family: LeagueGothic, sans-serif;"><h4 style="margin-top: 15px;">Insert Post</h4></a>

            	 <a href="index.php?edit_post" style=" color: white; text-decoration: underline; font-family: LeagueGothic, sans-serif;"><h4 style="margin-top: 15px;">Update Post</h4></a>

         	     <a href="index.php?delete_post" style=" color: white; text-decoration: underline; font-family: LeagueGothic, sans-serif;"><h4 style="margin-top: 15px;">Delete Post</h4></a>

                 <h1 style="color: white;">----*----</h1>
        	
            </div>
        </div>

    </div>


</body>
</html>
<?php
$con = mysqli_connect("localhost","root","","newssite"); //connection
 if (mysqli_connect_errno())
      {
        echo "fail to connect sql";
        mysqli_connect_errno();
       }
       global $con;


if (isset($_GET['delete_post'])) 
{
	$delete_id = $_GET['delete_post']; // geting particular id of post will be deleted
	$deletepost = "delete from posts where post_id = '$delete_id'";
	$run_dlt = mysqli_query($con,$deletepost);
	if ($run_dlt) 
	{
		echo "<script>alert('one post has been deleted!')</script>";
		echo "<script>window.open('index.php?view_post','_self')</script>";
	}
}

?>

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
    <style type="text/css"></style>
</head>
<body background="black">
	<div style="height: 200px; width: 1350px; background-color: cyan;"><H1 align="center">WELCOME ADMIN</H1></div>
    <div style="height: 1500px; width: 1350px; background-color: green;">
        <div style="height: 1500px; width: 1250px; background-color: pink; float:left;">
        <h1 align="center">MANAGE BOX</h1>

 <?php //this is for database connectivity, connection string is written in database.php
include("includes/database.php"); 
if (isset($_GET['edit_post'])) //geting post id by url variable which is given in edit_post.php
	 {
		$getpostid = $_GET['edit_post'];
		$getedit = "select * from posts where post_id = '$getpostid'"; //query for fetching particular id data
		$runedit = mysqli_query($con,$getedit);
		$rowedit = mysqli_fetch_array($runedit);

		$updateid = $rowedit['post_id']; //to use this particular post id further in this page, (this used in update query below page)

			$p_title = $rowedit['postt_title'];
			$p_cat = $rowedit['category_id'];
			$p_img1 = $rowedit['post_img1'];
			$p_img2 = $rowedit['post_img2'];
			$p_img3 = $rowedit['post_img3'];
			$p_desc = $rowedit['post_desc'];
			$p_key = $rowedit['search_keywords'];
	 }
	 	$get_cattitle = "select * from category where category_id = '$p_cat'"; //to fetch category title using category id
	 	$runcattitle = mysqli_query($con,$get_cattitle);
	 	$rowcat = mysqli_fetch_array($runcattitle);
	 	$cattitle = $rowcat['category_title'];
global $con
?>
<!--<!DOCTYPE html>
<html>
<head>
	<title>Admin Insertion Page</title>-->
	<!--<script type="text/javascript" src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<script>tinymce.init({selector:'textarea'});</script>--> <!-- if want ad text editor in textarea then free this coment's next coment

	<style type="text/css">
        td{
            color:aliceblue;
        }
		b{
			color: white;
		}
		body{
			background: url(../imgs/bg.png);
		}
	</style>
</head>
<body> -->

	<form method="post" action="" autocomplete="off" enctype="multipart/form-data"> <!-- 1. making form to insert posts. 2. autocomplete=off clears hestory of text inputs-->
		
			<table width="900px" align="center" border="20" cellpadding="10" cellspacing="10" bgcolor="#121212" style="border-radius: 30px; letter-spacing: 1px;"> <!--form is used in this table tag-->

				<tr style="background-color: #121212" >
					<th colspan="2"><h1 style="font-family: LeagueGothic, Impact, sans-serif;
    font-weight: normal;
    text-transform: uppercase;
    font-size: 2.5em;
    text-shadow: -1px 0px 7px #2ebcff;
    position: relative;
    width: auto;
    margin-bottom: 19px;
    color: #ffffff;

	text-decoration: underline;">UPDATE OR EDIT POST</h1></th>
				</tr>
            <div style="background-color: #37b4ec;">
				<tr>
					<td><b>Post title</b></td>
					<td><input type="text" name="post_title" value="<?php echo $p_title; ?>" placeholder="Suitable Title" size="50"></td>
				</tr>

				<tr>
					<td><b>Post catgory</b></td>
					<td>
						
						<select name="post_category"> <!--select will provide list and it will give permition to choose one of list-->
							
							<option  value="<?php echo $p_cat; ?>"><?php echo $cattitle; ?></option>

									<?php //this is used to retrive categories list from database
									$get_categories = "select * from category";
									$run_categories = mysqli_query($con,$get_categories);
									while ($array_categories = mysqli_fetch_array($run_categories))
										{
											$category_id = $array_categories['category_id'];
											$category_title = $array_categories['category_title'];	
											echo "<option value = '$category_id'>$category_title</option>";


										}
									
									?>

						</select>

					</td>

				</tr>

				<tr>
					<td><b>Upload Image-1</b></td>
					<td><input type="file" name="post_image1"><br><img src="post_img/<?php echo $p_img1; ?>" width="237px"></td> <!-- type=file gives permition to upload pic-->
				</tr>

				<tr>
					<td><b>Upload Image-2</b></td>
					<td><input type="file" name="post_image2"><br><img src="post_img/<?php echo $p_img2; ?>" width="237px"></td>
				</tr>

				<tr>
					<td><b>Upload Image-3</b></td>
					<td><input type="file" name="post_image3"><br><img src="post_img/<?php echo $p_img3; ?>" width="237px"></td>
				</tr>

				<tr>
					<td><b>Add Description</b></td>
					<td><textarea name="post_description" cols="100" rows="10"  placeholder="Add Description related to the above News">"<?php echo $p_desc; ?></textarea></td>
				</tr>

				<tr>
					<td><b>serach keywords</b></td>
					<td><input type="text" name="searchkeyword" value="<?php echo $p_key; ?>" placeholder="enter keywords to for search" size="30"></td>
				</tr>

				<tr>
					<td colspan="2" align="center"><input type="submit" name="updatepost" value="update"></td>
				</tr>

        </div>

			</table>

	</form>	

</body>
</html>

<?php
	global $con;
	if(isset($_POST['updatepost']))
	{

		$post_title = $_POST['post_title']; //text type data collecting  
		$post_category = $_POST['post_category'];
		$post_description = $_POST['post_description'];
		$post_keyword = $_POST['searchkeyword'];
		

		$post_image1 = $_FILES['post_image1']['name']; //mutlty type data collecting (images)
		$post_image2 = $_FILES['post_image2']['name'];
		$post_image3 = $_FILES['post_image3']['name'];

		$temp_name1 = $_FILES['post_image1']['tmp_name'];
		$temp_name2 = $_FILES['post_image2']['tmp_name'];
		$temp_name3 = $_FILES['post_image3']['tmp_name'];
	

		if ($post_title == '' OR $post_category == '' OR $post_description == '' OR $post_image1 == '') 
			{
				echo "<script> alert('please fill all the fields!') </script>"; //this is javascript for showing error on blank field
				exit();
			}

		else
			{
				move_uploaded_file($temp_name1, "post_img/$post_image1");
				move_uploaded_file($temp_name2, "post_img/$post_image2");
				move_uploaded_file($temp_name3, "post_img/$post_image3");

				$updateposts = "update posts set category_id='$post_category',dates=NOW(),postt_title='$post_title',post_img1='$post_image1',post_img2='$post_image2',post_img3='$post_image3',post_desc='$post_description',search_keywords='$post_keyword' where post_id = '$updateid'"; /*"INSERT INTO posts(category_id,dates,postt_title,post_img1,post_img2,post_img3,post_desc,search_keywords)VALUES('$post_category',NOW(),'$post_title','$post_image1','$post_image2','$post_image3','$post_description','$post_keyword')"; //NOW() is used to get current time */

				$run_editpost = mysqli_query($con,$updateposts);

				if($run_editpost)
					{
						echo "<script> alert('post update suc. done') </script>";
						echo "<script>window.open('index.php?view_post','_self')</script>"; //to redirect admin page 
					} 
				else
					{
						echo "<script> alert('post insertion failed') </script>";
						exit();
					}
			}
	}
?>
        


        </div>

         <div style="height: 1500px; width: 100px; background-color: yellow; float:right;">
         	<h3>MANAGE</h3>
         	<a href="index.php?insert_post">insert post</a><br>
         	<a href="index.php?view_post">view all post</a><br>
         	<a href="index.php?edit_post">update</a><br>
         	<a href="index.php?delete_post">delete</a><br>
        	
        </div>

    </div>


</body>
</html>













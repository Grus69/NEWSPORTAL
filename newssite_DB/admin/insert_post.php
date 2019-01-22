<?php //this is for database connectivity, connection string is written in database.php
include("includes/database.php"); 
global $con
?>
<!DOCTYPE html>
<html>
<head>
	<title>inserting posts</title>
	<!--<script type="text/javascript" src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<script>tinymce.init({selector:'textarea'});</script>--> <!-- if want ad text editor in textarea then free this coment's next coment-->
</head>
<body>

	<form method="post" action="insert_post.php" autocomplete="off" enctype="multipart/form-data"> <!-- 1. making form to insert posts. 2. autocomplete=off clears hestory of text inputs-->
		
			<table width="900px" align="center" border="20" cellpadding="10" cellspacing="10" bgcolor="#99CC99" style="border-radius: 30px; letter-spacing: 1px;"> <!--form is used in this table tag-->

				<tr bgcolor="#FFCC66">
					<th colspan="2"><h1>insert new post</h1></th>
				</tr>

				<tr>
					<td><b>Post title</b></td>
					<td><input type="text" name="post_title" placeholder="put title here" size="50"></td>
				</tr>

				<tr>
					<td><b>Post catgory</b></td>
					<td>
						
						<select name="post_category"> <!--select will provide list and it will give permition to choose one of list-->
							
							<option>select a category</option>

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
					<td><b>post image1</b></td>
					<td><input type="file" name="post_image1"></td> <!-- type=file gives permition to upload pic-->
				</tr>

				<tr>
					<td><b>post image2</b></td>
					<td><input type="file" name="post_image2"></td>
				</tr>

				<tr>
					<td><b>post image3</b></td>
					<td><input type="file" name="post_image3"></td>
				</tr>

				<tr>
					<td><b>post description</b></td>
					<td><textarea name="post_description" cols="39" rows="15" placeholder="put description"></textarea></td>
				</tr>

				<tr>
					<td colspan="2" align="center"><input type="submit" name="insertpost" value="OK"></td>
				</tr>



			</table>

	</form>	

</body>
</html>

<?php
	global $con;
	if(isset($_POST['insertpost']))
	{

		$post_title = $_POST['post_title']; //text type data collecting  
		$post_category = $_POST['post_category'];
		$post_description = $_POST['post_description'];
		

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

				$insertposts = "INSERT INTO posts(category_id,dates,postt_title,post_img1,post_img2,post_img3,post_desc)VALUES('$post_category',NOW(),'$post_title','$post_image1','$post_image2','$post_image3','$post_description')"; //NOW() is used to get current time

				$run_post = mysqli_query($con,$insertposts);

				if($run_post)
					{
						echo "<script> alert('post insertion suc. done') </script>";
					} 
				else
					{
						echo "<script> alert('post insertion failed') </script>";
						exit();
					}
			}
	}
?>
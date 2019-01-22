<?php //this is for database connectivity, connection string is written in database.php
include("includes/database.php"); 
function getposts()
				{
					global $con; //$con is a variable which has stored connectivity string in it so to use connectivity of database in every function need $con in it scope, 

					if (!isset($_GET['categories'])) //1 if categories arn't selected. 2'categories' is url variable
					{
						
							$get_post = "select * from  posts where post_id not in ((select max(post_id) from posts),(select max(post_id)-1 from posts),(select max(post_id)-2 from posts))"; //this is for selection of all posts except last 3
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
										<div id = 'single_post'>

				
											<img src = 'admin/post_img/$post_image1'/><br>
											<h1> $post_title </h1>
											<a href = 'readmore.php?pst_id=$post_id' style = 'float : right;'>read more..</a>

										</div>

									";
							}
						}
					}

						
				



function getcategories()
						{
							global $con;
							$get_categories = "select * from category";
							$run_categories = mysqli_query($con,$get_categories);
							while ($array_categories = mysqli_fetch_array($run_categories))
								{
									$category_id = $array_categories['category_id'];
									$category_title = $array_categories['category_title'];	
									echo "<li><a href='index.php?categories=$category_id'>$category_title</a></li>"; //after .php ? works to create url variable which can be used for many tasks
								}
						}

function getcategorisedpost()
				{
					global $con; //$con is a variable which has stored connectivity string in it so to use connectivity of database in every function need $con in it scope, 

					if (isset($_GET['categories'])) //if categories is selected
					{
							$get_cat = $_GET['categories']; //if category is selected.
							$get_categorised_post = "select * from posts where category_id = '$get_cat'"; 
							$run_categorised_post = mysqli_query($con,$get_categorised_post);
							$count = mysqli_num_rows($run_categorised_post);
								if ($count==0) 
									{
										echo "<h2 style=' align:center;'>No more post available  </h2>";
									}
							while ($row_categorised_post = mysqli_fetch_array($run_categorised_post))
							{
								$post_id = $row_categorised_post['post_id'];
								$post_title = $row_categorised_post['postt_title'];
								$post_category = $row_categorised_post['category_id'];
								$post_description = $row_categorised_post['post_desc'];
								$post_image1 = $row_categorised_post['post_img1'];

								echo 
									"
										<div id = 'single_post'>
										<img src = 'admin/post_img/$post_image1'/><br>
										<h1> $post_title </h1>
										<a href = 'readmore.php?pst_id=$post_id' style = 'float : left;'>readmore</a>

										</div>

									";
							}
						
					}

						
				}



function readmore()
					{


					
						global $con;
						if (isset($_GET['pst_id']))
						{
							$psst_id = $_GET['pst_id'];
							if (!is_numeric($psst_id)) {
								echo "data error";
								exit();
							}
							$get_post = "select * from  posts where post_id = '$psst_id'"; 
							$run_post = mysqli_query($con,$get_post);
							$count = mysqli_num_rows($run_post);
							if ($count==0) 
									{
										echo "<h2>there is no post of this type of category</h2>";
									}

							while ($row_post = mysqli_fetch_array($run_post))
							{
								$post_id = $row_post['post_id'];
								$post_title = $row_post['postt_title'];
								$post_category = $row_post['category_id'];
								$post_description = $row_post['post_desc'];
								$post_image1 = $row_post['post_img1'];
								$post_image2 = $row_post['post_img2'];
								$post_image3 = $row_post['post_img3'];
							
								if(!empty($post_image2 && $post_image3))
								{


								echo
									"
										<div id = 'post_box'>
										<div id = 'readmorepost'>

											<h1 style = 'font-size : 15px; text-align:left; color:#CC0033;'> $post_title </h1><br>
										
											<img src = 'admin/post_img/$post_image1' style = 'width: 700px; height: 350px; border-radius: 8px; border: 2px solid green;'/><br>
											<div style = 'height:200px; width:400'>
													<div style = 'height:200px; width:200;; margin-left: 15%'>
													<img src = 'admin/post_img/$post_image2' style = 'width: 250px; height: 175px; border-radius: 8px; border: 2px solid green; float : left;/>
													</div>
													<div style = 'height:200px; width:200'>
													<img src = 'admin/post_img/$post_image3' style = 'width: 250px; height: 175px; border-radius: 10%; border: 2px solid green; float : right;'/>
													</div>
											</div><br><br>
											
											<p style = 'font-size : 24px; text-align : left; clear:both;  margin-left: 10% '> $post_description </p>

											<a href = 'index.php?pst_id=$post_id' style = 'float : right;'>goback</a>

										</div>
										</div>

									";
								}
								else
										{
											echo"
											<div id = 'post_box'>
										<div id = 'readmorepost'>

											<h1 style = 'font-size : 20px; text-align:left; color:#CC0033;'> $post_title </h1><br>
										
											<img src = 'admin/post_img/$post_image1' style = 'width: 700px; height: 350px; border-radius: 8px; border: 2px solid aqua;'/><br><br>
											
											
											<p style = 'font-size : 24px; text-align : left; clear:both;   '> $post_description </p>

											<a href = 'index.php?pst_id=$post_id' style = '  float : right; color:blue;'>Go back</a>

										</div>
										</div>
										";
										}

							}
					    }
					}

?>
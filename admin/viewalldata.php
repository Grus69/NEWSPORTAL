<!DOCTYPE html>
<html>
<head>
    <title>View All Posts</title>
</head>
<body>
    <?php if (isset($_GET['view_post']))
     {
     ?>
        <table align="center" border="2px" bgcolor="black" width="1100px" style="color: white;">

            <tr>
                <td colspan="9"><h2 style="text-align: center;">View All Posts</h2></td>
            </tr>
            <tr>
                <th>Id</th>
                <th>Categories</th>
                <th>Date/Time</th>
                <th>Title</th>
                <th>Image-1</th>
                <th>Image-2</th>
                <th>Image-3</th>
                <th>Search Keywords</th>
                <th>Description</th>
               
            </tr>
            <?php

            $con = mysqli_connect("localhost","root","","newssite"); //connection
                if (mysqli_connect_errno())
                {
                    echo "fail to connect sql";
                    mysqli_connect_errno();
                }
                global $con;
                ?>
                <?php

                $getpst = "select * from posts";
                $runpst = mysqli_query($con,$getpst);
                while ($rowpost = mysqli_fetch_array($runpst)) //array of all items is posts
                {
                ?>
                <?php //all items storing in variables
                    $pstid = $rowpost['post_id'];
                    $ctid = $rowpost['category_id'];
                    $dt = $rowpost['dates'];
                    $psttle = $rowpost['postt_title'];
                    $pstimg1 = $rowpost['post_img1'];
                    $pstimg2 = $rowpost['post_img2'];
                    $pstimg3 = $rowpost['post_img3'];
                    $srchkey = $rowpost['search_keywords'];
                    $pstdsc = $rowpost['post_desc'];
                    
                    ?>
                
            <tr>
                <td><?php echo $pstid ?></td> <!--printing all items in table-->
                <td><?php echo $ctid ?></td>
                <td><?php echo $dt ?></td>
                <td><?php echo mb_strimwidth($psttle, 0, 15, "...");?></td>
                <td><img src="post_img/<?php echo $pstimg1 ?>" width="50"></td>
                <td><img src="post_img/<?php echo $pstimg2 ?>" width="50"></td>
                <td><img src="post_img/<?php echo $pstimg3 ?>" width="50"></td>
                <td><?php echo $srchkey ?></td>
               <td><h4><?php echo mb_strimwidth($pstdsc, 0, 15, "...");  ?></h4></td>
            </tr>
            <?php
            }
            ?>
            
        </table>
        <?php
        }
        else
        {
            include("edit_post.php");
        }
        ?>
</body>
</html>
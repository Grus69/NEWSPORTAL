<!DOCTYPE html>
<html>
<head>
    <title>DELETE POST</title>
</head>
<body>
        <table align="center"  width="1100px" border="2px" bgcolor="black" style="color: white;">

            <tr>
                <td colspan="10"><h2 style="text-align: center;">DELETE POST</h2></td>
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
                <th>Delete</th>
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
                <td align="center" width="10"><?php echo $pstid ?></td> <!--printing all items in table-->
                <td width="80" align="center"><?php echo $ctid ?></td>
                <td width="90"><?php echo $dt ?></td>
                <td width="200px"><?php echo mb_strimwidth($psttle, 0, 30, "...");?></td>
                <td width="90"><img src="post_img/<?php echo $pstimg1 ?>" width="80"></td>
                <td width="90"><img src="post_img/<?php echo $pstimg2 ?>" width="80"></td>
                <td width="90"><img src="post_img/<?php echo $pstimg3 ?>" width="80"></td>
                <td width="90"><?php echo $srchkey ?></td>
                <td width="120"><h4><?php echo mb_strimwidth($pstdsc, 0, 15, "...");  ?></h4></td>
                <td width="80" align="center"><a href="deleting.php?delete_post=<?php echo $pstid; ?>">Delete</a></td>
            </tr>
            <?php
            }
            ?>
            
        </table>
</body>
</html>
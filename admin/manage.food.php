<?php
    include 'header.php';
    
?>

    <!--main content secsion start-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Food</h1>
            <br><br>

            <?php

                if(isset($_SESSION['food-insert']))
                {
                    echo $_SESSION['food-insert'];
                    unset($_SESSION['food-insert']);
                }

                if(isset($_SESSION['remove-food']))
                {
                    echo $_SESSION['remove-food'];
                    unset($_SESSION['remove-food']);
                }

                if(isset($_SESSION['delete-food']))
                {
                    echo $_SESSION['delete-food'];
                    unset($_SESSION['delete-food']);
                }

                if(isset($_SESSION['delete-img']))
                {
                    echo $_SESSION['delete-img'];
                    unset($_SESSION['delete-img']);
                }

               

                if(isset($_SESSION['fUpload']))
                {
                    echo $_SESSION['fUpload'];
                    unset($_SESSION['fUpload']);
                }

                if(isset($_SESSION['falied-remove']))
                {
                    echo $_SESSION['falied-remove'];
                    unset($_SESSION['falied-remove']);
                }
            
                if(isset($_SESSION['updated']))
                {
                    echo $_SESSION['updated'];
                    unset($_SESSION['updated']);
                }
            
            
            ?>

            <br><br>
            <a href="add-food.php" class="btn-primary">Add Food</a>
            <br><br><br>
            

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Category ID</th>
                    
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
                
                <?php

                   /* $sql1 = "SELECT * FROM tbl_category WHERE active='Yes'";

                    $results = mysqli_query($conn, $sql1);

                    $counts = mysqli_num_rows($results);

                    if($counts > 0 )
                    {
                        while($rows = mysqli_fetch_assoc($results)){
                            
                            //get details of category                
                            $category_title = $rows['title'];
                            $category_id    = $rows['id'];

                            

                        }

                    }*/

                    $sql = "SELECT * FROM tbl_food";

                    $result = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($result);

                    $num = 1;

                    if($count > 0 )
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            $categoryid = $row['category_id'];
                            $active = $row['active'];

                            ?>
                                <tr>
                                    <td><?php echo $num++; ?></td>
                                    <td><?php echo $title; ?></td>
                                    <td><?php echo "Rs. ". $price; ?></td>
                                    <td>
                                        
                                        <?php 

                                            if($image_name == "")
                                            {
                                                echo "<div class='error'> Image not added </div>";

                                            }
                                            else
                                            {
                                                ?>
                                                <img src="../details/images/food/<?php echo $image_name; ?>" width="100px">
                                                <?php

                                            }

                                        ?>
                                    
                                    </td>
                                    <td>
                                        <?php 
                                        echo $categoryid;
                                            /*if($category_title == $categoryid)
                                                {
                                                    echo $category_title;
                                                }*/
                                        ?>
                                    </td>
                                    
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <a href="update-food.php?id=<?php echo $id; ?>" class="btn-secondary">Update Food</a>
                                        <a href="delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?> " class="btn-delete">Delete Food</a>
                                    </td>
                                </tr>
                            <?php

                        }
                    }
                    else
                    {
                        echo "<tr><td colspan='7' class='error'>Food not added yet</td></tr>";
                    }
                ?>
                
                
            </table>
        </div>
    </div>
    <!--main content secsion end-->

    

<?php
    include 'footer.php';
?>
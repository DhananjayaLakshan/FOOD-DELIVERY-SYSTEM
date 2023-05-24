<?php
    include 'header.php';
?>

    <!--main content secsion start-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Category</h1>
            <?php
                if(isset($_SESSION['add_category']))
                {
                    echo "<br>";
                    echo $_SESSION['add_category'];//add category display session msg
                    unset ($_SESSION['add_category']);//removing session msg
                }

                if(isset($_SESSION['imgdelete']))
                {
                    echo "<br>";
                    echo $_SESSION['imgdelete'];//display session msg
                    unset ($_SESSION['imgdelete']);//removing session msg
                }

                if(isset($_SESSION['delete']))
                {
                    echo "<br>";
                    echo $_SESSION['delete'];//delete category display session msg
                    unset ($_SESSION['delete']);//removing session msg
                }

                if(isset($_SESSION['no-category-found']))
                {
                    echo "<br>";
                    echo $_SESSION['no-category-found'];//no category found session msg
                    unset ($_SESSION['no-category-found']);//removing session msg
                }

                if(isset($_SESSION['updated']))
                {
                    echo "<br>";
                    echo $_SESSION['updated'];//updated category found session msg
                    unset ($_SESSION['updated']);//removing session msg
                }

                if(isset($_SESSION['fUpload']))
                {
                    echo "<br>";
                    echo $_SESSION['fUpload'];//updated category found session msg
                    unset ($_SESSION['fUpload']);//removing session msg
                }

                if(isset($_SESSION['falied-remove']))
                {
                    echo "<br>";
                    echo $_SESSION['falied-remove'];//updated category found session msg
                    unset ($_SESSION['falied-remove']);//removing session msg
                }
            ?>
            <br><br>
            <a href="add-category.php" class="btn-primary">Add Category</a>
            <br><br><br>
            

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                   
                    <th>Active</th>
                    <th>Action</th>

                </tr>

                <?php

                    //Query to get all details from database
                    $sql = "SELECT * FROM tbl_category";

                    //execute the query
                    $result = mysqli_query($conn, $sql);

                    //count rows
                    $count = mysqli_num_rows($result);
                    
                    //create variable to display row number
                    //$num=1;

                    //check data exist or not
                    if($count > 0)
                    {
                        //get the data and display
                        while($rows = mysqli_fetch_assoc($result))
                        {
                            $id           = $rows['id'];
                            $title        = $rows['title'];
                            $image_name   = $rows['image_name'];
                            $active       = $rows['active'];
                            
                            ?>
                                <tr>
                                    <td><?php echo $id;      ?></td>
                                    <td><?php echo $title;      ?></td>

                                    <td>
                                        <?php 
                                            //check image name is available or not
                                            if($image_name != "")
                                            {
                                                //display the image
                                                ?>

                                                <img src="../details/images/category/<?php echo $image_name; ?>" width="100px">
    
                                                <?php
                                            }
                                            else
                                            {
                                                //display error msg
                                                echo "<div class='error'>Image is not added</div>";
                                            }
                                            


                                        ?>
                                    </td>

                                   
                                    <td><?php echo $active;     ?></td>
                                    <td>
                                        <a href="update-category.php?id=<?php echo "$id"; ?>&image_name=<?php echo $image_name; ?>" class="btn-secondary">Update category</a>
                                        <a href="delete-category.php?id=<?php echo "$id"; ?>&image_name=<?php echo $image_name; ?>" class="btn-delete">Delete category</a>
                                    </td>
                                </tr>

                            <?php


                        }
                    }
                    else
                    {
                        //when dont have data display error msg
                        ?>
                            <tr>
                                <td colspan="6">
                                    <div class="error">No category added</div>
                                </td>
                            </tr>
                        <?php

                    }
                
                
                ?>

               
                    

            </table>

        </div>
    </div>
    <!--main content secsion end-->

    

<?php
    include 'footer.php';
?>
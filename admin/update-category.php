<?php include 'header.php'; ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php
            if(isset($_GET['id']))
            {
                //get value
                $id = $_GET['id'];

                //query to get all the details
                $sql = "SELECT * FROM tbl_category WHERE id = $id";

                //execte query
                $result = mysqli_query($conn, $sql);

                //count the rows 
                $count = mysqli_num_rows($result);

                if($count == 1)
                {
                    //get values
                    $row = mysqli_fetch_assoc($result);
                    $id             = $row['id'];
                    $title          = $row['title'];
                    $current_image  = $row['image_name'];
                    
                    $active         = $row['active'];

                }
                else
                {
                    $_SESSION['no-category-found'] = "<div class='error'>Category not found</div>";
                    header ("Location: manage.category.php");
                }
            }
            else
            {
                header("Location manage.category.php");
            }
        ?>


        <form action="" method="post" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title : </td>
                        <td>
                            <input type="text" name="title" placeholder="Category title" value="<?php echo $title; ?>">
                        </td>
                    </tr>

                <tr>
                    <td>Current image :  </td>
                    <td>
                        <?php

                            if($current_image != "")
                            {
                                ?>
                                    <img src="../details/images/category/<?php echo $current_image; ?>" width="100px">
                                <?php
                            }
                            else
                            {
                                //display msg
                                echo "<div class='error'>Image not added</div>";
                            }

                        ?>
                    </td>
                </tr>

                <tr>
                    <td>New image : </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                

                <tr>
                    <td>Active : </td>
                    <td>
                        <input <?php if($active == "Yes") {echo "checked"; }?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active == "No")  {echo "checked"; }?>  type="radio" name="active" value="No"> No
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" class="btn-secondary" name="submit" value="UPDATE">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php

    if(isset($_POST['submit']))
    {
        //get all the values from form
        $id             = $_POST['id'];
        $title          = $_POST['title'];
        $current_image  = $_POST['current_image'];        
        $active         = $_POST['active'];

        //update new image
        if(isset($_FILES['image']['name']))
        {
            //get the image detailes
            $image_name = $_FILES['image']['name'];

            //check image avalilable or not
            if($image_name != "")
            {
                //image available
                //upload the new image
                
                $ext = end(explode(".", $image_name));

                $image_name = "Food_Category_".rand(000,999).".".$ext;

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "../details/images/category/".$image_name;

                $upload = move_uploaded_file($source_path, $destination_path);

                if($upload == false)
                {
                    $_SESSION['fUpload'] = "<div class='error'>Failed to upload image</div>";
                    header ("Location: manage.category.php");
                    die();
                }

                if($current_image != "")
                {
                    //remove current image
                    $remove_path = "../details/images/category/".$current_image;
                    $remove = unlink($remove_path);

                    //check the image is removed or not
                    if($remove == false)
                    {
                        $_SESSION['falied-remove'] = "<div class='error'>Failed to remove image</div>";
                        header ("Location: manage.category.php");
                        die();
                    }
                }              
            }
            else
            {
                $image_name = $current_image;
            }
        }
        else
        {
            $image_name = $current_image;
        }


        //update database
        $sqli = "UPDATE tbl_category SET 
                title    = '$title',
                image_name = '$image_name',                
                active   = '$active'
                WHERE id = $id
                ";

        //execute the query
        $res = mysqli_query($conn, $sqli);

        //check if set a value
        if($res == true)
        {
            $_SESSION['updated'] = "<div class='success'>Category updated successfully</div>";
            header ("Location: manage.category.php");
        }
        else
        {
            $_SESSION['updated'] = "<div class='error'>Failed to upload category</div>";
            header ("Location: manage.category.php");    
        }
        
    }

?>

<?php include 'footer.php'; ?>
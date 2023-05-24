<?php
if(isset($_POST['submit']))
{
    require_once '../includes/dbh.inc.php';


    $id             = $_POST['id'];
    $title          = $_POST['title'];
    $description    = $_POST['description'];
    $price          = $_POST['price'];
    $current_image  = $_POST['current_image'];
    $category       = $_POST['category'];
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
                
                $ext = end(explode('.',$image_name));

                $image_name = "FOOD-Name-".rand(0000,9999).".".$ext;

                $source_path = $_FILES['image']['tmp_name'];

                $destination_path = "../details/images/food/".$image_name;

                $upload = move_uploaded_file($source_path, $destination_path);

                if($upload == false)
                {
                    $_SESSION['fUpload'] = "<div class='error'>Failed to upload image</div>";
                    header ("Location: manage.food.php");
                    die();
                }

                if($current_image != "")
                {
                    //remove current image
                    $remove_path = "../details/images/food/".$current_image;
                    $remove = unlink($remove_path);

                    //check the image is removed or not
                    if($remove == false)
                    {
                        $_SESSION['falied-remove'] = "<div class='error'>Failed to remove image</div>";
                        header ("Location: manage.food.php");
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
        $sql3 = "UPDATE tbl_food SET 
                title       = '$title',
                description = '$description',
                price       = $price,
                image_name  = '$image_name',
                category_id = '$category',
                active      = '$active'
                WHERE id=$id
                ";

        //execute the query
        $ress = mysqli_query($conn, $sql3);

        //check if set a value
        if($ress == true)
        {
            $_SESSION['updated'] = "<div class='success'>Category updated successfully</div>";
            header ("Location: manage.food.php");
        }
        else
        {
            $_SESSION['updated'] = "<div class='error'>Failed to update food</div>";
            header ("Location: manage.food.php");    
        }  
}
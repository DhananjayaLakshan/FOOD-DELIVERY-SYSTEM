<?php include 'header.php'; ?>

<div class="main-content">
        <div class="wrapper">
            <h1>Add Category</h1>

            <br><br>

            <?php
                if(isset($_SESSION['imgUpload']))
                {
                    echo $_SESSION['imgUpload'];
                    unset ($_SESSION['imgUpload']);
                }
            ?>

            <form action="" method="post" enctype="multipart/form-data">

                <table class="tbl-30">

                    <tr>
                        <td>Title : </td>
                        <td>
                            <input type="text" name="title" placeholder="Category title">
                        </td>
                    </tr>


                    <tr>
                        <td>Active : </td>
                        <td>
                            <input type="radio" name="active" value="Yes"> Yes
                            <input type="radio" name="active" value="No"> No

                        </td>
                    </tr>

                    <tr>
                        <td>Select image: </td>
                        <td>
                            <input type="file" name="image" >
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn-secondary" name="submit" value="Add Category">
                        </td>
                    </tr>

                </table>
                
            </form>
        </div>    
</div>


<?php
    if(isset($_POST['submit']))
    {
        
        //get the values
        $title = $_POST['title'];


        if(isset($_POST['active']))
        { 
            $active = $_POST['active'];
        }
        else
        {
            $active = "No";
        }

        //check image is selected or not and 
        if(isset($_FILES['image']['name']))
        {
            //set image name, source path and destination path
            $image_name= $_FILES['image']['name'];

            //upload the image if only image is selected
            if($image_name != "")
            {

                //auto renaming the image
                //get the extenction of our image (jpg,png)
                $ext = end(explode(".", $image_name));//ex:"food1.jpg"

                //rename the image
                $image_name = "Food_Category_".rand(000,999).".".$ext;//ex: "Food_Category_858.jpg"


                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../details/images/category/".$image_name;

                //upload the image
                $upload = move_uploaded_file($source_path, $destination_path);

                //check wheather the image is uploaded or not
                //if not echo error
                if($upload == false)
                {
                    //set msg
                    $_SESSION['imgUpload'] = "<div class='error'>Failed to upload image</div>";
                    //redirect add-category page
                    header ("Location: add-category.php");
                    //stop the procces
                    die();

                }
            }
        }
        else
        {
            //dnt upload img and set name empty
            $image_name="";
        }

        $sql = "INSERT INTO tbl_category  SET 
                title = '$title',
                image_name = '$image_name',
                active = '$active'
                ";
        
        $result = mysqli_query($conn, $sql);

        if($result == true)
        {
            $_SESSION['add_category'] = "<div class='success'>Category added successfully</div>";
            header ("Location: manage.category.php");
        }
        else
        {
            $_SESSION['add_category'] = "<div class='error'>Failed to add category</div>";
            header ("Location: manage.category.php");
        }

    }
?>

<?php include 'footer.php'; ?>
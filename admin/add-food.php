<?php include 'header.php'; ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>

        <?php

            if(isset($_SESSION['food-upload']))
            {
                echo $_SESSION['food-upload'];
                unset($_SESSION['food-upload']);
                echo "<br><br>";
            }
        
        
        ?>

        <form action="" method="post" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title : </td>
                        <td>
                            <input type="text" name="title" placeholder="The title of the food">
                        </td>
                </tr>

                <tr>
                    <td>Description :  </td>
                    <td>
                        <textarea name="description" cols="30" rows="10" placeholder="Description of the food"></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price : </td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select image : </td>
                        <td>
                            <input type="file" name="image">
                        </td>
                </tr>

                <tr>
                    <td>Category : </td>
                        <td>
                            <select name="category">

                                <?php
                                    //display categories from database
                                    //query for display details
                                    $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

                                    $result = mysqli_query($conn, $sql);

                                    $count = mysqli_num_rows($result);

                                    if($count > 0 )
                                    {
                                        while($row = mysqli_fetch_assoc($result)){
                                            
                                            //get details of category
                                            $id = $row['id'];
                                            $title = $row['title'];
                                            ?>

                                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                                            <?php

                                        }

                                    }
                                    else
                                    {
                                        ?>
                                            <option value="0">No Category Found</option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </td>
                </tr>

                <tr>
                    <td>Active : </td>
                    <td>
                        <input type="radio" name="active" value="Yes"> Yes
                        <input  type="radio" name="active" value="No"> No
                    </td>
                </tr>

                
                <tr>
                    <td colspan="2">
                        <input type="submit" class="btn-secondary" name="submit" value="ADD FOOD">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php

if(isset($_POST['submit']))
{
    //get data from form

    $title         = $_POST['title'];
    $description   = $_POST['description'];
    $price         = $_POST['price'];
    $category      = $_POST['category'];
    
    //radio buttons checked or not
    
    if(isset($_POST['active']))
    {
        $active = $_POST['active'];
    }
    else
    {
        $active = "No";//setting default value
    }

    //upload image
    if(isset($_FILES['image']['name']))
    {
        $image_name = $_FILES['image']['name'];

        //check image selected or not and upload image only if selected image
        if($image_name != "")
        {
            //get the extention
            $ext = end(explode(".", $image_name));//ex:"food1.jpg"

            //rename the image
            $image_name = "FOOD-Name-".rand(0000,9999).".".$ext;//ex: "Food_Category_858.jpg"


            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../details/images/food/".$image_name;

            //upload the image
            $upload = move_uploaded_file($source_path, $destination_path);

            if($upload == false)
            {
                $_SESSION['food-upload'] = "<div class='error'>Failed to upload image</div>";
                header("Location: add-food.php");
                die();
            }
        }
    }
    else
    {
        $image_name = ""; //set blank as default value

    }

    //insert data
    $sqli = "INSERT INTO tbl_food SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = '$category',
            active = '$active'";
            
    $res = mysqli_query($conn, $sqli);

    if($res == true)
    {
        $_SESSION['food-insert'] = "<div class='success'>Food addded successfully</div>";
        header("Location: manage.food.php");
    }
    else
    {
        $_SESSION['food-insert'] = "<div class='error'>Failed to add food</div>";
        header("Location: manage.food.php");
    }

}





?>

<?php include 'footer.php'; ?>
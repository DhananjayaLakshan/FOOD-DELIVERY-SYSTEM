<?php include 'header.php'; ?>

<?php

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql2 = "SELECT * FROM tbl_food WHERE id=$id";
    
    $res = mysqli_query($conn, $sql2);

    $roww = mysqli_fetch_assoc($res);

    $title              = $roww['title'];
    $description        = $roww['description'];
    $price              = $roww['price'];
    $current_image      = $roww['image_name'];
    $current_category   = $roww['category_id'];
    $active             = $roww['active'];

}

else
{
    header("Location: manage.food.php");
}

?>

<div class="main-content">
        <div class="wrapper">
            <h1>Update Food</h1>
            <br><br>

            <form action="update-food-action.php" method="POST" enctype="multipart/form-data">

            <table class="tbl-30">

                <tr>
                    <td>Title : </td>
                        <td>
                            <input type="text" name="title" placeholder="The title of the food" value="<?php echo $title; ?>">
                        </td>
                </tr>

                <tr>
                    <td>Description :  </td>
                    <td>
                        <textarea name="description" cols="30" rows="10" placeholder="Description of the food"><?php echo $description; ?></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price : </td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Current image : </td>
                        <td>
                            <?php
                                if($current_image != "")
                                {
                                    ?>
                                        <img src="../details/images/food/<?php echo $current_image; ?>" width = "100px">
                                    <?php

                                }
                                else
                                {
                                    echo '<div class="error">Image is not available</div>';
                                }
                            
                            ?>
                        </td>
                </tr>

                <tr>
                    <td>Select new image : </td>
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
                                            $category_title = $row['title'];
                                            $category_id =    $row['id'];

                                            ?>

                                                <option <?php if($current_category == $category_id) { echo "selected"; } ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>

                                            <?php

                                        }

                                    }
                                    else
                                    {
                                        echo "<option value='0'>Category Not Available. </option>";
                                        
                                    }
                                ?>
                            </select>
                        </td>
                </tr>

               

                <tr>
                    <td>Active : </td>
                    <td>
                        <input <?php if($active == "Yes") { echo "checked"; } ?> type="radio" name="active" value="Yes"> Yes
                        <input <?php if($active == "No")  { echo "checked"; } ?> type="radio" name="active" value="No"> No
                    </td>
                </tr>

                
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="submit" class="btn-secondary" name="submit" value="UPDATE">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>




<?php include 'footer.php';?>
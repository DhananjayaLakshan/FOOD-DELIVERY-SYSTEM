<script>alert("ssdggdisgdsgi");</script>
<?php

include ('../includes/dbh.inc.php');

if (isset($_GET['id']) && isset($_GET['image_name']))
{
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //remove image
    if ($image_name != "")
    {
        //get image path
        $path = "../details/images/food/".$image_name;

        //remove image file
        $remove = unlink($path);

        if($remove == false)
        {
            
            $_SESSION['delete-img'] = "<div class='error'>Failed to remove food image</div>";
            header("Location: manage.food.php");
            die();
        }

    }

    //delete query
    $sql = "DELETE FROM tbl_food WHERE id=$id";

    $result = mysqli_query($conn, $sql);

    if($result == true)
    {
        $_SESSION['remove-food'] = "<div class='success'>Food Deleted successfully</div>";
        header("Location: manage.food.php");

    }
    else
    {
        $_SESSION['remove-food'] = "<div class='error'>Failed to delete food</div>";
        header("Location: manage.food.php");
    }

}
else
{
    $_SESSION['delete-food'] = "<div class='error'>Failed to delete Food</div>";
    header("Location: manage.food.php");
}





?>
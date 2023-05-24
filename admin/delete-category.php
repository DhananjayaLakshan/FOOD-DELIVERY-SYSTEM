<?php

include ('../includes/dbh.inc.php');

if(isset($_GET['id']) && isset($_GET['image_name']))
{
    //get values
    $id         = $_GET['id'];
    $image_name = $_GET['image_name'];

    //remove physical image file 
    if($image_name != "")
    {
        //image file path
        $path = "../details/images/category/".$image_name;

        //remove image
        $remove = unlink($path);

        //failed to remove
        if($remove == false)
        {
            //display msg
            $_SESSION['imgdelete']="<div class='error'>Failed to delete image</div>";
            header("Location manage.category.php");
            die();
        }
    }

    $sql = "DELETE FROM tbl_category WHERE id = $id";

    $res = mysqli_query($conn, $sql);

    if($res == true)
    {
        $_SESSION['delete'] = "<div class='success'>Category deleted successfully</div>";
        header ("Location: manage.category.php");
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Falied to delete category</div>";
        header ("Location: manage.category.php");
    }

}
else
{
    header("Location: manage.category.php");
}
<?php

session_start();
include_once "../includes/dbh.inc.php";
$userMail = $_SESSION['usersession'];

echo $userMail;

if(isset($_POST['submit4'])){
    $images = $_FILES['file'];
    $imagefilename = $images['name'];
    echo $imagefilename;
    $imgfiletemp = $images['tmp_name'];
    echo $imgfiletemp;
    $filename_separate = explode('.',$imagefilename);
    $fileextention = strtolower($filename_separate[1]);
    $extentions = array('jpeg','jpg','png');

    if(in_array($fileextention,$extentions)){
        $uploadimage = '../details/profile_image/'.$imagefilename;
        move_uploaded_file($imgfiletemp,$uploadimage);

        $sql = "UPDATE users SET profile_pic = '{$uploadimage}' WHERE usersEmail ='{$userMail}' OR usersUid = '{$userMail}' ;";

        $result = mysqli_query($conn,$sql);

        if($result){
            header("location:../main/main.php#learnMore");
        }else{
            die(mysqli_error($result));
        }

    }
}
?>
<?php include 'header.php'; ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Password</h1>
        <br><br>

        <?php
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
            }

            if(isset($_SESSION['updatemtch']))
                {
                    echo "<br>";
                    echo $_SESSION['updatemtch'];//display session msg
                    unset ($_SESSION['updatemtch']);//removing session msg
                }
        ?>

        <form action="" method = "post">
            <table class="tbl-30">

                <tr>
                    <td>New Password : </td>
                        <td>
                            <input type="password" name="newPwd" placeholder="New Password">
                        </td>
                </tr>

                <tr>
                    <td>Confirm Password : </td>
                        <td>
                            <input type="password" name="confirmPwd" placeholder="Confirm Password">
                        </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" class="btn-secondary" name="submit" value="Change Password">
                    </td>
                </tr>

            </table>
       </form>
    </div>
</div>    


<?php

    if(isset($_POST['submit']))
    {
        //get the data from form
        $id         = $_POST['id'];
        $newPwd     = $_POST['newPwd'];
        $confirmPwd = $_POST['confirmPwd'];
        
        if($newPwd == $confirmPwd)
        {
            $hashedPwd = password_hash($confirmPwd, PASSWORD_DEFAULT);

            $sql = "UPDATE users SET usersPwd = '$hashedPwd' 
            WHERE usersId = $id";

            $result = mysqli_query($conn, $sql);

            if($result == true)
            {
                $_SESSION['updatePwd'] = "<div class='success'>Password is successfully updated </div>";
                header("Location: manage.admin.php");
            }
            else
            {
                $_SESSION['updatePwd'] = "<div class='error'>Failed to update Password </div>";
                header("Location: manage.admin.php");
            }
        }
        else
        {
            $_SESSION['updatemtch'] = "<div class='error'>Password missed matched..!</div>";
            header("Location: update-password.php");
        }

    }
?>



<?php include 'footer.php'; ?>
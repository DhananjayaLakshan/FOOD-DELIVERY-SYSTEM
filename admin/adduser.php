<?php include 'header.php'; ?>
    
<div class="main-content">
        <div class="wrapper">
            <h1>Add Users</h1>
            <br><br>

            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];//display session msg
                    unset ($_SESSION['add']);//removing session msg
                }
            ?>

            <form action="" method="post">

                <table class="tbl-30">
                    <tr>
                        <td>User Name : </td>
                        <td>
                            <input type="text" name="username" placeholder="Enter user name">
                        </td>
                    </tr>

                    <tr>
                        <td>User Email : </td>
                        <td>
                            <input type="text" name="email" placeholder="Enter Email">
                        </td>
                    </tr>

                    <tr>
                        <td>User Password : </td>
                        <td>
                            <input type="password" name="pwd" placeholder="Enter Password">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn-secondary" name="submit" value="Add User">
                        </td>
                    </tr>

                </table>
            </form>
        </div>
</div>

<?php include 'footer.php'; ?>
    
<?php
    //proocess the values from form and save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {  
        ///require_once '../includes/dbh.inc.php'; //connect database
        //if button clicked 
        //echo "button clicked";

        //get the data from form
        $username   = $_POST['username'];
        $email      = $_POST['email'];
        $pwd        = $_POST['pwd'];

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        //sql query to save data in database
        $sql = "INSERT INTO users SET 
        usersUid = '$username', 
        usersEmail = '$email',
        usersPwd = '$hashedPwd'
        ";

        //execute qury and save data in databse
        

        //display successful or not
        if(mysqli_query($conn, $sql))
        {
            $_SESSION['add'] = "<div class='success'>User added successfully</div>";
            header("Location: manage.admin.php");
        }
        else
        {
            $_SESSION['add'] = "<div class='error'>Failed to add user</div>";
            header("Location: manage.admin.php");
        }
    }
    
?>
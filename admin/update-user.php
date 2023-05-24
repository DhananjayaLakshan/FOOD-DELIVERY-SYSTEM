<?php include 'header.php'; ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update User</h1>

        <br><br>

        <?php
            
            //get id by selecting update button
            $id = $_GET['id'];

            //query to get detail 
            $sql = "SELECT * FROM users WHERE usersId = $id";

            //execute the query
            $result = mysqli_query($conn, $sql);

            //check whether the query is execute or not
            if($result == true)
            {
                //check data available or not
                $count = mysqli_num_rows($result);

                if($count == 1)
                {
                    $row = mysqli_fetch_assoc($result);

                    $username = $row['usersUid'];
                    $email = $row['usersEmail'];
                    
                }
                else
                {
                    header("Location: manage.admin.php");
                }

            }
        ?>

       <form action="" method = "post">
            <table class="tbl-30">

                <tr>
                    <td>User Name : </td>
                    <td>
                        <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td>User Email : </td>
                        <td>
                            <input type="text" name="email" value="<?php echo $email; ?>">
                        </td>
                    </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" class="btn-secondary" name="submit" value="Update User">
                    </td>
                </tr>

            </table>
       </form>
    </div>
</div>


<?php
    //check botton
    if(isset($_POST['submit'])){
        
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];

        //sql to update user
        $sql = "UPDATE users SET usersUid = '$username', 
        usersEmail = '$email' 
        WHERE usersId = '$id'";

        $result = mysqli_query($conn, $sql);

        if($result == true)
        {
            $_SESSION['update'] = "<div class='success'>User updated successfully</div>";
            header("Location: manage.admin.php");
        }
        else
        {
            $_SESSION['update'] = "<div class='error'>Failed to update user</div>";
            header("Location: manage.admin.php");
        }

    }
?>

<?php include 'footer.php'; ?>


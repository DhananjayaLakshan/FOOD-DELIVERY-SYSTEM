<?php
    include 'header.php';
?>

    <!--main content secsion start-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Users</h1>

            <?php

                if(isset($_SESSION['add']))
                {
                    echo "<br>";                 
                    echo $_SESSION['add'];//display session msg
                    unset ($_SESSION['add']);//removing session msg                   
                }

                if(isset($_SESSION['delete']))
                {
                    echo "<br>";
                    echo $_SESSION['delete'];//display session msg
                    unset ($_SESSION['delete']);//removing session msg
                }

                if(isset($_SESSION['update']))
                {
                    echo "<br>";
                    echo $_SESSION['update'];//display session msg
                    unset ($_SESSION['update']);//removing session msg
                }

                if(isset($_SESSION['updatePwd']))
                {
                    echo "<br>";
                    echo $_SESSION['updatePwd'];//display session msg
                    unset ($_SESSION['updatePwd']);//removing session msg
                }


            ?>
            
            <br><br>
            <a href="adduser.php" class="btn-primary">Add User</a>
            <br><br><br>

            <table class="tbl-full">
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>Action</th>
                </tr>

                <?php
                    //SQL to get all users
                    $sql = "SELECT * FROM users";
                    $result = mysqli_query($conn,$sql);

                    $countId = 1; //create a variable and assign the value

                    //check whether the query is executed or not
                    if ($result == true)
                    {
                        //count rows to check whether we have data in database or not
                        $count = mysqli_num_rows($result);//functioons to get all the rows in database

                        //check the number of rows
                        if($count > 0)
                        {
                            //we have data
                            while($rows = mysqli_fetch_assoc($result))
                            {
                                //using while loop get all the data in database

                                //Get indvidual data
                                $id = $rows['usersId'];
                                $username = $rows['usersUid'];
                                $usersEmail = $rows['usersEmail'];

                                //Dispaly the values in our table
                                ?>
                                <tr>
                                    <td><?php echo $countId++; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td><?php echo $usersEmail; ?></td>
                                    
                                    <td>
                                        <a href="update-password.php?id=<?php echo $id; ?>" class="btn-chpss">Change password</a>
                                        <a href="update-user.php?id=<?php echo $id; ?>" class="btn-secondary">Update user</a>
                                        <a href="delete-user.php?id=<?php echo $id; ?>" class="btn-delete">Delete user</a>
                                    </td>                
                                </tr>

                                <?php
                            }
                        }
                        else 
                        {
                            //we dont have data
                        }
                    }

                ?>

            </table>
        </div>
    </div>
    <!--main content secsion end-->
<?php
    include 'footer.php';
?>
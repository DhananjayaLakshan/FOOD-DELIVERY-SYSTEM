<?php
    session_start();
    include_once "../includes/dbh.inc.php";
    $userMail = $_SESSION['usersession'];
    $sqli = "SELECT * from users where usersEmail ='{$userMail}' OR usersUid = '{$userMail}' ;";
    $result = mysqli_query($conn ,$sqli );
    $record = mysqli_fetch_assoc($result); 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile settings</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <script src="https://use.fontawesome.com/7094dcb181.js"></script>
    <script>
            function myFunction5() {
                document.getElementById('update_feild4').style.cssText = 'display:none;';
                document.getElementById('update_feild1').style.cssText = 'display:none;';
                document.getElementById('update_feild2').style.cssText = 'display:none;';
                document.getElementById('update_feild3').style.cssText = 'display:none;';
                document.getElementById('update_feild5').style.cssText = 'display:block;';
            }

            function myFunctionclose5() {
                document.getElementById('update_feild5').style.cssText = 'display:none;';
            }
    </script>
</head>
<body>
    <div class="container">
        <h1>Profile settings</h1>
        <img src="<?php echo $record['profile_pic']; ?>" alt="">
        <ul>
            <li onclick="myFunction1()" ondblclick="myFunctionclose1()" >Change email <i class="fa fa-envelope" aria-hidden="true"></i></li>
            <li onclick="myFunction2()" ondblclick="myFunctionclose2()">Change User Name <i class="fa fa-user" aria-hidden="true"></i></li>
            <li onclick="myFunction3()" ondblclick="myFunctionclose3()">Change Password <i class="fa fa-key" aria-hidden="true"></i></li>
            <li onclick="myFunction4()" ondblclick="myFunctionclose4()">Add profile Picture <i class="fa fa-user-md" aria-hidden="true"></i></li>
            <li onclick="myFunction5()" ondblclick="myFunctionclose5()">Delete My Account<i class="fa fa-trash" aria-hidden="true"></i></li>
            <li onclick="location.href='../details/detail.php'">Back <i class="fa fa-home" aria-hidden="true"></i></li>
            
        </ul>

        <div class="update_email" id="update_feild1">
            <form action="updateEmail.php" method="post">
                <h2>Update Email</h2>
                <label>Email:</label>
                <input type="email" name="newEmail">
                <input type="submit" name="submit"  class="btn" onclick="fun1('change_email')">
            </form>
        </div>

        <div class="update_email" id="update_feild2">
            <form action="updateUsername.php" method="post">
                <h2>Update Username</h2>
                <label>Username:</label>
                <input type="text" name="newUserName">
                <input type="submit" value="Update" name="submit" class="btn" onclick="fun2('change_username')">
            </form>
        </div>

        <div class="update_email" id="update_feild3">
            <form action="updatePassword.php" method="post">
                <h2>Update Password</h2>
                <label>Password:</label>
                <input type="password" name="password">
                <input type="submit" value="Update" name="submit" class="btn" onclick="fun3('change_password')">
            </form>
        </div>

        <div class="update_email" id="update_feild4">
            <form action="profileimage.php" method="post" enctype="multipart/form-data">
                <h2>Update Profile Picture</h2>
                <label>Profile <Picture></Picture>:</label>
                <input type="file" name="file">
                <input type="submit" value="Update" name="submit4" class="btn" onclick="fun4('change_photo')">
            </form>
        </div>

        <div class="update_email" id="update_feild5">
            <form action="deleteaccount.php" method="post">
                <h2>Delete My Account</h2>
                <input type="submit" value="Delete" name="submit5" class="btn" onclick="fun5('account_deleted')">
            </form>
        </div>
    </div>
</body>
</html>
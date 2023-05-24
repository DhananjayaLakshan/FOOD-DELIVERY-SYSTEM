
<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up-pizza Way</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>

        <div class="center">
            <h1>Sign Up</h1>
            <form action="../includes/signup.inc.php" method="post">

                <div class="txt_field">
                    <input  type="text"         name="uid"          required style="color: white;">
                    <span ></span>
                    <label>User Name</label>
                </div>
                
                <div class="txt_field">
                    <input  type="text"          name="email"        required style="color: white;" >
                    <span ></span>
                    <label>Email</label>
                </div>
                
                <div class="txt_field">
                    <input  type="password"      name="pwd"          required  style="color: white;">
                    <span></span>
                    <label>Password</label>
                </div>
                
                <div class="txt_field">
                    <input  type="password"      name="pwdrepeat"    required style="color: white;">
                    <span></span>
                    <label>Re Enter Password</label>
                </div>
                
                <input  type="submit"             name="submit" value="SignUp" style="border:none ;">

                <?php
                if(isset($_GET["error"])){
                    if($_GET["error"] == "emptyinput" ){
                        echo '<div class="errormsg">';
                        echo '<p>Fill in all fields!</p>';
                        echo '</div>';

                    }else if($_GET["error"] == "invaliduid" ){
                        echo '<div class="errormsg">';
                        echo '<p>Choose a proper username!</p>';
                        echo '</div>';
                        }
                    else if($_GET["error"] == "invalidemail" ){
                        echo '<div class="errormsg">';
                        echo '<p>Choose a proper email!</p>';
                         echo '</div>';
                        }
                    else if($_GET["error"] == "passwordmissmatch" ){
                        echo '<div class="errormsg">';
                        echo '<p>Passwords are missed matcched!</p>';
                        echo '</div>';
                        }
                    else if($_GET["error"] == "stmtfailed" ){
                        echo '<div class="errormsg">';
                        echo '<p>something went wwrong, try again!</p>';
                        echo '</div>';
                        }
                    else if($_GET["error"] == "usernametaken" ){
                        echo '<div class="errormsg">';
                        echo '<p>Username already taken!</p>';
                        echo '</div>';
                        }
                    else if($_GET["error"] == "none" ){
                        echo '<div class="successmsg">';
                        echo '<p>You have signed up</p>';
                        echo '</div>';
                        }   
                    
                }
                
                ?>
                
                <div class="signup_link">
                Already Have An Account? <a href="../main/main.php#learnMore">Login Now</a>
                </div>
                
                <div class="signup_link">
                    Back to Home : <a href="../main/main.php">Home</a>
                </div>
            </form>
        </div>
</body>
</html>
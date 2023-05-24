<?php
    session_start();
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Way</title>
    <link rel="stylesheet" href="main.css">
    <script src="main.js"></script>
    <script src="https://use.fontawesome.com/7094dcb181.js"></script>
    <script src="../profile_settings/script.js"></script>
    
    
</head>
<body>

<div>
    <!------------------------------------------------------------------------------------>
    <!-------------Html For navigation Bar------------>
    <div class="nav">
        <h2>Pizza Way</h2>
        <ul id="items">
            <li><a href="#">Home</a></li>
            <li><a href="#aboutUs">About Us</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
    </div>

    <!------------------------------------------------------------------------------------>
    <!-------------Html For Background------------>

    <div class="back">
        <div class="overlay">

        </div>
    </div>

    <!------------------------------------------------------------------------------------>
    <!-------------Html section 01 ------------>

    <div class="mid">
        <p>
            At Pizza Way, we don’t just make pizza. We make people happy.</p>
            <h2>Pizza Way<br>Make You Happy</h2>
            <div class="btn">
                <a class="simple" href="#learnMore">Order Now</a>
                <a class="border" href="#learnMore">LOGIN</a>
            </div>
    </div>

    <!------------------------------------------------------------------------------------>
    <!-------------Html section 02 ------------>

    <div class="details" id="learnMore">
        <div class="one">
            <h3>New To PizzaWay?</h3>
            <h6>Join us and Get more benifits form us. Keep Your smile every day.</h6>
            <p>We try to give a bettere exprence form our resturant.pizza, dish of Italian origin consisting of a flattened disk of bread dough topped with some combination of olive oil, oregano, tomato, olives, mozzarella or other cheese, and many other ingredients</p>
            <a href="../signup/signup.php">Become a Member today</a>
        </div>
        <!-------------------------------------------login form------------------------------------->
     
    
        <div class="two">
            <div class="center">
                <h1>Login</h1>

                <form action="../includes/login.inc.php"  method="post">
                  <div class="txt_field">
                    <input type="text"   name="uid" required id="uname" style="color: white;">
                        <span></span>
                        <label>Email</label>
                        </div>
                        <div class="txt_field">
                            <input type="password" name ="pwd" required id="password_" style="color: white;">
                            <span></span>
                            <label>Password</label>
                        </div>
                        <br>
                        <input type="submit" name="submit" value="Login" onclick="storeUserData()" style="border:none ;">
            
                        <div class="signup_link">
                            Not a member? <a href="../signup/signup.php">Signup</a>
                  </div>
                </form>

                <?php
                if(isset($_GET["error"]))                
                {
                    if($_GET["error"] == "emptyinput" )
                    {
                        echo '<div class="errormsg">';
                        echo '<p>Fill in all the feilds</p>';
                        echo '</div>';

                    }
                    else if($_GET["error"] == "wronglogin" )
                    {
                        echo '<div class="errormsg">';
                        echo '<p>Incorrect logging Information</p>';
                        echo '</div>';
                    }
                }
                ?>
                
              </div>
        </div>
    </div>

    <!------------------------------------------------------------------------------------>
    <!-------------Html section 03 ------------>

    <div class="chef" id="aboutUs">
        <div class="about">
            <h2>Hello,We Are Pizza Way</h2>
            <p>A chef is responsible for preparing and cooking food and provides leadership for the kitchen staff. 
                Chefs will maintain relationships with vendors and might be in charge of ordering the restaurant's weekly food supply. 
                They might create new menu items and work with the general manager to set business goals.
                <br><br>
                Chefs and head cooks oversee the daily food preparation at restaurants and other places where food is served. They direct kitchen staff and handle any food-related concerns.
            </p>
        </div>
        <div class="people">
            <div class="team1">
                <div class="img">
                    <img src="images/chef1.jpg" alt="chef01" height="300px">
                </div>
                <div class="teamDetails">
                    <div class="name">
                        <h4>Devid Getter</h4>
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </div>
                    <div class="pro">
                        <p>Heaad Chef</p>
                        <i class="fa fa-male" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="team1">
                <div class="img">
                    <img src="images/chef2.jpg" alt="chef01" height="300px">
                </div>
                <div class="teamDetails">
                    <div class="name">
                        <h4>Emma Wotson</h4>
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </div>
                    <div class="pro">
                        <p>Quality Chef</p>
                        <i class="fa fa-female" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------------------------------------------>
    <!-------------Html section 04 ------------>

    <div class="class" id="products">
        <p class="para">We Have Diffrant Types Of Foods And Drinks</p>
        <h2 class="h2">Catagories</h2>
        <div class="classMenu">
            <div class="team1">
                <div class="img">
                    <img src="images/nonvegi.jpg" alt="chef01" height="180px">
                </div>
                <div class="teamDetails">
                    <div class="name">
                        <div class="nameDetails">
                            <h4>Non Vegi Pizza</h4>
                            <p>Only contain fresh checken and seafood with cheese</p>
                        </div>
                       
                    </div>
                    <div class="pro">
                        <p>High Quality <br> High clearly</p>
                    </div>
                </div>
            </div>
            <div class="team1">
                <div class="img">
                    <img src="images/vegi.jpg" alt="chef01" height="200px">
                </div>
                <div class="teamDetails">
                    <div class="name">
                        <div class="nameDetails">
                            <h4>Vegi Pizza</h4>
                            <p>Only contain fresh vegitables</p>
                        </div>
                       
                    </div>
                    <div class="pro">
                        <p>High Quality <br> High clearly</p>
                    </div>
                </div>
            </div>
            <div class="team1">
                <div class="img">
                    <img src="images/soft.jpg" alt="chef01" height="200px">
                </div>
                <div class="teamDetails">
                    <div class="name">
                        <div class="nameDetails">
                            <h4>Soft Drinks</h4>
                            <p>Pepsi , Coca cola</p>
                        </div>
                       
                    </div>
                    <div class="pro">
                        <p>High Quality <br> High clearly</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!------------------------------------------------------------------------------------>
    <!-------------Html section 05 ------------>

    <div class="contact" id="contact">
        <div class="form">
            <h2>Feel Free to Ask</h2>
            <form class="submit" onsubmit="sendEmail(); reset() ; return false;">
            <input type="text" id="name" placeholder="Your Name" required>
            <input type="email" id="email" placeholder="abc@gmail.com" required>
            <input type="text" id="phone" placeholder="07xxxxxxx" required>
            <textarea id="message" rows="4" placeholder="How Can We Help You"></textarea>
            <button type="submit">Send Now</button>
            </form>
        </div>
        <div class="findUs">
            <h2>Find Us On Map</h2>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>Kurunegala</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.804267424217!2d80.36092201429358!3d7.486852598570582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae33a1e3202d11b%3A0x9616d94dececef18!2sKurunegala%20Clock%20Tower!5e0!3m2!1sen!2slk!4v1664657332218!5m2!1sen!2slk" width="450" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    
    <!--foter-->
    <div class="end">
        <br>
        <div class="persons">
            <h1>Developed By </h1>
            <div class="person1">
                <h2>Dhananjaya Lakshan</h2><br><br>
                    <div class="full_detail">
                        <img src="images/a.jpg" alt="" width="80" height="80" style="border-radius:5px">
                    <div class="dev_details">
                        <p>Student ID:IT21834806</p><br>
                        <p>Tel : 0775843047</p><br>
                        <div class="social">
                            <i class="fa fa-facebook" aria-hidden="true"style="padding-right: 10px; cursor:pointer;"></i>
                            <i class="fa fa-twitter" aria-hidden="true" style="padding-right: 10px;"></i>
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </div>
                    </div>
            </div>
                
            </div>
            <div class="person2">
                <h2>Sachin Uthpala</h2><br><br>
                <div class="full_detail">
                    <img src="images/sachin.jpg" alt="" width="80" height="80" style="border-radius:5px">
                    <div class="dev_details">
                        <p>Student ID:IT21838620</p><br>
                        <p>Tel : 0762712200</p><br>
                        <div class="social">
                            <i class="fa fa-facebook" aria-hidden="true" style="padding-right: 10px;"></i>
                            <i class="fa fa-twitter" aria-hidden="true" style="padding-right: 10px;"></i>
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pizzaway_details">
            <h1>Pizza Way</h1><br>
            <p>Taset is life....</p><br>
            <h4>Follow Us On ></h4>
            <div class="icon">
                <a href="https://www.facebook.com/profile.php?id=100085624304385"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="https://twitter.com/Pizza_way123"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/pizza_way123/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
            <div class="images">
                <img src="images/images.jpeg" alt="" width="220" height="170" style="border-radius:5px;padding-right:10px;">
                <img src="images/images1.jpeg" alt="" width="220" height="170" style="border-radius:5px;">
            </div>
        </div>
    </div>

    <script src="https://smtpjs.com/v3/smtp.js"></script>
</body>
</html>

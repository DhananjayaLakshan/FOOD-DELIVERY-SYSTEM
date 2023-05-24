<?php
    session_start();
    $userMail = $_SESSION['usersession'];
    include_once "../includes/dbh.inc.php";
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
    <title>Store</title>
    <script src="https://use.fontawesome.com/7094dcb181.js"></script>
    <script src="detail.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="detail.css">
</head>
<body>
    <!------------------------------------------------------------------------------------>
    <!-------------Html For navigation Bar------------>
    <div class="nav">
        <ul id="items">
        <li><a href="#">HOME</a></li>
        <?php 
            $sql1 = "SELECT * FROM tbl_category WHERE active='Yes'";

            $ress = mysqli_query($conn, $sql1);

            $count1 = mysqli_num_rows($ress);

            if($count1 > 0 ){

                while($row = mysqli_fetch_assoc($ress))
                {
                    $category_id = $row['id'];
                    $cgrytitle = $row['title'];
                    $active = $row['active'];

                

                    if($cgrytitle == "Drinks"){

                        echo '<li><a href="#drinks"> Drinks </a></li>';
                        $_SESSION['getdrinkid']=$category_id;
                        //$_SESSION['getdrink']=$cgrytitle;

                    } else if($cgrytitle == "None vege"){

                        echo '<li><a href="#non_vegi"> Non vege </a></li>';
                        $_SESSION['getNonvegeid']=$category_id;
                        //$_SESSION['getNonvege']=$cgrytitle;


                    }else if($cgrytitle == "Vege"){

                        echo '<li><a href="#vegi"> vege </a></li>';
                        $_SESSION['getVegeid']=$category_id;
                        //$_SESSION['getVege']=$cgrytitle;


                    }else
                    {
                        echo '<li><a href="#"> None </a></li>';
                    }

                
                }
            }  
            
            ?>
            <li><a href="cart.php">CART</a></li>
            
        </ul>
        <!-------------------------------------------------------------------------------------->
       <!-- <div class="social">
            <i class="fa fa-facebook" aria-hidden="true"></i>
            <i class="fa fa-twitter" aria-hidden="true"></i>
            <i class="fa fa-instagram" aria-hidden="true"></i>
        </div> -->
        <!-------------------------------------------------------------------------------------->
        <div class="profile" >
        <i class="fa fa-search" aria-hidden="true" style="font-size:20px;color:#fff;" onclick="openSeacrch()"></i>

            <img src="<?php echo $record['profile_pic']; ?>" alt="" onclick="openForm()" >
            <h2 style="padding-left:10px;cursor:pointer;" onclick="openForm()"><?php echo $record['usersUid']; ?></h2>
        </div>
    </div>

    <!-------------------------------------------------------------------------------------->
        <!-------------------------search bar------------------------------>
        <div class="searchItems" id="search">
            <center><h2 style="color:#fff;padding-top:30px;">Search Now...</h2></center>
            <form action="#" method="get">
                <input type="text" name="" id="">
                <button type="submit"><i class="fa fa-search" aria-hidden="true" style="font-size:20px;color:#fff;" ></i></button><br><br><br>
                <input type="button" value="Close" style="background-color:rgb(255, 0, 21);color:#fff;cursor:pointer;" onclick="hideSearch()">
            </form>
        </div>

        <!-------------------------------------------------------------------------------------->
        <!-------------------------search bar end------------------------------>

    <!----------------------------------------------------------------------------------->
    <!------------------------------Pop up profile box--------------------------->
    <div class="popup_profile" id="myForm">
        <h2><?php print_r($record['usersUid']); ?></h2>
        <br>
        <img src="<?php echo $record['profile_pic']; ?>" alt=""><br><br>
        <p style="color:#fff;">Email</p><br>
        <p><?php print_r($record['usersEmail']); ?></p><br>
        <p style="color:#fff;">Member Science</p><br>
        <p>2020.20.20</p>
        <button type="button" class="logout" onclick="location.href='../main/main.php';window.localStorage.clear();">LOG OUT</button><br>
        <button type="button" class="logout" onclick="location.href='../profile_settings/profilesettings.php'">Profile Settings</button>
        <button type="button" class="btn-cancel" onclick="closeForm()">Close</button>
    </div>


    <!---------------------------------------------------------------------------------->
    <!------------------------------------------------------------------------------------>
    <!-------------Html For Background------------>

    <div class="back">
        <div class="overlay">

        </div>
    </div>

    <!------------------------------------------------------------------------------------>
    <!-------------Html section 02 ------------>

    <div class="mid">
        <h2 style="text-align:center;">Pizza Way<br>Make You Happy</h2>
        <p style="text-align:center;" class="p1">These are some customer reiveiws</p>
        <div class="review">
            <!-------------------------------reveiw 1---------------------------------->
            <div class="per1">
                <div class="intro">
                    <img src="images/per2.webp" alt="">
                    <h3>Anisha Frenando</h3>
                </div>
                <br>
                <div class="rate">
                    <div class="star_rate">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                    </div><br>
                    <p>This is one of the most best resturant I ever sea</p>
                    
                </div>
                
            </div>
            <!-------------------------------reveiw 2---------------------------------->
            <div class="per1">
                <div class="intro">
                    <img src="images/per1.jpg" alt="">
                    <h3>Devid etter</h3>
                </div>
                <div class="rate">
                    <div class="star_rate">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div><br>
                    <p>This is one of the most best resturant I ever sea</p>
                    
                </div>
            </div>

            <!-------------------------------reveiw 3---------------------------------->
            <div class="per1">
                <div class="intro">
                    <img src="images/per3.jpg" alt="">
                    <h3>Kavindi Perera</h3>
                </div>
                <div class="rate">
                    <div class="star_rate">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div><br>
                    <p>This is one of the most best resturant I ever sea</p>
                    
                </div>
            </div>
        </div>
    </div>


    <!-------------------------Section 02---------------------------------------------->
    <!--==================NON-VEGI SECTION=========================================-->

    <div class="non_vegi" id="non_vegi">
        <h2 class="topic">NON - VEGI PIZZA</h2>
        <p class="dis">We have all kind of non vagi pizza</p>
        <div class="shop">
     
           
       

            <?php 
                $nonVege=$_SESSION['getNonvegeid'];

                $sql = "SELECT * FROM tbl_food WHERE category_id=$nonVege AND active='Yes'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0 )
                {
                    

                    while($row = mysqli_fetch_assoc($res))
                    {
                        $food_id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $category_id = $row['category_id'];
                        $active = $row['active'];
                       
                        
                        ?>
                        
                            <div class="item">
                            <center>
                               <img src="images/food/<?php echo $image_name; ?>" width="auto" height="170px">
                            </center>
                                <div class="details">
                                    <h3><?php echo $title; ?></h3>
                                    <p><?php echo $description; ?></p>
                                        <div class="price">
                                            <h3><?php echo "Rs. ". $price; ?></h3><br>
                                            <form action="cart.php" method="post">
                                                <?php 
                                                    $sql1 = "SELECT * FROM users";

                                                    $res1 = mysqli_query($conn, $sql1);
                                    
                                                    $count1 = mysqli_num_rows($res1);
                                    
                                                    if($count1 > 0 )
                                                    {                                                                                           
                                                        while($row1 = mysqli_fetch_assoc($res1))
                                                        {
                                                            $userID = $row1['usersId'];
                                                            $_SESSION['nameID'] =  $userID;
                                                        }
                                                    } 
                                                   $userID = $_SESSION['usersession'];   
                                                ?>
                                                <input type="hidden" name="food_id"     value="<?php echo $food_id; ?>">
                                                <input type="hidden" name="title"       value="<?php echo $title; ?>">
                                                <input type="hidden" name="price"       value="<?php echo $price; ?>">
                                                <input type="hidden" name="image_name"  value="<?php echo $image_name; ?>">                                            
                                                <input type="hidden" name="username"    value="<?php echo $userMail; ?>">

                                                <input class="addcart" type="submit" name="submitaddcart"      value="ADD TO CART">                                                
                                            </form>
                                            
                                        </div>
                                </div>
                            </div>
        
                        <?php
        
                    }
                }

                else
                {
                    echo "<h2>No food added</h2>";
                }
            
            ?>
        



           
        </div>
    </div>

        <!--==================END OF NON-VEGI SECTION=========================================-->
        <!--==================================================================================--->

        <!--==================END OF VEGI SECTION=========================================-->

    <div class="non_vegi" id="vegi">
        <h2 class="topic">VEGI PIZZA</h2>
        <p class="dis">We have all kind of vegitable pizza</p>
        <div class="shop">
        <?php 
                $nonVege=$_SESSION['getVegeid'];

                $sql = "SELECT * FROM tbl_food WHERE category_id=$nonVege AND active='Yes'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0 )
                {

                    while($row = mysqli_fetch_assoc($res))
                    {
                        $food_id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $category_id = $row['category_id'];            
                        $active = $row['active'];
                        
                        ?>
                        
                            <div class="item">
                            <center>
                               <img src="images/food/<?php echo $image_name; ?>" width="auto" height="170px">
                            </center>
                                <div class="details">
                                    <h3><?php echo $title; ?></h3>
                                    <p><?php echo $description; ?></p>
                                        <div class="price">
                                            <h3><?php echo "Rs. ". $price; ?></h3><br>
                                            <form action="cart.php" method="post">
                                                <?php 
                                                    $sql1 = "SELECT * FROM users";

                                                    $res1 = mysqli_query($conn, $sql1);
                                    
                                                    $count1 = mysqli_num_rows($res1);
                                    
                                                    if($count1 > 0 )
                                                    {                                                                                           
                                                        while($row1 = mysqli_fetch_assoc($res1))
                                                        {
                                                            $userID = $row1['usersId'];

                                                        }
                                                    }     
                                                ?>
                                                <input type="hidden" name="food_id"     value="<?php echo $food_id; ?>">
                                                <input type="hidden" name="title"       value="<?php echo $title; ?>">
                                               
                                                <input type="hidden" name="price"       value="<?php echo $price; ?>">
                                                <input type="hidden" name="image_name"  value="<?php echo $image_name; ?>">                                            
                                                <input type="hidden" name="username"    value="<?php echo $userID; ?>">

                                                <input class="addcart" type="submit" name="submitaddcart"      value="ADD TO CART">                                                
                                            </form>
                                        </div>
                                </div>
                            </div>
        
                        <?php
        
                    }
                }

                else
                {
                    echo "<h2>No food added</h2>";
                }
            
            ?>
        
        
        </div>
    </div>


    <!--==================END OF NON-VEGI SECTION=========================================-->
        <!--==================================================================================--->

        <!--==================END OF VEGI SECTION=========================================-->

    <div class="non_vegi" id="drinks">
        <h2 class="topic">DRINKS</h2>
        <p class="dis">We have fanta sprite coca-cola</p>
        <div class="shop">
        <?php 
                $nonVege=$_SESSION['getdrinkid'];

                $sql = "SELECT * FROM tbl_food WHERE category_id=$nonVege AND active='Yes'";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res);

                if($count > 0 )
                {

                    while($row = mysqli_fetch_assoc($res))
                    {
                        $food_id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                        $category_id = $row['category_id'];
                        $active = $row['active'];
                        
                        ?>
                        
                            <div class="item">
                            <center>
                               <img src="images/food/<?php echo $image_name; ?>" width="auto" height="170px">
                            </center>
                                <div class="details">
                                    <h3><?php echo $title; ?></h3>
                                    <p><?php echo $description; ?></p>
                                        <div class="price">
                                            <h3><?php echo "Rs. ". $price; ?></h3><br>
                                            <form action="cart.php" method="post">
                                                <?php 
                                                    $sql1 = "SELECT * FROM users";

                                                    $res1 = mysqli_query($conn, $sql1);
                                    
                                                    $count1 = mysqli_num_rows($res1);
                                    
                                                    if($count1 > 0 )
                                                    {                                                                                           
                                                        while($row1 = mysqli_fetch_assoc($res1))
                                                        {
                                                            $userID = $row1['usersId'];

                                                        }
                                                    }     
                                                ?>
                                                <input type="hidden" name="food_id"     value="<?php echo $food_id; ?>">
                                                <input type="hidden" name="title"       value="<?php echo $title; ?>">
                                                
                                                <input type="hidden" name="price"       value="<?php echo $price; ?>">
                                                <input type="hidden" name="image_name"  value="<?php echo $image_name; ?>">                                            
                                                <input type="hidden" name="username"    value="<?php echo $userID; ?>">

                                                <input class="addcart" type="submit" name="submitaddcart"      value="ADD TO CART">                                                
                                            </form>
                                        </div>
                                </div>
                            </div>
        
                        <?php
        
                    }
                }

                else
                {
                    echo "<h2>No food added</h2>";
                }
            
            ?>
        </div>
    </div>



    </div>
    <!--fotter -->
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
                    <img src="../main/images/sachin.jpg" alt="" width="80" height="80" style="border-radius:5px">
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
                <img src="../main/images/images.jpeg" alt="" width="220" height="170" style="border-radius:5px;padding-right:10px;">
                <img src="../main/images/images1.jpeg" alt="" width="220" height="170" style="border-radius:5px;">
            </div>
        </div>
    </div>

</body>

</html>
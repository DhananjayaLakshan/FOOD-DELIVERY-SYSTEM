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

    <title>My Cart</title>
   
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="detail.css">
    <script src="https://use.fontawesome.com/7094dcb181.js"></script>
    <script src="detail.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>

<div class="nav">
        <ul id="items">
        <li><a href="detail.php">HOME</a></li>
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

                        echo '<li><a href="detail.php#drinks"> Drinks </a></li>';
                        $_SESSION['getdrinkid']=$category_id;  

                    } else if($cgrytitle == "None vege"){

                        echo '<li><a href="detail.php#non_vegi"> Non vege </a></li>';
                        $_SESSION['getNonvegeid']=$category_id;

                    }else if($cgrytitle == "Vege"){

                        echo '<li><a href="detail.php#vegi"> vege </a></li>';
                        $_SESSION['getVegeid']=$category_id;

                    }else
                    {
                        echo '<li><a href="#"> None </a></li>';
                    }

                
                }
            }  
            
            ?>
            <li><a href="cart.php">CART</a></li>
            
        </ul>
       
   
       
        <div class="profile" >
            <img src="<?php echo $record['profile_pic']; ?>" alt="" onclick="openForm()" >
            <h2 style="padding-left:10px;cursor:pointer;" onclick="openForm()"><?php echo $record['usersUid']; ?></h2>
        </div>
    </div>

    <div class="seacrch" id="search">
            <input type="text" name="" id="" class="search_feild" >
            <button  type="submit"><i class="fa fa-search" aria-hidden="true" ></i></button>
            <button  type="submit" onclick="hideSearch()"><i class="fa fa-times" aria-hidden="true" ></i></button>
        </div>
        
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

<div class="small-container cart-page">
    <?php
        if(isset($_POST['submitaddcart']))
        {
            $food_id = $_POST['food_id'];
            $title = $_POST['title'];
            $price = $_POST['price'];
            $image_name = $_POST['image_name'];
            //$username = $_POST['username'];
            $userMail = $_SESSION['usersession'];
            
            $sql2 = "INSERT INTO cart (food_id, food_title, price, food_image_name, username) 
                    VALUES ($food_id,'$title', $price, '$image_name', '$userMail')";
            
            $result3 = mysqli_query($conn, $sql2);
        }

    ?>
        <table>

<tr>
    <th>Product</th>
    <th>Quantity</th>
    <th>Subtotal</th>
</tr>

           
<?php
            
                
                $userMail = $_SESSION['usersession'];
                $sqll = "SELECT * FROM cart WHERE username='$userMail'";
                $resultss = mysqli_query($conn, $sqll);
                $countt = mysqli_num_rows($resultss);
               
                if($countt > 0)
                {
                   
                    while ($roww=mysqli_fetch_assoc($resultss))
                    {
                        $foodid     = $roww['food_id'];
                        $foodtitle  = $roww['food_title'];
                        $foodprice  = $roww['price'];
                        $image      = $roww['food_image_name'];
                        $uid        = $roww['username'];
                     
                        ?>
                        <tr>

                        <td>
                            <div class="cart-info">
                                <img src="../details/images/food/<?php echo $image;?>">
                                <div class="info">;
                                    <p><?php echo $foodtitle;?></p>
                                    <small><?php echo "Rs. ".$foodprice;?></small>
                                    <br>
                                    <a href="delete.php?foodid=<?php echo $foodid;?>" name="remove">Remove</a>
                                </div>
                            </div>
                            </td>
                            <form action="quantity.php" method="post">
                                
                            <td>
                                <input type="hidden" name="price" value="<?php echo $foodprice;?>">
                                <input type="number" name="quantity" value="1" min="1">
                                <input type="submit" name="qq" value="submit" style="padding:1%; width:50px;">
                            </td>
                            </form>
                            <td><?php  echo $_SESSION['calQuantity'] ?></td>

                            </tr>  
                        <?php
                               
                    }
                }   
                
    ?>            
</table>					

<div class="total-price">
<table>
    <tr>
        <td>Total</td>
        <td><?php  echo $_SESSION['calQuantity'] ?></td>
        
    </tr>

    <tr style=" display: flex;"><td><button class="checkout" onclick="location.href='../payment/payment.php'">CHECKOUT</button></td></tr>

</table>
    
</div>   

<br><br><br><br><br><br><br><br><br><br><br><br><br>
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
                        <p>Student ID:IT218348010</p><br>
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
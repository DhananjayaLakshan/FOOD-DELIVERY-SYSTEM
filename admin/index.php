<?php
    include 'header.php';
?>

    <!--main content secsion start-->
    <div class="main-content">
        <div class="wrapper">
            <h1>DASHBOARD</h1>
        

            <div class="col-4">
                <?php
                    $sql = "SELECT * FROM users";

                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);
                ?>

                <h1><?php echo $count; ?></h1>
                <br>
                USERS
            </div>

            <div class="col-4">
                <?php
                    $sql1 = "SELECT * FROM tbl_category";

                    $result1 = mysqli_query($conn, $sql1);
                    $count1 = mysqli_num_rows($result1);
                ?>

            <h1><?php echo $count1; ?></h1>
                <br>
                CATEGORIES
            </div>

            
            <div class="col-4">
                <?php
                    $sql2 = "SELECT * FROM tbl_food";

                    $result2 = mysqli_query($conn, $sql2);
                    $count2 = mysqli_num_rows($result2);
                ?>

            <h1><?php echo $count2; ?></h1>
                <br>
                FOOD ITEMS
            </div>

            <div class="col-4">

                 <?php
                    $sql4 = "SELECT * FROM cart";

                    $result4 = mysqli_query($conn, $sql4);
                    $count4 = mysqli_num_rows($result4);
                ?>
            

                <h1><?php echo $count4; ?></h1>

                <br>

                ORDERS
                
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--main content secsion end-->

    

<?php
    include 'footer.php';
?>
<?php
    include 'header.php';
?>

    <!--main content secsion start-->
    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Order</h1>
            <br><br>
            

            

            <table class="tbl-full">

            
                <tr>
                    <th>Image</th>
                    <th>Food name</th>
                    <th>Price</th>
                    <th>User Name</th>
                   
                </tr>

                <?php 
                    $sql = "SELECT * FROM cart";
                    $result = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($result);

                    if($count > 0)
                    {
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $name = $row['food_title'];
                            $price = $row['price'];
                            $imgName = $row['food_image_name'];
                            $userName = $row['username'];
                            ?>
                            <tr>
                            <td><img width="100px" src="../details/images/food/<?php echo $imgName;?>"></td>
                            <td><?php echo $name;?></td>
                            <td><?php echo $price;?></td>
                            <td><?php echo $userName;?></td>
                            <td>
                                <a href="delete-order.php?id=<?php echo $id;?>" class="btn-delete">Delete</a>
                            </td>   
                        </tr>
                        <?php
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
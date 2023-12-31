<?php
@include 'config.php';

session_start();

if(!isset( $_SESSION['user_name'] )){
    header('location:Sign-In.php');
}

if(isset($_POST['add_to_cart'])){
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_asal = $_POST['product_asal'];
  $product_image = $_POST['product_image'];
  $product_quantity = 1;

  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

  if(mysqli_num_rows($select_cart) > 0){
    header('location:checkout.php');
  }else{
    $insert_product = mysqli_query($conn, "INSERT INTO `cart` (name, price, asal, image, quantity) VALUES('$product_name', '$product_price', '$product_asal', '$product_image', '$product_quantity')");
  }
}







?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Zen+Kaku+Gothic+Antique:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="user.css"/>
    <title>User Page</title>
  </head>
  <body>
    <nav>
      <div class="container">
        <div class="nav-logo">
          <img src="../image/Groceriess-box.png" width="50" style="margin-right: 20px" alt="" srcset="" />
          <h2 class="Head">Groceriess</h2>
        </div>
        
        <form action="" method="GET">
        <div class="search-bar">
          <i class="uil uil-search"></i>
         
          <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" placeholder="Find what u want" size="80" />
          <button type="submit" name="submit"></button>
          
        </div>
        </form>
        
        <div class="icon-cart">
          <?php 
            
            $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
            $row_count = mysqli_num_rows($select_rows);

            ?>
          <a href="checkout.php"><i class="uil uil-shopping-cart"></i>
          <span><?php echo $row_count; ?></span></a>
          
        </div>
        <div class="button">
          <div class="btn-1">Welcome <span class="nama-user"><?php echo $_SESSION['user_name']  ?></span></div>
          <div class="btn-2"><a href="Sign-In.php">Log-Out</a></div>
        </div>
      </div>
    </nav>


 
    <div class="back">
    <a href="user-page.php">back to beranda</a>
    </div>
    <div class="container-content">
        
    <?php 
     $conn = mysqli_connect("localhost","root","","user_db");
        if(isset($_GET['search']))
        {
            $filtervalues = $_GET['search'];
            $query = "SELECT * FROM products WHERE CONCAT(name,price,asal,image) LIKE '%$filtervalues%' ";
            $query_run = mysqli_query($conn, $query);


            if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $row)
                                            {
        
      ?>
    <form action="" method="post" class="form">
      <div class="content">
        <div class="section">
            
            <div class="main"><img src="uploaded_img/<?php echo $row['image']; ?>" alt="" /></div>
            <p class="name"><?php
                              if(strlen($row['name']) > 15)
                              {
                                echo substr($row['name'], 0,12)."...";
                              }
                              else{
                                echo $row['name'];
                              } ?></p>
            <p class="price">$<?php echo $row['price']; ?></p>
            <div class="icon">
              <i class="uil uil-check-circle" style="color: #ab43ff">
                <span><?php
                              if(strlen($row['asal']) > 15)
                              {
                                echo substr($row['asal'], 0,12)."...";
                              }
                              else{
                                echo $row['asal'];
                              } ?></span>
              </i>
            </div>
            <div class="icon-s">
              <i class="uil uil-star" style="color: #ffc700">
                <span>4,2</span>
              </i>
            </div>
            <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
            <input type="hidden" name="product_asal" value="<?php echo $row['asal']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
            <div class="button-cart">
            
              <input type="submit" value="add to cart" name="add_to_cart">
            
            </div>
        </div>
      </div>
      </form>
      
      <?php
       };
      };
        };
       ?>
    </div>
    


  </body>
</html>
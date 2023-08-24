<?php 

@include 'config.php';

session_start();

if(!isset( $_SESSION['user_name'] )){
    header('location:Sign-In.php');
}

$id_produk = $_GET["id"];

$ambil = $conn->query("SELECT * FROM products WHERE id = $id_produk");
$detail = $ambil->fetch_assoc();


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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Zen+Kaku+Gothic+Antique:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="description.css" />
    <title>Document</title>
  </head>
  <body>
  <nav>
      <div class="container">
        <div class="nav-logo">
            <a href="user-page.php"><img src="../image/Groceriess-box.png" width="50" style="margin-right: 20px" alt="" srcset="" />
          <h2 class="Head">Groceriess</h2></a>
          
        </div>
        <form action="" method="GET">
        <div class="search-bar">
          <i class="uil uil-search"></i>
          <a href="search-page.php">
          <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" placeholder="Find what u want" size="80" />
          <button type="submit" name="submit"></button>
          </a>
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

  


    <div class="container-utama">
    
      <div class="info-produk">
        <div class="image">
          <img src="uploaded_img/<?php echo $detail["image"]; ?>" alt="" width="300" />
        </div>
        <div class="desc-produk">
          <p><?php echo $detail["name"]; ?></p>
          <i class="uil uil-check-circle" style="color: #ab43ff">
          <span><?php echo $detail["asal"]; ?></span></i>
          <div class="stars">
          <i class="uil uil-star"></i>
          <i class="uil uil-star"></i>
          <i class="uil uil-star"></i>
          <i class="uil uil-star"></i>
          <i class="uil uil-star"></i>
          </div>
          <h1>$<?php echo $detail["price"]; ?></h1>
          
    
            <div class="button-cart">
            
              <input type="submit" value="add to cart" name="add_to_cart">
            
            </div>
        
      
        </div>
      </div>
      <div class="deskripsi">
        <h1>Deskripsi Produk</h1>
        <p><?php echo $detail["deskripsi"]; ?></p>
      </div>
      <!-- <div class="ulasan">
        <h1>Ulasan</h1>
        <div class="user-container">
          <div class="foto">
            <img src="aipon.png" alt="" />
          </div>
           <div class="komen">
            <p>Charles</p>
            <p>barangnya bagus bro</p>
          </div> 
        </div>
      </div> -->
    </div>
  </body>
</html>
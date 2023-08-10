<?php

@include 'config.php';


session_start();

if(!isset( $_SESSION['admin_name'] )){
    header('location:Sign-In.php');
}

if(isset($_POST['add_product'])){
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_asal = $_POST['product_asal'];
  $product_image = $_FILES['product_image']['name'];
  $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
  $product_image_folder = 'uploaded_img/'.$product_image;

  if(empty($product_name) || empty($product_price) || empty($product_asal) || empty($product_image)){
    $message[] = 'please fill out all';
  }else{
    $insert = "INSERT INTO products (name, price, asal, image) VALUES('$product_name', '$product_price', '$product_asal', '$product_image')";
    $upload = mysqli_query($conn,$insert);
    if($upload){
       move_uploaded_file($product_image_tmp_name, $product_image_folder);
       $message[] = 'new product added successfully';
    }else{
       $message[] = 'could not add the product';
    }
  }
};

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM products WHERE id = $id");
  header('location:admin-page.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="admin.css">
  <title>Admin Page</title>
</head>
<body>
  
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
  <div class="container">

  <div class="admin-product-form-container">
  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
      <h3>Add New Product</h3>
      <input type="text" placeholder="Product Name" name="product_name" class="box">
      <input type="number" placeholder="Product Price" name="product_price" class="box">
      <input type="text" placeholder="Product From" name="product_asal" class="box">
      <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
      <input type="submit" class="btn" name="add_product" value="add product">
    </form>
  </div>
  <?php
    $select = mysqli_query($conn, "SELECT * FROM products");
  ?>

  <div class="product-display">
    <table class="product-display-table">
      <thead>
        <tr>
          <th>product image</th>
          <th>product name</th>
          <th>product asal</th>
          <th>product Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
          <tr>
          
          <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['asal']; ?></td>
          <td><?php echo $row['price']; ?></td>
          <td>
            <a href="admin-update.php?edit=<?php echo $row['id'];?>" class="btn-1"><i class="uil uil-edit"></i>edit</a>
            <a href="admin-page.php?delete=<?php echo $row['id'];?>" class="btn-1"><i class="uil uil-trash"></i>delete</a>
          </td>
          </tr>
      <?php }; ?>
    </table>
  </div>
  </div>
</body>
</html>


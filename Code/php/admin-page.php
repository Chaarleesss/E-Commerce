<?php

@include 'config.php';

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
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <link rel="stylesheet" href="admin.css">
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
      <input type="text" placeholder="Enter Product Name" name="product_name" class="box">
      <input type="number" placeholder="Enter Product Price" name="product_price" class="box">
      <input type="text" placeholder="Enter Product From" name="product_asal" class="box">
      <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
      <input type="submit" class="btn" name="add_product" value="add product">
    </form>
  </div>
  </div>
</body>
</html>


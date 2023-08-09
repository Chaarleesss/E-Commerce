<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_asal = $_POST['product_asal'];
  $product_image = $_FILES['product_image']['name'];
  $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
  $product_image_folder = 'uploaded_img/'.$product_image;

  if(empty($product_name) || empty($product_price) || empty($product_asal) || empty($product_image)){
    $message[] = 'please fill out all';
  }else{
    $update = "UPDATE products SET name='$product_name', price='$product_price', asal='$product_asal', image='$product_image' WHERE id = $id";
    $upload = mysqli_query($conn,$update);
    if($upload){
       move_uploaded_file($product_image_tmp_name, $product_image_folder);
       $message[] = 'Update product  success';
    }else{
       $message[] = 'could not add the product';
    }
  }
};


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Update</title>
    
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
    <div class="admin-product-form-container centered">

    <?php 
    
    $select = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    while($row = mysqli_fetch_assoc($select)){

    
    ?>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <h3>Update The Product</h3>
            <input type="text" placeholder="Product Name" value="<?php echo $row['name']; ?>" name="product_name" class="box">
            <input type="number" placeholder="Product Price" value="<?php echo $row['price']; ?>" name="product_price" class="box">
            <input type="text" placeholder="Product From" value="<?php echo $row['asal']; ?>" name="product_asal" class="box">
            <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="box">
            <input type="submit" class="btn" name="update_product" value="update product">
            <a href="admin-page.php" class="btn">Go-Back</a>
    </form>

    <?php }; ?>
    </div>
</div>
</body>
</html>
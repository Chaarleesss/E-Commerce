
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
  <div class="container">

  <div class="admin-product-form-container">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
      <h3>Add New Product</h3>
      <input type="text" placeholder="Enter Product Name" name="product_name" class="box">
      <input type="number" placeholder="Enter Product Price" name="product_price" class="box">
      <input type="text" placeholder="Enter Product From" name="product_from" class="box">
      <input type="file" accept="image/png, image/jepg, image/jpg" name="product_image" class="box">
      <input type="submit" class="btn" name="add_product" value="add product">
    </form>
  </div>
  </div>
</body>
</html>


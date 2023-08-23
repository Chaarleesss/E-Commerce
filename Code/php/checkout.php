<?php

@include 'config.php';

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:checkout.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:checkout.php');
};

if(isset($_GET['delete_all'])){
  
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:checkout.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="co.css">

</head>
<body>

<div class="container">

<section class="shopping-cart">

   <h1 class="heading">shopping cart</h1>

   <table>

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($row = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>$<?php echo number_format($row['price']); ?></td>
           
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $row['id']; ?>" >
                  <input type="number" name="update_quantity" min="1" class="update-number"  value="<?php echo $row['quantity']; ?>" >
                  <input type="submit" value="update" class="update-button" name="update_update_btn">
               </form>   
            </td>
            <td class="total-price">$<?php echo $sub_total = number_format($row['price'] * $row['quantity']); ?></td>
            <td><a href="checkout.php?remove=<?php echo $row['id']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         };
         ?>
         <tr class="table-bottom">
            <td><a href="user-page.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3">grand total</td>
            <td class="">$<?php echo $grand_total; ?></td>
            <td><a href="checkout.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>
         
      </tbody>

   </table>
         
   <div class="checkout-btn">
   <a href="payment.php"  <?= ($grand_total == 0)?'':'disabled'; ?>><button type="submit"  class="btn">Order Now</button></a>
   </div>

       

   <div class="popup" id="popup">
         <img src="../image/404-tick.png" alt="">
         <h2>thankyou</h2>
         <p>Your Products has been ordered</p>

         <button type="button" onclick="closePopup()"><a href="checkout.php?delete_all"  onclick="closePopup()">OK</a></button>
      </div>

</section>

</div>

<script>
   let popup = document.getElementById("popup");

         function openPopup(){
            popup.classList.add("open-popup");
         }
         function closePopup(){
            popup.classList.remove("open-popup");
         }




</script>



</body>
</html>
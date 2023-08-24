<?php 

@include 'config.php';

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    
    <script src="https://kit.fontawesome.com/e8fa2e31b4.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>pay</title>
    <link rel="stylesheet" href="payment.css" />
  </head>
  <body>
    

     <div class="container">
      <div class="left">
        <div class="back"><i class="uil uil-arrow-left"></i><a href="checkout.php">Go-Back</a></div>
      
        <p>Payment Methods</p>
        <hr style="border: 1px solid #ccc; margin: 0 15px" />
        <div class="methods">
          <div onclick="doFun()" id="tColorA" style="color: #3749e9"><i class="fa-solid fa-credit-card" style="color: #3749e9"></i>Payment By Card</div>
          <!-- <div onclick="doFunA()" id="tColorB"><i class="fa-solid fa-barcode"></i>Qris</div>
          <div onclick="doFunB()" id="tColorC"><i class="fa-solid fa-wallet"></i>Cash Or Duel</div> -->
        </div>
        <!-- <hr style="border: 1px solid #ccc; margin: 0 15px" /> -->
      </div>
      <div class="center">
        <a href="https://www.shift4shop.com/credit-card-logos.html"><img src="https://www.shift4shop.com/images/credit-card-logos/cc-lg-4.png" alt="Credit Card Logos" title="Credit Card Logos" width="250" height="auto" /></a>
        <hr style="border: 1px solid #ccc; margin: 0 15px" />
        <div class="card-details">
          <form action="">
            <p>Card Number</p>
            <div class="c-number" id="c-number">
              <input id="number" class="cc-number" placeholder="Card Number" maxlength="19" required />
              <i class="fa-solid fa-credit-card" style="margin: 0"></i>
            </div>

            <div class="c-details">
              <div>
                <p>Expiry Date</p>
                <input id="e-date" class="cc-exp" placeholder="MM/YY" required maxlength="5" required />
              </div>
              <div>
                <p>CVV</p>
                <div class="cvv-box" id="cvv-box">
                  <input id="cvv" class="cc-cvv" placeholder="CVV" required maxlength="3" required />
                  <i class="fa-solid fa-circle-question" title="3 digits onclick the back of the card" style="cursor: pointer"></i>
                </div>
              </div>
            </div>
            <div class="email">
              <p>Email</p>
              <input type="email" placeholder="Charles@gmail.com" id="email" required />
            </div>
            <button>Pay Now</button>
          </form>
        </div>
      </div>
      
      <div class="right">
        <span>Order Information</span>
        <?php 
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($row = mysqli_fetch_assoc($select_cart)){
         ?>
        <p><?php echo $row['name']; ?></p>
        <?php number_format($row['price']); ?>
        <input type="hidden" name="update_quantity" min="1" class="update-number"  value="<?php echo $row['quantity']; ?>" >
        <?php $sub_total = number_format($row['price'] * $row['quantity']); ?>
        
        <hr style="border: 1px solid #ccc; margin: 0 15px" />
        <?php
            $grand_total += $sub_total;  
            };
         };
         ?>

        <div class="details">
          <div style="font-weight: 700; padding: 3px 0">Total Price</div>
          <div style="padding: 3px 0">$<?php echo $grand_total; ?></div>
        </div>
        <hr style="border: 1px solid #ccc; margin: 0 15px" />
        <a href="https://www.shift4shop.com/credit-card-logos.html"><img src="https://www.shift4shop.com/images/credit-card-logos/cc-lg-4.png" alt="Credit Card Logos" title="Credit Card Logos" width="250" height="auto" /></a>
      </div>
    </div>
    
      
      
      <div class="popup" id="popup">
        <img src="../image/404-tick.png" alt="" />
        <h2>thankyou</h2>
        <p>Your Products has been ordered</p>

        <button type="button" onclick="closePopup()"><a href="checkout.php?delete_all" onclick="closePopup()">OK</a></button>
      </div>
    </div>

    <script>
      let popup = document.getElementById("popup");

      function openPopup() {
        popup.classList.add("open-popup");
      }
      function closePopup() {
        popup.classList.remove("open-popup");
      }
    </script>
  </body>
</html>



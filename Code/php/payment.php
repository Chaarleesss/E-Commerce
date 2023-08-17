<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>pay</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="payment.css" />
  </head>
  <body>
    <div class="container">
      <div class="form">
        <div class="row">
          <div class="col">
            <h3 class="title">billing address</h3>

            <div class="inputBox">
              <span>full name :</span>
              <input type="text" placeholder="Charles" />
            </div>
            <div class="inputBox">
              <span>email :</span>
              <input type="email" placeholder="charlesgantenk@gmail.com" />
            </div>
            <div class="inputBox">
              <span>address :</span>
              <input type="text" placeholder="room - street - locality" />
            </div>
            <div class="inputBox">
              <span>city :</span>
              <input type="text" placeholder="Jakarta" />
            </div>

            <div class="flex">
              <div class="inputBox">
                <span>state :</span>
                <input type="text" placeholder="Indonesia" />
              </div>
              <div class="inputBox">
                <span>zip code :</span>
                <input type="text" placeholder="123 456" />
              </div>
            </div>
          </div>

          <div class="col">
            <h3 class="title">payment</h3>

            <div class="inputBox">
              <span>cards accepted :</span>
              <img src="../image/card_img.png" alt="" />
            </div>
            <div class="inputBox">
              <span>name on card :</span>
              <input type="text" placeholder="mr. Char" />
            </div>
            <div class="inputBox">
              <span>credit card number :</span>
              <input type="number" placeholder="1111-2222-3333-4444" />
            </div>
            <div class="inputBox">
              <span>exp month :</span>
              <input type="text" placeholder="january" />
            </div>

            <div class="flex">
              <div class="inputBox">
                <span>exp year :</span>
                <input type="number" placeholder="2022" />
              </div>
              <div class="inputBox">
                <span>CVV :</span>
                <input type="text" placeholder="1234" />
              </div>      
            </div>  
          </div>
        </div>
        <div class="pay"  onclick="openPopup()">
          <button type="submit" class="btn">pay</button>
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


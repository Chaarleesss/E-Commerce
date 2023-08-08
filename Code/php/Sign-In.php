<?php
  @include 'config.php';

  session_start();


  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn , $_POST['name']);
    $pass = md5($_POST['password']);
    
    $select = "SELECT * FROM user_form WHERE name = '$name' && password = '$pass'";

    $result = mysqli_query($conn, $select);


    if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'admin'){

        $_SESSION['admin_name'] = $row['name'];
        header('location:admin-page.php');

      }elseif($row['user_type'] == 'user'){

        $_SESSION['user_name'] = $row['name'];
        header('location:user-page.php');

    }
  }else{
    $error[] = 'incorrect name or password!';
  }

};
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Zen+Kaku+Gothic+Antique:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="sign-in.css" />
    <title>Sign-In</title>
  </head>
  <body>
    <div class="container">
      <div class="login">
        <div class="content">
          <img src="../image/Groceriess-box.png" alt="" />
        </div>
        <div class="loginform">
          <h1>
            Mulai Berbelanja <br />
            Dengan Groceriess!
          </h1>
          <form action="" method="post">
            <p class="head">Email or Username</p>
            <div class="tbox"><i class="fa fa-user"></i><input type="text" name="name" placeholder="" /></div>
            <p class="head">Password</p>
            <div class="tbox"><i class="fa fa-lock"></i><input type="password" name="password" placeholder="" /></div>
            <div class="">
              <?php
              if(isset($error)){
                foreach($error as $error){
                  echo '<span class="error-msg">'.$error.'</span>';
                };
              };
              ?></div>
            <!-- <button class="btn">Sign-In</button> -->
            <input type="submit" name="submit" value="Sign In" class="btn">
          </form>
          <div class="regis">
            <p>Doesn't Have a Account?<a href="Sign-Up.php"> Sign-Up</a></p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

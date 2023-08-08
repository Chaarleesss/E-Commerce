<?php
  @include 'config.php';


  if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn , $_POST['name']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];


    $select = "SELECT * FROM user_form WHERE name = '$name' && password = '$pass'";

    $result = mysqli_query($conn, $select);


    if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';
      
    }else{
      if($pass != $cpass){
        $error[] = 'password not matched!';
      }else{
        $insert = "INSERT INTO user_form(name, password,user_type) VALUES('$name','$pass','$user_type')";
        mysqli_query($conn, $insert);
        header('location:Sign-In.php');
      }
    }
    // }elseif($name != "" && $pass !=""){

    //   if($pass != $conn)




    // }
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

    <link rel="stylesheet" href="sign-up.css" />
    <title>Sign-Up</title>
  </head>
  <body>
    <div class="container">
      <div class="login">
        <div class="content">
          <img src="../image/Groceriess-box.png" alt="" />
        </div>
        <div class="loginform">
          <h1>Buat Akun Mu !</h1>
            <form action="" method="post">
            
              <p class="head">Email or Username</p>
              <div class="tbox"><i class="fa fa-user"></i><input type="text" name="name" placeholder="" /></div>
              <p class="head">Password</p>
              <div class="tbox"><i class="fa fa-lock"></i><input type="password" name="password" placeholder="" /></div>
              <p class="head">Confirm Password</p>
              <div class="tbox"><i class="fa fa-lock"></i><input type="password" name="cpassword" placeholder="" /></div>
              <div class="">
              <?php
              if(isset($error)){
                foreach($error as $error){
                  echo '<span class="error-msg">'.$error.'</span>';
                };
              };
              ?></div>
                
              <select name="user_type" id="">
                <option value="user">user</option>
                <option value="admin">admin</option>
              </select>
              <!-- <button  class="btn">Sign-Up</button> -->
              
              <input type="submit" name="submit" value="Sign Up" class="btn">
            </form>
          <div class="regis">
            <p>Have a Account?<a href="Sign-In.php">Sign-In</a></p>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

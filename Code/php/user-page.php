<?php
@include 'config.php';


session_start();

if(!isset( $_SESSION['user_name'] )){
    header('location:Sign-In.php');
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Zen+Kaku+Gothic+Antique:wght@300;400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="index.css"/>
    <title>Document</title>
  </head>
  <body>
    <nav>
      <div class="container">
        <div class="nav-logo">
          <img src="../image/Groceriess-box.png" width="50" style="margin-right: 20px" alt="" srcset="" />
          <h2 class="Head">Groceriess</h2>
        </div>
        <div class="search-bar">
          <i class="uil uil-search"></i>
          <input type="search" placeholder="Find what u want" />
        </div>
        <div class="button">
          <div class="btn-1">Welcome <span class="nama-user"><?php echo $_SESSION['user_name']  ?></span></div>
          <div class="btn-2"><a href="Sign-Up.php">Log-Out</a></div>
        </div>
      </div>
      </div>
    </nav>
    <div class="jumbotron">
      <div class="image">
        <img src="../image/Iphone-Banner.png" alt="" />
      </div>
    </div>
    <div class="Sales">
      <p>Top Sales</p>
    </div>
    <div class="container-content">
      <div class="content">
        <div class="section">
          <div class="main"><img src="../image/ip-x.jpg" alt="" /></div>
          <p class="name">Iphone-13</p>
          <p class="price">$600</p>
          <div class="icon">
            <i class="uil uil-check-circle" style="color: #ab43ff">
              <span>North Jakarta</span>
            </i>
          </div>
          <div class="icon-s">
            <i class="uil uil-star" style="color: #ffc700">
              <span>4,2</span>
            </i>
          </div>
          <div class="button-cart">
          <i class="uil uil-shopping-cart"><span>Add To Cart</span></i>
          </div>
        </div>
        <div class="section">
          <div class="main"><img src="../image/ip-13-fix.jpg" alt="" /></div>
          <p class="name">Iphone-13</p>
          <p class="price">$600</p>
          <div class="icon">
            <i class="uil uil-check-circle" style="color: #ab43ff">
              <span>North Jakarta</span>
            </i>
          </div>
          <div class="icon-s">
            <i class="uil uil-star" style="color: #ffc700">
              <span>4,2</span>
            </i>
          </div>
          <div class="button-cart">
          <i class="uil uil-shopping-cart"><span>Add To Cart</span></i>
          </div>
        </div>
        <div class="section">
          <div class="main"><img src="../image/ip-11-fix.jpg" alt="" /></div>
          <p class="name">Iphone-13</p>
          <p class="price">$600</p>
          <div class="icon">
            <i class="uil uil-check-circle" style="color: #ab43ff">
              <span>North Jakarta</span>
            </i>
          </div>
          <div class="icon-s">
            <i class="uil uil-star" style="color: #ffc700">
              <span>4,2</span>
            </i>
          </div>
          <div class="button-cart">
          <i class="uil uil-shopping-cart"><span>Add To Cart</span></i>
          </div>
        </div>
        <div class="section">
          <div class="main"><img src="../image/ip-14.jpg" alt="" /></div>
          <p class="name">Iphone-13</p>
          <p class="price">$600</p>
          <div class="icon">
            <i class="uil uil-check-circle" style="color: #ab43ff">
              <span>North Jakarta</span>
            </i>
          </div>
          <div class="icon-s">
            <i class="uil uil-star" style="color: #ffc700">
              <span>4,2</span>
            </i>
          </div>
          <div class="button-cart">
          <i class="uil uil-shopping-cart"><span>Add To Cart</span></i>
          </div>
        </div>
      
        
        
      </div>
      <div class="content">
        <div class="section">
          <div class="main"><img src="../image/ip-x.jpg" alt="" /></div>
          <p class="name">Iphone-13</p>
          <p class="price">$600</p>
          <div class="icon">
            <i class="uil uil-check-circle" style="color: #ab43ff">
              <span>North Jakarta</span>
            </i>
          </div>
          <div class="icon-s">
            <i class="uil uil-star" style="color: #ffc700">
              <span>4,2</span>
            </i>
          </div>
          <div class="button-cart">
          <i class="uil uil-shopping-cart"><span>Add To Cart</span></i>
          </div>
        </div>
        <div class="section">
          <div class="main"><img src="../image/ip-13-fix.jpg" alt="" /></div>
          <p class="name">Iphone-13</p>
          <p class="price">$600</p>
          <div class="icon">
            <i class="uil uil-check-circle" style="color: #ab43ff">
              <span>North Jakarta</span>
            </i>
          </div>
          <div class="icon-s">
            <i class="uil uil-star" style="color: #ffc700">
              <span>4,2</span>
            </i>
          </div>
          <div class="button-cart">
          <i class="uil uil-shopping-cart"><span>Add To Cart</span></i>
          </div>
        </div>
        <div class="section">
          <div class="main"><img src="../image/ip-11-fix.jpg" alt="" /></div>
          <p class="name">Iphone-13</p>
          <p class="price">$600</p>
          <div class="icon">
            <i class="uil uil-check-circle" style="color: #ab43ff">
              <span>North Jakarta</span>
            </i>
          </div>
          <div class="icon-s">
            <i class="uil uil-star" style="color: #ffc700">
              <span>4,2</span>
            </i>
          </div>
          <div class="button-cart">
          <i class="uil uil-shopping-cart"><span>Add To Cart</span></i>
          </div>
        </div>
        <div class="section">
          <div class="main"><img src="../image/ip-14.jpg" alt="" /></div>
          <p class="name">Iphone-13</p>
          <p class="price">$600</p>
          <div class="icon">
            <i class="uil uil-check-circle" style="color: #ab43ff">
              <span>North Jakarta</span>
            </i>
          </div>
          <div class="icon-s">
            <i class="uil uil-star" style="color: #ffc700">
              <span>4,2</span>
            </i>
          </div>
          <div class="button-cart">
          <i class="uil uil-shopping-cart"><span>Add To Cart</span></i>
          </div>
        </div>
      
        
        
      </div>
    </div>




  <footer class="footer">
  	 <div class="container-footer">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>Our Team</h4>
  	 			<ul>
  	 				<li><a href="#">Charles</a></li>
  	 				<li><a href="#">Aldi</a></li>
  	 				<li><a href="#">Ryan</a></li>
  	 			</ul>
  	 		</div>

  	 		<div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="#"><i class="uil uil-instagram"></i></a>
  	 				<a href="#"><i class="uil uil-facebook-f"></i></a>
  	 				<a href="#"><i class="uil uil-twitter"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>

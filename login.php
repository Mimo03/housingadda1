<?php 
  include("./partials/connect.php");
  include("./partials/conditions.php");

  $errormsg=false;

  if(isset($_SESSION["username"])){
    echo "<script>window.location = '/profile.php'</script>";
  }

  if(isset($_POST["username"])){
      
      $username = $_POST["username"];
      $password = $_POST["password"];
      $check_user = "select * from customers where username='$username'";
      $res_check_user = mysqli_query($conn, $check_user);
      if(mysqli_num_rows($res_check_user) > 0){
        // echo 'hey';
        $res_check_user = $res_check_user->fetch_assoc();
        $pass = $res_check_user["password"];
        if(password_verify($password, $pass)){
            $role = $res_check_user["role"];
            $status = $res_check_user["status"];
            session_start();
            $name_query="select * from cust_info where username=$username";
            $name_query_res=mysqli_query($conn,$name_query)->fetch_assoc();
            $_SESSION["name"]= $name_query_res["name"];
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $role;
            $_SESSION["status"] = $status;
            header("Location: /profile.php"); 
        }else{
            $errormsg = "incorrect password";
        }
      }else{
        $errormsg = "User does not exist";
      }
  }else{

  }
  
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="housingadda.in" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="title" content=" Log in | HousingAdda " />
    
    <meta name="description" content="Find your dream home with Mr Deepak Singh, your trusted real estate expert. Browse our listings of properties for sale and rent all our Mumbai,Thane,Badlapur and other nearby locations. Contact us today for personalized assistance and exceptional service" />
    
    <meta name="keywords" content="buy,rent,housingadda, real estate, properties near me, for sale,contact,property dealer,real estate agent" />
    
    <meta name="robots" content="index, follow">
    
    <link rel="canonical" href="https://www.housingadda.in/" />
    
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <title>
      Log in | HousingAdda 
    </title>

    <style>
      body{
        background: linear-gradient(170deg,hsl(0,0%,22%)0%,hsl(0,0%,6%)30%);

      }
      .nav__logo{
        color: white;
      }
    </style>
  </head>
  <body>
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script defer src="index2.js"></script>
    

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="header" id="header">
      <nav class="nav2 container" >
          <a href="#" class="nav__logo login_nav_logo" >
              <i class='bx bxs-home-alt-2'></i>Housing Adda 
          </a>

          <div class="nav__menu">
              <ul class="nav__list" style="margin: 0rem;padding: 0px;">
                  <li class="nav__item">
                    <a href="index.php" class="nav__link">
                        <span>Home</span> <i class='bx bx-home'></i>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="properties.php" class="nav__link">
                        <span>Properties</span><i class='bx bx-building' ></i>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="index.php#contact" class="nav__link">
                        <span>Contact us</span><i class='bx bx-phone' ></i>
                    </a>
                </li>
                <li class="nav__item">
                    <a href="login.php" class="nav__link active-page">
                        <span>Login</span><i class='bx bx-user'></i>
                    </a>
                </li>
              </ul>
          </div>
          <a href="#" class="button nav__button">Log in</a> 
      </nav>
  </header>

    
    <!-- <div class="section mt-3"> -->
      <!-- <div class="container"> -->

    <div class="login-dark text-center">
        <form method="post" action="login.php">
          <!-- <div class="illustration"><i class='bx bx-user'></i></div> -->
            <h2 class="sr-only mb-5" style="padding-top: 4rem;font-weight: 600; color: hsl(228,57%,28%)!important;">Login</h2>
            
            <!-- <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div> -->
            <!-- <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div> -->
            <?php 
            if ($errormsg){
                echo '<p class="login-error text-focus-in" style="color:#dc3545">Incorrect credentials</p>';
              }
            ?>
            <input class="profile__edit-info-input-input login-input" name="username" placeholder="Phone" type="number" autocomplete="on">
            <input class="profile__edit-info-input-input login-input" name="password" placeholder="Password" type="password" autocomplete="on">
            
            <div class="form-group"><button class="btn btn-primary btn-block login-button" style="margin-top: 20px;margin-bottom: 0.5rem;" type="submit">Log In</button></div>
            <a href="forgetpass.php" class="forgot">Forgot Password?</a>
            <a href="register.php" class="forgot">Don't have an account yet?</a><br/>
            
            <!-- <a href="./forgetpass.php" class="forgot">Forget Password?</a> -->
            <!-- <a href="#" class="forgot">Forgot password?</a> -->
          </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

      <!-- </div> -->
    <!-- </div> -->

    <a href="#" class="scrollup" id="scroll-up">
      <i class= 'bx bx-chevrons-up'></i>
  </a>

  <?php
    include('./partials/footer.php');
  ?>
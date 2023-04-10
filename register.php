<?php 
include("./partials/connect.php");
include("./partials/conditions.php");
$errormsg=false;

if(isset($_SESSION["username"])){
    echo "<script>window.location = '/index.php'</script>";
}

if(isset($_POST["username"])){
    $username = htmlspecialchars($_POST["username"]);
    $password = $_POST["password"];
    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $location = htmlspecialchars($_POST["location"]);

    $check_user = "select * from customers where username='$username'";
    $res_check_user = mysqli_query($conn, $check_user);
    if(mysqli_num_rows($res_check_user) > 0){
        $errormsg = "User already exists";
        // echo "user already exists";
    }else{
        $insert_customer = "insert into customers (username, password) values ('$username', '$hashed')";
        $res_insert_customer = mysqli_query($conn, $insert_customer);
        if($res_check_user){
            // $get_user_id = "select * from customers where username='$username'";
            // $res_get_user_id = mysqli_query($conn, $get_user_id)->fetch_assoc();
            // $userid = $res_get_user_id["id"];
            $insert_custinfo = "insert into cust_info (username,name,email,location) values ('$username', '$name','$email','$location')";
            $res_insert_custinfo = mysqli_query($conn, $insert_custinfo);
            $errormsg = "User added";
            echo mysqli_error($conn);
            // echo "user added";
            echo "<script>window.location = '/login.php'</script>";
        }else{
            $errormsg = "Something went wrong";
            // echo "something went wrong";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
   <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="housingadda.in" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="title" content="Register | HousingAdda" />
    
    <meta name="description" content="Find your dream home with Mr Deepak Singh, your trusted real estate expert. Register now to Browse our listings of properties for sale and rent all our Mumbai,Thane,Badlapur and other nearby locations. Contact us today for personalized assistance and exceptional service" />
    
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
      Register on HousingAdda 
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

    <script defer src="index2.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <header class="header" style="box-shadow:none" id="header">
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
                        <span>Register</span><i class='bx bx-user'></i>
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
        <form method="post" action="register.php">
          <!-- <div class="illustration"><i class='bx bx-user'></i></div> -->
            <h2 class="sr-only mb-5" style="padding-top: 4rem;font-weight: 600; color: hsl(228,57%,28%)!important;">Register</h2>
            
            <!-- <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div> -->
            <!-- <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div> -->
            <?php 
            if ($errormsg){
                echo '<p class="login-error text-focus-in" style="color:#dc3545">'.$errormsg.'</p>';
              }
            ?>
            <input class="profile__edit-info-input-input login-input" name="name" placeholder="Name" type="text">
            <input class="profile__edit-info-input-input login-input" name="username" placeholder="Phone" type="number">
            <input class="profile__edit-info-input-input login-input" name="email" placeholder="Email" type="text">
            <input class="profile__edit-info-input-input login-input" name="location" placeholder="Location" type="text">
            <input class="profile__edit-info-input-input login-input" name="password" placeholder="Password" type="password">
            
            <div class="form-group"><button class="btn btn-primary btn-block login-button" style="margin-top: 20px;margin-bottom: 0.5rem;" type="submit">Log In</button></div>
            <a href="login.php" class="forgot">Already have an account?</a>
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
    <div class="site-footer">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-4">
            <div class="widget">
              <h3>Contact</h3>
              <address>Lokmanya nagar, Badlapur <br>
            400607, Maharashtra</address>
              <ul class="list-unstyled links d-flex justify-content-center" style="flex-direction: column;">
                <li><a href="tel:9075381772">9075381772</a></li>
                <li><a href="tel:9075381772">9075381772</a></li>
                <li>
                  <a href="mailto:info@mydomain.com">housingadda23@gmail.com</a>
                </li>
              </ul>
            </div>
            <!-- /.widget -->
          </div>
          <div class="col-lg-4 col-xs-6">
          <div class="widget">
              <h3>Links</h3>
              
              <ul class="list-unstyled links d-flex justify-content-center" style="flex-direction: column;">
                <li><a href="index.php">Home</a></li>
                <li><a href="register.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="index.php#contact">Contact</a></li>
              </ul>
            </div>
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4 col-xs-6">
          <div class="widget">
              <h3>Socials</h3>
              
              <ul class="list-unstyled links d-flex justify-content-center" style="flex-direction: column;">
                <li><a href="https://www.google.com">Google</a></li>
                <li><a href="https://www.instagram.com/">Instagram</a></li>
                <li><a href="https://www.facebook.com/">Facebook</a></li>
                <li><a href="//api.whatsapp.com/send?phone=919075381772&text=Hello, I am interested in your listings.">Whatsapp</a></li>
              </ul>
            </div>
          </div>
          <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->

        <div class="row mt-5">
          <div class="col-12 col-xs-6">
            <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>
              HousingAdda &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              
              <a href="credits.php">Credits</a>
              <!-- License information: https://untree.co/license/ -->
            </p>
            <!-- <div>
              Distributed by
              <a href="https://themewagon.com/" target="_blank">themewagon</a>
            </div> -->
          </div>
        </div>
      </div>
      <!-- /.container -->
    </div>
    <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>

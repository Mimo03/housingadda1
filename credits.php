<?php
include("./partials/connect.php");
include("./partials/conditions.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="housingadda.in" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="title" content="Resources Used" />
    
    <meta name="description" content="Find your dream home with Mr Deepak Singh, your trusted real estate expert. Browse our listings of properties for sale and rent all our Mumbai,Thane,Badlapur and other nearby locations. Contact us today for personalized assistance and exceptional service" />
    
    <meta name="keywords" content="buy,rent,housingadda, real estate, properties near me, for sale,contact,property dealer,real estate agent" />
    
    <meta name="robots" content="index, follow">
    
    <link rel="canonical" href="https://www.housingadda.in/" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>


    <title>
        Credits
    </title>

    <style>
        img {
            width: 100%;
        }
    </style>
</head>

<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
    <nav class="nav2 container">
      <a href="#" class="nav__logo">
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
              <span>Properties</span><i class='bx bx-building'></i>
            </a>
          </li>
          <li class="nav__item">
            <a href="index.php" class="nav__link">
              <span>Contact us</span><i class='bx bx-phone'></i>
            </a>
          </li>
          <li class="nav-item dropdown nav__item">
          <?php if(isset($_SESSION['username'])){ ?>
            <a class="nav-link dropdown-toggle nav__link" href="#" style="padding:0px;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                
              <span style=""><?php echo $_SESSION["name"] ?></span><i class='bx bx-user'></i>
            </a>
            <ul class="dropdown-menu" style="font-size: 14px;color:hsl(228,12%,75%)!important;border:0px;box-shadow: 0px 8px 24px hsl(228deg 66% 45% / 10%);">
              <li><a class="dropdown-item login-dropdown" href="#" >My Properties</a></li>
              <li><a class="dropdown-item login-dropdown" href="profile-edit.php">Profile settings</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item login-dropdown" href="logout.php?logout=true">Logout</a></li>
            </ul>
          </li>
<?php } else{
                            echo '<a href="login.php" class="nav__link"><span>Login</span><i class="bx bx-user"></i></a>';
                             
                        } ?>
        </ul>
      </div>
      <!-- <a href="#" class="button nav__button">Log in</a> -->
    </nav>
  </header>




    <div class="section mt-3">
        <div class="container">
            <form enctype='multipart/form-data' method='POST' action="">
                <div class="row">
                    <h2 class="font-weight-bold text-primary heading text-center" style="margin-bottom: 0px;">
                        Credits
                    </h2>
                    
                    <span class="d-block d-flex align-items-center justify-content-center">
                        <div action="" class="home__search " style="width:60%">
                            <h3 style="margin-bottom: 0px;font-size:1rem;white-space: nowrap;">Template Design By</h3>
                            <input type="search" name="title" class="home__search-input " style="width:80%" value="Themewagon" disabled>
                            <!-- <button class="searchbutton" type="submit">Search</button> -->

                        </div>
                    </span>
                    <span class="d-block d-flex align-items-center justify-content-center">
                        <div action="" class="home__search " style="width:60%">
                            <h3 style="margin-bottom: 0px;font-size:1rem;white-space: nowrap;">Template Name</h3>
                            <input type="search" name="title" class="home__search-input " style="width:80%" value="Property" disabled>
                            <!-- <button class="searchbutton" type="submit">Search</button> -->

                        </div>
                    </span>
                    <span class="d-block d-flex align-items-center justify-content-center">
                        <div action="" class="home__search " style="width:60%">
                            <h3 style="margin-bottom: 0px;font-size:1rem;white-space: nowrap;">Template Author</h3>
                            <input type="search" name="title" class="home__search-input " style="width:80%" value="Untree" disabled>
                            <!-- <button class="searchbutton" type="submit">Search</button> -->

                        </div>
                    </span>
                    <span class="d-block d-flex align-items-center justify-content-center">
                        <div action="" class="home__search " style="width:60%">
                            <h3 style="margin-bottom: 0px;font-size:1rem;white-space: nowrap;">Tempalte URI</h3>&nbsp;&nbsp;
                            <a href="https://untree.co/">Link</a>

                            <!-- <button class="searchbutton" type="submit">Search</button> -->

                        </div>
                    </span>
                    <span class="d-block d-flex align-items-center justify-content-center">
                        <div action="" class="home__search " style="width:60%">
                            <h3 style="margin-bottom: 0px;font-size:1rem;white-space: nowrap;">License</h3>&nbsp;&nbsp;
                            <a href="License: https://creativecommons.org/licenses/by/3.0/">Link</a>
                            <!-- <button class="searchbutton" type="submit">Search</button> -->

                        </div>
                    </span>

                    <!--Script-->
                    <script src="script.js"></script>

                </div>
            </form>
        </div>

    </div>


    <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bx-chevrons-up'></i>
    </a>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>
<?php
include("./partials/connect.php");
include("./partials/conditions.php");

if (!isset($_SESSION["username"])) {
  echo "<script>window.location = '/login.php'</script>";
}

if (isset($_POST["update"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_SESSION["username"];

  $update_query = "update cust_info set name='$name',email='$email' where username=$username";
  // echo $update_query;
  $update_query_res = mysqli_query($conn, $update_query);
}

$username = $_SESSION["username"];
$query = "select * from cust_info where username='$username'";
// $res = mysqli_query($conn, $query);
$res = mysqli_query($conn, $query)->fetch_assoc();
$name = $res["name"];
$email = $res["email"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="housingadda.in" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="title" content="Edit Profile | Housing Adda" />
    
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
    Edit profile | HousingAdda
  </title>

  <style>
    img {
      width: 100%;
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

  <header class="header" id="header">
    <nav class="nav2 container">
       <a href="index.php" class="nav__logo">
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
            <a href="properties.php" class="nav__link ">
              <span>Properties</span><i class='bx bx-building'></i>
            </a>
          </li>
          <li class="nav__item">
            <a href="index.php#contact" class="nav__link">
              <span>Contact us</span><i class='bx bx-phone'></i>
            </a>
          </li>
          <li class="nav__item">
            <a href="profile.php" class="nav__link active-page">
              <span><?php echo $name ?></span><i class='bx bx-user'></i>
            </a>
          </li>
        </ul>
      </div>
      <a href="#" class="button nav__button">Log in</a>
    </nav>
  </header>


  <div class="section mt-3">
    <div class="container">

      <div>
        <h2 class="profile__title">Hello, <?php echo $name ?></h2>
        <p class="profile__subtitle " style="margin-bottom: 0px; padding-bottom: 0px;">Edit your information</p>
      </div>
      <form action="" method="POST">
        <div class="row">
          <div class="col-md-4">
            <div class="profile__edit-info-input">
              <p class="profile__edit-info-input-label mb-0">Phone Number</p>
              <input class="profile__edit-info-input-input" value="<?php echo $username; ?>" type="number" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="profile__edit-info-input">
              <p class="m-0 profile__edit-info-input-label">Email</p>
              <input class="profile__edit-info-input-input" name="email" style="color:hsl(228,15%,50%);" value="<?php echo $email; ?>">
            </div>

          </div>
          <div class="col-md-4">
            <div class="profile__edit-info-input">
              <p class="m-0 profile__edit-info-input-label">Name</p>
              <input class="profile__edit-info-input-input" name="name" style="color:hsl(228,15%,50%);" value="<?php echo $name; ?>">
            </div>
          </div>
        </div>
        <button type="submit" class="searchbutton" style="padding: 0.5rem .75rem .5rem .75rem; margin-top: 1rem;" name="update">Update profile</button>
        <!-- <h2 class="profile__title" style="margin-top: 2rem;">Change password</h2> -->

    </div>
  </div>


<div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border" role="status">
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
  
   <a href="#" class="scrollup" id="scroll-up">
    <i class='bx bx-chevrons-up'></i>
  </a>
  <?php
  include("./partials/footer.php");
  ?>
  <!-- /.site-footer -->

  <!-- Preloader -->
  

 

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/navbar.js"></script>
  <script src="js/counter.js"></script>
  <script src="js/custom.js"></script>
</body>

</html>
<?php
include("./partials/connect.php");
include("./partials/conditions.php");

if (!isset($_SESSION["username"])) {
  echo "<script>window.location = '/login.php'</script>";
}

$username = $_SESSION["username"];
$query = "select * from cust_info where username='$username'";
// $res = mysqli_query($conn, $query);
$res = mysqli_query($conn, $query)->fetch_assoc();
$name = $res["name"];

$postquery = "select * from post where username='$username'";
$posts = mysqli_query($conn, $postquery);

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="housingadda.in" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="title" content="Profile | HousingAdda" />
    
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
    Profile | HousingAdda
  </title>

  <style>
    img {
      width: 100%;
    }
    .profile__warning{
      background-color: hsl(228, 100%, 97%);;
      padding: 1rem 0.5rem;
      border-radius: 0.5rem;
      text-align: center;
    }
    .profile__warning>p{
      margin:0!important;
      color: hsl(228, 15%, 50%);
    }
  </style>
</head>

<body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script defer src="index2.js"></script>
  <!-- <script defer src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script> -->

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
          <li class="nav-item dropdown nav__item">
            <a class="nav-link dropdown-toggle nav__link" href="#" style="padding:0px;" role="button" data-bs-toggle="dropdown" aria-expanded="false">
  
              <span style=""><?php echo $_SESSION["name"] ?></span><i class='bx bx-user'></i>
            </a>
            <ul class="dropdown-menu" style="font-size: 14px;color:hsl(228,12%,75%)!important;border:0px;box-shadow: 0px 8px 24px hsl(228deg 66% 45% / 10%);">
              <li><a class="dropdown-item login-dropdown" href="/profile.php" >My Properties</a></li>
              <li><a class="dropdown-item login-dropdown" href="profile-edit.php">Profile settings</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item login-dropdown" href="logout.php?logout=true">Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <a href="#" class="button nav__button">Log in</a>
    </nav>
  </header>


  <div class="section mt-3">
    <div class="container">

      <div class="profile__header">
        <div>
          <h2 class="profile__title">Hello, <?php echo $name; ?> <div class="profile__edit-mobile" style="margin-left: auto;"><a class="profile__edit-mobile" href="property-create.php"><i class='bx bx-plus-circle'></i></a><a class="profile__edit-mobile" style="margin-left:0.25rem;" href="profile-edit.php"><i class='bx bx-pencil'></i></a></div></h2>
          <p class="profile__subtitle">Manage your listings</p>
        </div>
        <div class="profile__edit-computer" style="margin-left: auto;">
          <a class="profile__edit-computer" href="property-create.php"><i class='bx bx-plus-circle'></i></a>
          <a class="profile__edit-computer" href="profile-edit.php"><i class='bx bx-pencil'></i></a>
        </div>
      </div>
      <?php
        $approvequery='select * from customers where username ='. $username;
        $approvequery_res=mysqli_query($conn,$approvequery)->fetch_assoc();
        if($approvequery_res['status']=='no'){
      ?>
      <div class="profile__warning">
        
          <p>Your account isn't approved yet. Please wait while we work on your account verification.</p>  
        
      </div>
      <?php } ?>

      <div class="profile__listings">
        <?php
        while ($post = $posts->fetch_assoc()) {
          $postid = $post['post_id'];
          $imagequery = "select * from images where post_id=$postid limit 1";
          $imagequery_res = mysqli_query($conn, $imagequery)->fetch_assoc();
          // echo var_dump($imagequery_res);
          echo '<div class="profile__listings-card">
                    <div class="profile__listings-image">
                        <img src="' . $imagequery_res["path"] . '" alt="" class="">
                    </div>
                    <div class="profile__listings-text">
                        <h3 class="profile__listings-title" style="padding: 0px;margin: 0px;font-weight: 600;">' . $post["title"].', '. $post["location"] .'</h3>
                        <h3 class="profile__listings-title" style="padding: 0px;margin: 0px;font-weight: 400;">₹' . $post["price"] . '</h3>
                        <a href="./property-single.php?post_id=' . $postid . '" class="profile__subtitle profile__listings-action" style="padding: 0px;margin:0;margin-top: auto;">Manage this listing &gt</a>
                        <a href="./property-single.php?post_id=' . $postid . '" class="searchbutton text-center searchbuttonhover profile__listings-card-mobile-button" style="width:100%; box-shadow:none;background: var(--first-color-lighter) !important;color: var(--first-color) !important;border-radius: .75rem;margin-top: auto;font-weight:600;">Manage</a>
                    </div>
                </div>';
        }
        ?>
        <!-- <div class="profile__listings-card">
                <div class="profile__listings-image">
                    <img src="images/img_3.jpg" alt="" class="">
                </div>
                <div class="profile__listings-text">
                    <h3 class="profile__listings-title" style="padding: 0px;margin: 0px;font-weight: 600;">Rustomjee Athena Thane Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ullam dolor</h3>
                    <h3 class="profile__listings-title" style="padding: 0px;margin: 0px;font-weight: 400;">$530003</h3>
                    <p class="profile__subtitle profile__listings-action" style="padding: 0px;margin:0;margin-top: auto;">Manage this listing &gt</p>
                    <a class="searchbutton text-center searchbuttonhover" style="width:100%; box-shadow:none;background: var(--first-color-lighter) !important;color: var(--first-color) !important;border-radius: .75rem;margin-top: auto;font-weight:600;">Manage</a>

                </div>
            </div> -->

      </div>
    </div>
  </div>

 <?php
 include("./partials/footer.php"); 
 ?>
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
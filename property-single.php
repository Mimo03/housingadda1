<?php
include("./partials/connect.php");
include("./partials/conditions.php");

$post_id = false;
$edit = false;

if (!isset($_SESSION["username"])) {
  echo "<script>window.location = '/login.php'</script>";
}

if (isset($_GET["post_id"])) {
  $post_id = htmlspecialchars($_GET["post_id"]);
  $query = "select * from post where username='$username'";
  // $res = mysqli_query($conn, $query);
  $posts = mysqli_query($conn, $query);
  while ($post = $posts->fetch_assoc()) {
    if ($post["post_id"] == $post_id) {
      $edit = true;
    }
  }
  if($_SESSION["role"]=="admin"){
    $edit=true;
  }
  $imagequery = "select * from images where post_id=$post_id";
  $imagequery_res = mysqli_query($conn, $imagequery);
  $offerquery = "select offer from post where post_id=$post_id";
  $offerquery_res = mysqli_query($conn, $offerquery)->fetch_assoc();
  if ($offerquery_res) {
    $offers = explode(",", $offerquery_res['offer']);
  }
} else {
  echo "<script>window.location = '/properties.php'</script>";
}

$detail_query = "select * from post where post_id=" . $_GET["post_id"];
$detail_query_res = mysqli_query($conn, $detail_query)->fetch_assoc();

$click = "select * from clicked where username='$username' and post_id=" . $post_id;
$res_c = mysqli_query($conn, $click);
$last_clicked = date(date("Y-m-d:h:m:s", time()));

if (mysqli_num_rows($res_c) <= 0) {
  $click_ins = "insert into clicked(username,post_id,time)values('$username',$post_id,'$last_clicked')";
  $res_clicked_ins = mysqli_query($conn, $click_ins);
} else {
  $click_u = "update clicked set time='$last_clicked' where username='$username' and post_id=" . $post_id;
  $res_clicked_ins = mysqli_query($conn, $click_u);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="housingadda.in" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="title" content="<?php echo $detail_query_res['title']; ?>" />
    
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
    <?php echo $detail_query_res['title']; ?>
  </title>
</head>

<body>

  <script defer src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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
            <a href="properties.php" class="nav__link">
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
              <li><a class="dropdown-item login-dropdown" href="profile.php">My Properties</a></li>
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
      <div class="row justify-content-between">
        <div class="col-lg-6">
          <div class="img-property-slide-wrap">
            <div class="img-property-slide">
              <?php
              while ($image = $imagequery_res->fetch_assoc()) {
                echo '<img src="' . $image["path"] . '" alt="Image" class="img-fluid no-radius" />';
              }
              ?>
            </div>
          </div>

        </div>
        <div class="col-lg-6 mb-5">

          <div class="d-flex" style="align-items:center;justify-content:flex-start">
            <h2 class="font-weight-bold text-primary heading me-auto" style="margin-bottom: 0px;font-weight: 400;margin-right:0.75rem"><?php echo $detail_query_res['title']; ?></h2><?php if ($edit) echo '<a class="profile__edit-mobile" style="font-size:2rem;display:flex;align-items:center" href="property-edit.php?post_id=' . $post_id . '"><i style="font-size: var(--h1-font-size);color: var(--first-color);font-weight: 400;padding: .25rem;border-radius: .25rem;background-color: var(--first-color-lighter);cursor: pointer;transition: 0.3s;"class="bx bx-pencil"></i></a>' ?>
          </div>
          <p class="section__subtitle" style="margin-bottom: 0px;padding-bottom: 0px;"><?php echo $detail_query_res['location'] . ', ' . $detail_query_res['pincode']; ?></p>


          <div class="offers">
            <h3 class="section__title" style="font-weight: 600;"><span style="color:">₹</span><?php echo $detail_query_res['price']; ?></h3>
            <?php
            if ($offerquery_res) {
              foreach ($offers as $offer) {
                if ($offer!=""){
                echo '<p><i class="bx bxs-offer"></i> ' . trim($offer) . '.</p>';};
              }
            } ?>
          </div>


          <table class="table table-borderless property_details_table mb-3">
            <tr>
              <th scope="col" style="font-weight: 500;color: hsl(228,15%,50%);">Carpet Area</th>
              <td scope="col" style="font-weight: 400;color: hsl(228,12%,75%);"><?php echo $detail_query_res['area']; ?> sqft</td>
            </tr>
            <tr>
              <th scope="col" style="font-weight: 500;color: hsl(228,15%,50%);">BHK</th>
              <td scope="col" style="font-weight: 400;color: hsl(228,12%,75%);"><?php echo $detail_query_res['bhk']; ?></td>
            </tr>
            <tr>
              <th scope="col" style="font-weight: 500;color: hsl(228,15%,50%);">Floor</th>
              <td scope="col" style="font-weight: 400;color: hsl(228,12%,75%);"><?php echo $detail_query_res['floor']; ?></td>
            </tr>
            <tr>
              <th scope="col" style="font-weight: 500;color: hsl(228,15%,50%);">Possesion</th>
              <td scope="col" style="font-weight: 400;color: hsl(228,12%,75%);"><?php echo $detail_query_res['possesion']; ?></td>
            </tr>
            <tr>
              <th scope="col" style="font-weight: 500;color: hsl(228,15%,50%);">Furnished</th>
              <td scope="col" style="font-weight: 400;color: hsl(228,12%,75%);"><?php echo $detail_query_res['furnished']; ?></td>
            </tr>
          </table>

          <p class="text-black-50 mb-3 property-page-description">
            <?php echo $detail_query_res['description']; ?>
          </p>

          <!-- <p class="text-black-50" style="margin-bottom: 2px;">Interested in this property?</p> -->
          <div class="d-block agent-box p-2 d-flex  justify-content-around">
            <div class="d-flex flex-column justify-content-center">
              <div class="img mb-0">
                <img src="images/person_2-min.jpg" alt="Image" class="img-fluid" />
              </div>
              <div class="text text-center">
                <h3 class="mb-0">Deepak Singh</h3>
                <div class="meta">Real Estate</div>
              </div>
            </div>
            <div class="contact__card">
              <div class="contact__card-box">
                <div class="contact__card-info">
                  <i class='bx bx-phone'></i>
                  <div>
                    <h3 class="contact__card-title">
                      Interested in this listing?
                    </h3>
                    <p class="contact__card-description">
                      9372642000
                    </p>
                  </div>
                </div>
                <button class="button contact__card-button">Call now</button>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</div>
    <a href="#" class="scrollup" id="scroll-up">
      <i class='bx bx-chevrons-up'></i>
    </a>
    
     <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

 <?php include('./partials/footer.php');?>

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
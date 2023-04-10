<?php
include("./partials/connect.php");
include("./partials/conditions.php");

if (!isset($_SESSION["username"])) {
  echo "<script>window.location = '/login.php'</script>";
}

$featuredquery = 'select * from post where featured=1';
$featuredquery_res = mysqli_query($conn, $featuredquery);



if (isset($_POST['city'])) {
  $city = preg_replace('/[^A-Za-z0-9\-]/', '', ($_POST['city']));
  // echo $city;
  $districtapi = file_get_contents('https://api.postalpincode.in/postoffice/' . preg_replace('/\s+/', '', $city));
  if ((json_decode($districtapi))[0]->Status == "Success") {
    $district = get_max_district($districtapi);
    // echo $district;
    $querydistrict = 'select * from post where district like "%' . $district . '%" and post_id in (select post_id from post where location not like "%' . $city . '%") and username in (select username from customers where status="yes")';
    $querydistrict_res = mysqli_query($conn, $querydistrict);
  }
  $querycity = 'select * from post where ((location like "%' . $city . '%" or pincode like "% ' . $city . '%") or (district like "%uwuwuuuwuwuwuwuuwuw%")) and username in (select username from customers where status="yes") order by date DESC';
  $querycity_res = mysqli_query($conn, $querycity);
  // var_dump ($querycity_res);
} else {
  $querycity = 'select * from post where username in (select username from customers where status="yes")';
  $querycity_res = mysqli_query($conn, $querycity);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <script defer src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="housingadda.in" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="title" content=" Properties | HousingAdda" />
    
    <meta name="description" content="Find your dream home with Mr Deepak Singh, your trusted real estate expert. Browse our listings of properties for sale and rent all over Mumbai,Thane,Badlapur and other nearby locations. Contact us today for personalized assistance and exceptional service" />
    
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
    Properties | HousingAdda
  </title>
</head>

<body>
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
            <a href="properties.php" class="nav__link active-page">
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
              <span><?php echo $_SESSION["name"] ?></span><i class='bx bx-user'></i>
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


  <div class="section" style="padding-bottom: 0px;">
    <div class="container">

      <span class="d-block d-flex align-items-center justify-content-center">
        <form action="" method="POST" class="home__search " style="width:60%;margin-bottom: 2rem;margin-top: 2rem;">
          <i class='bx bxs-map'></i>
          <input type="search" name="city" style="width:90%;" placeholder="Search by location.." class="home__search-input ">
          <button class="searchbutton" name="search" style="box-shadow: none;" type="submit">Search</button>
          <a class="searchbutton" href="property-create.php" style="margin-left:0.25rem;box-shadow: none;  white-space: nowrap;" type="submit">Sell your property</a>
        </form>
      </span>

      <div class="row align-items-start">
        <div class="col-lg-6 text-left">
          <h2 class="font-weight-bold text-primary heading" style="margin-bottom: 0px;">
            Featured Properties
          </h2>
          <span class="section__subtitle">
            Best choices
          </span>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="property-slider-wrap propertiesphp-slider">
            <div class="property-slider">

              <?php
              while ($post = $featuredquery_res->fetch_assoc()) {
                $postid = $post['post_id'];
                $imagequery = "select * from images where post_id=$postid limit 1";
                $imagequery_res = mysqli_query($conn, $imagequery)->fetch_assoc();
                if (fmod($post['bhk'], 1) == 0) {
                  $room = $post['bhk'];
                  $bath = $post['bhk'];
                } else {
                  $room = floor($post['bhk']);
                  $bath = floor($post['bhk'] - 1);
                }
                echo '
                  <div class="property-item">
                     <a  class="img">
                      <img src="' . $imagequery_res["path"] . '" alt="Image" class="img-fluid" />
                    </a>

                    <div class="property-content">
                      <div class="price mb-2"><span>₹' . $post["price"] . '</span></div>
                      <div>
                        <span class="city d-block mb-3">' . $post["title"] . '</span>
                        <span class="d-block mb-2 text-black-50">' . $post["location"] . '</span>

                        <div class="specs d-flex mb-4">
                          <span class="d-block d-flex align-items-center me-3">
                            <span class="icon-bed me-2"></span>
                            <span class="caption">' . $room . ' beds</span>
                          </span>
                          <span class="d-block d-flex align-items-center">
                            <span class="icon-bath me-2"></span>
                            <span class="caption">' . $bath . ' baths</span>
                          </span>
                        </div>

                        <a href="property-single.php?post_id=' . $post["post_id"] . '" class="btn btn-primary py-2 px-3">See details</a>
                      </div>
                    </div>
                  </div>';
              } ?>
              <!-- .item -->


              <!-- .item -->
            </div>

            <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
              <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1">Prev</span>
              <span class="next" data-controls="next" aria-controls="property" tabindex="-1">Next</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="section section-properties" style="padding:2rem 0rem 0rem 0rem;">
      <div class="container">
        <div class="col-lg-6 text-left">
          <h2 class="font-weight-bold text-primary heading" style="margin-bottom: 0px;">
            <?php echo (isset($city) ? "All Properties in " . ucfirst($city) : "All properties")?>
          </h2>
          <span class="section__subtitle">
            Properties available near you
        </span>
        </div>
        <div class="row">

  <?php if (mysqli_num_rows($querycity_res) > 0) {
    while ($post = $querycity_res->fetch_assoc()) {
      if (fmod($post['bhk'], 1) == 0) {
        $room = $post['bhk'];
        $bath = $post['bhk'];
      } else {
        $room = floor($post['bhk']);
        $bath = floor($post['bhk'] - 1);
      }
      $postid = $post['post_id'];
      $imagequery = "select * from images where post_id=$postid limit 1";
      $imagequery_res = mysqli_query($conn, $imagequery)->fetch_assoc();
      echo ' 
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4" style="margin">
            <div class="property-item mb-30">
              <a class="img">
                <img src="' . $imagequery_res["path"] . '" alt="Image" class="img-fluid" />
              </a>

              <div class="property-content">
                <div class="price mb-2"><span style="color:hsl(25,83%,53%);">₹</span>' . $post['price'] . '</div>
                <div>
                  <span class="city d-block mb-3">' . $post['title'] . '</span>
                  <span class="d-block mb-2 text-black-50"
                    >' . $post['location'] . ' ' . $post['pincode'] . '</span
                  >

                  <div class="specs d-flex mb-4">
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-bed me-2"></span>
                      <span class="caption">' . $room . ' rooms</span>
                    </span>
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-bath me-2"></span>
                      <span class="caption">' . $bath . ' bath</span>
                    </span>
                  </div>

                  <a
                    href="property-single.php?post_id=' . $post['post_id'] . '"
                    class="btn btn-primary py-2 px-3"
                    >See details</a
                  >
                </div>
              </div>
            </div>
          </div>';
    }
  } ?>
  <?php if (isset($querydistrict_res)) {
    if (mysqli_num_rows($querydistrict_res) > 0) {

      while ($post = $querydistrict_res->fetch_assoc()) {
      if (fmod($post['bhk'], 1) == 0) {
        $room = $post['bhk'];
        $bath = $post['bhk'];
      } else {
        $room = floor($post['bhk']);
        $bath = floor($post['bhk'] - 1);
      }
      $postid = $post['post_id'];
      $imagequery = "select * from images where post_id=$postid limit 1";
      $imagequery_res = mysqli_query($conn, $imagequery)->fetch_assoc();
        echo ' 
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <div class="property-item mb-30">
             <a class="img">
                <img src="' . $imagequery_res["path"] . '" alt="Image" class="img-fluid" />
              </a>

              <div class="property-content">
                <div class="price mb-2"><span style="color:hsl(25,83%,53%);">₹</span>' . $post['price'] . '</div>
                <div>
                  <span class="city d-block mb-3">' . $post['title'] . '</span>
                  <span class="d-block mb-2 text-black-50"
                    >' . $post['location'] . ' ' . $post['pincode'] . '</span
                  >

                  <div class="specs d-flex mb-4">
                    <span class="d-block d-flex align-items-center me-3">
                      <span class="icon-bed me-2"></span>
                      <span class="caption">' . $room . ' rooms</span>
                    </span>
                    <span class="d-block d-flex align-items-center">
                      <span class="icon-bath me-2"></span>
                      <span class="caption">' . $bath . ' bath</span>
                    </span>
                  </div>

                  <a
                    href="property-single.php?post_id=' . $post['post_id'] . '"
                    class="btn btn-primary py-2 px-3"
                    >See details</a
                  >
                </div>
              </div>
            </div>
          </div>';
      }
    }
  } ?>
  </div>
  </div>
  </div>
  <div style="padding:2rem">
    <center>
      <p>Looks like you've reached the end</p>
    </center>
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
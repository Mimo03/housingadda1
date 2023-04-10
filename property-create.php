<?php
include("./partials/connect.php");
include("./partials/conditions.php");

if (!isset($_SESSION["username"])) {
  echo "<script>window.location = '/login.php'</script>";
}

if (isset($_POST['submit'])) {
  $title = htmlspecialchars($_POST["title"]);
  $description =htmlspecialchars($_POST["description"]);
  $location = htmlspecialchars($_POST["location"]);
  $price = htmlspecialchars($_POST["price"]);
  $area = htmlspecialchars($_POST["area"]);
  $bhk = htmlspecialchars($_POST["bhk"]);
  $floor = htmlspecialchars($_POST["floor"]);
  $furnished = htmlspecialchars($_POST["furnished"]);
  $possesion = htmlspecialchars($_POST["possesion"]);
  $district = htmlspecialchars($_POST["district"]);
  $pincode = htmlspecialchars($_POST["pincode"]);

  $insert_post = "insert into post (username, title, description, location, price, area, bhk, floor, furnished, possesion ,district ,pincode) values ('$username', '$title', '$description', '$location',  $price, '$area', '$bhk', $floor , '$furnished', '$possesion', '$district', $pincode )";
  $res_insert_post = mysqli_query($conn, $insert_post);
  // echo (var_dump($res_insert_post));
  // exit();
  if ($res_insert_post) {
    $get_post_id = "select post_id from post where ((username=$username and title='$title') and (description='$description' and location='$location')) and ((area='$area' and price=$price) and (bhk='$bhk' and floor=$floor) and (furnished='$furnished' and possesion='$possesion') and (district='$district' and pincode=$pincode))";
    $res_get_post_id = mysqli_query($conn, $get_post_id)->fetch_assoc() or die(mysqli_error($conn));
    $post_id = $res_get_post_id["post_id"];

    if ($_FILES['images']['name'][0]==""){
      $insert_img_default = "insert into images (post_id, username, path) values ($post_id, '$username', './images/default.jpg')";
      $insert_img_default_res= mysqli_query($conn,$insert_img_default) or die(mysqli_error($conn));
      echo "<script>window.location = '/login.php'</script>";
    }
    
    if (isset($_FILES['images'])) {
      $total = count($_FILES['images']['name']);
      // Loop through each file
      $error=upload_image($post_id);
    //   // for ($i = 0; $i < $total; $i++) {
  
    //   //   //Get the temp file path
    //   //   $tmpFilePath = $_FILES['images']['tmp_name'][$i];
  
    //   //   //Make sure we have a file path
    //   //   if ($tmpFilePath != "") {
    //   //     //Setup our new file path
    //   //     $newFilePath = "./images/" . $_FILES['images']['name'][$i];
    //   //     //Upload the file into the temp dir
    //   //     if (move_uploaded_file($tmpFilePath, $newFilePath)) {
    //   //       // Handle other code here
    //   //     $insert_img = "insert into images (post_id, username, path) values ($post_id, '$username', '$newFilePath')";
    //   //     $insert_img_res= mysqli_query($conn,$insert_img);  
    //   //     echo "<script>window.location = '/profile.php'</script>";
    //   //     }
    //   //   }
    //   // }
     }
    // // $insert_img = "insert into images (post_id, cust_id, path) values ($post_id, $cust_id, '$image')";
    // // $res_insert_img = mysqli_query($conn, $insert_img) or die(mysqli_error($conn));
    // // if ($res_insert_img) {
    // //     header("Location: /index.php");
    // // } else {
    // //     $errormsg = "something went wrong";
    // //     echo "something went wrong";
    // // }
    echo "<script>window.location= '/profile.php'</script>";
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

    <meta name="title" content="Welcome To Housing Adda.in" />
    
    <meta name="description" content="Want to sell Your Property? Create your listing now on housingadda.in to get featured." />
    
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
    Post your property | HousingAdda
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
              <li><a class="dropdown-item login-dropdown" href="profile.php" >My Properties</a></li>
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
      <form enctype='multipart/form-data' method='POST' action="">
        <div class="row">
          <h2 class="font-weight-bold text-primary heading text-center" style="margin-bottom: 0px;">
            List your property
          </h2>
          <div class="containerimg" style="width:60%">
            <input type="file" id="file-input" name="images[]" accept="image/png, image/jpeg" onchange="preview()" multiple>
            <label for="file-input">
              <i class="fas fa-upload"></i> &nbsp; Choose multiple photos
            </label>
            <p id="num-of-files" style="margin-bottom:0px;">No Files Chosen</p>
            <p id="num-of-files" style="margin-top:0px;">(Maximum of 10 photos)</p>

            <div id="images"></div>
          </div>
          <span class="d-block d-flex align-items-center justify-content-center">
            <div action="" class="home__search " style="width:60%">
              <h3 style="margin-bottom: 0px;font-size:1rem;white-space: nowrap;">Property Name</h3>
              <input type="search" name="title" class="home__search-input " style="width:80%" required>
              <!-- <button class="searchbutton" type="submit">Search</button> -->

            </div>
          </span>
          <span class="d-block d-flex align-items-center justify-content-center">
            <div action="" class="home__search " style="width:60%">
              <h3 style="margin-bottom: 0px;font-size:1rem;">Address</h3>
              <input type="search"  name="location" class="home__search-input " style="width:90%"  required>
              <!-- <button class="searchbutton" type="submit">Search</button> -->

            </div>
          </span>
          <span class="d-block d-flex align-items-center justify-content-center">
            <div action="" class="home__search " style="width:60%">
              <h3 style="margin-bottom: 0px;font-size:1rem;white-space: nowrap;">Pin Code</h3>
              <input type="search" id="pincode" maxLength="6" name="pincode" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="home__search-input " style="width:90%" required>
              <!-- <button class="searchbutton" type="submit">Search</button> -->

            </div>
          </span>

          <span class="d-block d-flex align-items-center justify-content-center">
            <div action="" class="home__search " style="width:60%">
              <h3 style="margin-bottom: 0px;font-size:1rem;">District</h3>
              <!-- <input type="hidden" id="district" value="Thane" name="district" class="home__search-input " style="width:90%" readonly> -->
              <input type="text" id="district" value="" name="district" class="home__search-input " style="width:90%;color:hsl(228,12%,75%);" readonly>
              <!-- <button class="searchbutton" type="submit">Search</button> -->
            </div>
          </span>

          <span class="d-block d-flex align-items-center justify-content-center">
            <div action="" class="home__search " style="width:60%">
              <h3 style="margin-bottom: 0px;font-size:1rem;">Price</h3>
              <input type="number" name="price" class="home__search-input " required>
              <!-- <button class="searchbutton" type="submit">Search</button> -->

            </div>
          </span>
          <span class="d-block d-flex align-items-center justify-content-center">
            <div action="" class="home__search " style="width:60%">
              <h3 style="margin-bottom: 0px;font-size:1rem;">Description</h3>
              <textarea type="text" rows="4" cols="50" name="description" required class="home__search-input " style="width:90%;"></textarea>
              <!-- <button class="searchbutton" type="submit">Search</button> -->

            </div>
          </span>

          <span class="d-block d-flex align-items-center justify-content-center">
            <div action="" class="home__search " style="width:60%">
              <h3 style="margin-bottom: 0px;font-size:1rem;white-space: nowrap;">Carpet area</h3>
              <input type="search" name="area" required class="home__search-input ">
              <!-- <button class="searchbutton" type="submit">Search</button> -->

            </div>
          </span>

          <span class="d-block d-flex align-items-center justify-content-center">
            <div action="" class="home__search " style="width:60%">
              <h3 style="margin-bottom: 0px;font-size:1rem;">BHK</h3>
              <input type="number" step="0.01" name="bhk" required class="home__search-input ">
              <!-- <button class="searchbutton" type="submit">Search</button> -->

            </div>
          </span>

          <span class="d-block d-flex align-items-center justify-content-center">
            <div action="" class="home__search " style="width:60%">
              <h3 style="margin-bottom: 0px;font-size:1rem;white-space: nowrap;">Floor Number</h3>
              <input type="number" name="floor" required class="home__search-input ">
              <!-- <button class="searchbutton" type="submit">Search</button> -->

            </div>
          </span>

          <span class="d-block d-flex align-items-center justify-content-center">
            <div action="" class="home__search " style="width:60%">
              <h3 style="margin-bottom: 0px;font-size:1rem;">Possesion</h3>
              <input type="month" name="possesion" required value="2023-03" class="home__search-input " style="width:90%;color:var(--text-color-light);">
              <!-- <button class="searchbutton" type="submit">Search</button> -->

            </div>
          </span>

          <span class="d-block d-flex align-items-center justify-content-center">
            <div action="" class="home__search " style="width:60%">
              <h3 style="margin-bottom: 0px;font-size:1rem;">Furnished</h3>
              <!-- <input type="search" placeholder="Write a description" >  -->
              <select name="furnished" id="furnished" name="furnished" required class="home__search-input" style="width:90%;color:var(--text-color-light);">
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
            </div>
          </span>


          <div class="text-center mt-3">
            <button type="submit" class="searchbutton" name="submit" style="width:60%; border-radius: .75rem;">Create listing</button>
          </div>
          <!--Script-->
          <script src="script.js"></script>

        </div>
      </form>
    </div>

  </div>
  <?php include('./partials/footer.php');?>


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
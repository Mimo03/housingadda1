<?php
include('partials/conditions.php');

$featuredquery = 'select * from post where featured=1';
$featuredquery_res = mysqli_query($conn, $featuredquery);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="housingadda.in" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="title" content="Welcome To Housing Adda.in" />
    
    <meta name="description" content="Find your dream home with Mr Deepak Singh, your trusted real estate expert. Browse our listings of properties for sale and rent all our Mumbai,Thane,Badlapur and other nearby locations. Contact us today for personalized assistance and exceptional service" />
    
    <meta name="keywords" content="buy,rent,housingadda, real estate, properties near me, for sale,contact,property dealer,real estate agent" />
    
    <meta name="robots" content="index, follow">
    
    <link rel="canonical" href="https://www.housingadda.in/" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style2.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />


    <!-- new -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <title>
        Welcome to Housing Adda
    </title>
</head>

<body>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script defer src="index2.js"></script>

    <header class="header" id="header">
        <nav class="nav container">
            <a href="index.php" class="nav__logo">
                <i class='bx bxs-home-alt-2'></i>Housing Adda
            </a>

            <div class="nav__menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link active-page">
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
                    <li class="nav__item">
                        <?php if (isset($_SESSION["username"])) { ?>
                            <div class="dropdown">

                                <a onclick="myFunction()" class="dropbtn nav__link"><span><?php echo ($_SESSION["name"]) ?></span><i class='bx bx-user'></i></a>
                                <div id="myDropdown" class="dropdown-content" id="dropdown-content">
                                    <a href="profile.php">My properties</a>
                                    <a href="profile-edit.php">Profile settings</a>
                                    <hr>
                                    <a href="logout.php?logout=true">Logout</a>
                                </div>
                            </div>
                        <?php } else {
                            echo '<a href="login.php" class="nav__link"><span>Login</span><i class="bx bx-user"></i></a>';
                        } ?>
                    </li>

                </ul>
            </div>
        </nav>
    </header>


    <main class="main">

        <section class="home section" id="home">
            <div class="home__container container grid ">
                <div class="home__data">
                    <h1 class="home__title ">
                        Discover<br>the best<br>property.
                    </h1>

                    <p class="home__description ">
                        Discover exceptional property deals and list your properties absolutely free of charge.
                    </p>

                    <form action="properties.php" method="POST" class="home__search ">
                        <i class='bx bxs-map'></i>
                        <input type="text" name="city" placeholder="Search by location.." class="home__search-input ">
                        <button class="button" type="submit">Search</button>
                    </form>

                    <div class="home__value">
                        <div>
                            <h1 class="home__value-number">
                                200 <span>+</span>
                            </h1>
                            <span class="home__value-description">
                                Estates<br>Listed
                            </span>
                        </div>
                        <div>
                            <h1 class="home__value-number">
                                500 <span>+</span>
                            </h1>
                            <span class="home__value-description">
                                Happy<br>clients
                            </span>
                        </div>
                        <div>
                            <h1 class="home__value-number">
                                20 <span>+</span>
                            </h1>
                            <span class="home__value-description">
                                Locations<br>served
                            </span>
                        </div>
                    </div>
                </div>

                <div class="home__images">
                    <div class="home__orbe"></div>
                    <div class="home__img">
                        <img src="images/img_5.jpg" alt="">
                    </div>
                </div>
            </div>
        </section>

        <section class="section popular" id="popular">
            <div class="container">
                <h2 class="section__title">
                    Popular Projects<span>.</span>
                </h2><span class="section__subtitle">
                    Swipe to check out our featured properties.
                </span>

                <div class="popular__container swiper">
                    <div class="swiper-wrapper">
                        <?php

                        while ($post = $featuredquery_res->fetch_assoc()) {
                            $postid=$post['post_id'];
                            $imagequery = "select * from images where post_id=$postid limit 1";
                            $imagequery_res = mysqli_query($conn, $imagequery)->fetch_assoc();                           
                            echo '<article class="popular__card swiper-slide">
                            <div>
                                <img src="'.$imagequery_res["path"].'" alt="" class="popular__img">
                            </div>

                            <div class="popular__data ellipsis">
                                <h2 class="popular__price">
                                    <span>₹</span>'.$post["price"].'
                                </h2>
                                <h3 class="popular__title ellipsis">
                                    '.$post["title"].'
                                </h3>
                                <p class="popular__description ellipsis">
                                    '.$post["location"].'
                                </p>
                            </div>
                        </article>';
                        }
                        ?>
                    </div>
                    <!-- <div class="swiper-button-next">

                    </div>
                    <div class="swiper-button-prev">
                        
                    </div> -->
                </div>
            </div>
        </section>

        <section class="contact section" id="contact">
            <div class="contact__container container grid">
                <div class="contact__images">
                    <div class="contact__orbe">

                    </div>

                    <div class="contact__img">
                        <img src="images/img_1.jpg">
                    </div>
                </div>
                <div class="contact__content">
                    <div class="contact__data">

                        <h2 class="section__title" style="padding-bottom: 1rem;">
                            Find your dream home today<span>.</span>
                        </h2>
                        <!-- <span class="section__subtitle">
                            Reach out to us
                        </span> -->
                        <p class="contact__description ">
                            Find properties that suit you, connect with #1 Real Estate agents.
                        </p>
                    </div>
                    <div class="contact__card">
                        <div class="contact__card-box">
                            <div class="contact__card-info">
                                <i class='bx bx-phone'></i>
                                <div>
                                    <h3 class="contact__card-title">
                                        Call us
                                    </h3>
                                    <p class="contact__card-description">
                                        9075381772
                                    </p>
                                </div>
                            </div>
                            <a href="tel:9075381772" class="button contact__card-button">Call now</a>
                        </div>

                        <div class="contact__card-box">
                            <div class="contact__card-info">
                                <i class='bx bxl-whatsapp'></i>
                                <div>
                                    <h3 class="contact__card-title">
                                        Message
                                    </h3>
                                    <p class="contact__card-description">
                                        9075381772  
                                    </p>
                                </div>
                            </div>
                            <a href="//api.whatsapp.com/send?phone=919075381772&text=Hello, I am interested in your listings." class="button contact__card-button">Chat now</a>
                        </div>

                        <div class="contact__card-box contact__email">
                            <div class="contact__card-info">
                                <i class='bx bx-envelope'></i>
                                <div>
                                    <h3 class="contact__card-title">
                                        Email us
                                    </h3>
                                    <p class="contact__card-description">
                                        housingadda23@gmail.com
                                    </p>
                                </div>
                            </div>
                            <a href="mailto:housingadda23@gmail.com" class="button contact__card-button">Email now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        

        <section class="subscribe section ">
            <div class="subscribe__container">
                <h1 class="subscribe__title">
                    Get Started with Housing Adda
                </h1>
                <p class="subscribe__description ">
                    Register now to discover a world of properties and find your perfect match!
                </p>
                <a href="login.php" style="border:none;" class="button subscribe__button ">
                    Get Started
                </a>
            </div>
        </section>

        <a href="#" class="scrollup" id="scroll-up">
            <i class='bx bx-chevrons-up'></i>
        </a>

    </main>

    <?php //include("./partials/footer.php")
    ?>
    
        <div class="mainfootercontainer">
        
        <footer class="container ">
            <div class="mainfooter">
                <div class="footer__about">
                    <h2>About</h2>
                    <p>Housing Adda is a trusted real estate firm based in Badlapur, Maharashtra that brings you the best properties across Maharashtra. We understand that finding your dream home is not just about the perfect location, but also about affordability. That's why we strive to showcase amazing and cost-friendly properties that fit your budget without compromising on quality. We believe in building lasting relationships with our clients based on trust and mutual respect. So, whether you're looking to buy or rent a property, you can rely on us to guide you through the entire process. Contact us today to learn more about our services and how we can help you find your dream home.</p>
                </div>
                <div class="footer__links">
                    <h2>Links</h2>
                    <ul>
                        <p><a href="/property-create.php">Sell properties</a></p>
                        <p><a href="/properties.php">Buy properties</a></p>
                        <p><a href="/index.php#contact">Contact us</a></p>
                        <p><a href="https://www.linkedin.com/company/jvsh-technologies/">JVSH technologies</a></p>
                        <p><a href="/credits">Resources</a></p>
                    </ul>
                </div>
                <div class="footer__address">
                    <h2>Address</h2>
                    <p>Badlapur(West) 421503</p>
                    <p>Maharashtra</p>
                </div>
                <div class="footer__copyright">
                    <p>Housingadda © 2023 </p>
                </div>
            </div>
    </div>
    </footer>
    </div>

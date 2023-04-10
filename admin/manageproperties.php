<?php
include("../partials/conditions.php");
include("../partials/connect.php");
if (isset($_SESSION['username'])) {

    if ($_SESSION["role"] != "admin") {
        header("Location:  /index.php");
    }
}else{
    header("Location:  /index.php");
}

if(isset($_GET['postid'])){
    if(isset($_GET['hue'])){
        $decryption_value=openssl_decrypt($_GET['hue'], "AES-128-CTR","bandan",0,'1234567891011121');                    
        if ($_GET['postid']==$decryption_value){
            mysqli_query($conn,'delete from post where post_id='.$_GET["postid"]);
            header("Location: /admin/manageproperties.php");
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Profile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" rel="stylesheet" />
    <title>Manage properties</title>
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">


    <style>
        .status-btn {
            border: none;
            color: white;
            padding: 5px 10px;
            width: 70%;
            cursor: pointer;
            box-shadow: 0px 0px 15px gray
        }

        .approve {
            background-color: green;
        }

        .disapprove {
            background-color: red;
        }
    </style>




</head>

<body>

    <?php
    include("./header.php");
    include("./navbar.php");
    ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Manage properties</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Manage properties</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">

                <div class="col-xl-12 col-md-12">

                    <div class>
                        <div class>

                            <table class="table col-md-12 col-xs-3" id="tblUser">
                                <thead>

                                    <tr>
                                        <th>Post Id</th>
                                        <th>Title</th>
                                        <th>Location</th>
                                        <th>Username</th>
                                        <th>Featured</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $users_all = "select * from post ";
                                    $res_user = mysqli_query($conn, $users_all);

                                    while ($res = $res_user->fetch_assoc()) {
                                        // echo var_dump($res_user);
                                    ?>

                                        <tr>
                                            <td><?php echo $res['post_id']; ?></td>
                                            <td><a target="_blank" href=" /property-single.php?post_id=<?php echo $res['post_id'] ?>"><?php echo $res['title']; ?></a></td>
                                            <td><?php echo $res['location']; ?></td>
                                            <td><a href="tel:<?php echo $res['username']; ?>"><?php echo $res['username']; ?></a></td>
                                            <td>
                                                <button type="submit" style="width=70% !important;" id="<?php echo $res['post_id']; ?>" class="status-btn <?php echo $res['featured'] == 1 ? 'approve' : 'disapprove'; ?>">
                                                    <?php echo $res['featured'] == 1 ? 'Yes' : 'No'; ?>
                                                </button>
                                            </td>
                                            
                                            <td>
                                                <?php
                                                    $encryption_value=openssl_encrypt($res["post_id"], "AES-128-CTR","bandan",0,'1234567891011121'); 
                                                ?>
                                                
                                                <a href="manageproperties.php?postid=<?php echo ($res['post_id']).'&hue='.$encryption_value;?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                    </svg></a>
                                    
                                                </td>


                                        </tr>

                                    <?php } ?>
                                </tbody>

                            </table>
                            <!-- ============displaying data with approval button========== -->

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                            <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

                            <script>
                                $(document).ready(function() {
                                    $('#tblUser').DataTable(

                                    );


                                    $('.status-btn').on("click", function() {
                                        var username = $(this).attr('id');

                                        console.log($(this));

                                        $.ajax({
                                            type: "POST",
                                            url: "./featured.php",
                                            data: {
                                                updateId: username
                                            },
                                            dataType: "html",
                                            cache:false,
                                            success: function(data) {
                                                if ($("#" + username).hasClass("approve")) {
                                                    // console.log("1")
                                                    $("#" + username).addClass("disapprove");
                                                    $("#" + username).removeClass("approve");
                                                    document.getElementById(username).innerHTML="No";

                                                } else if ($("#" + username).hasClass("disapprove")) {
                                                    // console.log("2")
                                                    $("#" + username).addClass("approve");
                                                    $("#" + username).removeClass("disapprove");
                                                    document.getElementById(username).innerHTML="Yes";
                                                    console.log("text ke yes me aya");

                                                }

                                            }
                                        });

                                    });
                                });
                            </script>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include("./footer.php");?>
   

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>
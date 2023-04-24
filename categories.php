<?php
include("admin/db.php");
$id = $_GET['id'];

date_default_timezone_set('Asia/Kolkata');
$today = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ನಮ್ಮೂರ ವಾರ್ತೆ</title>
    <link rel="shortcut icon" href="logo.png">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="logo.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>

    </style>

</head>

<body>
      <!-- Topbar Start -->
    <div class="container-fluid bg-light d-none d-sm-block">
        <div class="row align-items-center   text-center justify-content-between  bg-light  py-2 px-lg-5">
            <div class=" row  text-center align-items-center">
                <div class=" text-center text-lg-left">
                    <!-- <img class="img-fluid" src="img/ads-700x70.jpg" alt=""> -->
                    <img class="img-fluid" src="logo.png" alt="">
                </div>
                <div class=" text-left">
                    <a href="" class="navbar-brand d-none d-lg-block">
                        <h1 class="m-0 display-4 text-uppercase"><span class="text-primary">ನಮ್ಮೂರ </span>ವಾರ್ತೆ</h1>
                    </a>
                </div>
            </div>
            <!-- ads -->
            <div class="ads col-lg-3 d-none d-lg-block ">

                <?php
                $q1 = mysqli_query($db, "select * from ads order by `id` asc LIMIT 1 ");
                while ($r1 = mysqli_fetch_array($q1)) {
                    ?>
                    <div><embed src="admin/advrt/<?= $r1['ads'] ?> " height="100px" width="100%"></embed>
                    </div>
                    <?php
                }
                ?>


            </div>

            <!-- ads end -->
        </div>

    </div>
    <!-- Topbar End -->
 <!-- Topbar Start sec -->
    <div class="container-fluid d-none d-md-block d-lg-none  ">
        <div class="row bg-light align-items-center justify-content-center py-2 px-lg-5">
            <div class=" text-center text-lg-right">
                <!-- <img class="img-fluid" src="img/ads-700x70.jpg" alt=""> -->
                <img class="img-fluid" src="logo.png" alt="">
            </div>
            <div class=" text-left">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">ನಮ್ಮೂರ </span>ವಾರ್ತೆ</h1>
                </a>
            </div>

        </div>

    </div>
 <!-- Topbar Start sec ends -->
   

    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><img src="logo.png" alt="" height="60px" ><span class="text-primary">ನಮ್ಮೂರ </span>ವಾರ್ತೆ</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="index.php" class="nav-item nav-link"> <i class="fa fa-home " aria-hidden="true"
                            style="font-size: 2.5em;"></i> </a>
                    <?php
                    $q = mysqli_query($db, "select * from categories");
                    while ($r = mysqli_fetch_array($q)) {
                        ?>
                        <a href="categories.php?id=<?= $r[0] ?>" class="nav-item nav-link ">
                            <h3>
                                <?= $r[1] ?>
                            </h3>
                        </a>
                        <?php
                    }
                    ?>

                </div>

            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- breaking_news -->
    <div class="row pl-0 align-items-center bg-light px-lg-5">
        <div class="col-12 pl-0 d-flex justify-content-between">

            <div class="bg-primary col-lg-2 text-white text-center py-2" style="width: 200px; ">
                <h4 class=" text-light font-weight-bold p-2">ಬ್ರೇಕಿಂಗ್ ನ್ಯೂಸ್</h4>
            </div>
            <div class="col-lg-10">

                <?php
                $x = '';
                $head_lines = mysqli_query($db, "select * from `breaking_news` order by `id` DESC LIMIT 5");
                while ($head_line = mysqli_fetch_array($head_lines)) {
                    $x = $x . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . "<b> * </b>" . $head_line[1];

                }
                ?>
                <marquee class="mrq font-weight-bold " direction="left" style="height:40px;color:dark;margin-top:20px">
                    <h4 class="font-weight-bold">
                        <?= $x; ?>
                    </h4>
                </marquee>


            </div>
        </div>

    </div>
    <!-- breaking_news  ends -->




    <!-- Category News Slider Start -->
    <div class="row col-lg-12 justify-content-center  catWithAds ">
        <div class="row  col-lg-8 category-div ">

            <?php
            $id = $_GET['id'];
            $qry = mysqli_query($db, "select * from categories  where id='$id' order by id desc");
            while ($row = mysqli_fetch_array($qry)) {
                ?>
                <div class="col-lg-12 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">
                            <?= $row[1] ?>
                        </h3>
                    </div>

                    <div class="owl-carousel  owl-carousel-3 carousel-item-2 position-relative">

                        <?php
                        $q1 = mysqli_query($db, "select * from news where category='$row[0]' order by id desc limit 3");
                        while ($r1 = mysqli_fetch_array($q1)) {
                            ?>
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="admin/news_images/<?= $r1[3] ?>" style="height:300px">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="<?= $row[1] ?>" class="text-decoration-none"><?= $row[1] ?></a>
                                        <span class="px-1">/</span>
                                        <span>
                                            <?= date('d-m-Y', strtotime($r1[9])) ?>
                                        </span>
                                    </div>
                                    <a class="h4 m-0" href="news.php?id=<?= $r1[0] ?>">
                                        <h5><strong>
                                                <?= $r1[2] ?>
                                            </strong></h5>
                                    </a></a>
                                </div>
                            </div>

                            <?php
                        }
                        ?>


                    </div>
                </div>


                <?php

            } ?>
        </div>





        <div class="ads col-lg-3 mt-3">
            <div class="bg-light py-2 px-4 mb-3">
                <h3 class="m-0">ಜಾಹೀರಾತು</h3>
            </div>


            <?php
            $q1 = mysqli_query($db, "select * from ads");
            while ($r1 = mysqli_fetch_array($q1)) {
                ?>
                <div><embed src="admin/advrt/<?= $r1['ads'] ?> " height="100%" width="100%"></embed>
                </div>
                <?php
            }
            ?>


        </div>
    </div>


    <!-- Category News Slider End -->


    <!-- Latest News Slider Start -->
    <div class=" container-fluid justify-content-center py-3">

        <div class="d-flex  align-items-center justify-content-between bg-light py-2 px-4 mb-3">
            <h3 class="m-0">ಇತರೆ ಸುದ್ದಿ</h3>
        </div>
        <div class=" justify-content-center">

            <div
                class="owl-carousel  col-lg-12 justify-content-center  owl-carousel-2 carousel-item-4 position-relative">


                <?php
                $q1 = mysqli_query($db, "select * from news order by id desc limit 10");
                while ($r1 = mysqli_fetch_array($q1)) {
                    ?>
                    <div class="position-relative overflow-hidden" style="height: 300px;">
                        <img class="img-fluid w-100 h-100" src="admin/news_images/<?= $r1[3] ?>" style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                 <span class="px-1 text-white"></span>
                                <a class="text-white text-decoration-none" href="news.php?id=<?= $r1[0] ?>"><?= date('d-m-Y', strtotime($r1[9])) ?></a>
                            </div>
                            <a class="h4 m-0 text-white" href="news.php?id=<?= $r1[0] ?>">
                                <?= $r1[2]; ?>
                            </a>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>

        </div>

    </div>
    </div>
    <!-- Latest News Slider End -->
    <!-- Footer Start -->
    <div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
        <div class="conatiner justify-content-center">
            <div class=" row justify-content-center">
                <div class="col-lg-3 col-md-6 mb-5">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">ನಮ್ಮೂರ </span>ವಾರ್ತೆ
                        </h1>
                    </a>

                    <div class="d-flex justify-content-start mt-4">
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                            href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                            href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                            href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                            href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                            href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-5">
                    <h4 class="font-weight-bold mb-4">Categories</h4>
                    <div class="d-flex flex-wrap m-n1">

                        <?php
                        $q = mysqli_query($db, "select * from categories");
                        while ($r = mysqli_fetch_array($q)) {
                            ?>
                            <a href="categories.php?id=<?= $r[0] ?>" class="btn btn-sm btn-outline-secondary m-1"><?= $r[1] ?></a>

                            <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-5">
                    <h4 class="font-weight-bold mb-4">Contact</h4>
                    <!-- <div class="d-flex flex-column justify-content-start">
                        <a class="text-secondary mb-2" href="#"><i class="fa  text-dark mr-2"></i>About</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa  text-dark mr-2"></i>Advertise</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa  text-dark mr-2"></i>Privacy & policy</a>
                        <a class="text-secondary mb-2" href="#"><i class="fa  text-dark mr-2"></i>Terms & conditions</a>
                        <a class="text-secondary" href="#"><i class="fa  text-dark mr-2"></i>Contact</a>
                    </div> -->

                    <div class="d-flex flex-column justify-content-start">
                        <!-- <a class="text-secondary mb-2" href="#"><i class="fa  text-dark mr-2"></i>About</a> -->
                        <i class="fa  text-dark mr-2 text-secondary mb-2">ನಮ್ಮೂರ ವಾರ್ತೆ</i>
                        <i class="fa  text-dark mr-2 text-secondary mb-2"></i>
                        <i class="fa  text-dark mr-2 text-secondary mb-2">1st Floor, Beside to Police Station</i>
                        <i class="fa  text-dark mr-2 text-secondary mb-2">Bharathi Street, opp. to Canara Bank</i>
                        <i class="fa  text-dark mr-2 text-secondary mb-2">Sringeri, Karnataka 577139</i>
                        <i class="fa  text-dark mr-2 text-secondary mb-2"></i>
                        <i class="fa  text-dark mr-2 text-secondary mb-2">Tel: +91 9876543210</i>
                        <i class="fa  text-dark mr-2 text-secondary mb-2">Email: info@nammuravarthe.com</i>

                    </div>


                </div>
                <div class="col-lg-2 col-md-6 mb-5">
                    <div class="col-lg-8 text-center justify-content-center text-lg-right">
                        <!-- <img class="img-fluid" src="img/ads-700x70.jpg" alt=""> -->
                        <img src="logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid py-4 bg-light px-sm-3 px-md-5">
        <p class="m-0 text-center bg-light">
            &copy; <a class="font-weight-bold" href="#">Copyright © 2023 -</a> All Rights Reserved - ನಮ್ಮೂರ ವಾರ್ತೆ

            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            Designed by <a class="font-weight-bold" href="https://srisadguruhytech.in/">SriSadguru HyperTechnologies Pvt
                Ltd</a>
        </p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<?php
include("admin/db.php");
$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ನಮ್ಮೂರ ವಾರ್ತೆ</title>
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

         <!-- for imges pop up links -->
         <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link rel="stylesheet" type="text/css" href="css/lightbox.min.css">
    <script src="js/lightbox-plus-jquery.min.js" type="text/javascript"></script>


    <style>
        /* Style the Image Used to Trigger the Modal */
#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
       
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
                    <a href="index.php" class="nav-item nav-link "> <i class="fa fa-home " aria-hidden="true"
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


    <!-- News With Sidebar Start -->
    <div class="row justify-content-center">
        <div class="container-fluid col-lg-12 justify-content-center py-3">

            <div class="row col-lg-12 justify-content-center">
                <div class="col-lg-8">
                    <!-- News Detail Start -->
                    <?php
                    $id = $_GET['id'];
                    $q2 = mysqli_query($db, "select * from news where id='$id'");
                    if ($r2 = mysqli_fetch_array($q2)) {
                        ?>

                        <div class="position-relative justify-content-center mb-3">
                            <div class="justify-content-center">
                                
                            <img class="img-fluid w-10" style="width:100%;height:600px;" src="admin/news_images/<?= $r2[3] ?>">
                            </div>
                            <div class="overlay position-relative bg-light">

                                <div>
                                     <p> </p>
                                     <h6 class="mb-3"><?= $r2[4] ?></h6>
                                   
                                    <h2>
                                        <?= $r2[2]; ?>
                                    </h2>
                                    
                                    <p><i class="fa fa-calendar"></i>
                                        <?= date('d-m-Y', strtotime($r2[9])) ?>
                                        <?= date('h:i a', strtotime($r2[10])) ?></span>
                                    </p>
                                    <br>
                                    <p style="text-align: justify;text-indent: 5vw;font-size:large">
                                        <?= $r2[5] ?>
                                    </p>
                                    <br>
                                    <div class="row">
                                        <?php
                                        $x = $r2[6];
                                        $string = preg_replace('/\.$/', '', $x);
                                        $ar = explode(',', $string);
                                        $len = sizeof($ar);
                                        if ($len == 2) {
                                            for ($i = 1; $i < sizeof($ar); $i++) {
                                                ?>
                                                <div class="col-md-4 col-sm-12">
                                                </div>
                                                <div class="col-md-4 col-sm-12">
                                                    <img id="myImg" src="admin/news_images/<?= $ar[$i]; ?>" alt="multi_image"
                                                        style="width:200px;height:200px;margin:10px;">
                                                </div>
                                                 <!-- The Modal -->
                                                 <div id="myModal" class="modal">

                                                        <!-- The Close Button -->
                                                        <span class="close">&times;</span>

                                                        <!-- Modal Content (The Image) -->
                                                        <img class="modal-content" id="img01">

                                                        <!-- Modal Caption (Image Text) -->
                                                        <div id="caption"></div>
                                                        </div>

                                                <?php
                                            }
                                        } else if ($len == 3) {
                                            ?>
                                                <div class="col-md-2 col-sm-12">
                                                </div>
                                                <?php
                                                for ($i = 1; $i < sizeof($ar); $i++) {
                                                    ?>

                                                    <div class="col-md-4 col-sm-12">
                                                        <img id="myImg" src="admin/news_images/<?= $ar[$i]; ?>" alt="multi_image"
                                                            style="width:200px;height:200px;margin:10px;">
                                                    </div>
                                                   <!-- The Modal -->
                                                        <div id="myModal" class="modal">

                                                        <!-- The Close Button -->
                                                        <span class="close">&times;</span>

                                                        <!-- Modal Content (The Image) -->
                                                        <img class="modal-content" id="img01">

                                                        <!-- Modal Caption (Image Text) -->
                                                        <div id="caption"></div>
                                                        </div>


                                                <?php
                                                }
                                        } else {
                                            for ($i = 1; $i < sizeof($ar); $i++) {
                                                ?>
                                                    <div class="col-md-4 col-sm-12">
                                                        <img id="myImg" src="admin/news_images/<?= $ar[$i]; ?>" alt="multi_image"
                                                            style="width:200px;height:200px;margin:10px;">
                                                    </div>
                                                         <!-- The Modal -->
                                                         <div id="myModal" class="modal">

                                                            <!-- The Close Button -->
                                                            <span class="close">&times;</span>

                                                            <!-- Modal Content (The Image) -->
                                                            <img class="modal-content" id="img01">

                                                            <!-- Modal Caption (Image Text) -->
                                                            <div id="caption"></div>
                                                            </div>

                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <br>
                                    <p style="text-align: justify;text-indent: 5vw;font-size:large">
                                        <?= $r2[7] ?>
                                    </p>
                                    <br>

                                </div>
                            </div>
                        </div>

                        <?php
                    }
                    ?>
                    <!-- News Detail End -->


                </div>




                <!-- Ads Start -->
                <div class="col-lg-2 pt-3 pt-lg-0">

                    <div class="pb-3">
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


                    <!-- Ads End -->
                        
    <!-- Latest News Slider Start -->
            <div class=" container-fluid justify-content-center py-3">

                        <div class="d-flex  align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                            <h3 class="m-0">ಇತರೆ ಸುದ್ದಿ</h3>
                        </div>
                        <div class=" justify-content-center">

                            <div
                                class="owl-carousel  col-lg-12 justify-content-center  owl-carousel-2 carousel-item-1 position-relative">


                                <?php
                                $q1 = mysqli_query($db, "select * from news order by id desc limit 1");
                                while ($r1 = mysqli_fetch_array($q1)) {
                                    ?>
                                    <div class="position-relative overflow-hidden" style="height: 300px;">
                                        <img class="img-fluid w-100 h-100" src="admin/news_images/<?= $r1[3] ?>" style="object-fit: cover;">
                                        <div class="overlay">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a class="text-white" href="news.php?id=<?= $r1[0] ?>"></a>
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
                            <div
                                class="owl-carousel mt-5 col-lg-12 justify-content-center  owl-carousel-2 carousel-item-1 position-relative">


                                <?php
                                $q1 = mysqli_query($db, "select * from news order by id limit 1");
                                while ($r1 = mysqli_fetch_array($q1)) {
                                    ?>
                                    <div class="position-relative overflow-hidden" style="height: 300px;">
                                        <img class="img-fluid w-100 h-100" src="admin/news_images/<?= $r1[3] ?>" style="object-fit: cover;">
                                        <div class="overlay">
                                            <div class="mb-1" style="font-size: 13px;">
                                                <a class="text-white text-decoration-none" href="news.php?id=<?= $r1[1] ?>"></a>
                                                <span class="px-1 text-white"></span>
                                                <a class="text-white" href="news.php?id=<?= $r1[0] ?>"><?= date('d-m-Y', strtotime($r1[9])) ?></a>
                                            </div>
                                            <a class="h4 m-0 text-white" href="news.php?id=<?=$r1[0] ?>">
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


                </div>
            </div>

        </div>
    </div>

    <!-- News With Sidebar End -->

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
    <script>
                        // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                var img = document.getElementById("myImg");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                img.onclick = function(){
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
                }

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                modal.style.display = "none";
                }
    </script>

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
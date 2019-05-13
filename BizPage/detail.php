<?php include("includes/db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PcShop The Way Too Wellness</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <header id="header" style="background-color:black;">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">PcShop</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
          <li class="menu-has-children"><a href="">Categories</a>
            <ul>
              <?php
                 $query  = "SELECT * FROM category";
                 $run_query = mysqli_query($conn,$query);
                 if(!$run_query)
                 {
                   die(mysqli_error($conn));
                 }
               ?>
              <?php
              while($row = mysqli_fetch_assoc($run_query))
              {
              ?>
              <li>  <a href="category.php?category=<?php echo $id?>"><?php echo $row['Name']; ?></a></li>
              <?php
              }
              ?>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>  <?php
            //ar inaxavs sesias mivxvdi
            if (isset($_SESSION['FullName'])) : ?>
            <li><a href="Admin/products.php" ><?php echo $_SESSION['FullName']; ?></a></li>
            <li><a href="logout.php" >Sign out</a></li>
            <li><a href="" data-toggle="modal" data-target="#exampleCardModal">Card</a></li>
          <?php
          endif ?>

          <?php if(!isset($_SESSION['FullName'])) :?>
            <li><a href="" data-toggle="modal" data-target="#SignInModal">Sign up</a></li>
            <li><a href="" data-toggle="modal" data-target="#SignUpModal">Sign in</a></li>
          <?php endif?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
  <?php
  if (isset($_GET['detail'])) {
$Id = $_GET['detail'];
$select = "SELECT * FROM `products` WHERE `Id`= $Id";
$select_query = mysqli_query($conn,$select);
while ($row = mysqli_fetch_assoc($select_query)) {
  $Name = $row['Name'];
  $ImagePath = $row['ImagePath'];
  $FullInfo = $row['Full Info'];
  $Price = $row['Price'];
}
}
   ?>
  <section id="portfolio" class="section-bg" style="padding:10px 0;margin-top:100px;">
      <div class="container">
          <div class="row portfolio-container" style="margin-top:20px;">
                  <div class="col-lg-3 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.1s" style="width:300px;height:400px;">
                      <div class="portfolio-wrap">
                          <img src="<?php echo $ImagePath; ?>" class="img-fluid" alt="" style="width: 100%;height:400px;">
                      </div>
                  </div>
                  <div class="col-lg-9 col-md-9 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.1s" style="background-color:white; width:100%;height:400px;">
                      <div style="width:100%;">
                          <h5 ><?php echo $Name?></h5>
                          <p style="color:666666;">Price: <span style="color:#f30240;font-family:"Montserrat", sans-serif;font-size:25px;">%<?php echo $Price?></span></p>
                            <p style="color:666666;">Description: <span style="color:black;font-fami  ly:OpenSans,Arial,Helvetica,sans-serif;"><?php echo $FullInfo?></span></p>
                          <?php  if (isset($_SESSION['FullName'])) : ?>
                          <form action="seedcard.php" method="post">
                            <input type="hidden" name="productid" value="<?php echo $Id; ?>">
                            <input type="hidden" name="UserName" value="<?php echo $_SESSION['FullName'] ?>">
                            <button  type="submit" class="btn btn-danger" name="btnAddCard" style="float:left;border-radius: 0!important;color:white;height:60px;">Add to Cart</a>
                          </form>
                          <?php
                          if (isset($_POST["btnAddCard"])) {
                            $ProductId = $Id;
                            $UserName= $_SESSION['FullName'];
                            $query = "INSERT INTO `card`( `ProductId`, `UserName`) VALUES ('$ProductId','$UserName')";
                            $run_query = mysqli_query($conn,$query);
                              header("Location: detail.php?detail=$Id");
                          }
                          ?>
                          <?php
                          endif ?>
                          <?php if(!isset($_SESSION['FullName'])) :?>
                            <button type="submit" class="btn btn-danger" style="float:left;border-radius: 0!important;color:white;height:60px;">Add to Cart</button>
                          <?php endif?>

                          <button  type="submit" style="border-radius: 0!important; height:60px;" class="btn btn-outline-danger">Buy item</button>
                      </div>
                  </div>
                  <br />

          </div>
      </div>
  </section>
<!---->

<!--============================-->

<div class="modal fade" id="exampleCardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
             $user = $_SESSION['FullName'];
             $query ="SELECT * FROM `card` INNER JOIN `products` on card.ProductId=products.Id and card.UserName = '$user'";
             $run_query = mysqli_query($conn,$query);
             if(!$run_query)
             {
               die(mysqli_error($conn));
             }
           ?>
          <?php
          while($row = mysqli_fetch_assoc($run_query))
          {
          ?>
          <li>  <a href="detail.php?detail=<?php echo $row['Id']; ?>"><?php echo $row['Name']; ?></a></li>
          <li>  <a href="detail.php?detail=<?php echo $Id?>"><image style="width:50px; height:50px;" src="<?php echo $row['ImagePath']; ?>"></a></li>
          <?php
          }
          ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

  <!--==========================
    Card end
  ============================-->
  <!--==========================
    Registrration
  ============================-->
  <div class="modal fade" id="SignUpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="index.php">
          <?php include('includes/errors.php'); ?>
          <div class="form-group">
            <input type="text" name="FullName" placeholder="FullName" class="form-control"><!--es rad ginda wesit ar gchirdeba mara davikideot es cortaxans -->
          </div>
          <div class="form-group">
            <input type="email" name="Email" placeholder="Email" class="form-control">
          </div>
          <div class="form-group">
            <input type="password" name="password_1" placeholder="Password" class="form-control">
          </div>
          <div class="form-group">
            <input type="password" name="password_2" placeholder="Confirm Password" class="form-control">
          </div>
          <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Register</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
  </div>

  <!--==========================
    End Registraion
  ============================-->

  <!--==========================
    Login
  ============================-->
  <!-- startform -->
  <div class="modal fade" id="SignInModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Sign In</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="index.php">
            <?php include('includes/errors.php'); ?>
            <div class="form-group">
              <input type="text" name="FullName" placeholder="FullName" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" name="Password" placeholder="Password" class="form-control">
            </div>
            <div class="input-group">
              <button type="submit" class="btn" name="login_user">Login</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!--endform-->
  <!--==========================
    end login
  ============================-->

  <!--==========================
    Footer
  ============================-->


    <!--==========================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>PcShop</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Services</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit"  value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>BizPage</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
﻿

<?php include("includes/db.php");
include_once("isadmin.php"); 
?>

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
          <?php

            if (isset($_SESSION['FullName'])) : ?>
            <li><a href="Admin/products.php" ><?php echo $_SESSION['FullName']; ?></a></li>
            <li><a href="logout.php" >Sign out</a></li>
          <?php
          endif ?>
          <li><a href="" data-toggle="modal" data-target="#exampleCardModal">Card</a></li>
          <?php if(!isset($_SESSION['FullName'])) :?>
            <li><a href="" data-toggle="modal" data-target="#SignInModal">Sign up</a></li>
            <li><a href="" data-toggle="modal" data-target="#SignUpModal">Sign in</a></li>
          <?php endif?>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
  <section id="portfolio"  class="section-bg" style="margin-top:70px;">
    <div class="container">
      <button class="btn btn-outline-success" style="border-radius:0!important;" data-toggle="modal" data-target="#myModal">Add Product</button>
      <div class="row portfolio-container" style="padding-top:20px;">
        <?php
           $query  = "SELECT * FROM products";
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
        <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
          <div class="portfolio-wrap">
            <figure>
              <img src="<?php echo $row['ImagePath']; ?>" class="img-fluid" alt="">
              <a href="delete.php?delete=<?php echo $row['Id'] ?>"  class="link-preview" title="Delete"><i class="fa fa-trash"></i></a>
              <a href="update.php?edit=<?php echo $row['Id'] ?>" class="link-details" title="Edit" ><i class="fa fa-edit"></i></a>
            </figure>
            <div class="portfolio-info">
              <p><a href="<?php echo $row['Id']; ?>"><?php echo $row['Name']?>></a></p>
              <p><?php echo $row['Price']; ?>$</p>

              <div class="icon"><a href="detail.php?detail=<?php echo $row['Id'];?>"><i class="ion-ios-eye-outline"></i></a></div>
            </div>
          </div>
        </div>
        <?php
        }
        ?>
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
        ...
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
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Product</h4>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="store.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="Name" placeholder="ProductName">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="ImagePath" placeholder="ImagePath">
            </div>
            <div>
              <?php
                 $query  = "SELECT * FROM category";
                 $run_query = mysqli_query($conn,$query);
                 if(!$run_query)
                 {
                   die(mysqli_error($conn));
                 }
               ?>
               <select class="form-control" Name="CategoryName">
               <?php
               while($row = mysqli_fetch_assoc($run_query))
               {
               ?>
                  <option value="<?php echo $row['Name']; ?>"><?php echo $row['Name'];?></option>
            <?php
               }
              ?>
              </select>
            </div>
            <div class="form-group">
                <textarea type="text" class="form-control" name="FullInfo" placeholder="Description" style="max-height: 100px;"></textarea>
            </div>
            <button type="submit" class="btn btn-outline-primary" name="addprobtn">Save Product</button>
          </form>
        </div>
      </div>
    </div>
  </div>
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

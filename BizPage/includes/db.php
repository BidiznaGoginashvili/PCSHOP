<?php
$server = "localhost";
$username = "root";
$password = "";
$db_name = "bidzinagoginashvili";
$conn = mysqli_connect($server,$username,$password,$db_name);
Session_Start();
if (isset($_POST['reg_user'])) {
  $FullName = mysqli_real_escape_string($conn, $_POST['FullName']);
  $Email = mysqli_real_escape_string($conn, $_POST['Email']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

  if (empty($FullName)) { array_push($errors, "Username is required"); }
  if (empty($Email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM `users` WHERE `FullName`='$FullName' OR `Email`='$Email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);

  $user = mysqli_fetch_assoc($result);
  $errors = [];
  if ($user) {
    if ($user['FullName'] === $FullName) {
      array_push($errors, "Username already exists");
    }

    if ($user['Email'] === $Email) {
      array_push($errors, "email already exists");
    }
  }
  if (count($errors) == 0) {

  	$password = md5($password_1);
    $IsAdmin = 0;

  	$query = "INSERT INTO `users` (`FullName`, `Email`, `Password`,`IsAdmin`)
  			  VALUES('$FullName', '$Email', '$password','$IsAdmin')";

  	$r=mysqli_query($conn, $query);
  }
}

if (isset($_POST['login_user'])) {
  $FullName = mysqli_real_escape_string($conn, $_POST['FullName']);
  $Password = mysqli_real_escape_string($conn, $_POST['Password']);
  $Password = md5($Password);

  $errors=[];
  if (empty($FullName)) {
  	array_push($errors, "Username is required");
  }

  if (empty($Password)) {
  	array_push($errors, "Password is required");
  }


  if (empty($errors)) {

  	$query = "SELECT * FROM `users` WHERE `FullName`='$FullName' AND `Password`='$Password'";
  	$results = mysqli_query($conn, $query);


  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['FullName'] = $FullName;
  	  $_SESSION['success'] = "You are now logged in";

  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

if (isset($_GET["btn"])) {
    $password = $_POST["pwd"];
    $query = "INSERT INTO `card`( `ProductId`, `Quantity`) VALUES ('$ProductId','$Quantity')";
    $run_query = mysqli_query($conn,$query);
  }

 ?>

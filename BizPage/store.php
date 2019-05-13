<?php
include_once("isadmin.php"); 
include("includes/db.php");
if (isset($_POST["addprobtn"])) {
  $Name = $_POST["Name"];
  $CategoryName =$_POST["CategoryName"];
  $CategoryId= "SELECT `Id` FROM `category` WHERE `Name`='$CategoryName'";
  $catid=mysqli_query($conn,$CategoryId)->fetch_assoc()['Id'];

  $ImagePath = $_POST["ImagePath"];
  $Price=12;
  $FullInfo = $_POST["FullInfo"];
  $query = "INSERT INTO `products`( `Name`, `ImagePath`,`CategoryId`,`Full Info`,`Price`) VALUES ('$Name','$ImagePath','$catid','$FullInfo','$Price')";
  $run_query = mysqli_query($conn,$query);
  header("Location: products.php");
}
?>

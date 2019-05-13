<?php
include("includes/db.php");
if (isset($_POST["btnAddCard"])) {
  $ProductId = $_POST["productid"];
  $UserName = $_SESSION['FullName'];
  $query = "INSERT INTO `card`( `ProductId`,`UserName`) VALUES ('$ProductId','$UserName')";
  $run_query = mysqli_query($conn,$query);
  header('Location: detail.php?detail='.$ProductId);
}
?>

<?php
include("includes/db.php");
if (isset($_POST["btnAddCard"])) {
  $ProductId = $_POST["productid"];
  $query = "INSERT INTO `card`( `ProductId`) VALUES ('$ProductId')";
  $run_query = mysqli_query($conn,$query);
  header('Location: detail.php?detail='.$ProductId);
}
?>

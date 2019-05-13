<?php
include("includes/db.php");
include_once("isadmin.php"); 
if (isset($_GET['edit'])) {
  $Id = $_GET['edit'];
  $select = "SELECT * FROM `products` WHERE `Id` = '$Id'";
  $select_query = mysqli_query($conn,$select)->fetch_assoc();

  var_dump($select_query);

}
?>

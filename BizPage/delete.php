<?php
include("includes/db.php");
include_once("isadmin.php"); 
if(isset($_GET['delete'])){
   $id_d = $_GET['delete'];
   $question = "DELETE FROM products  WHERE id = $id_d ";
   $delete = mysqli_query($conn,$question);

   header("Location: products.php");
 }
?>

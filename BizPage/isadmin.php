<?php
include_once("includes/db.php");
if (!empty($_SESSION['FullName'])) {
    $fn=$_SESSION["FullName"];
    $query  = "SELECT `IsAdmin` FROM `users` Where `FullName`='$fn'";
    $run_query = mysqli_query($conn,$query);
    if (!$run_query->fetch_assoc()['IsAdmin']==1){
      header("Location: index.php");
      exit();
    }
}

if (empty($_SESSION['FullName'])){
  header("Location: index.php");

  exit();
}

?>

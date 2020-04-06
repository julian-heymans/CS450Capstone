<?php

    $UserName = $_REQUEST["username"];
    $b = $_REQUEST["bus"];

    $servername = "localhost";
    $username = "julian_heymans";
    $password = "cashmoneyAP1!";

    $conn = mysqli_connect($servername, $username, $password, $b);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }


    //get First Name
   $sql = "SELECT FirstName FROM Employee WHERE UserName = '$UserName'";
   $result = mysqli_query($conn,$sql) or die("bad query");
   $row = mysqli_fetch_assoc($result);
   $FN = $row["FirstName"];

   //get Last Name
  $sql = "SELECT LastName FROM Employee WHERE UserName = '$UserName'";
  $result = mysqli_query($conn,$sql) or die("bad query");
  $row = mysqli_fetch_assoc($result);
  $LN = $row["LastName"];

  echo  $FN . ', ' . $LN ;

    exit;
?>

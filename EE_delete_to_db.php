<?php

$UserName = $_REQUEST["username"];
$b = $_REQUEST["bus"];
$title = $_REQUEST["title"];
$btn_group = $_REQUEST["btn"];
$depart = $_REQUEST["depart"];


$servername = "localhost";
$username = "julian_heymans";
$password = "cashmoneyAP1!";

$conn = mysqli_connect($servername, $username, $password, $b);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if($btn_group=="MainObjectives"){

  $sql = "SELECT Title FROM $btn_group";
 $result = mysqli_query($conn,$sql) or die("bad query");

 while($row = mysqli_fetch_assoc($result)){
      $check = $row['Title'];

      if($check == $title){
        //objective exists. Ok to delete
        $sql = "DELETE FROM MainObjectives WHERE Title='$title'";

        if ($conn->query($sql) === TRUE) {
            echo 'confirmed';
            die();
        } else {
            echo 'error';
            die();
        }

      }
    }
    echo "error: Objective does not exist";
    die();




}

if($btn_group=="PersonalObjectives"){

  $sql = "SELECT Title FROM $btn_group WHERE Creator='$UserName'";
 $result = mysqli_query($conn,$sql) or die("bad query here");

 while($row = mysqli_fetch_assoc($result)){
      $check = $row['Title'];

      if($check == $title){
        //objective exists. Ok to delete
        $sql = "DELETE FROM PersonalObjectives WHERE Title='$title' AND Creator = '$UserName'";

        if ($conn->query($sql) === TRUE) {
            echo 'confirmed';
            die();
        } else {
            echo 'error';
            die();
        }

      }
    }
    echo "error: Objective does not exist";
    die();



}
if($btn_group=="DepartObjectives"){

  $sql = "SELECT Title FROM $btn_group WHERE Department='$depart'";
 $result = mysqli_query($conn,$sql) or die("bad query");

 while($row = mysqli_fetch_assoc($result)){
      $check = $row['Title'];

      if($check == $title){
         //objective exists. Ok to delete
         $sql = "DELETE FROM DepartObjectives WHERE Title='$title' AND Department='$depart'";

         if ($conn->query($sql) === TRUE) {
             echo 'confirmed';
             die();
         } else {
             echo 'error';
             die();
         }



      }
    }
    echo "error: Objective does not exist";
    die();



}



die();



?>

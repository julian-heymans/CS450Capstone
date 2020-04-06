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


    $sql = "SELECT Title FROM MainObjectives";
   $result = mysqli_query($conn,$sql) or die("bad query");
   $list_html = "";



   while($row = mysqli_fetch_assoc($result)){
     $title = $row['Title'];

     $MySql = "SELECT Content FROM MainObjectives WHERE Title ='$title'";
     $r = mysqli_query($conn,$MySql) or die("bad query");
     $x = mysqli_fetch_assoc($r);
     $content = $x["Content"];


     $list_html = $list_html . '<li><p name="MainObjectives" id="' . $title . '"  class="button" >' . $title .  ':'. '<br>'. $content. '</p> </li>';

   }

  echo   $list_html ;

  die();

?>

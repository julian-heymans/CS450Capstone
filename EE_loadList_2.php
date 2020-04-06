<?php

    $UserName = $_REQUEST["username"];
    $b = $_REQUEST["bus"];
    $depart = $_REQUEST["department"];

    $servername = "localhost";
    $username = "julian_heymans";
    $password = "cashmoneyAP1!";

    $conn = mysqli_connect($servername, $username, $password, $b);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }



  $sql = "SELECT Title FROM DepartObjectives WHERE Department = '$depart'";
  $result = mysqli_query($conn,$sql) or die("bad query");
  $list_html = "";

  while($row = mysqli_fetch_assoc($result)){
       $title = $row['Title'];

       $MySql = "SELECT Content FROM DepartObjectives WHERE Title ='$title' AND Department ='$depart'";
       $r = mysqli_query($conn,$MySql) or die("bad query");
       $x = mysqli_fetch_assoc($r);
       $content = $x["Content"];

       $list_html = $list_html . '<li><p   name="DepartObjectives" id="' . $title . '" class="button" >' . $title .  ':'. '<br>'. $content. '</p> </li>';

     }

  echo $list_html;



?>

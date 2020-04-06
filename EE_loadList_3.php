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



         $sql = "SELECT Title FROM PersonalObjectives WHERE Creator = '$UserName'";
         $result = mysqli_query($conn,$sql) or die("bad query");
         $list_html = "";

        while($row = mysqli_fetch_assoc($result)){
                    $title = $row['Title'];
                    $MySql = "SELECT Content FROM PersonalObjectives WHERE Title ='$title' AND Creator ='$UserName'";
                    $r = mysqli_query($conn,$MySql) or die("bad query");
                    $x = mysqli_fetch_assoc($r);
                    $content = $x["Content"];

              $list_html = $list_html . '<li><p   name="PersonalObjectives" id="' . $title . '" class="button" >' . $title .  ':'. '<br>'. $content. '</p> </li>';

            }

         echo  $list_html ;


?>

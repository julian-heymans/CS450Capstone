<?php



$UserName = $_REQUEST["username"];
$b = $_REQUEST["bus"];
$title = $_REQUEST["title"];
$content = $_REQUEST["content"];
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


if(empty($title) || empty($content)){
  echo "error: Please enter all fields";
  die();
}


if(empty($depart)){


  $sql = "SELECT Title FROM $btn_group WHERE Creator= '$UserName'";
 $result = mysqli_query($conn,$sql) or die("bad query");

 while($row = mysqli_fetch_assoc($result)){
      $check = $row['Title'];

      if($check == $title){
         //objective already exists
         echo "error: Objective Already Exists";
         die();
      }
    }



  $sql = "INSERT INTO $btn_group (Title, Content, Creator) VALUES ('$title', '$content', '$UserName')";
  if ($conn->query($sql) === TRUE) {
      echo "confirmed";
      die();
  } else {
      echo "error";
      die();
  }

}
else{

  $sql = "SELECT Title FROM $btn_group WHERE Creator= '$UserName' AND Department='$depart'";
 $result = mysqli_query($conn,$sql) or die("bad query");

 while($row = mysqli_fetch_assoc($result)){
      $check = $row['Title'];

      if($check == $title){
         //objective already exists
         echo "error: Objective Already Exists";
         die();
      }
    }


  $sql = "INSERT INTO $btn_group (Title, Content, Creator, Department) VALUES ('$title', '$content', '$UserName', '$depart')";
  if ($conn->query($sql) === TRUE) {
      echo "confirmed";
      die();
  } else {
      echo "error";
      die();
  }
}

echo "here";

die();

?>

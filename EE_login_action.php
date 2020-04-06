<?php
function home_page_background($Position) {
  header("Location: http://localhost:8888/EE_home_page_background.html?position=" . $Position); /* Redirect browser */
  die;
}
function login_error_page($error) {
  header("Location: http://localhost:8888/EE_login_error_page.html?error=" . $error); /* Redirect browser */
  die;
}

function home_page_RE($Position) {
  header("Location: http://localhost:8888/EE_home_page_RE.html?position=" . $Position); /* Redirect browser */
  die;
}

function home_page_depart_head($Position) {
  header("Location: http://localhost:8888/EE_home_page_depart_head.html?position=" . $Position); /* Redirect browser */
  die;
}

  $UserName= $_POST["username"];
  $UserPassword= $_POST["psw"];
  $b =$_POST["bus"];


 // check if the user inputed all the credentials
   if (empty($UserName) || empty($UserPassword) || empty($b)){
     login_error_page("1 or more fields was not entered");
      die();
   }
   else {

   $servername = "localhost";
   $username = "julian_heymans";
   $password = "cashmoneyAP1!";
   $db = "EagleEYE";

   // Create connection
   $conn = mysqli_connect($servername, $username, $password, $db);
   // Check connection
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }


     $sql = "SELECT DBname FROM DatabaseNames";

    $result = mysqli_query($conn,$sql) or die("bad query");

  while($row = mysqli_fetch_assoc($result)) {

       $dbName = $row['DBname'];

       if ($dbName == $b){
         //Valid Business Database
         //connect to Business Database
         $conn = mysqli_connect($servername, $username, $password, $b);
         // Check connection
         if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
         }

         //check USERNAME and PASSWORD
         $sql = "SELECT UserName FROM Employee";
        $result = mysqli_query($conn,$sql) or die("bad query");

        while($row = mysqli_fetch_assoc($result)){

          $UN = $row['UserName'];


          if($UN == $UserName){
            //valid USERNAME
            //check PASSWORD

            $sql = "SELECT Password FROM Employee WHERE UserName = '$UserName'";
            $result = mysqli_query($conn,$sql) or die("bad query");
            $row = mysqli_fetch_assoc($result);
            $PW = $row["Password"];


            if($PW == $UserPassword){
              //access granted show login screen
              $sql = "SELECT Position FROM Employee WHERE UserName = '$UserName'";
              $result = mysqli_query($conn,$sql) or die("bad query");
              $row = mysqli_fetch_assoc($result);
              $Position = $row["Position"];

              if($Position=="Business Manager" ){

                home_page_background($Position);
                 die();
              }

              else if($Position=="Production Manager" || $Position=="R&D Manager" || $Position=="Marketing Manager" || $Position=="Human Resources Manager" || $Position=="Accounting/Finance Manager" || $Position=="IT Manager"){
                home_page_depart_head($Position);
                 die();
              }
              else if($Position=="Regular Employee"){
                home_page_RE($Position);
                 die();
              }


            }
            else{
              //access denied wrong PASSWORD
              login_error_page("Incorrect Password");
               die();
            }


        }

       }
       login_error_page("Incorrect Username");
        die();


       }
   }
     //invalid business DATABASE
     login_error_page("Invalid Business Database");
      die();







}



die();
 ?>

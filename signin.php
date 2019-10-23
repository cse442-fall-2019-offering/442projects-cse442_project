<?php
session_start();
require_once('setting/server_config.php');
$Table_name= "useraccount";  //the table contains user account

if(!$conn){
 echo ("Fail to conncet server".mysqli_connect_error());
}
$User_mail=$_POST['Your_Email'];
$password=$_POST['Password'];
//prevent mysql injection
$User_mail = stripslashes($User_mail);
$password = stripslashes($password);


$sql= "SELECT * FROM $Table_name WHERE User_email = '$User_mail' and User_Password = '$password'";
$result = mysqli_query($conn, $sql) or die("Fail to query database".mysqli_error);
$row = mysqli_fetch_array($result);
if($password = $row['User_Password'] && $User_mail = $row['User_email']) {
  echo "login in successfully";
}
else {
  $_SESSION['message'] = 'Your Email or Password is incorrect, Please try again';
  header('Location: signin_front.php');
exit;
}

 ?>

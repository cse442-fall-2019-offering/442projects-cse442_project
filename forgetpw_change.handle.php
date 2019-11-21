<?php
 session_start ();
 require_once('setting/server_config.php');
 $AccountTable_name= "useraccount";
 $password = $_REQUEST["password"];
 $confirmPassword = $_REQUEST["confirmPassword"];
 $useremail=$_REQUEST["Email"];
 $Verification = $_REQUEST["verification_code"];

 $retverification = null;
 $result = mysqli_query ($conn, "SELECT * FROM $AccountTable_name WHERE User_email ='$useremail'");
 while ( $row = mysqli_fetch_array ( $result ) ) {
   $retverification = $row ["User_verification"];
 }

 if (is_null ( $retverification )) {
   echo "<script>alert('didn't get a verification code from database'); window.location.href='forgetpw_change.php' </script>";
   exit();
}

 if ($Verification != $retverification) {
   echo "<script>alert('Incorrect Verification Code, please try again'); window.location.href='forgetpw_change.php' </script>";
   exit();
 }

 if ($password != $confirmPassword) {
   echo "<script>alert('Two password is not the same,they are $password and $confirmPassword '); window.location.href='forgetpw_change.php' </script>";
   exit();
 }

if( mysqli_query ($conn, "UPDATE $AccountTable_name SET User_Password='$password' WHERE User_email='$useremail' " )){
 echo "<script>alert('Sueecss, please signin'); window.location.href='index.php' </script>";
}else{
  echo "<script>alert('something went wrong'); window.location.href='index.php' </script>";
}


 mysqli_close ( $conn );

 header('Location: signin_front.php');
 echo "password change successfully";
?>

<?php
 session_start ();
 require_once('setting/server_config.php');
 $AccountTable_name= "useraccount";
 $useremail = $_REQUEST ["useremail"];
 $oldpassword = $_REQUEST ["oldpassword"];
 $newpassword = $_REQUEST ["newpassword"];


 $retusername = null;
 $retpassword = null;
 $result = mysqli_query ($conn, "SELECT * FROM $AccountTable_name WHERE User_email ='$useremail';");
 while ( $row = mysqli_fetch_array ( $result ) ) {
 $retuseremail = $row ["User_email"];
 $retpassword = $row ["User_Password"];
 }

 if (is_null ( $retuseremail )) {
 echo "<script>alert('email does not exist'); window.location.href='alterpassword.php' </script>";
 exit();
 }

 if ($oldpassword != $retpassword) {
 echo "<script>alert('old password wrong'); window.location.href='alterpassword.php' </script>";
 exit();
 }
 mysqli_query ($conn, "UPDATE $AccountTable_name SET User_password='$newpassword' WHERE User_email='$useremail'" );
 mysqli_close ( $conn );

 header('Location: index.php');
 echo "password change successfully";
?>

<?php
require_once('setting/server_config.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$AccountTable_name= "useraccount";
$useremail = $_REQUEST ["useremail"];

$result = mysqli_query ($conn, "SELECT * FROM $AccountTable_name WHERE User_email ='$useremail';");
while ( $row = mysqli_fetch_array ( $result ) ) {
$retuseremail = $row ["User_email"];
}
if (is_null ( $retuseremail )) {
echo "<script>alert('email does not exist'); window.location.href='forgetpw.php' </script>";
exit();
}

$mail = new PHPMailer(true);
$code = rand(100000,999999);
mysqli_query ($conn, "UPDATE $AccountTable_name SET User_verification='$code' WHERE User_email='$useremail'" );
mysqli_close ( $conn );

try {
   //Server settings
   $mail->isSMTP();                                            // Send using SMTP
   $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
   $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
   $mail->Username   = 'ubtrade2019@gmail.com';                     // SMTP username
   $mail->Password   = 'UBTrade2019';                               // SMTP password
   $mail->SMTPSecure = 'tls';
   $mail->Port       = 587;


   $mail->setFrom('ubtrade2019@gmail.com', 'UBTrade'); //sender
   $mail->addAddress($useremail, 'Dear Customer');     //recipient


   // Content
   $body = '<p><strong>Hello</strong> this is a test</p>'; //text
   $mail->isHTML(true);                                  // Set email format to HTML
   $mail->Subject = 'UBTrade Verification Code';
   $mail->Body    = "Your Verification Code is : $code";
   $mail->AltBody = strip_tags($body);

   $mail->send();
   echo "<script>alert('A verification code has been sent to your email, please check it.'); window.location.href='forgetpw_change.php' </script>";
} catch (Exception $e) {
   echo "<script>alert('Fail to send verification code, please try again.'); window.location.href='forgetpw.php' </script>";
}
?>

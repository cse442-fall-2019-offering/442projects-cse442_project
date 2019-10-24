<?php
  $HOST = 'tethys.cse.buffalo.edu';
  $USERNAME = 'junlongy';
  $USERPASSWORD = "50192350";
  $DBNAME = "cse442_542_2019_fall_teamr_db";

  $conn = new mysqli($HOST, $USERNAME, $USERPASSWORD, $DBNAME);
 if(!$conn){
   echo ("Fail to conncet server".mysqli_connect_error());
 }
 ?>

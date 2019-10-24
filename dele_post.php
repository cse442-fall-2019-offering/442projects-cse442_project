<?php
  session_start();
  require_once('setting/server_config.php');
  $Product_Table_name= "product";

  if(!$conn){
   echo ("Fail to conncet server".mysqli_connect_error());
  }
  else {
      $pid = $_GET['Product_ID'];
  }



  $sql= "DELETE FROM $Product_Table_name WHERE id= '$pid'";
  $result= $conn ->query($sql);
  unset($_GET['Product_ID']);
  header('Location: manage.php');





 ?>

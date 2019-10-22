<?php
  session_start();
  require_once('setting/local_host_config.php');
  $Product_Table_name= "product";
  $Account_Table_name= "useraccount";

  if(!$conn){
   echo ("Fail to conncet server".mysqli_connect_error());
  }
  $pid = $_GET['Product_ID'];
  $sql= "DELETE FROM $Product_Table_name WHERE id= '$pid'";
  $result= $conn ->query($sql);
  unset($_GET['Product_ID']);
  header('Location: index.php');








 ?>

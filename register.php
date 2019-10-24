<?php
  session_start();
  require_once('setting/server_config.php');


    if (empty($_POST)) {
        exit("The form is over post_max_size! <br>");
    }


    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if ($password != $confirmPassword) {
        echo "<script>alert('Two password is not the same!'); window.location.href='signin_front.php' </script>";
    }

    $userName = $_POST['Name'];
    $userEmail = $_POST['Email'];

    //checking if username already exist
    //$userNameSQL = "SELECT * FROM useraccount WHERE User_name = '$userName'";
    $stm = $conn -> prepare("SELECT * FROM useraccount WHERE User_name = ?");
    $stm -> bind_param("s",$userName);
    $stm -> execute();
    $resultSet=$stm -> get_result();
    //$resultSet = mysqli_query($conn,$userNameSQL);
    if (mysqli_num_rows($resultSet) > 0) {
        echo "<script>alert('User name already exist!'); window.location.href='signup_front.php' </script>";
        exit();
    }
    $stm -> close();

    //checking if email already exist
    //$userEmailSQL = "SELECT * FROM useraccount WHERE User_email = '$userEmail'";
    $stm = $conn -> prepare("SELECT * FROM useraccount WHERE User_email = ?");
    $stm -> bind_param("s",$userEmail);
    $stm -> execute();
    $emailresultSet=$stm -> get_result();
    //$emailresultSet = mysqli_query($conn,$userEmailSQL);
    if (mysqli_num_rows($emailresultSet) > 0) {
        echo "<script>alert('Email already exist!'); window.location.href='signup_front.php' </script>";
        exit();
    }

    //sending information to user account table
    $stmt = $conn -> prepare("INSERT INTO useraccount(User_name,User_Password,User_email) values(?,?,?)");
    $stmt -> bind_param("sss",$userName,$password,$userEmail);
    if (!$stmt->execute()) {
   	 echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }else{
   	 $userID = mysqli_insert_id($conn);
     echo "<script>alert('Register Success'); window.location.href='signin_front.php' </script>";
    }
    $stmt -> close();




    $stm = $conn -> prepare("SELECT * FROM useraccount WHERE User_id = ?");
    $stm -> bind_param("s",$userID);
    $stm -> execute();
    $stm -> bind_result($userResult);
    if ($user = mysqli_fetch_array($userResult)) {
        echo "Your user Name is: " . $user['User_name'];
    } else {
        exit("User register Fail！");
    }
    $stm -> close();
    mysqli_close($conn);
    ?>

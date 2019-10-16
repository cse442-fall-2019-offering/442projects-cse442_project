<?php
  $HOST='localhost';
  $USERNAME='root';
  $PASSWORD='';
  $DATABASE='test';


  if(!($con = mysqli_connect($HOST,$USERNAME,$PASSWORD,$DATABASE))) {
    echo mysqli_error($con);
  }

    if (empty($_POST)) {
        exit("The form is over post_max_size! <br>");
    }


    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    if ($password != $confirmPassword) {
        exit("Two password is not the same ");
    }

    $userName = $_POST['userName'];
    $userEmail = $_POST['user_Email'];
    $userPhone = $_POST['user_Phone'];


    $userNameSQL = "select * from users where user_Name = '$userName'";
    $resultSet = mysqli_query($con,$userNameSQL);
    if (mysqli_num_rows($resultSet) > 0) {
        exit("user_Name already exist! please try another one");
    }

    $registerSQL = "INSERT INTO users(user_Name,user_Password,user_Email,user_Phone) values('$userName', '$password','$userEmail','$userPhone')";

    if (mysqli_query($con,$registerSQL)) {
        $userID = mysqli_insert_id($con);
        echo "Register success<br>";
    } else {
        echo mysqli_error($con);
        exit("Register fail<br>");
    }

    $userSQL = "select * from users where user_id = '$userID'";
    $userResult = mysqli_query($con,$userSQL);
    if ($user = mysqli_fetch_array($userResult)) {
        echo "Your user Name is: " . $user['user_Name'];
    } else {
        exit("User register Fail！");
    }
    mysqli_close($con);
    ?>

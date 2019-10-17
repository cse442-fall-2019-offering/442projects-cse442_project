<?php
  $HOST='tethys.cse.buffalo.edu';
  $USERNAME='junlongy';
  $PASSWORD='50192350';
  $DATABASE='cse442_542_2019_fall_teamr_db';


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

    $userName = $_POST['Name'];
    $userEmail = $_POST['Email'];


    $userNameSQL = "select * from users where User_name = '$userName'";
    $resultSet = mysqli_query($con,$userNameSQL);
    if (mysqli_num_rows($resultSet) > 0) {
        exit("user_Name already exist! please try another one");
    }

    $registerSQL = "INSERT INTO useraccount(User_name,User_Password,User_email) values('$userName','$password','$userEmail')";

    if (mysqli_query($con,$registerSQL)) {
        $userID = mysqli_insert_id($con);
        echo "Register success<br>";
    } else {
        echo mysqli_error($con);
        exit("Register fail<br>");
    }

    $userSQL = "select * from useraccount where User_id = '$userID'";
    $userResult = mysqli_query($con,$userSQL);
    if ($user = mysqli_fetch_array($userResult)) {
        echo "Your user Name is: " . $user['User_name'];
    } else {
        exit("User register Fail！");
    }
    mysqli_close($con);
    ?>

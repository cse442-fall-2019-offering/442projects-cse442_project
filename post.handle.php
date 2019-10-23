<?php
	session_start();
	require_once('setting/server_config.php');

	$un=$_SESSION['username'];
	if(!isset($un)) {
		echo "<script>alert('Please sign in first'); window.location.href='signin_front.php' </script>";
	}

	$required = array('productname','price','email');
	//check if post are empty
	foreach($required as $filed) {
		if((empty($_POST[$filed]))) {
			echo "<script>alert('All fields with * are required'); window.location.href='post-ad.php' </script>";
			exit();
			}
	}


	$productname = $_POST['productname'];
	$price = $_POST['price'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	$description = $_POST['description'];


	//check for valid email
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		echo "<script>alert('$email is not a valid email address'); window.location.href='post-ad.php' </script>";
	}



	//aggree our term of use
	if(empty($_POST['checkbox'])){
		echo "<script>alert('You must agree the Terms of Use and Privacy Policy'); window.location.href='post-ad.php' </script>";
		exit();
	}
	//if there is a file
	if(!($_FILES['image']['size'] == 0)) {
		//allowed file type
		$type=array("jpg","gif","bmp","jpeg","png");
		$max_file_size=5242880;
		$name=explode(".",$_FILES['image']['name']);
		//check valid file
		if(!(in_array($name[1],$type))) {
			echo "<script>alert('File type does not match, please slecte one of the following type: png, jpg, gif, bmp, jpeg'); window.location.href='post-ad.php' </script>";
			exit();
		}
		if($max_file_size < $_FILES['image']['size']) {
			echo "<script>alert('The photos you selected is too large, photos size upload limit is 2MB'); window.location.href='post-ad.php' </script>";
			exit();
		}
		$imagename=date("YmdHis").$productname.'.'.$name[1];
		$image_target = "images/".$imagename;
		$image = $_FILES['image']['name'];
		//if photo upload success
		if (!move_uploaded_file($_FILES['image']['tmp_name'],$image_target)) {
			echo "<script>alert('Photo upload fail'); window.location.href='post-ad.php' </script>";
			exit();
		}
	}


	$insertsql = "INSERT INTO product(Product_Name,Price,Email,Phone_number,Image,Product_description,User_name) VALUES('$productname','$price','$email','$phonenumber','$imagename','$description','$un')";

	if(mysqli_query($conn,$insertsql)) {
		echo "<script>alert('Submit success');window.location.href='post-ad.php'</script>";
	} else {
		echo "<script>alert('Submit fail');window.location.href='post-ad.php'</script>";
	}

	mysqli_close($conn);
?>

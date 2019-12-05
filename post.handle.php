<?php
	session_start();
	require_once('setting/server_config.php');

	$un=$_SESSION['username'];
	if(!isset($un)) {
		echo "<script>alert('Please sign in first'); window.location.href='signin_front.php' </script>";
		exit();
	}

	$required = array('productname','price','email','category');
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
	$category = $_POST['category'];


	//check for valid email
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		echo "<script>alert('$email is not a valid email address'); window.location.href='post-ad.php' </script>";
		exit();
	}



	//aggree our term of use
//	if(empty($_POST['checkbox'])){
	//	echo "<script>alert('You must agree the Terms of Use and Privacy Policy'); window.location.href='post-ad.php' </script>";
	//	exit();
	//}
	//if there is a file
	$count = 0;
	$Image_Belong_id = date("YmdHis").$un;
	foreach ($_FILES["image"]["tmp_name"] as $key=>$temp_name) {
		// code...
	if(!($_FILES['image']['size'][$key] == 0)) {
		//allowed file type
		$type=array("jpg","gif","bmp","jpeg","png");
		$max_file_size=5242880;
		$name=explode(".",$_FILES['image']['name'][$key]);
		$size = count($name)-1;

		//check valid file
		if(!(in_array($name[$size],$type))) {
			echo "<script>alert('File type does not match, please slecte one of the following type: png, jpg, gif, bmp, jpeg'); window.location.href='post-ad.php' </script>";
			exit();
		}
		if($max_file_size < $_FILES['image']['size'][$key]) {
			echo "<script>alert('The photos you selected is too large, photos size upload limit is 2MB'); window.location.href='post-ad.php' </script>";
			exit();
		}
		$imagename=date("YmdHis").$un.$count.'.'.$name[$size];
		$image_target = "images/".$imagename;
		$image = $_FILES['image']['name'];
		$count += 1;
		//if photo upload success
		if (!move_uploaded_file($_FILES['image']['tmp_name'][$key],$image_target)) {
			echo "<script>alert('Photo upload fail'); window.location.href='post-ad.php' </script>";
			exit();
		}
		 $stmt = $conn -> prepare("INSERT INTO Image(Name, Image_Belong_id) VALUES(?, ?)");
		 $stmt -> bind_param("ss",$imagename, $Image_Belong_id);
		 $stmt->execute();
		}
}


 $stmt = $conn -> prepare("INSERT INTO product(Product_Name,Price,Email,Phone_number, Image, Image_Belong_id, Product_description,User_name,Category) VALUES(?,?,?,?,?,?,?,?,?)");
 $stmt -> bind_param("sssssssss",$productname,$price,$email,$phonenumber, $imagename, $Image_Belong_id, $description,$un,$category);

 if (!$stmt->execute()) {
	 echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
 }else{
	 echo "<script>alert('submit success');  window.location.href='index.php'</script>";
 }
 $stmt -> close();

	/*
	$insertsql = "INSERT INTO product(Product_Name,Price,Email,Phone_number,Image,Product_description,User_name) VALUES('$productname','$price','$email','$phonenumber','$imagename','$description','$un')";

		if(mysqli_query($conn,$insertsql)) {
			echo "<script>alert('Submit success');window.location.href='index.php'</script>";
		} else {
			echo "<script>alert('Submit fail');window.location.href='post-ad.php'</script>";
		}
		*/

	mysqli_close($conn);
?>

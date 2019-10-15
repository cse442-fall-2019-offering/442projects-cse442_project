<?php
	$HOST='localhost';
	$USERNAME='root';
	$PASSWORD='';
	$DATABASE='test';

	error_reporting(E_ALL &~E_NOTICE &~E_DEPRECATED);

	if(!($con = mysqli_connect($HOST,$USERNAME,$PASSWORD,$DATABASE))) {
		echo mysqli_error();
	}

	if(!isset($_POST['productname']) || empty($_POST['productname'])) {
		echo "<script>alert('Product Name can't be empty');</script>";
	}
	if(!isset($_POST['price']) || empty($_POST['price'])) {
		echo "<script>alert('Price can't be empty');</script>";
	}

	$productname = $_POST['productname'];
	$price = $_POST['price'];
	$email = $_POST['email'];
	$phonenumber = $_POST['phonenumber'];
	$dateline = time();
	$dir= '/Users/junlongye/.bitnami/stackman/machines/xampp/volumes/root/htdocs/images/';

	$image_target = $dir.$_FILES['image']['name'];
	$image = $_FILES['image']['name'];
		if (move_uploaded_file($_FILES['image']['tmp_name'],$image_target)) {
			echo "upload to file image";
	  }
	  else {
	    echo "problem with image";
		}
	$insertsql = "INSERT INTO products(Product_Name,Price,Email,Phone_number,Release_date,Image) VALUES('$productname','$price','$email','$phonenumber','$dateline','$image')";

	if(mysqli_query($con,$insertsql)) {
		echo "<script>alert('submit success'); window.location.href='post-ad.php'</script>";
	} else {
		echo "<script>alert('submit fail'); </script>";
	}

	mysqli_close($con);
?>

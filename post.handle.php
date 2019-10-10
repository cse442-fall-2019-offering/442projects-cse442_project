<?php
	$HOST='tethys.cse.buffalo.edu';
	$USERNAME='junlongy';
	$PASSWORD='50192350';
	$DATABASE='cse442_542_2019_fall_teamr_db';

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

	$insertsql = "INSERT INTO product(Product_Name,Price,Phone_number,Email,Release_date) VALUES('$productname','$price','$phonenumber','$email',$dateline)";

	if(mysqli_query($con,$insertsql)) {
		echo "<script>alert('submit success'); window.location.href='post-ad.php'</script>";
	} else {
		echo "<script>alert('submit fail'); window.location.href='post-ad.php'</script>";
	}

	mysqli_close($con);
?>

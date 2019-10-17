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
	$description = $_POST['description'];


	$name=explode(".",$_FILES['image']['name']);
	$imagename=date("YmdHis").$productname.'.'.$name[1];
	$image_target = "images/".$imagename;
	$image = $_FILES['image']['name'];
		if (move_uploaded_file($_FILES['image']['tmp_name'],$image_target)) {
			echo "upload to file image";
	  }
	  else {
	    echo "problem with image";
		}
	$insertsql = "INSERT INTO product(Product_Name,Price,Email,Phone_number,Image,Product_description) VALUES('$productname','$price','$email','$phonenumber','$imagename','$description')";

	if(mysqli_query($con,$insertsql)) {
		echo "<script>alert('submit success');  window.location.href='index.php'</script>";
	} else {
		echo "<script>alert('submit fail');  </script>";
	}

	mysqli_close($con);
?>

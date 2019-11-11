<!DOCTYPE html>
<?php
 require_once('setting/server_config.php');
session_start();
 ?>
<html>
<head>
<title>UB TRADE</title>
<link rel="stylesheet" href="css/bootstrap.min.css"><!-- bootstrap-CSS -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->
<link rel="stylesheet" href="css/font-awesome.min.css" /><!-- fontawesome-CSS -->
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<!-- header -->
	<header>
		<div class="w3ls-header"><!--header-one-->
			<div class="w3ls-header-right">
				<ul>
					<li class="dropdown head-dpdn">
						<a href="<?php if (isset($_SESSION['username']))
            {
              $link_address = "manage.php";} else {
                $link_address = "signin_front.php";
              } echo $link_address;?>" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
              <?php if (isset($_SESSION['username']))
              {
                echo $_SESSION['username'];
              } else {
                echo"Sign In";
              }
              ?></a>
					</li>
				</ul>
			</div>

			<div class="clearfix"> </div>
		</div>
		<div class="container">
			<div class="agile-its-header">
				<div class="logo">
					<h1><a href="index.php"><span>UB</span>TRADE</a></h1>
				</div>

        <div class="agileits_search">
				<a class="post-w3layouts-ad" href="manage.php">Back to Manage Your Posts</a>
				</div>

				<div class="clearfix"></div>
			</div>
		</div>
	</header>
	<!-- //header -->
	<!-- Submit Ad -->

									<?php
                  if (isset($_SESSION['username']))
      				        {
                          $un=$_SESSION['username'];
          		            $query = "SELECT * FROM product WHERE User_name = '".$un."' ORDER BY Release_date DESC";
                        } else echo "<script>alert('Please sign in frist'); window.location.href='index.php' </script>";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)){
                  $Product_Name = $row['Product_Name'];
                  $Price = $row['Price'];
                  $Release_date = $row['Release_date'];
                  $Image = $row['Image'];
                  $Phone_number = $row['Phone_number'];
                  $Email = $row['Email'];
                  $Product_ID = $row['id'];
                  $Product_description = $row['Product_description'];
                  $Category = $row['Category'];

                }
                 ?>
	<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="w3-head">Update Your Product Information</h2>
			<div class="post-ad-form">
				<form enctype="multipart/form-data" method="post" action="edit_update.php">
					<div class="clearfix"></div>
          <input type="hidden" id="Product_ID" name="Product_ID" value = "<?php echo $Product_ID ?>" >
					<label for="ProductName">Product Name<span>*</span></label>
					<input type="text" id="ProductName" placeholder="<?php echo $Product_Name ?>" name="productname" value= "<?php echo $Product_Name?>" maxlength="25">
          <label for="Category">Category<span>*</span></label>
          <select name = "category">
            <option hidden selected value="<?php echo $Category ?>"> <?php echo $Category ?></option>
            <option value = "car">Car</option>
            <option value = "textbook">Textbook</option>
            <option value = "furniture">Furniture</option>
            <option value = "others">Others</option>
          </select>
          <div class="clearfix"></div>
					<label>Product Description</label>
					<input type="text" placeholder="<?php echo $Product_description ?>" name = "description" value= "<?php echo $Product_description?>" maxlength = "50"></textarea>
					<div class="clearfix"></div>
				<div class="upload-ad-photos">
				<label>Photos for your Product :</label>
					<div class="photos-upload-view">

						<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="5242880" />

						<div>
							<input type="file" id="fileselect" placeholder = "<?php echo $Image ?>" name="image" multiple="multiple" />
							<div id="filedrag">or drop files here</div>
						</div>

						</div>
					<div class="clearfix"></div>
						<script src="js/filedrag.js"></script>
				</div>
					<div class="personal-details">
						<label for="Price">Price<span>*</span></label>
						<input type="text" id="Price" placeholder="<?php echo "$".$Price ?>" name="price" value="<?php echo $Price?>" maxlength="10">
						<div class="clearfix"></div>
						<label for="Email" >Email<span>*</span></label>
						<input type="text"  id="Email" placeholder="<?php echo $Email ?>" name="email"  value="<?php echo $Email?>" maxlength="35">
						<div class="clearfix"></div>
						<label for="PhoneNumber">Phone Number</label>
						<input type="text" id="PhoneNumber" placeholder="<?php echo $Phone_number ?>" name="phonenumber" value= "<?php echo $Phone_number ?>">
						<div class="clearfix"></div>
						<p class="post-terms">
							<!--<input type="checkbox" name="checkbox" value="check" id="agree" /> I have read and agree to the <a href="terms.html" target="_blank">Terms of Use </a> and <a href="privacy.html" target="_blank">Privacy Policy</a>
              -->
          	</p>
					<input type="submit" value="Update Product Information">
					<div class="clearfix"></div>
					</form>
					</div>
			</div>
		</div>
	</div>
	<!-- // Submit Ad -->
	<!--footer section start-->
		<footer>

			<div class="agileits-footer-bottom text-center">
			<div class="container">
				<div class="w3-footer-logo">
					<h1><a href="index.php"><span>UB</span>TRADE</a></h1>
				</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		</footer>
        <!--footer section end-->
</body>

</html>

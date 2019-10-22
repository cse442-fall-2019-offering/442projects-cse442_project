<!DOCTYPE html>
<?php
session_start();
 ?>
<html>
<head>
<title>UB TRADE</title>
<link rel="stylesheet" href="css/bootstrap.min.css"><!-- bootstrap-CSS -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->
<link rel="stylesheet" href="css/font-awesome.min.css" /><!-- fontawesome-CSS -->

</head>
<body>
	<!-- header -->
	<header>
		<div class="w3ls-header"><!--header-one-->
			<div class="w3ls-header-right">
				<ul>
					<li class="dropdown head-dpdn">
						<a href="signin_front.php" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
              <a>
              <?php if (isset($_SESSION['username']))
          {
          echo $_SESSION['username'];
        } else echo"Sign In"?></a>
					</li>
					<li class="dropdown head-dpdn">
						<a href="help.html"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
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
				<a class="post-w3layouts-ad" href="index.php">Back to Home page</a>
				</div>

				<div class="clearfix"></div>
			</div>
		</div>
	</header>
	<!-- //header -->
	<!-- Submit Ad -->
	<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="w3-head">Post Your Product</h2>
			<div class="post-ad-form">
				<form enctype="multipart/form-data" method="post" action="post.handle.php">
					<div class="clearfix"></div>
					<label for="ProductName">Product Name<span>*</span></label>
					<input type="text" id="ProductName" placeholder="Enter Product Name" name="productname">
					<div class="clearfix"></div>
					<label>Ad Description</label>
					<input type="text" placeholder="Write a few lines about your product" name = "description"></textarea>
					<div class="clearfix"></div>
				<div class="upload-ad-photos">
				<label>Photos for your ad :</label>
					<div class="photos-upload-view">

						<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="5242880" />

						<div>
							<input type="file" id="fileselect" name="image" multiple="multiple" />
							<div id="filedrag">or drop files here</div>
						</div>
						</div>
					<div class="clearfix"></div>
						<script src="js/filedrag.js"></script>
				</div>
					<div class="personal-details">
						<label for="Price">Price<span>*</span></label>
						<input type="text" id="Price" placeholder="Set a Price💰" name="price">
						<div class="clearfix"></div>
						<label for="Email" >Email<span>*</span></label>
						<input type="text"  id="Email" placeholder="example@domain.com" name="email">
						<div class="clearfix"></div>
						<label for="PhoneNumber">PhoneNumber</label>
						<input type="text" id="PhoneNumber" placeholder="555-555-5555" name="phonenumber">
						<div class="clearfix"></div>
						<p class="post-terms">
							<input type="checkbox" name="checkbox" value="check" id="agree" /> I have read and agree to the <a href="terms.html" target="_blank">Terms of Use </a> and <a href="privacy.html" target="_blank">Privacy Policy</a>
						</p>
					<input type="submit" value="Post">
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
				<div class="copyrights">
					<p> Design by  <label> CSE_442_TEAM </label></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		</footer>
        <!--footer section end-->
</body>

</html>

<!DOCTYPE html>
<?php
  require_once('setting/server_config.php');
  session_start();
 ?>
<html lang="en">
<head>
<title>UB TRADE</title>
<link rel="stylesheet" href="css/bootstrap.min.css"><!-- bootstrap-CSS -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->
<link rel="stylesheet" href="css/font-awesome.min.css" /><!-- fontawesome-CSS -->
</head>
<body>
  <div class="w3ls-header"><!--header-one-->
  			<div class="w3ls-header-right">
  				<ul>
            <!-- click to sign out account -->
            <li class="dropdown head-dpdn">
              <a href="setting/Sign_Out.php"><i aria-hidden="true"></i> Sign Out</a>
            </li>
            <!-- sign out end -->
            <li class="dropdown head-dpdn">
              <!-- replace login in by username when logined in !-->
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
            <!-- username display end !-->
  					</li>
  					<li class="dropdown head-dpdn">
  						<div class="header-right">
  		</div>
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

  				<a class="post-w3layouts-ad" href="post-ad.php">Post Your Product</a>
  				</div>
  				<div class="clearfix"></div>
  			</div>
  		</div>

      <div class="w3layouts-breadcrumbs text-center">
    		<div class="container">
    			<span class="agile-breadcrumbs">
            <a href="index.php"><i class="fa fa-home home_1"></i></a> /
            <a href="category.php?categoryid='car'">Cars</a> /
            <a href="category.php?categoryid='textbook'">Textbook</a> /
            <a href="category.php?categoryid='furniture'">Furniture</a> /
            <a href="category.php?categoryid='other'">Other</a>
    		</div>
    	</div>


	<!-- //header -->

                  <?php
                    $un=$_GET['id'];
				$query = "SELECT * FROM product WHERE id = $un ";
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

	<!--single-page-->
	<div class="single-page main-grid-border">
		<div class="container">
			<div class="product-desc">
				<div class="col-md-7 product-view">
					<h2> <?php echo $Product_Name?> </h2>
					<p> <i class="glyphicon glyphicon-map-marker"></i> Added at <?php echo $Release_date ?>, Product ID: <?php echo $Product_ID ?> </p>
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="<?php echo $Image ?>">
								<img src="<?php echo $Image ?>" />
							</li>
						</ul>
					</div>
					<!-- FlexSlider -->
					  <script defer src="js/jquery.flexslider.js"></script>

						<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
					<!-- //FlexSlider -->

		
					<div class="product-details">
						<h4><span class="w3layouts-agileinfo">Summary</span> :<p> <?php echo $Product_description ?> </p><div class="clearfix"></div></h4>

					</div>
				</div>
				<div class="col-md-5 product-details-grid">
					<div class="item-price">
						<div class="product-price">
							<p class="p-price">Price</p>
							<h3 class="rate"> <?php echo "$".$Price ?> </h3>
							<div class="clearfix"></div>
						</div>
					
						<div class="itemtype">
							<p class="p-price">Item Type</p>
							<h4> <?php echo $Category ?> </h4>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="interested text-center">
						<h4>Interested in this Product?<small> Contact the Seller!</small></h4>
						<p><i class="glyphicon glyphicon-earphone"></i> <?php echo $Phone_number ?>   <?php echo $Email ?> </p>
					</div>

				</div>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--//single-page-->
	<!--footer section start-->
		<footer>
      <div class="agileits-footer-bottom text-center">
  			<div class="container">
  				<div class="w3-footer-logo">
  					<h1><a href="index.php"><span>UB</span>TRADE</a></h1>
  				</div>
			</div>
		</div>
		</footer>
        <!--footer section end-->
</body>
</html>

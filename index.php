<!DOCTYPE html>
<?php
  require_once('setting/local_host_config.php');
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
						<a href="signin_front.php" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
              <?php if (isset($_SESSION['username']))
    				{
        		echo $_SESSION['username'];
    			} else echo"Sign In"?> </a>
          <!-- username display end !-->
					</li>
					<li class="dropdown head-dpdn">
						<a href="help.html"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
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


	<!-- Products -->
	<div class="total-ads main-grid-border">
		<div class="container">
			<div class="select-box">


				<div class="clearfix"></div>
			</div>

			<div class="ads-grid">
				<div class="agileinfo-ads-display col-md-9">
					<div class="wrapper">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						   <div>
												<div id="container">

								<div class="clearfix"></div>
							<ul class="list">
<!--implementing display_method:
  display all products in database to front site with its' information
  in section format-->
								<?php

                $query = "SELECT * FROM product ORDER BY Release_date DESC";
                $result = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($result)){
                  $id =$row['id'];
                  $Product_Name = $row['Product_Name'];
                  $Price = $row['Price'];
                  $Release_date = $row['Release_date'];
                  $Image_location = $row['Image_location'];

                  $Phone_number = $row['Phone_number'];
                  $Email = $row['Email'];

                  $Product_description = $row['Product_description'];
                    include 'single_product_section.php';
                }




                 ?>
							</ul>
						</div>
							</div>
						</div>

						<ul class="pagination pagination-sm">
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					  </div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<!-- // Products -->
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

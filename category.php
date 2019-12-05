<!DOCTYPE html>
<?php
  require_once('setting/server_config.php');
  session_start();
  $cate=$_GET['categoryid'];

  $sql_statement = "SELECT * FROM category WHERE category = $cate " ;
  $result = mysqli_query($conn, $sql_statement);
  if((mysqli_num_rows($result))==0){
      echo "<script>alert('category does not exist'); window.location.href='index.php' </script>";
  }

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
        <a href="category.php?categoryid='other'">Other</a> /
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
                          <div class="sort">
                               <div class="sort-by">
                                <label>Sort By : </label>
                                <form method="GET">
                                <select name = "orderby" onchange="this.form.submit()">       <!-- every time when select, pass the "order way" to get and refresh page with updated order way-->
                                        <option hidden><?php if(isset($_GET['orderby'])){
                                          if($_GET['orderby'] =="Release_date DESC" )  {echo "Most recent";}
                                          else if ($_GET['orderby'] =="Price DESC" ) {echo "Price: High to Low";}
                                          else if ($_GET['orderby'] =="Price ASC" ) {echo "Price: Low to High";}
                                        } else echo"Most recent";
                                        ?></option>
                                        <option value="Release_date DESC">Most recent</option>
                                        <option value="Price ASC">Price: Low to High</option>
                                        <option value="Price DESC">Price: High to Low</option>
                                </select>
                              </form>
                                 </div>
                               </div>

								<div class="clearfix"></div>
                <br>
              <div id ="allsection">
							<ul class="list">
<!--implementing display_method:
  display all products in database to front site with its' information
  in section format-->
								<?php
                if(isset($_GET['orderby'])){       //set the default order way to be "recent_upload"
                $ordby = $_GET['orderby'];
              } else { $ordby = "Release_date DESC"; }
                $query = "SELECT * FROM product WHERE Category = $cate ORDER BY $ordby";;
                $result = mysqli_query($conn, $query);

                if((mysqli_num_rows($result))==0){
              		echo "There is no post in this category";
                }

                while($row = mysqli_fetch_assoc($result)){
                  $id =$row['id'];
                  $Product_Name = $row['Product_Name'];
                  $Price = $row['Price'];
                  $Release_date = $row['Release_date'];
                  $Image = $row['Image'];
                  $Phone_number = $row['Phone_number'];
                  $Email = $row['Email'];
                  $Product_ID = $row['id'];
                  $Product_description = $row['Product_description'];
                  include 'single_product_section.php';
                }
                 ?>
							</ul>
            </div>
						</div>
							</div>
						</div>
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

<!DOCTYPE html>
<html>
<?php
 session_start();
 ?>
<head>
<title>UB TRADE</title>
<link rel="stylesheet" href="css/bootstrap.min.css"><!-- bootstrap-CSS -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /><!-- style.css -->
<link rel="stylesheet" href="css/font-awesome.min.css" /><!-- fontawesome-CSS -->
<meta name="viewport" content="width=device-width, initial-scale=1">
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
				<a class="post-w3layouts-ad" href="index.php">Back to Homepage</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</header>
	<!-- //header -->
	<!-- sign in form -->
	<section>
	 <div id="agileits-sign-in-page" class="sign-in-wrapper">
		 <div class="agileinfo_signin">
		 <h3>Sign Up</h3>
			 <form action="forgetpw_change.handle.php" method="post" >
				 <input type="email" name="Email" placeholder="Reenter Email Address" required="">
				 <input type="text" name="verification_code" placeholder="Verification Code" required="">
				 <input type="password" name="password" placeholder="Password" required="">
				 <input type="password" name="confirmPassword" placeholder="Confirm Password" required="">
				 <input type="submit" value="Change Password">
			 </form>
		 </div>
	 </div>
 </section>
	<!-- //sign in form -->
	<!--footer section start-->
		<footer>
			<div class="agileits-footer-bottom text-center">
			<div class="container">
				<div class="w3-footer-logo">
					<h1><a href="index.php"><span>UB</span>TRADE</a></h1>
				</div>
				<div class="copyrights">
					<p> Design by  <label> CSE_442_TEAM</label></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		</footer>
        <!--footer section end-->


</html>

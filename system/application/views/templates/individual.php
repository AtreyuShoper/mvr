<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE HTML>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<title><?php echo $title; ?></title>
	
	<link rel="stylesheet" href="<?php echo base_url('assets/individual/css/960_12_col.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/individual/css/reset.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/individual/css/text.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/individual/css/main.css');?>">
</head>
<body class="">
	<div id="wrap">
		<div id="main">
			<header>
				<div id="headertop"></div>
				<div class="container_12">
					<div class="grid_4">
						<a href="http://64.91.228.49/~instantm/index.html" id="brand" title="Home"> </a>
					</div>
					<div class="grid_8">
						<div class="account-container push_3 grid_2">
						<ul>
                                                    <?php if($is_logged_in == 1): ?>
                                                    <li><a href="<?php echo base_url('index.php/individual/logout');?>">Logout</a></li>
                                                    <?php else: ?>
                                                    <li><a href="<?php echo base_url('index.php/individual/login');?>">Login</a></li>
                                                    <?php endif; ?>
                                                    <li><a href="http://64.91.228.49/~instantm/signup.html">Sign Up</a></li>
                                                    
                                                </ul>
                                                </div>
						<div class="search-container grid_3 push_3">
							<form>
								<input class="search2" type="text" name="search" placeholder="Search MVR">
								<button class="submit_search" type="submit"></button>
							</form>
						</div>
						<div class="clearfix"></div>
						<div id="header-contact">
							<h3>Call Us Today! <span></span></h3>
						</div>
						<ul id="main-menu">
							<li class=""><a href="http://64.91.228.49/~instantm/index.html">Home</a>
							<li class="active"><a href="http://64.91.228.49/~instantm/drivingrecords.html">Driving Record</a>
							<li class=""><a href="http://64.91.228.49/~instantm/faqs.html">FAQs</a>
							<li class=""><a href="http://64.91.228.49/~instantm/about.html">About Us</a>
							<li class=""><a href="<?php echo base_url('index.php/contacts');?>">Contact Us</a>
						</ul>
					</div>
				</div>
			</header>
			<div id="maincontainer">
				<div id="maincontent">
					<div class="container_12">	
						<div class="grid_8">
                                                    <?php echo $body; ?>
                                                </div>
						<div class="grid_4">
							<div id="viewsamplereport">
								<h1>View Sample <span>Report</span></h1>
							</div>
							<div id="sharedivision">
								<!-- AddThis Button BEGIN -->
								<div class="addthis_toolbox addthis_default_style ">
								<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
								<a class="addthis_button_tweet"></a>
								<a class="addthis_button_pinterest_pinit"></a>
								<a class="addthis_counter addthis_pill_style"></a>
								</div>
								<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-51999b546ddab975"></script>
								<!-- AddThis Button END -->
							</div>
							<div id="testimonials">
								<h1>Testimonials</h1>
								<div>
									<div class="testimonial">
										<p>"Im a testimonial. Click me to edit and add text that says something nice about you and your services."</p>
										<div class="author">Luke Salvador, Portland Oregon</div>
									</div>
									<div class="testimonial">
										<p>"Im a testimonial. Click me to edit and add text that says something nice about you and your services."</p>
										<div class="author">Luke Salvador, Portland Oregon</div>
									</div>
									<div class="testimonial">
										<p>"Im a testimonial. Click me to edit and add text that says something nice about you and your services."</p>
										<div class="author">Luke Salvador, Portland Oregon</div>
									</div>
								</div>
								
								<a class="button readmore">Read More</a>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>
		<div id="footer-inner">
			<div class="container_12">
				<div class="grid_8">
					<ul id="links">
						<li><a href="http://64.91.228.49/~instantm/about.html">About Us</a></li>
						<li><a href="">Customer Service</a></li>
						<li><a href="">Site Map</a></li>
						<li><a href="">Search Terms</a></li>
						<li><a href="">Advanced Search</a></li>
						<li><a href="">Orders & Returns</a></li>
						<li><a href="<?php echo base_url('index.php/contacts');?>">Contact Us</a></li>
					</ul>
					<p>For information please contact mvr_info@instant-mvr.com</p>
				</div>
				<div class="grid_4 socialfooter">
					<a class="social googleplus" title="Add us on Google+"></a>
					<a class="social facebook" title="Like us on Facebook"></a>
					<a class="social twitter" title="Follow us on Twitter"></a>
				</div>
				<p class="copyright">&copy; 2013 Instant-MVR.com. All Rights Reserved</p>
			</div>
		</div>
	</footer>
<script type="text/javascript" src="<?php echo base_url('assets/individual/js/modernizr.2.6.2.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/individual/js/jquery.min.js');?>"></script>
</body>
</html>
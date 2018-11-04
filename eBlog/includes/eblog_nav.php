<!-- Header -->
		<header id="header">
			<!-- Nav -->
			<div id="nav">
				<!-- Main Nav -->
				<div id="nav-fixed">
					<div class="container">
						<!-- logo -->
						<div class="nav-logo">
							<a href="index.php" class="logo"><img src="./img/logo1.png" alt=""></a>
						</div>
						<!-- /logo -->

						<!-- nav -->
						<ul class="nav-menu nav navbar-nav">
							<?php 
								if (isset($_SESSION['username'])) {
									if ($_SESSION['user_role'] = 'admin') {
										echo '<li><a href="./admin">Admin</a></li>';
									}
									
								}
							?>
							
							<li><a href="category.php">Popular</a></li>
							 <?php 
                                $query = "SELECT * FROM categories LIMIT 4";

                                $select_all_categories_query = mysqli_query($connection,$query);

                                while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    echo '<li class="cat-1"><a href="category.php?cat_id='.$cat_id.'">'.$cat_title.'</a></li>';
                                }



                                ?>
						</ul>
						<!-- /nav -->
						<?php 
								if (isset($_SESSION['username'])) {
									echo '<ul class="nav-menu nav navbar-right">
												 <li><a style="font-weight:light;" href><span class="fa fa-user fa" style="color:green;"></span> welcome  '.$_SESSION['username'].' </a></li>
										</ul>';
								}

						?>
						

						<!-- search & aside toggle -->
						<div class="nav-btns">
							<button class="aside-btn"><i class="fa fa-bars"></i></button>
						</div>
						<!-- /search & aside toggle -->
					</div>
				</div>
				<!-- /Main Nav -->

				<!-- Aside Nav -->
				<div id="nav-aside">
					<!-- nav -->
					<div class="section-row">
						<ul class="nav-aside-menu">
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About Us</a></li>
							<li><a href="Registration.php">Join Us</a></li>
							<li><a href="contact.php">Contacts</a></li>
						</ul>
					</div>
					<!-- /nav -->
					<!-- social links -->
					<div class="section-row">
						<h3>Follow us</h3>
						<ul class="nav-aside-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
					<!-- /social links -->

					<!-- aside nav close -->
					<button class="nav-aside-close"><i class="fa fa-times"></i></button>
					<!-- /aside nav close -->
				</div>
				<!-- Aside Nav -->
			</div>
			<!-- /Nav -->
		</header>
		<!-- /Header -->
<?php  include 'includes/eblog_header.php'; ?>
<?php  include 'includes/eblog_nav.php'; ?>
		

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">	
					<!-- post -->

					<?php 
					$query_1 = "SELECT * FROM categories WHERE cat_id = $cat_id";
					$category_1 = mysqli_query($connection,$query_1);
					$row = mysqli_fetch_array($category_1);
          			$cat_title = $row['cat_title'];

                $query = "SELECT * FROM posts WHERE post_status ='published' LIMIT 2";

                $posting = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($posting)) {
                    # code...
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    
                    $query_1 = "SELECT * FROM categories WHERE cat_id = $post_category_id";
					$category_1 = mysqli_query($connection,$query_1);

					$prow = mysqli_fetch_array($category_1);
					$cat_id = $prow['cat_id'];
          			$cat_title = $prow['cat_title'];

                    echo '<div class="col-md-6">
						<div class="post post-thumb">
							<a class="post-img" href="blog-post.php?post_id='.$post_id.'"><img src="../eBlog/img/'.$post_image.'" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="category.php?cat_id='.$cat_id.'">'.$cat_title.'</a>
									<span class="post-date">'.$post_date.'</span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?post_id='.$post_id.'">'.$post_title.'</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->';

                }


                ?>
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="section-title">
							<h2>Recent Posts</h2>
						</div>
					</div>

					<!-- post -->
					<div class="col-md-8">

					<?php 
					$query_1 = "SELECT * FROM categories WHERE cat_id = $cat_id";
					$category_1 = mysqli_query($connection,$query_1);
					$row = mysqli_fetch_array($category_1);
          			$cat_title = $row['cat_title'];

                	$query = "SELECT * FROM posts WHERE post_status ='published' ORDER BY post_id DESC LIMIT 6";

                	$posting = mysqli_query($connection,$query);
					
					while ($row = mysqli_fetch_assoc($posting)) {
                    # code...
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    
                    $query_1 = "SELECT * FROM categories WHERE cat_id = $post_category_id";
					$category_1 = mysqli_query($connection,$query_1);

					$prow = mysqli_fetch_array($category_1);
					$cat_id = $prow['cat_id'];
          			$cat_title = $prow['cat_title'];

                    echo '<div class="col-md-4">
						<div class="post">
							<a class="post-img" href="blog-post.php?post_id='.$post_id.'"><img src="./img/'.$post_image.'" width="300" height="150" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-1" href="category.php">'.$cat_title.'</a>
									<span class="post-date">'.$post_date.'</span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?post_id='.$post_id.'">'.$post_title.'</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->';

               		 }


					?>
					<div class="col-md-12">
						<div class="section-title">
							<h2>Most Read Posts</h2>
						</div>
					</div>

					<?php 

					$query_1 = "SELECT * FROM categories WHERE cat_id = $cat_id";
					$category_1 = mysqli_query($connection,$query_1);
					$row = mysqli_fetch_array($category_1);
          			$cat_title = $row['cat_title'];

                	$query = "SELECT * FROM posts WHERE post_status ='published' ORDER BY post_view_count DESC";

                	$posting = mysqli_query($connection,$query);

						while ($row = mysqli_fetch_assoc($posting)) {
                    # code...
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_view_count = $row['post_view_count'];
                    
                    $query_1 = "SELECT * FROM categories WHERE cat_id = $post_category_id";
					$category_1 = mysqli_query($connection,$query_1);

					$prow = mysqli_fetch_array($category_1);
					$cat_id = $prow['cat_id'];
          			$cat_title = $prow['cat_title'];

                    echo '<div class="col-md-6">
						<div class="post">
							<a class="post-img" href="blog-post.php?post_id='.$post_id.'"><img src="./img/'.$post_image.'" width="400" height="200" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-3" href="category.php">'.$cat_title.'</a>
									<span class="post-date">'.$post_date.'</span>
								</div>
								<h3 class="post-title"><a href="blog-post.php?post_id='.$post_id.'">'.$post_title.'</a></h3>
							</div>
						</div>
					</div>
					<!-- /post -->';

               		 }

					?>

				<!-- /row -->
				</div>

				<?php include 'includes/sidebar.php'; ?>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

<?php include 'includes/eblog_footer.php'; ?>

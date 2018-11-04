<?php  include 'includes/eblog_header.php'; ?>
<?php  include 'includes/eblog_nav.php'; ?>

<!-- section -->

<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
					<div class="row">
<?php 

	if (isset($_GET['cat_id'])) {
		$cat_id = $_GET['cat_id'];
		
		  $query = "SELECT * FROM posts WHERE post_category_id = $cat_id LIMIT 1";
		  $query_1 = "SELECT * FROM categories WHERE cat_id = $cat_id";

          $select_category_query = mysqli_query($connection,$query);
          $category_1 = mysqli_query($connection,$query_1);

          $row = mysqli_fetch_array($category_1);
          $cat_title = $row['cat_title'];

     	  $count = mysqli_num_rows($select_category_query);

     	  if ($count == 0) {
     	  	echo '<div class="col-md-8"><h1>No Posts in this Category</h1></div>';
     	  }else{

     	  	while ($row = mysqli_fetch_assoc($select_category_query)) {
           			$post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];

             echo '
				
					<div class="col-md-8">
						<div class="row">
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-thumb">
									<a class="post-img" href="blog-post.php?post_id='.$post_id.'"><img src="./img/'.$post_image.'" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">'.$cat_title.'</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.php?post_id='.$post_id.'">'.$post_title.'</a></h3>
									</div>
								</div>
							</div>';
           }		

           $query_2 = "SELECT * FROM posts WHERE post_category_id = $cat_id ORDER BY post_id DESC LIMIT 2";
           $category_2 = mysqli_query($connection,$query_2);

           while ($row = mysqli_fetch_assoc($category_2)) {

           			$post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
           		 echo '	<!-- post -->
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="blog-post.php?post_id='.$post_id.'"><img src="./img/'.$post_image.'" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">'.$cat_title.'</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.php">'.$post_title.'</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->';
           }

           echo '<div class="clearfix visible-md visible-lg"></div>
							
							<!-- ad -->
							<div class="col-md-12">
								<div class="section-row">
									<a href="#">
										<img class="img-responsive center-block" src="./img/ad-2.jpg" alt="">
									</a>
								</div>
							</div>
							<!-- ad -->';

		   $query_3 = "SELECT * FROM posts WHERE post_category_id = $cat_id ORDER BY post_id ASC";
           $category_3 = mysqli_query($connection,$query_3);

           while ($row = mysqli_fetch_assoc($category_3)) {

           			$post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];

           		 echo '<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="blog-post.php?post_id='.$post_id.'"><img src="./img/'.$post_image.'" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">'.$cat_title.'</a>
											<span class="post-date">'.$post_date.'</span>
										</div>
										<h3 class="post-title"><a href="blog-post.php">'.$post_title.'</p>
									</div>
								</div>
							</div>
							<!-- /post -->';
           }
           		echo '</div>
					</div>';

     	  }


           
          
	}
?>
							<!-- /post -->

					
<?php include 'includes/sidebar.php'; ?>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->
<?php include 'includes/eblog_footer.php'; ?>
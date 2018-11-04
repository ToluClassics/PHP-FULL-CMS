<?php  include 'includes/eblog_header.php'; ?>
<?php  include 'includes/eblog_nav.php'; ?>

<!-- section -->

<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
					<div class="row">
<?php 


		if (isset($_POST['search'])) {
                   
                    $search = $_POST['search'] ;
                    $query = "SELECT * FROM posts WHERE post_title LIKE '%$search%' LIMIT 1";
                    // $query_1 = "SELECT * FROM posts WHERE post_title LIKE '%$search%' LIMIT 1";

                    $search_query = mysqli_query($connection,$query);

                    if (!$search_query) {
                        # code...
                        die("query failed".mysqli_error($connection));
                    }
                    
                    $count = mysqli_num_rows($search_query);

                    if ($count == 0) {
                       echo "<div class='col-md-8'><h1>No Result</h1></div>";
                    }else{
                        while ($row = mysqli_fetch_assoc($search_query)) {
                    # code...
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];

           			  echo '
							<div class="col-md-8">
								<div class="post">
									<a class="post-img" href="blog-post.html"><img src="./img/'.$post_image.'" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">'.$cat_title.'</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">'.$post_title.'</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->';
          			 }	
          
	}}elseif (isset($_GET['search'])) {
		            $search = $_GET['search'] ;
                    $query = "SELECT * FROM posts WHERE post_title LIKE '%$search%' LIMIT 1 ";
                    
                    $search_query = mysqli_query($connection,$query);

                    if (!$search_query) {
                        # code...
                        die("query failed".mysqli_error($connection));
                    }
                    
                    $count = mysqli_num_rows($search_query);

                    if ($count == 0) {
                       echo "<div class='col-md-8'><h1>No Result</h1></div>";
                    }else {
                        while ($row = mysqli_fetch_assoc($search_query)) {
                    # code...
                    $post_id = $row['post_id'];
                    $post_category_id = $row['post_category_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];

           			  echo '
							<div class="col-md-8">
								<div class="post">
									<a class="post-img" href="blog-post.html"><img src="./img/'.$post_image.'" alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category cat-2" href="#">'.$cat_title.'</a>
											<span class="post-date">March 27, 2018</span>
										</div>
										<h3 class="post-title"><a href="blog-post.html">'.$post_title.'</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->';
          			 } } 
          
	}else{
          echo "<div class='col-md-8'><h1>You have not searched for anything</h1></div>";
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
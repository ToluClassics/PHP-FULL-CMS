<?php  include 'includes/eblog_header.php'; ?>
<?php  include 'includes/eblog_nav.php'; ?>
		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Post content -->
					<div class="col-md-8">
						<div class="section-row sticky-container">
							<div class="main-post">
								<?php 

									 if (isset($_GET['post_id'])) {
						                   $post_id = $_GET['post_id'];
						                   $query = "SELECT * FROM posts WHERE post_id = $post_id";
						                   $get_post = mysqli_query($connection,$query);

						                   while ($row = mysqli_fetch_array($get_post)) {
						                            $post_id = $row['post_id'];
						                            $post_author = $row['post_author'];
						                            $post_title = $row['post_title'];
						                            $post_category = $row['post_category_id'];
						                            $post_status = $row['post_status'];    
						                            $post_tags = $row['post_tags'];
						                            $post_date = $row['post_date'];
						                            $post_image = $row['post_image'];
						                            $post_comment = $row['post_comment_count'];
						                            $post_content = $row['post_content'];
						                            $about_author = $row['about_author'];

						                   }

						          $query_toincreasecount = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id = $post_id ";
                       			  $update_comment_count = mysqli_query($connection, $query_toincreasecount);
						                }
								?>

								<h3><?php echo $post_title;  ?></h3>
								<figure class="figure-img">
									<img class="img-responsive" src="./img/<?php echo $post_image;  ?>" alt="">
									<figcaption><?php echo $post_title;  ?></figcaption>
								</figure>
								<p><?php echo ucfirst($post_content);  ?></p>
							</div>
							<div class="post-shares sticky-shares">
								<a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
								<a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
								<a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
								<a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
								<a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
								<?php 
									if ($_SESSION['username']) {
										$post_id = $_GET['post_id'];
										echo '<a href="./admin/posts.php?source=edit_post&p_id='.$post_id.'" ><i class="fa fa-edit fa-3x" ></i></a>';
									}else{
										echo "";
									}
								?>	
							</div>
						</div>

						<!-- ad -->
						<div class="section-row text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="./img/ad-2.jpg" alt="">
							</a>
						</div>
						<!-- ad -->
						
						<!-- author -->
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-left">
										<img class="media-object" src="./img/author.png" alt="">
									</div>
									<div class="media-body">
										<div class="media-heading">
											<h3><?php echo $post_author;  ?></h3>
										</div>
										<p><?php echo $about_author;  ?></p>
										<ul class="author-social">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /author -->

						<!-- comments -->
						<div class="section-row">
								                <?php 

								                    if (isset($_GET['post_id'])) {

								                        $post_id = $_GET['post_id'];
								                        $query = "SELECT * FROM comments WHERE comment_post_id = $post_id AND comment_status = 'approved' ORDER BY comment_id DESC ";
								                        $comment_query = mysqli_query($connection,$query);

								                        echo '<div class="section-title">
																<h2>'.mysqli_num_rows($comment_query).' Comments</h2>
															</div>

															<div class="post-comments">
																<!-- comment -->
														';

								                        while ($row = mysqli_fetch_assoc($comment_query)) {
								                            $comment_author = $row['comment_author'];
								                            $comment_date = $row['comment_date'];
								                            $comment_content = $row['comment_content'];
								                            $comment_status = $row['comment_status'];

								                                echo '<div class="media">
																	<div class="media-left">
																		<img class="media-object" src="./img/avatar.png" alt="">
																	</div>
																	<div class="media-body">
																		<div class="media-heading">
																			<h4>'.$comment_author.'</h4>
																			<span class="time">'.$comment_date.'</span>
																		</div>
																		<p>'.$comment_content.'</p>
																	</div>
																</div>
																<!-- /comment -->';

								                        }
								                    }
								                    
								                ?>
								

								<!-- comment -->
							</div>
						</div>
						<!-- /comments -->

				<?php 

                    if (isset($_POST['create_comment'])) {

                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content = $_POST['comment_content'];
                        $comment_post_id = $_GET['post_id'];




                        $query = "INSERT  INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date)";
                        $query .= "VALUES('{$comment_post_id}','{$comment_author}','{$comment_email}','{$comment_content}','unapproved',now())";

                        $create_comment_tobase = mysqli_query($connection,$query);

                        if (!$create_comment_tobase) {
                            die("query failed because".mysql_error($connection));
                        }

                        $query_toincreasecount = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $comment_post_id ";
                        $update_comment_count = mysqli_query($connection, $query_toincreasecount);


                    }

                ?>
						<!-- reply -->
						<div class="section-row">
							<div class="section-title">
								<h2>Leave a reply</h2>
								<p>your email address will not be published. required fields are marked *</p>
							</div>
							<form class="post-reply" action="" method="POST">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<span>Name *</span>
											<input class="input" type="text" name="comment_author" required>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<span>Email *</span>
											<input class="input" type="email" name="comment_email" required>
										</div>
									</div>
				
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="input" name="comment_content" placeholder="Message" required></textarea>
										</div>
										<button type="submit" name="create_comment" class="primary-button">Submit</button>
									</div>
								</div>
							</form>
						</div>
						<!-- /reply -->
					</div>
					<!-- /Post content -->

					<?php include 'includes/sidebar.php' ?>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

 	
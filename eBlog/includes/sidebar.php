<div class="col-md-4">	

						<!-- Login Form  -->
						<?php 

							if (isset($_SESSION['username'])) {
								echo '<div class="well">
                    						<h4>Logout Here</h4>
                    						<a href="./includes/logout.php"><button type="submit" name="logout" value="Logout" class="btn btn-danger">
                                LOGOUT</button></a></div>';
							}else {
								echo ' <div class="well">
                    <h4>Login</h4>
                        <form method="post" action="includes/login.php" class="form-group">
                                <div class="form-group">
                                <input type="text" name="username" placeholder="enter username" class="form-control" required>
                                </div>
                                <div class="input-group">
                                <input type="password" name="password" placeholder="enter password" class="form-control" required><span class="input-group-btn"><button type="submit" name="login" value="Login" class="btn btn-primary">
                                submit</button></span>
                                </div>
	                        </form>
	                </div>';
							}
						?>
						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Categories</h2>
							</div>
							<div class="category-widget">
								<ul>
							 <?php 
                                $query = "SELECT * FROM categories";

                                $select_all_categories_query = mysqli_query($connection,$query);

                                while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];

                                    $query_1 = "SELECT * FROM posts WHERE post_category_id = $cat_id ";
                                    $particular_category = mysqli_query($connection,$query_1);

                                    echo '<li><a href="category.php?cat_id='.$cat_id.'" class="cat-1">'.$cat_title.'<span>'. mysqli_num_rows($particular_category).'</span></a></li>';
                                }
                            ?>
								</ul>
							</div>
						</div>
						<!-- /catagories -->
						
						<!-- tags -->
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									<li><a href="search.php?search=chrome">Chrome</a></li>
									<li><a href="search.php?search=css">CSS</a></li>
									<li><a href="search.php?search=Tutorial">Tutorial</a></li>
									<li><a href="search.php?search=Backend">Backend</a></li>
									<li><a href="search.php?search=JQuery">JQuery</a></li>
									<li><a href="search.php?search=Design">Design</a></li>
									<li><a href="search.php?search=Development">Development</a></li>
									<li><a href="search.php?search=JavaScript">JavaScript</a></li>
									<li><a href="search.php?search=Website">Website</a></li>
								</ul>
							</div>
						</div>
						<!-- /tags -->

						 <?php
                   
		                    if (isset($_POST['search'])) {
		                     
		                    $search = $_POST['search'] ;
		                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
		                    
		                    $search_query = mysqli_query($connection,$query);

		                    if (!$search_query) {
		                        # code...
		                        die("query failed".mysqli_error($connection));
		                    }

			                }
    	



                    ?>
						 <!-- Blog Search Well -->
			                <div class="well">
			                    <h4>Blog Search</h4>
			                    <form method="post" action="search.php" class="form-inline">
			                            <input type="text" name="search" class="form-control" required placeholder="search for a keyword">
			                        <span class="form-group">
			                            <button class="btn btn-primary" name="submit"  type="submit">
			                               Search<span class="fa fa-search"></span>
			                                </button>
			                        </span>
			                    </form>
			                </div>

							<!-- archive -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Archive</h2>
							</div>
							<div class="archive-widget">
								<ul>
									<li><a href="#">Jan 2018</a></li>
									<li><a href="#">Feb 2018</a></li>
									<li><a href="#">Mar 2018</a></li>
								</ul>
							</div>
						</div>
						<!-- /archive -->
					</div>
					<?php

					$query = " SELECT cat_title, SUM(cat_id) FROM categories  GROUP BY  cat_title ";
					$qw = mysqli_query($connection,$query);

					while ($row =  mysqli_fetch_array($qw)) {
						echo $row['SUM(cat_id)']."<br />";
					
					};


<?php
					if (isset($_GET['p_id'])) {
					$the_post_id = $_GET['p_id'] ;
					}

					$query = "SELECT * FROM posts WHERE post_id = $the_post_id  ";
                    $select_postsid = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_postsid)) {
                            $post_id = $row['post_id'];
                            $post_author = $row['post_author'];
                            $post_title = $row['post_title'];
                            $post_category = $row['post_category_id'];
                            $post_status = $row['post_status'];    
                            $post_tags = $row['post_tags'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_comment = $row['post_comment_count'];
                             $about_author = $row['about_author'];
                             $post_content = $row['post_content'];
                        }


                        if (isset($_POST['edit_post'])) {
                        	$the_post_id = $_GET['p_id'] ;
                        	$post_title = $_POST['post_title'];
							$post_category = $_POST['post_category'];
							$post_author = $_POST['post_author'];
							$post_status = $_POST['post_status'];
							$post_tags = $_POST['post_tags'];
							$about_author = $_POST['about_author'];

							$post_image = $_FILES['image']['name'];
							$post_image_temp = $_FILES['image']['tmp_name'];

							$post_date = date('d-m-y');

							$post_content = $_POST['post_content'];

							move_uploaded_file($post_image_temp, "c:/xampp/htdocs/CMS/admin/images/$post_image");
							if (empty($post_image)) {
								
								$query = "SELECT * FROM posts WHERE post_id = $post_id";
								$select_image = mysqli_query($connection, $query);

								while ($row = mysqli_fetch_array($select_image)) {
									$post_image = $row['post_image'];
								}
							}

							$query = "UPDATE posts SET  ";
							$query .= "post_title = '$post_title',  ";
							$query .= "post_category_id = $post_category,  ";
							$query .= "post_author = '$post_author',  ";
							$query .= "post_tags = '$post_tags',  ";
							$query .= "post_content = '$post_content',  ";
							$query .= "post_status = '$post_status',  ";
							$query .= "post_date = now(),  ";
							$query .= "post_image = '$post_image', ";
							$query .= "about_author = '$about_author'";
							$query .= " WHERE post_id = $post_id";

							$Update_post = mysqli_query($connection, $query);

							if (!$Update_post) {
							echo "error".mysqli_error($connection);
							}

							echo "<p class='bg-success'><h4>Post Updated: <a href='../blog-post.php?post_id=".$the_post_id."'>View Post</a> or <a href='posts.php'>Edit More Posts</a> </h4></p>";
                        }
?>



<form action="" method="post" enctype="multipart/form-data">
	<div class="rows">
		<div class="col-lg-8">
			<div class="form-group">
			<label for="post_title">Post Title</label>
			<input value="<?php echo $post_title;  ?>" type="text" name="post_title" class="form-control">
		</div>

		<div class="form-group">
			<label for="post_category">Post Category ID</label>
			<select name="post_category" id="" class="form-control">
				<?php 

				$query = "SELECT * FROM categories"; 

                $select_categories = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];

                echo "<option value='".$cat_id."'>".$cat_title."</option>";
           		 }

				?>

			</select>
		</div>

		<div class="form-group">
			<label for="post_author">Post Author</label>
			<input value="<?php echo $post_author;  ?>" type="text" name="post_author" class="form-control">
		</div>

		<div class="form-group">
			<label for="post_content">About Author</label>
			<textarea  cols="20" rows="10" class="form-control" name="about_author"><?php echo $about_author;  ?></textarea> 
		</div>

		<div class="form-group">
			<label for="post_status">Post Status</label>
			<select class="form-control" name="post_status" value="<?php echo $post_status;  ?>">
				<option value="published">published</option>
				<option value="draft">draft</option>
			</select>
		</div>

		<div class="form-group">
			<img width="100" src="../admin/images/<?php echo $post_image; ?>">
			<input type="file" name="image">
		</div>

		<div class="form-group">
			<label for="post_tags">Post Tags</label>
			<input value="<?php echo $post_tags;  ?>" type="text" name="post_tags" class="form-control">
		</div>

		<div class="form-group">
			<label for="post_date">Post Date</label>
			<input value="<?php echo $post_date;  ?>" type="date" name="post_date">
		</div>

		<div class="form-group">
			<label for="post_content">Post Content</label>
			<textarea  cols="30" rows="10" class="form-control" name="post_content"><?php echo $post_content;  ?></textarea> 
		</div>

		<div class="form-group">
			<input type="submit" name="edit_post" value="Update" class="btn btn-primary">
		</div>

		</div>
	</div>
</form>
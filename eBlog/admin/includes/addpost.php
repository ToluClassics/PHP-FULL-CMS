
<?php
	if (isset($_POST['create_post'])) {
		
		$post_title = $_POST['post_title'];
		$post_category = $_POST['post_category'];
		$post_author = $_POST['post_author'];
		$post_status = $_POST['post_status'];
		$about_author = $_POST['about_author'];
		$post_tags = $_POST['post_tags'];

		$post_image = $_FILES['image']['name'];
		$post_image_temp = $_FILES['image']['tmp_name'];

		$post_date = date('d-m-y');

		$post_content = $_POST['post_content'];

	
		$moved =	move_uploaded_file($post_image_temp, "c:/xampp/htdocs/eBlog/img/$post_image"); 

		$query = " INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status,about_author)";

		$query .= " VALUES({$post_category},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}', '{$post_tags}', '{$post_status}', '{$about_author}')" ;

		$create_Post_Query = mysqli_query($connection, $query);

		if (!$create_Post_Query) {
			die('Query Failed'.mysqli_error($connection)); 
		}

		echo "<p class='bg-success'><h4>Post Added: <a href='./posts.php'>View Post</a></h4></p>";
	}





?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="rows">
		<div class="col-lg-6">
			<div class="form-group">
			<label for="post_title">Post Title</label>
			<input type="text" name="post_title" class="form-control" required>
		</div>

		<div class="form-group">
			<label for="post_category">Post Category ID</label>
			<select name="post_category" id="" class="form-control" required>
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
			<input type="text" name="post_author" class="form-control" required>
		</div>

		<div class="form-group">
			<label for="about_author">about Author</label>
			<textarea cols="30" rows="10" class="form-control" name="about_author" required></textarea> 
		</div>

		<div class="form-group">
			<label for="post_status">Post Status</label>
			<select class="form-control" name="post_status" required>
				<option value="published">published</option>
				<option value="draft">draft</option>
			</select>
		</div>

		<div class="form-group">
			<label for="post_image">Post Image</label>
			<input type="file" name="image">
		</div>

		<div class="form-group">
			<label for="post_tags">Post Tags</label>
			<input type="text" name="post_tags" required class="form-control">
		</div>

		<div class="form-group">
			<label for="post_date">Post Date</label>
			<input type="date" name="post_date" required>
		</div>

		<div class="form-group">
			<label for="post_content">Post Content</label>
			<textarea cols="30" rows="10" class="form-control" required name="post_content"></textarea> 
		</div>

		<div class="form-group">
			<input type="submit" name="create_post" value="Publish" class="btn btn-primary">
		</div>

		</div>
	</div>
</form>
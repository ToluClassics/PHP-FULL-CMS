  <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Create New User
                        </h1>
<?php
	if (isset($_POST['create_user'])) {
		
		$user_firstname = $_POST['user_firstname'];
		$user_lastname = $_POST['user_lastname'];
		$user_email = $_POST['user_email'];
		$user_role = $_POST['user_role'];
		$username = $_POST['username'];
		$user_password = $_POST['user_password'];

		$user_image = $_FILES['image']['name'];
		$user_image_temp = $_FILES['image']['tmp_name'];

		$user_date = now();

	
		$moved =	move_uploaded_file($user_image_temp, "c:/xampp/htdocs/eBlog/img/$user_image"); 

		$query = " INSERT INTO users(user_firstname,user_lastname,user_email,username,user_password,user_role)";

		$query .= " VALUES('{$user_firstname}','{$user_lastname}','{$user_email}','{$username}', '{$user_password}', '{$user_role}')" ;

		$create_user_Query = mysqli_query($connection, $query);

		if (!$create_user_Query) {
			die('Query Failed'.mysqli_error($connection)); 
		}

		echo "New User Created: "." "."<a href='users.php'>View New User</a>" ;
	}





?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="rows">
		<div class="col-lg-6">
			<div class="form-group">
			<label for="user_firstname">First Name</label>
			<input type="text" name="user_firstname" class="form-control" required>
		</div>

		<div class="form-group">
			<label for="user_lastname">Last Name</label>
			<input type="text" name="user_lastname" class="form-control" required>
		</div>

		<div class="form-group">
			<label for="user_role">user role</label>
			<select name="user_role" class="form-control" required>
				<option value="subscriber">Select User Role</option>
				<option value="admin">Admin</option>
				<option value="subscriber">Subscriber</option>			
			</select>
		</div>

		<div class="form-group">
			<label for="username">username</label>
			<input type="text" name="username" class="form-control" required>
		</div>

		<div class="form-group">
			<label for="user_image">Upload a Picture</label>
			<input type="file" name="user_image" class="form-control" >
		</div>

		<div class="form-group">
			<label for="user_email">user_email</label>
			<input type="email" name="user_email" class="form-control" required>
		</div>

		<div class="form-group">
			<label for="user_date">Password</label>
			<input type="password" name="user_password" class="form-control" required>
		</div>

		<div class="form-group">
			<input type="submit" name="create_user" value="Add User" class="btn btn-danger">
		</div>

		</div>
	</div>
</form>
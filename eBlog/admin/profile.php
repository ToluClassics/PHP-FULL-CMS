<?php include "includes/admin_header.php"; ?>

    <?php 

        if (isset($_SESSION['username'])) {

            $username = $_SESSION['username'];

            $query = "SELECT * FROM users WHERE username = '$username'";
            $select_user_profile = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_array($select_user_profile)) {
                            
                            $user_id = $row['user_id'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_email = $row['user_email'];
                            $username = $row['username'];
                            $user_role = $row['user_role'];
                            $user_password = $row['user_password'];
            }

        }

                                if (isset($_POST['edit_user'])) {
                            
                            $user_firstname = $_POST['user_firstname'];
                            $user_lastname = $_POST['user_lastname'];
                            $user_email = $_POST['user_email'];
                            $username = $_POST['username'];
                            $user_role = $_POST['user_role'];
                            $user_password = $_POST['user_password'];

                            // $post_image = $_FILES['image']['name'];
                            // $post_image_temp = $_FILES['image']['tmp_name'];

                                // move_uploaded_file($post_image_temp, "c:/xampp/htdocs/CMS/admin/images/$post_image");
                                // if (empty($post_image)) {
                                    
                                //  $query = "SELECT * FROM posts WHERE post_id = $post_id";
                                //  $select_image = mysqli_query($connection, $query);

                                //  while ($row = mysqli_fetch_array($select_image)) {
                                //      $post_image = $row['post_image'];
                                //  }
                                // }

                            $query = "UPDATE users SET ";
                            $query .= "user_firstname = '$user_firstname', ";
                            $query .= "user_lastname = '$user_lastname', ";
                            $query .= "user_email = '$user_email', ";
                            $query .= "username = '$username', ";
                            $query .= "user_role = '$user_role', ";
                            $query .= "user_password = '$user_password', ";
                            $query .= " WHERE username = $username";

                            $Update_user = mysqli_query($connection, $query);
                        }


    ?>


    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_nav.php"; ?>
      
          <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['firstname']; ?></small>
                        </h1>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data">
    <div class="rows">
        <div class="col-lg-6">
            <div class="form-group">
            <label for="user_firstname">First Name</label>
            <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname; ?>">
        </div>

        <div class="form-group">
            <label for="user_lastname">Last Name</label>
            <input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname; ?>">
        </div>

        <div class="form-group">
            <label for="user_role">User Role</label>
            <select name="user_role" id="" class="form-control">
                <option value="subscriber"> <?php echo $user_role; ?> </option>
                <?php 
                    if ($user_role == 'admin') {
                        echo "<option value='subscriber'>subscriber</option>";
                    }else{
                        echo "<option value='admin'>admin</option>";
                    }

                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="username">username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
        </div>

        <div class="form-group">
            <label for="user_email">user_email</label>
            <input type="email" name="user_email" class="form-control" value="<?php echo $user_email; ?>">
        </div>

        <div class="form-group">
            <label for="user_date">Password</label>
            <input value="<?php echo $user_password; ?>" type="password" name="user_password" class="form-control">
        </div>

        <div class="form-group">
            <input type="submit" name="edit_user" value="Update Profile" class="btn btn-danger">
        </div>

        </div>
    </div>
</form>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div> 
       
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php" ?>
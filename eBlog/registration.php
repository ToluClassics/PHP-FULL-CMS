<?php  include 'includes/eblog_header.php'; ?>
<?php  include 'includes/eblog_nav.php'; ?>

<?php 
    
    if (isset($_POST['submit'])) {

            $username = $_POST['username'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password = $_POST['password'];
            $email= $_POST['email'];

            if (!empty($username) && !empty($email) && !empty($password)) {
                
            $username = mysqli_real_escape_string($connection,$username);
            $firstname = mysqli_real_escape_string($connection,$firstname);
            $lastname = mysqli_real_escape_string($connection,$lastname);
            $password = mysqli_real_escape_string($connection,$password);
            $email= mysqli_real_escape_string($connection,$email);

            $query = "SELECT randSalt FROM users";
            $select_randsalt_query = mysqli_query($connection, $query);

            if (!$select_randsalt_query) {
                die("QUery Failed".mysqli_error($connection));
            }

            $row = mysqli_fetch_array($select_randsalt_query);

            $salt = $row['randSalt']; 

            $password = crypt($password,$salt);

            $query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_role) VALUES ('$username', '$password', '$firstname', '$lastname', '$email', 'Subscriber')";
            $register_user_query = mysqli_query($connection, $query);

            if (!$register_user_query) {
                die("QUery Failed".mysqli_error($connection));
            }

            $message = "Your Registration Has Been Submitted";
            
            }else{

                $message = "Fields Cannot Be Empty";
            }

           
    } else {

        $message = "";
    }

?>
    
<div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                    <div class="row">
   
            <div class="col-md-8">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                        <h4 class="text-center"><?php echo $message; ?></h4>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" required>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="sr-only">Firstname</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter Your Firstname" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">Lastname</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Your Lastname" required>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->


        <hr>

<?php include 'includes/sidebar.php'; ?>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /section -->


<?php include 'includes/eblog_footer.php'; ?>

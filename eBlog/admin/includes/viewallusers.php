    <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Users Information
                        </h1>
                 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>email</th>
                                    <th>image</th>
                                    <th>Role</th>
                                    <th>Registration Date</th>
                                </tr>
                            </thead>
                            <tbody>
                             
                                    <?php
                    $query = "SELECT * FROM users  ORDER BY user_id ASC";
                    $select_users = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_users)) {
                            $user_id = $row['user_id'];
                            $username = $row['username'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_email = $row['user_email'];
                            $user_image = $row['user_image'];    
                            $user_date = $row['user_date'];
                            $user_role = $row['user_role']; 

                            echo "<tr> 

                                    <td>".$user_id."</td>
                                    <td>".$username."</td>
                                    <td>".$user_firstname."</td>";
                            echo "<td>".$user_lastname."</td>
                                    <td>".$user_email."</td>
                                    <td><img src='../admin/images/".$user_image."' width='100'/></td>
                                    <td>".$user_role."</td>";
                            echo "<td>".$user_date."</td>
                                    <td><a href='users.php?change_to_admin=".$user_id."'>Admin</a></td>
                                    <td><a href='users.php?change_to_subscriber=".$user_id."'>Subscriber</a></td>
                                    <td><a href='users.php?user_source=edit_user&user_id=".$user_id."'>edit</a></td>
                                    <td><a href='users.php?delete=".$user_id."'>delete</a></td>
                                    
                                    </tr>";        
                              

                            }
                            

                                    ?>
                            </tbody>
                        </table> 

                        <?php 


                         if (isset($_GET['change_to_admin'])) {
                            
                            $change_to_admin = $_GET['change_to_admin'];  
                            $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $change_to_admin";
                            $approve_post_query = mysqli_query($connection,$query);
                            header("Location: users.php");


                        }

                        if (isset($_GET['change_to_subscriber'])) {
                            
                            $change_to_subscriber = $_GET['change_to_subscriber'];  
                            $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $change_to_subscriber";
                            $unapprove_post_query = mysqli_query($connection,$query);
                            header("Location: users.php");


                        }

                        if (isset($_GET['delete'])) {
                            
                            $the_user_id = $_GET['delete'];  
                            $query = "DELETE FROM users WHERE user_id = $the_user_id";
                            $delete_query = mysqli_query($connection,$query);
                            header("Location: users.php");

                        }

                        ?>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>







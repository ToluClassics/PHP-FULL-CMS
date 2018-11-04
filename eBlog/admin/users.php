<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_nav.php"; ?>
      
         <?php
                            if (isset($_GET['user_source'])) {
                                $user_source = $_GET['user_source'];
                            }else{
                                $user_source = '';  
                            }

                            switch ($user_source) {

                                 case 'add_user':
                                    include 'includes/adduser.php';
                                    break;

                                 case 'edit_user':
                                    include 'includes/edituser.php';
                                    break;

                                default:
                                    include 'includes/viewallusers.php';
                                    break;
                            }

            ?>
       
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php" ?>
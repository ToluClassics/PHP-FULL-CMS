<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_nav.php"; ?>

       
         <?php
                            if (isset($_GET['comment_source'])) {
                                $comment_source = $_GET['comment_source'];
                            }else{
                                $comment_source = '';  
                            }

                            switch ($comment_source) {
                                case 'particular_post':
                                    include 'includes/eachpost.php';
                                    break;

                                default:
                                    include 'includes/viewallcomments.php';
                                    break;
                            }

            ?>
       
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php" ?>
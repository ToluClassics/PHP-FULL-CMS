<?php include "includes/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_nav.php"; ?>

        <?php 
            if (isset($_POST['add_cat'])) {
                $cat_title = $_POST['cat_title'];
                $query = "INSERT INTO categories(cat_title) VALUES('$cat_title')";
                $addcategoryquery = mysqli_query($connection,$query);

                if (!$addcategoryquery) {
                    die("failed to add category".mysqli_error());
                }

            }            

        ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            All Posts
                        </h1>
                        <?php
                            if (isset($_GET['source'])) {
                                $source = $_GET['source'];
                            }else{
                                $source = '';  
                            }

                            switch ($source) {
                                case 'add_post':
                                    include 'includes/addpost.php';
                                    break;

                                case 'edit_post':
                                    include 'includes/editpost.php';
                                    break;
                                default:
                                    include 'includes/viewallposts.php';
                                    break;
                            }

                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php" ?>
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
                            Categories
                        </h1>
                    <div class="col-xs-6">
                        <form method="post" action="categories.php" >
                            <div class="form-group">
                                <label for="cat_title">Add a new category:</label>
                                <input type="text" name="cat_title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="add_cat" value="Add Category" class="btn btn-primary">    
                            </div>
                        </form>
                    <?php

                        if (isset($_GET['edit'])) {
                            
                            $cat_id = $_GET['edit'];

                            include "includes/update_categories.php";
                        }
                    ?>


                    </div>
                    <div class="col-xs-6">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                <th>Category title</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                // find categories database
                                $query = "SELECT * FROM categories";

                                $select_all_categories_query = mysqli_query($connection,$query);

                                while ($row = mysqli_fetch_assoc($select_all_categories_query)) {
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];
                                    
                                    echo "<tr>
                                    <td>".$cat_id."</td>
                                    <td>".$cat_title."</td>
                                    <td><a href='categories.php?delete=".$cat_id."'>Delete</a></td>
                                    <td><a href='categories.php?edit=".$cat_id."'>Edit</a></td>
                                    </tr>";

                                }
                                 ?>
                                <?php 
                                // delete query

                                if (isset($_GET['delete'])) {
                                    $the_cat_id = $_GET['delete'];
                                    $query = "DELETE FROM categories WHERE cat_id = $the_cat_id";
                                    $delete_query =  mysqli_query($connection,$query);
                                    header("Location: categories.php");
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php" ?>
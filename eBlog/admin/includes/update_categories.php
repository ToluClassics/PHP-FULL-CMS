                        <form method="post" action="categories.php" >
                            <div class="form-group">
                                <label for="cat_title">Update Category:</label>

                            <?php
                            if (isset($_GET['edit'])) {

                                $cat_id = $_GET['edit'];
                                $query = "SELECT * FROM categories WHERE cat_id = $cat_id";

                                $select_part_categories_query = mysqli_query($connection,$query);

                                while ($row = mysqli_fetch_assoc($select_part_categories_query)) {
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id'];

                            ?>

                            <input type="text" value="<?php if($cat_title){ echo $cat_title; }?>" name="new_title" class="form-control" required>
                                    
                             <?php      }}

                                 if (isset($_POST["update_cat"])) {  
                                    $cat_id = $_GET['edit'];    
                                    $new_title = $_POST["new_title"];
                                    $query_update = "UPDATE categories SET cat_title = '$new_title' WHERE cat_id = $cat_id ";

                                    $result_updating_query = mysqli_query($connection, $query_update);

                                    if (!$result_updating_query) {

                                        die("errur".mysqli_error($connection));
                                           
                                           }
                                  }
                                
                            ?>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="update_cat" value="Update Category" class="btn btn-primary">    
                            </div>
                        </form>
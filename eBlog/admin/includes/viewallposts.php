<?php

    if (isset($_POST['checkBoxArray'])) {

        foreach ($_POST['checkBoxArray'] as $key => $value) {
            
            $bulkOptions = $_POST['bulkOptions'];

            switch ($bulkOptions) {
                case 'published':
                    $query = "UPDATE posts SET post_status = '$bulkOptions' WHERE post_id = $value";
                    $Update_posts = mysqli_query($connection, $query);
                    break;
                case 'draft':
                    $query = "UPDATE posts SET post_status = '$bulkOptions' WHERE post_id = $value";
                    $Update_posts = mysqli_query($connection, $query);
                    break;
                case 'delete':
                    $query = "DELETE FROM posts WHERE post_id = $value";
                    $delete_query = mysqli_query($connection,$query);
                    break;
                
                default:
                    # code...
                    break;
            }
        }
        
    }
?>

<form class="" action="" method="POST">
<table class="table table-bordered table-hover">

    <div id="bulkOptionsConainer"  class="col-xs-4">
        <select name="bulkOptions" id="" class="form-control">
            <option value="">Select Options</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
        </select>
    </div> 
    <div class="col-xs-4">
        <input type="submit" onClick=" javascript: return confirm('are you Sure!')" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="addpost.php">Add New</a>
    </div>
<br><br>

                            <thead>

                                <tr>
                                    <th><input type="checkbox" id="selectAllBoxes" name=""></th>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Number of Comments</th>
                                    <th>Number of Views</th>
                                    <th>Date Published</th>
                                    <th>Delete Post</th>
                                    <th>Edit Post</th>
                                </tr>
                            </thead>
                            <tbody>
                             
                                    <?php
                    $query = "SELECT * FROM posts  ORDER BY post_id DESC ";
                    $select_posts = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_posts)) {
                            $post_id = $row['post_id'];
                            $post_author = $row['post_author'];
                            $post_title = $row['post_title'];
                            $post_category = $row['post_category_id'];
                            $post_status = $row['post_status'];    
                            $post_tags = $row['post_tags'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_comment = $row['post_comment_count'];
                            $post_views = $row['post_view_count'];

                            echo "<tr>";

                            ?>

                                    <td><input class='checkBoxes' type='checkbox' id='selectAllBoxes' name='checkBoxArray[]' value="<?php echo $post_id; ?>"></td>
                            <?php 
                                  echo  "<td>".$post_id."</td>
                                    <td>".$post_author."</td>
                                    <td><a href='../blog-post.php?post_id=".$post_id."'> ".$post_title."</a></td>";

                            $query = "SELECT * FROM categories WHERE cat_id = $post_category";

                            $select_part_categories_query = mysqli_query($connection,$query);

                            while ($row = mysqli_fetch_assoc($select_part_categories_query)) {
                                    $cat_title = $row['cat_title'];
                                    $cat_id = $row['cat_id']; }

                            echo "<td>".$cat_title."</td>
                                    <td>".$post_status."</td>
                                    <td><img src='../img/".$post_image."' width='100'/></td>
                                    <td>".$post_tags."</td>
                                    <td><a href='comments.php?comment_source=particular_post&p_id=".$post_id."'>".$post_comment."</a></td>
                                    <td>".$post_views."</td>
                                    <td>".$post_date."</td>
                                    <td><a onClick=\" javascript: return confirm('are you sure you want to delete') \" href='posts.php?delete=".$post_id."'>delete</a></td>
                                    <td><a href='posts.php?source=edit_post&p_id=".$post_id."'>Edit</a></td>
                            </tr>";        
                              

                            }
                            

                            // $data = '[{
                            //           "name":" tolulope",
                            //             "superhero":"Mother"
                            //         },
                            //            {
                            //             "name":"Odunayo",
                            //             "superhero":"Tiwalade"    
                            //             }                 
                            //         ]';
                            // $characters = json_decode($data);
                            // foreach ($characters as $character) {
                            //     echo $character->superhero;
                            // }


                                    ?>
                            </tbody>
                        </table> 
</form>
                        <?php 

                        if (isset($_GET['delete'])) {
                            
                            $the_post_id = $_GET['delete'];  
                            $query = "DELETE FROM posts WHERE post_id = $the_post_id";
                            $delete_query = mysqli_query($connection,$query);

                            header("Location:./index.php ");
                        }

                        ?>
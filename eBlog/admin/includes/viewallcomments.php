 <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            All Comment
                        </h1>
                 </div>

                 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>In response to</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Date Published</th>
                                    <th>Delete Post</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                             
                                    <?php
                    $query = "SELECT * FROM comments  ORDER BY comment_id DESC";
                    $select_comments = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($select_comments)) {
                            $comment_id = $row['comment_id'];
                            $comment_author = $row['comment_author'];
                            $comment_content = $row['comment_content'];
                            $comment_email = $row['comment_email'];
                            $comment_status = $row['comment_status'];    
                            $comment_post_id = $row['comment_post_id'];
                            $comment_date = $row['comment_date']; 

                            echo "<tr> 

                                    <td>".$comment_id."</td>
                                    <td>".$comment_author."</td>
                                    <td>".$comment_content."</td>";

                           
                                  
                        echo "<td>".$comment_email."</td>
                              <td>".$comment_status."</td>";


                            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";

                            $select_part_categories_query = mysqli_query($connection,$query);

                            while ($row = mysqli_fetch_assoc($select_part_categories_query)) {
                                    $post_title = $row['post_title'];
                                    $post_id = $row['post_id']; 
                                    echo      "<td><a href='../post.php?p.id=".$post_id."'>".$post_title."</a></td>";
                                }

                         
                                   echo "<td><a href='comments.php?approve=".$comment_id."'>approve</a></td>
                                    <td><a href='comments.php?unapprove=".$comment_id."'>unapprove</a></td> 
                                    <td>".$comment_date."</td>
                                    <td><a href='comments.php?delete=".$comment_id."'>delete</a></td>     
                            
                            </tr>";        
                              

                            }
                            

                                    ?>
                            </tbody>
                        </table> 

                        <?php 

                         if (isset($_GET['approve'])) {
                            
                            $the_comment_id = $_GET['approve'];  
                            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
                            $approve_post_query = mysqli_query($connection,$query);
                            header("Location: comments.php");


                        }

                        if (isset($_GET['unapprove'])) {
                            
                            $the_comment_id = $_GET['unapprove'];  
                            $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id";
                            $unapprove_post_query = mysqli_query($connection,$query);
                            header("Location: comments.php");


                        }

                        if (isset($_GET['delete'])) {
                            
                            $the_comment_id = $_GET['delete'];  
                            $query = "DELETE FROM comments WHERE comment_id = $the_comment_id";
                            $delete_query = mysqli_query($connection,$query);


                        }

                        ?>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>







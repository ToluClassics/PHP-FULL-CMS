<?php include "includes/admin_header.php"; ?>


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
                </div>
                <!-- /.row -->


                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <?php

                    $query = "SELECT * FROM posts";
                    $select_posts_query = mysqli_query($connection, $query);

                    $no_of_posts = mysqli_num_rows($select_posts_query);


                  ?>


                  <div class='huge'><?php echo $no_of_posts; ?></div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                <?php

                    $query = "SELECT * FROM comments";
                    $select_comments_query = mysqli_query($connection, $query);

                    $no_of_comments = mysqli_num_rows($select_comments_query);


                  ?>
                     <div class='huge'><?php echo $no_of_comments; ?></div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                <?php

                    $query = "SELECT * FROM users";
                    $select_users_query = mysqli_query($connection, $query);

                    $no_of_users = mysqli_num_rows($select_users_query);


                  ?>
                    <div class='huge'><?php echo $no_of_users; ?></div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php

                    $query = "SELECT * FROM categories";
                    $select_categories_query = mysqli_query($connection, $query);

                    $no_of_categories = mysqli_num_rows($select_categories_query);


                         ?>
                        <div class='huge'><?php echo $no_of_categories; ?></div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

                <?php

                    $query = "SELECT * FROM posts WHERE post_status = 'draft'";
                    $select_draft_posts_query = mysqli_query($connection, $query);

                    $no_of_draft_posts = mysqli_num_rows($select_draft_posts_query);



                    $query_1 = "SELECT * FROM comments WHERE comment_status = 'unapproved'";
                    $select_unapproved_comments_query = mysqli_query($connection, $query_1);

                    $no_of_unapproved_comments = mysqli_num_rows($select_unapproved_comments_query);

                    $query_2 = "SELECT * FROM users WHERE user_role = 'subscriber'";
                    $select_subscribers_query = mysqli_query($connection, $query_2);

                    $no_of_subscribers = mysqli_num_rows($select_subscribers_query);

                    $query_3 = "SELECT * FROM posts WHERE post_status = 'published'";
                    $select_active_posts_query = mysqli_query($connection, $query_3);

                    $no_of_active_posts = mysqli_num_rows($select_active_posts_query);


                  ?>


                <div class="row">
                      <script type="text/javascript">
                          google.charts.load('current', {'packages':['bar']});
                          google.charts.setOnLoadCallback(drawChart);

                          function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                              ['Data', 'Count'],
                                <?php
                                $element_text = ['active Posts', 'active posts', 'draft posts', 'comments', 'Unapproved Comments', 'users', 'subscribers', 'Categories'];

                                $element_count = [$no_of_posts,$no_of_active_posts, $no_of_draft_posts, $no_of_comments, $no_of_unapproved_comments, $no_of_users, $no_of_subscribers, $no_of_categories];

                                for ($i=0; $i < sizeof($element_text) ; $i++) { 
                                    
                                    echo " ['$element_text[$i] '" . "," ." $element_count[$i]],";       

                                }
                                ?>

                             
                            ]);

                            var options = {
                              chart: {
                                title: '',
                                subtitle: '',
                              }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                          }
                        </script>
                    <div id="columnchart_material" style="width: auto; height: 500px;"></div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php" ?>
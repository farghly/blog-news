
<div id="page-wrapper">
            <div class="container-fluid">
               <?php SessionDisplay('success','update_data');
                SessionDisplay('success','message_success');
                ?>
                <!-- Page Heading -->
                <div class="row">
                 <div class="col-lg-12">
                        <h1 class="page-header">
                            welcome to <?php echo $_SESSION['author_role'];?> <small><?php echo $author_info['author_fname'];?></small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $posts_count=Row_Count('posts'); ?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="view_posts.php">
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
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $comments_count=Row_Count('comment'); ?></div>
                                        <div>
                                            comments
                                        </div>
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
                  <?php if($_SESSION['author_role']=="admin"):?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $authors_count=Row_Count('authors'); ?></div>
                                        <div>users</div>
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
                                        <div class="huge"><?php echo $categories_count=Row_Count('categories'); ?></div>
                                        <div>categories</div>
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
				  $active_category = Row_CountLimit('categories','category_status','1');
				  $active_authors  = Row_CountLimit('authors','author_status','1');
			     ?>
					<!--========================== start of script chart =========================-->
					<div class="row">
                   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
                      
                        // Load the Visualization API and the corechart package.
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Year', 'count'],
                     <?php

                    $element_text =['posts','comments','users','categories','active category','active authors'];	
                    $element_count =[$posts_count,$comments_count,$authors_count,$categories_count,$active_category,$active_authors];

                    for($i=0;$i<=5;$i++){
                       echo "['{$element_text[$i]}'".","."{$element_count[$i]}],";
                    }
                    ?>
   // ['posts',1000]
        ]);
        var options = {
          chart: {
            title: '',
            subtitle: '',
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
        chart.draw(data, options);
      }
    }
           </script>
       <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
</div><!--end of class row -->
<?php endif; ?>
				 <!--========================== end of script chart =========================-->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include("includes/footer.php");?>
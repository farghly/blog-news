
<div id='wrapper'>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php" target="_blank"><img src="img/future_logo2.png" alt="logo here" height="35" width="120" style="margin-top:-5px;"/></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong> Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="messages.php">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                   <?php
                    $author_info = SelectTableCondition('authors','author_id',$_SESSION['author_id']);
                    ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $author_info['author_fname'].' '.$author_info['author_lname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="users.php?source=view_profile&view_profile=<?php echo $_SESSION['author_id'];?>"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                        <a href="users.php?source=edit_profile&edit_profile=<?php echo $_SESSION['author_id'];?>"><i class="fa fa-fw fa-user"></i>Edit profile</a>
                            </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../admin/includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
	
	
	
	
	
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse" >
                <ul class="nav navbar-nav side-nav">
					<div class="media">
					<a class="pull-left" href="#">
                      <?php /*$getinfo =          SelectTableCondition('authors','author_id',$_SESSION['author_id']);*/
                      $author_image =$author_info['author_image'];
                      
                      ?>
                    <?php if($author_image==""){?>
                    <img class="media-object img-circle" src="img/mmdoh1.jpg" width="76" height="76" style="margin-left:auto; margin-right:auto; display:block">
                    <?php }else{
        
                    ?>
					<img class="media-object img-circle" src="img/profile/<?php echo $author_image;?>" width="76" height="76" style="margin-left:auto; margin-right:auto; display:block">	
				<?php } ?>
					</a>
					<div class="media-body" style="color:white">
					<div class="welcome" style="margin-top:8px;">
					welcomeback
					</div>
					<h4 class="media-heading" style="margin-top:5px;">
					<?php echo $author_info['author_fname'];?>
					</h4>
				
                        <a data-toggle="modal" href="#change_photo" class="btn btn-success" ><span class="fa fa-photo" style="font-size:9px;"></span> changePhoto</a>
                        <!--<div class="btn btn-success"><span class="fa fa-photo" style="font-size:14px;"> change photo</span></div>-->
                        <!--<div class="btn btn-success">Edit</div>-->
<!--					<a class="md-trigger" href="../admin/includes/logout.php"><div class="btn btn-danger"><i class="fa fa-fw fa-power-off"></i></div></a>-->
					</div>
					
					</div>
                    <li >
						
                        <a href="index.php"><i class="fa fa-home fa-2x"></i> Dashboard</a>
                    </li>

                    
                            
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#drop"><i class="fa fa-files-o fa-fw"></i><strong> Posts </strong><i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="drop" class="collapse">
                            <li>
                                <a href="view_posts.php"><i class="fa fa-desktop">&nbsp; view all posts </i></a>
                            </li>
                            <li >
                                <a href="view_posts.php?source=add_post"><i class="fa fa-plus">&nbsp; create new post</i></a>
                            </li>
                        </ul>
                    </li>  
					
                    
                    <!--========== categories =====================-->
                    <?php if($_SESSION['author_role']=="admin"):?>
					<li>
                        <a href="categories.php"><i class="fa fa-bars"></i><strong>&nbsp; categories</strong> </a>
                    </li>
					<?php endif; ?>
					<li>
                        <a href="comments.php"><i class="fa fa-commenting"></i><strong> comments</strong> </a>
                    </li>
					
					
					
					<!--==================================-->
					<?php if($_SESSION['author_role']=="admin"):?>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#message"><i class="fa fa-envelope fa-fw"></i><strong>&nbsp; messages </strong><i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="message" class="collapse">
                            <li>
                                <a href="inbox.php"><i class="fa fa-inbox">&nbsp; inbox</i></a>
                            </li>
                            <li>
                                <a href="send.php"><i class="fa fa-sign-out">&nbsp;sent</i></a>
                            </li>
                        </ul>
                    </li>  
					<?php endif; ?>
					
					<!--=========================================-->
					<?php if($_SESSION['author_role']=="admin"):?>
					<li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-users"></i><strong> users </strong><i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="users" class="collapse">
                            <li>
                                <a href="users.php?source=view_all_users"><i class="fa fa-users">&nbsp; view all users </i></a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user"><i class="fa fa-user-plus">&nbsp; add user</i></a>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

    
    <div class="modal fade in" id="change_photo">
        <div class="modal-dialog">
            <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                 <span aria-hidden="true">&times;</span><span class="sr-only">
                    close
                    </span>
                 
                 </button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-photo"></i>
                update picture
                 </h4>
                </div><!--modal header-->
                <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    
                    <h5><input type="file" name="add_image" value="choose image"></h5>
                    
                </div>
                <div class="modal-footer">
                <button type="submit" name="update_profile" class="btn btn-success">update image</button>
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                </div>
            </form>
            </div>
        
        </div>
    
    </div>
   <?php// echo date('d-m-Y-H:m:s'); ?>
<?php
    if($author_image !=""){
     $_SESSION['delete_image'] = 'img/profile/'.$author_image;   
    }
    $user_id = $_SESSION['author_id']; 
    if(isset($_POST['update_profile'])){
    $user_image      = date('d-m-Y H').$_FILES['add_image']['name'];
    $user_image_temp = $_FILES['add_image']['tmp_name'];
    move_uploaded_file($user_image_temp,"img/profile/$user_image");
       /*if(empty($user_image)){
           SessionMessage('profile_error','you don\'t any image to update profile');
           PageLocation('index');
           exit();
        }*/
        
        $profile_update = UpdateTable('authors','author_image',$user_image,'author_id',$user_id);
        if($profile_update){
        unlink($_SESSION['delete_image']);
        unset($_SESSION['delete_image']);
        SessionMessage('update_data','your profile updated succfully');
        pageLocation('index');
        exit(); 
        }
       
    }
				
		  ?>
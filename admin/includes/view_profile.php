
<?php
   
	if(isset($_GET['view_profile'])){
    if($_SESSION['author_role']=='admin'){
    $author_info = SelectTableCondition('authors','author_id',$_GET['view_profile']);
    }else{
       $author_info = SelectTableCondition('authors','author_id',$_SESSION['author_id']); 
    }
     /*$query     = "SELECT *FROM users WHERE user_id='$the_user_id'";
        $run_query = mysqli_query($connect,$query);
        while($row = mysqli_fetch_assoc($run_query))
            {	
               $user_id          = $row['user_id'];
                $user_name       = $row['user_name'];
                $user_firstname  = $row['user_firstname'];
                $user_lastname   = $row['user_lastname'];
                $user_Date       = $row['user_date'];
                $user_email      = $row['user_email'];
                $user_gender     = $row['user_gender'];
                $user_role       = $row['user_role'];
                $user_image      = $row['user_image'];
		 */
	       
?>
<!--=============== view profile =======================-->
 <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
          <div class="panel panel-info">
           
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $author_info['author_fname']." ".$author_info['author_lname'];?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                
                <?php 
                 $user_image = $author_info['author_image'];
                 if($user_image== ""){ ?>
                  <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Picture" src="img/mmdoh1.jpg" class="img-circle img-responsive"> </div>
                <?php }else{?>
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Picture" src="img/profile/<?php echo $user_image;?>" class="img-circle img-responsive"> </div>
                <?php } ?>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                        
                    
                      <tr>
                        <td>FirstName:</td>
                        <td><?php echo $author_info['author_fname']; ?></td>
                      </tr>
                        <tr>
                        <td>Last Name</td>
                        <td><?php echo $author_info['author_lname']; ?></td>
                      </tr>
                        <tr>
                        <td>Hire date:</td>
                        <td><?php echo $author_info['author_registerDate']; ?></td>
                      </tr>
                        <tr>
                        <td>User Role</td>
                        <td><?php echo $author_info['author_role']; ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><?php echo $author_info['author_email']; ?></td>
                      </tr>
                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a type="button" class="btn btn-primary"><i class="fa fa-envelope"></i></a>
                        <span class="pull-right">
                        
                            <a href="users.php?source=edit_profile&edit_profile=<?php echo $author_info['author_id'];?>" class="btn btn-warning" type="button"><i class="fa fa-pencil fa-2"></i> Edit profile</a>
                            <?php if($_SESSION['author_role']=="admin"):?>
                            <a href="users.php?source=view_all_users" class="btn btn-md btn-success" type="button"><i class="fa fa-desktop"></i> view users</a>
                            <?php endif; ?>
                        </span>
                    </div>
            
            
          </div>
        </div>
      </div>     
        







<!--================== end of view profile=============-->

    
       <?php }?>
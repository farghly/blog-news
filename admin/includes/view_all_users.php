
<div id="page-wrapper">
    <div class="container-fluid">
    <?php if($_SESSION['author_role']=="admin"){?>
			<div class="col-lg-12">
                 <?php 
                 SessionDisplay('success','message_update');
                 SessionDisplay('danger','message_danger');
                    ?>
                        <h2>Users</h2>
                       <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="10px">Id</th>
                                        <th >first Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>view profile</th>
                                        <th>User status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                
                                 
                                <tbody>
                                   <?php
                                   // $i = 1;
                                    $author_info = selectTable('authors');
                                    foreach($author_info as $row):
                                ?>
                                    <tr>
                                        <td><?php counter(); ?></td>
                                        <td><?php echo $row['author_fname']; ?></td>
                                        <td><?php echo $row['author_lname']; ?></td>
                                        <td><?php echo $row['author_email']; ?></td>
                                        <td><a href="users.php?source=view_profile&view_profile=<?php echo $row['author_id'];?>" class='btn btn-success'><i class='fa fa-desktop fa-2'></i> view profile</a></td>
                                        
                                       <?php
                                       $author_status = $row['author_status'];
									 if($author_status=="1"){
                                       edit_delete_link('users.php?source=view_all_users&active',$row['author_id'],
                                        'success','','check','active');
                                      }else{
                                        edit_delete_link('users.php?source=view_all_users&disable',$row['author_id'],'danger',
                                        '','lock','disabled');
                                      }
                                       ?>
                                       
                                       
                                       <?php
                                       edit_delete_link('users.php?source=edit_profile&edit_profile',$row['author_id'],'warning','','pencil fa-2','Edit');
                                       
                                        edit_delete_link('users.php?source=view_all_users&delete_user',$row['author_id'],'danger','','trash-o fa-2','Delete');?>
                                     
                                      
                                    </tr>
                                   <?php endforeach; ?>
                                </tbody>
                               
                            </table>
                            
                        </div>
                    </div>
        <?php }else{?>
        <h1>you don't have privilage to access to this page</h1>
        <?php } ?>
	</div>
</div>
<?php
if(isset($_GET['delete_user'])){
   //$cat_delete_id = $_GET['delete_cat'];
        deleteRow('authors','author_id',$_GET['delete_user']);
        SessionMessage('message_danger','Author deleted successfully');
        pageLocationSpecial('users.php?source=view_all_users');

}


if(isset($_GET['active'])){
    updateTable("authors",'author_status','0','author_id',$_GET['active']);
    SessionMessage('message_danger','Author disabled successfully');
    pageLocationSpecial('users.php?source=view_all_users');
    exit();
}

// publish post updated to draft post
if(isset($_GET['disable'])){
    updateTable("authors",'author_status','1','author_id',$_GET['disable']);
    SessionMessage('message_update','Author active successfully');
    pageLocationSpecial('users.php?source=view_all_users');
    exit();
}
?>
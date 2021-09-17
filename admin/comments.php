<?php 
include('config.file.php');
?>
<div id="page-wrapper">
    <div class="container-fluid">
    <?php 
        SessionDisplay('success','comment_approve');
        SessionDisplay('danger','comment_unapprove');
        SessionDisplay('danger','comment_delete');
        
        ?>
			<div class="col-lg-12">
                <?php 
                  $comment_info = rowCount('comment');
                    if($comment_info > 0){
                ?>
                        <h2>comments</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="10px">Id</th>
                                        <th >comment author</th>
                                       <!-- <th>Author</th>-->
                                        <th>Email</th>
                                        <th>content</th>
										<th width="20px">status</th>
                                        <th>Date</th>
                                        <?php if($_SESSION['author_role'] =="admin"):?>
                                        <th>Delete</th>
                                        <?php endif;?>
                                    </tr>
                                </thead>
                          
                                 
                                <tbody>
                                 <?php
                                    $i = 1;
                                    $comment_info = selectTable('comment');
                                    foreach($comment_info as $row):
                                ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['comment_author'] ?></td>
                                        
                                        <td><?php echo $row['comment_email']; ?></td>
                                        <td><?php echo $row['comment_content']; ?></td>
                                        
                                        <?php 
                                        $status = $row['comment_status'];
                                        if($status=="1"){
                                        edit_delete_link('comments.php?unapprove',$row['comment_id'],'success','','check','approved');
                                        }else{
                                        edit_delete_link('comments.php?approve',$row['comment_id'],'danger','','lock','draft');
                                        }
                                     ?>
                                     
                                        <td><?php echo $row['comment_date'];?></td>
                                       
                                        <?php
                                      if($_SESSION['author_role'] =="admin"):
                                        edit_delete_link('comments.php?comment_delete',$row['comment_id'],'danger','','trash-o fa-2','Delete');
                                        endif;?>
                                        
										
                                    </tr>
                                   <?php endforeach;?>
                                </tbody>
                                
                                <?php }else{
                                    echo "<div class='posts'>
                                    <h1 class='lead comments'><i class='fa fa-comments fa-2x'></i> No Comments</h1>
                                    </div>";
                                }?>
                            </table>
                            
                        </div>
                    </div>
        
    
           
	</div>
</div>
<?php include("includes/footer.php"); ?>
<?php 
if(isset($_GET['comment_delete'])){
    DeleteRow('comment','comment_id',$_GET['comment_delete']);
    SessionMessage('comment_delete','comment deleted successfully');
    /*$the_comment_id = $_GET['comment_delete'];
    $query          ="DELETE FROM comments where comment_id=$the_comment_id";
    $delete_query   = mysqli_query($connect,$query);*/
    PageLocation('comments');
}
?>
 <?php 
if(isset($_GET['unapprove'])){

UpdateTable('comment','comment_status','0','comment_id',$_GET['unapprove']);
SessionMessage('comment_unapprove','comment unapproved successfully');
/*$unapprove_comment ="UPDATE comments SET comment_status='unapproved' WHERE comment_id='$unapprove_id'";
$run_approve_comment = mysqli_query($connect , $unapprove_comment);*/
PageLocation('comments');
}
if(isset($_GET['approve'])){
UpdateTable('comment','comment_status','1','comment_id',$_GET['approve']);
SessionMessage('comment_approve','comment approved successfully');
PageLocation('comments');
}
?>

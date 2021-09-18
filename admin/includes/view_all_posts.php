<?php 
//include("functions.php") ;?>
    <?php
    if(isset($_POST['checkBoxArray'])){
        foreach($_POST['checkBoxArray'] as $postValueId){
         $bulk_options = $_POST['bulk_options'];
        switch($bulk_options){
            case 'published':
                UpdateTable('posts','post_status','published','post_id',$postValueId);  
                SessionMessage('message_success','post published successfully');
                break;
                
                case 'draft':
                UpdateTable('posts','post_status','draft','post_id',$postValueId);
                SessionMessage('message_danger','post draft successfully');
                break;
                
                case 'delete':
                DeleteRow("posts",'post_id',$postValueId); 
                SessionMessage('message_danger','post delete successfully');
                break;
        }
        }
        
    }
    ?>
    
<?php SessionDisplay('success','message_success');
      SessionDisplay('danger','message_danger');
?> 
    <?php 
           $posts_count = rowCount('posts');
            if($posts_count > 0){
                ?>
	<!--<div class="btn btn-success success"><h3>Posts</h3></div>-->
    

                             
<div class="table-responsive">
    <form action="" method="post">  
	  <table class="table table-bordered table-hover">
          <div id="bulkOptionContainer" class="col-md-3">
        <div class="row">
        <div class="col-md-4">
              
         </div>
        </div>
              
            <label for="">Select Operation</label>
            <select class="form-control" name="bulk_options" id="">
                <option value="">Select option</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <?php if($_SESSION['author_role']=="admin"):?>
                <option value="delete">Delete</option>
                <?php endif;?>
                <!--<option value="copy">copy</option>-->
           </select>
          </div>
          <div class="col-xs-4 block">
         <input type="submit" class="btn btn-success" value="Apply" style="margin-top:21px;">
          <a class="btn btn-primary" href="view_posts.php?source=add_post"style="margin-top:21px;" >Add new</a>
        </div>
          <div class="clearfix"></div>
          <h2>products</h2>
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" id="selectAllBoxes"></th>
                                        <th>Id</th>
										<th>post title</th>
                                        
                                        <!--<th>post tags</th>-->
                                        <th> post category </th>
                                        <th>image</th>
                                        <th> post status </th>
                                        
										<!--<th>tags</th>
<i class="fa fa-calendar-o"></i>  __ <i class="fa fa-comments"></i>
                        -->
										<th></th>
										<?php if($_SESSION['author_role']=="admin"):?>
										<th></th>
										<?php endif; ?>
										<th colspan="2" width="30px"><i class="fa fa-eye fa-3x"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                   //echo "Hello from here";
                                    $get_info = joinTable('posts','categories','category_id','post_id');
                                    foreach($get_info as $row):?>
                                    
                                    <tr>
                                       <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $row['post_id']; ?>"></td>
                                        <td><?php counter(); ?></td>
                                        <td>
                                        <a href="" class="post-title">
                                        <?= first_words($row['post_title'], 5); ?>
                                        </a>
                                        </td>
                                        <!--<td><?= $row['post_tags']; ?></td>-->
                                        <td><?= $row['category_name']; ?></td>
                                        <td><img src="img/products/<?= $row['post_image'];?>" alt="No image" height="50" width="50"/></td>
                                      
                                        
									
                                 
                                    <?php
                                    $post_status = $row['post_status'];
									 if($post_status=="published"){
                                       edit_delete_link('view_posts.php?published',$row['post_id'],
                                        'success','','check',$row['post_status']);
                                     }else{
                                        edit_delete_link('view_posts.php?draft',$row['post_id'],'danger',
                                        '','lock',$row['post_status']);
                                     }
                                       ?>
                                     
									
                                   
                                    <?php
									edit_delete_link('view_posts.php?source=edit_post&p_id',$row['post_id'],
                                    'warning','','pencil-square-o','Edit');
                                    ?>
									
									
									<?php if($_SESSION['author_role']=="admin"):?>
									<td><a rel="<?= $row['post_id']; ?>" href="javascript:void(0)" class="delete_link" ><div class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</div></a> </td>
                                   <?php endif;?>
                                    	<td><div class="btn btn-success"><i class="fa fa-eye "></i> View details</div></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
          <?php }else{
                    echo "<h1 class='lead comments'><i class='fa fa-files-o fa-2x'></i> No posts <span class='btn btn-success' ><a href='view_posts.php?source=add_post'>Add new</a></span><h1>";
                     
                    }?>
                            </table>
        </form> 
    <div class="pager">
        <ul>
           
        </ul>
    </div>
 <?php
    $per_page = 2;
        if(isset($_GET['page'])){
                 $page = $_GET['page'];   
                }else{
                    $page ='';
                    
                }
                if($page == "" || $page == 1){
                    $page_1 = 0;
                }else{
                    $page_1 = ($page*2)-$per_page;
                }
                 $count   = ceil($posts_count/$per_page); 
    ?>
      <div class="page-nation pull-right">
                                        <ul class="pagination pagination-large">
                                        <!--<li class="disabled"><span>«</span></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">6</a></li>
                                        <li class="disabled"><span>...</span></li><li>
                                        <li><a href="#">20</a></li>
                                        <li><a href="#">21</a></li>
                                        <li><a href="#">22</a></li>
                                        <li><a rel="next" href="#">Next</a></li>-->
                <?php
                /*for($i=1;$i<=3;$i++){
                  if($i == $page){
                  echo "<li><a class='active' href='view_posts.php?page={$i}' >$i</a></li>";
                  }else
                  {
                   echo "<li><a href='view_posts.php?page={$i}'>$i</a></li>";
                  }
              }
                if($i >3){
                   echo "<li class='disabled'><span>...</span></li><li>";
                }
                  for($i=$count - 2;$i<=$count;$i++){
                 if($i == $page){
                   echo "<li><a class='active_link' href='index.php?page={$i}' >$i</a></li>";
                  }else{
                   echo "<li><a href='index.php?page={$i}' >$i</a></li>";
                  }
              }  */?>
                                     </ul>
                            </div>
      						
      </div>



<?php 
if(isset($_GET['delete'])){
    DeleteRow('posts','post_id',$_GET['delete']);
    SessionMessage('message_danger','post deleted successfully');
    PageLocation("view_posts");
    exit();
}
// draft update to publish
if(isset($_GET['draft'])){
    UpdateTable("posts",'post_status','published','post_id',$_GET['draft']);
    SessionMessage('message_success','post published successfully');
    pageLocation("view_posts");
}

// publish post updated to draft post
if(isset($_GET['published'])){
    UpdateTable("posts",'post_status','draft','post_id',$_GET['published']);
    SessionMessage('message_danger','post draft successfully');
    pageLocation("view_posts");
} 
//delete post
require_once 'delete_modal.php';
?>

<?php 
	if(isset($_GET['p_id'])){
		 $the_post_id = $_GET['p_id'];
         $post_info = selectTableCondition('posts','post_id',$the_post_id);
	     ?>
<form action="" method="post" enctype="multipart/form-data" id="edit-form">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="title">post Title</label>
                <input type="text" class="form-control" name="post_title" value="<?php echo $post_info['post_title']; ?>" >
            </div>
        </div>
        
    
    <div class="col-md-6">
        <div class="form-group">
           <label for="categories">categories</label>
          <select name="post_cat_id" id='' class="form-control"> 
            <?php
            $get_info = selectTable('categories');
            foreach($get_info as $row):?>
              <option value="<?php echo $row['category_id'];?>" name='cat'><?php echo $row['category_name'];?></option>
            <?php endforeach;?>
                </select> 
            </div>
	</div>
   <div class="col-md-6">
     <div class="form-group">
		<label>status</label>
		<select name="post_status" id="" class="form-control">
			<option value="<?php echo $post_info['post_status']; ?>"><?php echo $post_info['post_status']; ?></option>
			<?php
            $post_status = $post_info['post_status'];
		    if($post_status =="published"){
				echo "<option value='draft'>draft</option>";
			}else{
				echo "<option value='published'>published</option>";
			}
				?>
		</select>
	</div>
 </div> 
       
</div>
   
	<div class="form-group">
      
       <input type="file" class="form-group" name="add_image"  style="margin-top:20px;" >
        <?php 
        $post_img = $post_info['post_image'];
        if($post_img ==''){
            echo 'No image';
        }else{?>
        <img src="img/products/<?php echo $post_img?>" width="50" height="50" >
        <?php }  ?>
       
	</div>
	<div class="form-group">
		<label for="post_tags">product tags</label>
		<input type="text" class="form-control" name="post_tags" value="<?php echo $post_info['post_tags'];?>" data-role="tagsinput">
	</div>
	<div class="form-group">
		<label for="title">post content</label>
		<textarea class="form-control" name="post_content" id="content-box" cols="30" rows="10" ><?php echo $post_info['post_content'];?> </textarea>
	</div>
	
<?php } ?>
	
    
	 
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="update_post" value="update post" >
	</div>

</form>


<?php
           
                      if(isset($_POST['update_post'])){
					       $post_title        = $_POST['post_title'];
				            $post_category     = $_POST['post_cat_id'];
							$post_image        = $_FILES['add_image']['name'];
							$post_image_temp   = $_FILES['add_image']['tmp_name'];
							$post_content      = $_POST['post_content'];
							$post_tags         = $_POST['post_tags'];
							$post_date         = date('d-m-y');
							$post_status       = $_POST['post_status'];
   	                         move_uploaded_file($post_image_temp,"img/products/$post_image");
						    if(empty($post_image)){
                            $post_image = $post_info['post_image'];
                            }
                          
							 $query_update  =$connect->query("UPDATE posts SET post_title='{$post_title}',author_id='{$_SESSION['author_id']}',category_id ='{$post_category}',post_tags='{$post_tags}' ,post_content='{$post_content}',post_status='{$post_status}',post_image='{$post_image}' WHERE post_id='{$the_post_id}'");
                            $run_query = $query_update->execute();
                            if($run_query){
                            SessionMessage('message_success','post updated successfully');
                            PageLocation('view_posts');
                            }
					
						  
						}		
	 ?>
<?php 
 if(isset($_POST['add_post'])){
     
            $post_title           = $_POST['post_title'];
            $post_category_id  = $_POST['post_cat_id'];
            //$product_date         =date('d-m-y');
            $post_image        = $_FILES['add_image']['name'];
	        $post_image_temp   = $_FILES['add_image']['tmp_name'];
            $post_tags         = $_POST['post_tags'];
            $post_status       = $_POST['post_status'];
            $post_content      =$_POST['post_content'];
     
     
   move_uploaded_file($post_image_temp,"img/products/$post_image");
    $array_fields=array('author_id','category_id','post_title','post_content','post_tags','post_image','post_status');
    $columns = "`".implode('`,', array_values($array_fields))."`";
     // ,'post_image','post_status'
     //,'{$post_image}','{$post_status}'
	$query_exec = $connect ->prepare("INSERT INTO posts (author_id,category_id,post_title,post_content,post_tags,post_image,post_status)Values('{$_SESSION['author_id']}','{$post_category_id}','{$post_title}','{$post_content}','{$post_tags}','{$post_image}','{$post_status}')");
     $InsertData =$query_exec->execute();
	if($InsertData){
        SessionMessage('message_success','post created sucussfully');
		PageLocation("view_posts");
        exit();
	}
	
}
?>
<form action="" method="post" enctype="multipart/form-data" id="edit-form">
	
    
    <div class="row">
     <div class="col-md-12">
            <div class="form-group">
            <label for="title">Post title</label>
            <input type="text" class="form-control" name="post_title" id="title" >
         </div>
    </div>
       
        
       
        
        <div class="col-md-6">
	      <div class="form-group">
          <label for="categories">categories</label>
	    <select name="post_cat_id" id='categories' class="form-control" > 
		<?php
		$cat_info    = SelectTable('categories');
		foreach($cat_info as $row){
			$cat_id = $row['category_id'];
			$cat_name =$row['category_name'];
			echo "<option value='$cat_id' name='product_cat_id'>{$cat_name}</option>";
		}
		
		?>
			</select> 
		</div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
                 <label for="status">status: </label>
                <select name="post_status" id="status" class="form-control">
                     <option value="draft">select option</option>
                     <option value="published">publish</option>
                     <option value="draft">draft</option>
                </select>
            </div>
        </div>
    </div>
    
	<div class="form-group">
		<input type="file" class="form-group" name="add_image">
	</div>
	<div class="form-group">
		<label for="post_tag">post tags</label>
		<input type="text" class="form-control" name="post_tags" data-role="tagsinput" id="tag">
	</div>
	
	<div class="form-group">
		<label for="title">post content</label>
		<textarea class="form-control" name="post_content" id="content-box"  cols="30" rows="10"></textarea>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="add_post" value="add post" />
	</div>
</form>




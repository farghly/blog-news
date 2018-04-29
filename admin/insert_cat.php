
<div id="page-wrapper">
    <div class="container-fluid">
	  <div class="col-lg-6">
	   <h1 class="page-header">	
		   insert new category
		    <small>Author</small>
		   </h1>  
		  <form action="insert_cat.php" method="post">
			 <div class="form-group">
				<input type="text" name="new_cat" class="form-control insert" />
			 </div>
		    <div class="form-group">
			 <input type="submit" name="insert_cat" value="Add cate" class="btn btn-success"/>
			</div>
        </form>	  
		  
	 </div>
		<div class="col-lg-6">
				   <?php

     if(isset($_POST['insert_cat'])){
	 $cat_title = $_POST['new_cat'];
	 if( $cat_title == ' '||empty($cat_title)){
		echo "<div class='alert alert-danger'>you should not be empty and the least character must be 2</div>";
	}
	else{
    // insertcat($tablename,$columns,$values)
    $insert_cat = insertcat('categories','category_name',$cat_title);
	echo "<div class='alert alert-success'><h3>your data insert successfully</h3></div>";
	}
	}

 
?>
		</div>

  </div>
</div>

<?php include("includes/footer.php")?>

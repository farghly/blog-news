<form action="" method="post">
		  <label>Edit category</label>
		  	<?php
				if(isset($_GET['edit_cat'])){
				$cat_id     = $_GET['edit_cat'];
                $cat_info   = selectTableCondition('categories','category_id',$cat_id);
                ?>   
	    <div class="input-group">
		  <input value="<?= $cat_info['category_name']; ?>" type="text" class="form-control edit" name="cat_update">			  
<?php } ?>
		  <?php
                /*
                    * updateTable is a funcction take five arguments
                        * Table name
                        * field name that we will update
                        * new name that you will write in the field
                        * id field PK 
                        * id of category that coming from URL
                */
		  		if(isset($_POST['update'])){
				   $cat_update  = $_POST['cat_update'];
                   updateTable('categories','category_name',$cat_update,'category_id',$cat_id);
                   SessionMessage('message_update','category has been updated succesfully');
                   pageLocation('categories');
                }
		  ?>
		    <span class="input-group-btn">
			 <input  type="submit" name="update"  value="Edit category" class="btn btn-success"/>
			</span>
		 </div>
        </form>	
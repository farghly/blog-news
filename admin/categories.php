<?php 
include("includes/config.file.php");
?>
<div id="page-wrapper">
    <div class="container-fluid">
     <?php   
        SessionDisplay('success','message_update');
        SessionDisplay('danger','message_delete');
        SessionDisplay('danger','message_danger');
        ?>
        <div class="col-lg-6">  <!-- start of col-log-6 first -->
			 <?php	
             if(isset($_POST['submit'])){
              $cat_title = $_POST['cat_title'];
              if($cat_title=="" ||strlen($cat_title)<3){
                echo "<div class='alert alert-danger'>you should not be empty and the least character must be 2</div>";
            }else{
             $run_cat = InsertData('categories','category_name',$cat_title);
             if($run_cat){
               SessionMessage('message_update','category added successfully');
                PageLocation("categories");
                }
            }
          }
		
 if($_SESSION['author_role']=="admin"){?>
	   <h1 class="page-header">	
		   insert new category by
		    <small>Admin</small>
		   </h1>  
	<!---============================ insert  category form ==========================================-->
		  <form action="categories.php" method="post">
			 <div class="input-group">
				<input type="text" name="cat_title" class="form-control insert" />
		    <span class="input-group-btn">
			 <input type="submit" name="submit" value="Add category" class="btn btn-primary"/>
			</span>
			  </div>
        </form>	  
			<hr>
			 
	<!--============================== end of insert category form =====================================-->
			 
			 
  <!--================================= start of edit category form ====================================-->
			 <div class="form-group">
	    <?php
		   if(isset($_GET['edit_cat'])){
		    $cat_id = $_GET['edit_cat'];
			include ("includes/update_category.php");
		}
		?>
	</div>
				
<!--=============================== end of category form ===========================================-->	 
			 
	</div> <!--=========================== end of col-log-6 first ===================================-->
		
		
		<!--========================  start of table  to show categories ==============================-->
		<div class="col-lg-6">

		<h2>categories</h2>
            <hr/>
                        <div class="table-responsive" >
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="10px">Id</th>
                                        <th width="400px">category title</th>
                                    </tr>
                                </thead>
                                <tbody>	
                                <tr>
                                 <?php
                                    $cat_info = selectTable('categories');
                                    foreach($cat_info as $cat):
                                 ?>
									<td><?php counter(); ?></td>
                                    <td><?= $cat['category_name']; ?></td>
                                  <?php  
                                   /*
                                        * edit_delete_link is a function take six arguments
                                        * paramter like categories.php?edit_cat
                                        * id from dataabase
                                        * btn class
                                        * name 
                                        * font awesome
                                        * text of button
                                   */ 
                                    edit_delete_link('categories.php?edit_cat',$cat['category_id'],'warning','edit_cat','pencil-square-o fa-2','Edit');
                                    edit_delete_link('categories.php?delete_cat',$cat['category_id'],'danger','delete_cat','trash-o fa-2','Delete');
                                  ?>
	                                <?php
                                    $cat_status = $cat['category_status'];
									 if($cat_status=="1"){
                                       edit_delete_link('categories.php?active',$cat['category_id'],
                                        'success','','check','active');
                                     }else{
                                        edit_delete_link('categories.php?disable',$cat['category_id'],'danger',
                                        '','lock','disabled');
                                     }
                                       ?>
                                     
                                </tr>
								<?php endforeach; ?>
                                </tbody>
                            </table>
							
                        </div>	
	<!--=====================  end of table  to show categories ========================================-->

	<?php
    
if(isset($_GET['delete_cat'])){
        $deletequery = deleteRow('categories','category_id',$_GET['delete_cat']);
        SessionMessage('message_delete','category deleted successfully');
        pageLocation('categories');
    }


if(isset($_GET['active'])){
    updateTable("categories",'category_status','0','category_id',$_GET['active']);
    SessionMessage('message_danger','category disabled successfully');
    pageLocation("categories");
    exit();
}

// publish post updated to draft post
if(isset($_GET['disable'])){
    updateTable("categories",'category_status','1','category_id',$_GET['disable']);
    SessionMessage('message_update','category published successfully');
    pageLocation("categories");
}
?>
		
  </div>
  <?php }else{?>
  <h1>you don't have privilage to access to this page</h1>
  <?php }?>
  </div>
  
</div>
<?php include("includes/footer.php");?>
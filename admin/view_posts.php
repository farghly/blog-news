<?php 
 include("includes/config.file.php")
?>
<div id="page-wrapper">
    <div class="container-fluid">
	
	      <?php
		     if(isset($_GET['source'])){
				 $source = $_GET['source'];
			 }else{
				 $source ='';
			 }
				 switch($source){
					 case 'add_post':
						 include("includes/add_post.php");
					break;
					 case 'edit_post':
						 include("includes/edit_post.php");
						 break;
					 default:
						 include("includes/view_all_posts.php");
						 break;
				 }
  ?>		

        </div>
    </div>
<?php include("includes/footer.php")?>
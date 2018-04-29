<?php 
include("includes/header.php");
include ('../includes/config.php');
include("../includes/functions.php");
include("includes/navbar.php");
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
		
						<?php
					
						//	include("includes/view_all_posts.php");
							
						?>		
                        </div>
                    </div>
		
		




<?php include("includes/footer.php")?>
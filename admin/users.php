<?php 
include('includes/config.file.php');
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
					 case 'add_user':
						 include("includes/add_user.php");
					break;
					 case 'view_profile':
						 include("includes/view_profile.php");
						 break;
                        case 'edit_profile':
						 include("includes/edit_profile.php");
						 break;
					 default:
						 include("includes/view_all_users.php");
						 break;
				 }
		
		   ?>
		
							
                        </div>
                    </div>
		
		
	</div>
</div>

<?php include("includes/footer.php")?>
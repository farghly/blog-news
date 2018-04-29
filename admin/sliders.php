<?php 
include("includes/header.php");
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
					 case 'add_slider':
						 include("includes/add_slider.php");
					break;
					 case 'edit_slider':
						 include("includes/edit_slider.php");
						 break;
					 default:
						 include("includes/view_all_sliders.php");
						 break;
				 }
		
		   ?>
		
							
                        </div>
                    </div>
		
		
	</div>
</div>

<?php include("includes/footer.php")?>
<?php
function insert_categories(){
	 global $connect;
	 /*start of Query insert new category*/
     if(isset($_POST['submit'])){
	  $cat_title = $_POST['cat_title'];
	  if($cat_title=="" ||strlen($cat_title)<3){
	 	echo "<div class='alert alert-danger'>you should not be empty and the least character must be 2</div>";
	}/*if(){
          echo "<div class='alert alert-danger'>the least character must be 3</div>";
      }*/
	else{
	$insert_cat ="INSERT INTO categories (cat_name) values('$cat_title')";
	$run_cat    = mysqli_query($connect , $insert_cat);
     if($run_cat){
       $_SESSION['message']='category added succesfully';
        header('Location:categories.php');
        }
	/*echo "<div class='alert alert-success'><h3>your data insert successfully</h3></div>";*/
	 header("location:categories.php");
	}
	}
			 /*end of  Query insert into category*/
}
?>

<?php
function delete_categories(){
	global $connect;
	if(isset($_GET['delete_cat'])){
	$cat_id = $_GET['delete_cat'];
    //object oriented version
	$delete_cat  = $connect->query("delete from categories where cat_id='$cat_id'");
	//$run_delete  = mysqli_query($connect , $delete_cat);
	if($delete_cat){
     $_SESSION['message']='category has been deleted succesfully';
     header('Location:categories.php');
    }
}
}
?>


<?php
function findAllCategories(){
global $connect;
$i=1;
$query   = "SELECT *FROM categories";
$run_cat = mysqli_query($connect , $query);
while($row = mysqli_fetch_assoc($run_cat)){
	$cat_id   = $row['cat_id'];
	$cat_name =$row ['cat_name'];

	?>
	<tr>
	<td><?php echo $i++;?></td>
    <td><?php echo $cat_name; ?></td>
	<td><a href="categories.php?edit_cat=<?php echo $cat_id;?>"><div class='btn btn-warning' name="edit_cat"><i class='fa fa-pencil-square-o fa-2'></i> Edit</div></a></td>

		<td><a href="categories.php?delete_cat=<?php echo $cat_id;?>"><div class='btn btn-danger' name="delete_cat"><i class='fa fa-trash-o fa-2'></i> Delete</div></a></td>
</tr>
<?php }} ?>


<?php
function view_all_products(){
global $connect;
$i         = 1;
$query   = "SELECT products.product_id ,products.product_name,products.product_cat_id ,products.product_modal,products.product_price,products.product_quantity,";
$query  .=" products.product_date,products.product_image,products.product_description,products.product_tags
,products.product_status,products.product_view_count,";
$query  .=" categories.cat_id ,categories.cat_name ";
$query  .=" FROM products";
$query  .= " LEFT JOIN categories ON products.product_cat_id = categories.cat_id ORDER BY products.product_id";
				
				$run_query = mysqli_query($connect,$query);
				while($row = mysqli_fetch_assoc($run_query))
					{
						$product_id        = $row['product_id'];
						$product_name      = $row['product_name'];
						$product_modal     = $row['product_modal'];
					    $post_category    = $row['product_cat_id'];
						$post_date        = $row['product_date'];
						$post_image       = $row['product_image'];
                        $product_quantity = $row['product_quantity'];
						$product_price      = $row['product_price'];
					    $product_status   = $row['product_status'];
                        $cat_id           = $row['cat_id'];
				        $cat_name         = $row['cat_name'];
				?>
								<tr> 
                                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $product_id; ?>"></td>
                                        <td><?php echo $i++; ?></td>
                                    
                                        <td><?php echo $product_name; ?></td>
                                        <td><?php echo  $product_modal; ?></td>
									
				
                                    <td><?php echo $cat_name; ?></td>
                                    <td>
                                    <?php
									 if($product_status=="published"){
                                        echo "<a href='view_posts.php?published= $product_id' class='btn btn-success'><i class='fa fa-check'></i> $product_status</a>";
                                        }else{
                                        echo "<a href='view_posts.php?draft= $product_id' class='btn btn-danger'><i class='fa fa-lock'></i> $product_status</a>";
                                        }
                                    ?>
									</td>
                                    
									
									<?php
									echo"
										<td><img src='../images/products/$post_image' width='64px' height='64px'/></td>" ?>
										<td><?php echo  $product_quantity;?></td>
										<td><?php echo  $product_price;?></td>
                                      
									<td><a href="view_posts.php?source=edit_post&p_id=<?php echo $product_id; ?>"><div class="btn btn-warning"><i class="fa fa-pencil-square-o "></i> Edit</div></a></td>
									<td><a rel="<?php echo $product_id; ?>" href="javascript:void(0)" class="delete_link" ><div class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</div></a> </td>
                                   
                                    	<td><div class="btn btn-success"><i class="fa fa-eye "></i> View details</div></td>
                                    </tr>
<?php }?>

<?php 
                if(isset($_GET['draft'])){
                $draft_id     = $_GET['draft'];
                $draft_post ="UPDATE products SET product_status='published' WHERE product_id='$draft_id'";
                $run_draft_post = mysqli_query($connect , $draft_post);
                header("location:view_posts.php");
                }
                elseif(isset($_GET['published'])){
                $publish_id       = $_GET['published'];
                $publish_post ="UPDATE products SET product_status='draft' WHERE product_id='$publish_id'";
                $run_publish_post = mysqli_query($connect , $publish_post);
                header("location:view_posts.php");
                } 

}?>
<?php
if(isset($_GET['delete'])){
	$the_product_id = $_GET['delete'];
	$query     = "DELETE FROM products WHERE product_id='$the_product_id'";
	$run_query =mysqli_query($connect ,$query);
	header("location:view_posts.php");
}
?>
<?php
if(isset($_GET['reset'])){
	$rest_post_view_id = $_GET['reset'];
	$query             = "update posts set post_view_counts = 0 WHERE post_id ='$rest_post_view_id'";
	$rest_query         =mysqli_query($connect ,$query);
	header("location:view_posts.php");
}
?>
<?php include("delete_modal.php");?>


<?php
function get_user_data(){
    global $connect;
    if(isset($_GET['view_profile'])){
    $the_user_id = $_GET['view_profile'];
     $query     = "SELECT *FROM users WHERE user_id='$the_user_id'";
				$run_query = mysqli_query($connect,$query);
				while($row = mysqli_fetch_assoc($run_query))
					{	
                       $user_id          = $row['user_id'];
						$user_name       = $row['user_name'];
						$user_firstname  = $row['user_firstname'];
					    $user_lastname   = $row['user_lastname'];
                        $user_Date       = $row['user_date'];
						$user_email      = $row['user_email'];
                        $user_gender     = $row['user_gender'];
						$user_role       = $row['user_role'];
					    $user_image      = $row['user_image'];
}
}
}


/* === Delete from multiple table
DELETE FROM `articles`, `comments` 
USING `articles`,`comments` 
WHERE `comments`.`article_id` = `articles`.`id` AND `articles`.`id` = 4
*/






<?php
	if(isset($_GET['edit_profile'])){
    if($_SESSION['author_role']=='admin'){
    $author_info = selectTableCondition('authors','author_id',$_GET['edit_profile']);
    }else{
       $author_info = selectTableCondition('authors','author_id',$_SESSION['author_id']); 
    }
	   ?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
               <img class="media-object img-circle" src="img/profile/<?= $author_info['author_image'];?>" width="150" height="150" style="margin:0 auto;" >
            </div>
        </div>
        
         </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="user_firstname">first Name</label>
                <input type="text" class="form-control" name="author_fname" value="<?= $author_info['author_fname']; ?>" >
            </div>
        </div>
         <div class="col-md-6">
            <div class="form-group">
                <label for="user_lastname">last Name</label>
                <input type="text" class="form-control" name="author_lname" id="user_lastname" value="<?= $author_info['author_lname'];?>" >
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">e-mail</label>
                <input type="email" class="form-control" name="author_email" disabled value="<?= $author_info['author_email'];?>" >
            </div>
        </div>
         <?php 
        $role = $_SESSION['author_role'];
         if($role=="admin"){?>
        <div class="col-md-6">
            <div class="form-group">
                <label for="role">Role</label>
                <select name="user_role" id="" class="form-control">
                    <option value="<?= $author_info['author_role']; ?>"><?= $author_info['author_role']; ?></option>
                    <?php
                    if($role == "admin"){
                        echo "<option value='author'>author</option>";
                    }else{
                        echo "<option value='admin'>admin</option>";
                    }
                        ?>
                </select>
             
            </div>
            </div> 
        
	  <?php }} ?>

<?php
		  		if(isset($_POST['update_user'])){
						$user_firstname  = $_POST['author_fname'];
					    $user_lastname   = $_POST['author_lname'];
						/*$user_email      = $_POST['author_email'];*/
                       if($_SESSION['author_role']=="admin"){
						$user_role       = $_POST['user_role'];
                        $query  =$connect->query("UPDATE authors SET author_fname ='{$user_firstname}',author_lname='{$user_lastname}',author_role='{$user_role}',author_email='{$user_email}', author_password ='{$user_password}', author_image ='{$user_image}' WHERE author_id='$the_user_id' ");
                       }else{
                           $query  =$connect->query("UPDATE authors SET  author_fname ='{$user_firstname}',author_lname='{$user_lastname}' WHERE author_id='{$_SESSION['author_id']}'");
                       }
                          $query->execute();
                          SessionMessage('update_data','Data update successfully');
                          pageLocation("index");
							
						}	
		  ?>
   <div class="col-md-12">
	<div class="form-group">
      <input type="submit" class="btn btn-success pull-right" name="update_user" value="update user" >
    </div>
</div>
</form>
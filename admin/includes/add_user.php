<?php if($_SESSION['author_role']=="admin"){?>
<form class="from-control" action="" method="post" enctype="multipart/form-data">

    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">first Name</label>
            <input type="text" class="form-control" name="firstname" id="name">
        </div>
    </div>
        <div class="col-md-6">
            <div class="form-group">
              <label for="last">Last Name</label>
            <input type="text" class="form-control" name="lastname" id="last" >
           </div>
        </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="user_email" id="email" value="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
		<label for="password">password</label>
		<input type="password" class="form-control" name="user_password" id="password" value="">
	</div>
   </div>
     <div class="col-md-6">
        <div class="form-group">
            <label for="select">role :</label>
            <select class="form-control" name="user_role" id="select">
                <option value="subscriber">Select option</option>
                <option value="admin">admin</option>
                 <option value="author">author</option>
            </select>
        </div> 
    </div>
    <div class="col-md-6">
            <div class="form-group">
             <input type="file" class="form-group" name="add_image"  style="margin-top:20px;" >
            </div>
        </div>
    </div>
   <!-- <div class="form-group">
		<input type="file" class="form-group" name="add_image">
	</div>-->
    <div class="form-group">
        <input type="submit" value="add user" name="adduser" class="btn btn-primary pull-right">
    </div>
</form>
<?php }else{?>
<h1>you don't have privilage to access to this page</h1>
<?php }?>
<?php
if(isset($_POST['adduser'])){
    $firstname       = $_POST['firstname'];
    $lastname        = $_POST['lastname'];
    $user_role       = $_POST['user_role'];
    $user_email      = $_POST['user_email'];
    $user_password   = $_POST['user_password'];
    $user_image      = $_FILES['add_image']['name'];
    $user_image_temp = $_FILES['add_image']['tmp_name'];
    move_uploaded_file($user_image_temp,"img/profile/$user_image");
    //,author_image
    // ,'$user_image',
    // ,'{$user_image}'  ,
    $user_password =sha1($user_password);
    $query = $connect->prepare("INSERT INTO authors (author_fname,author_lname,author_email,author_password,author_role,author_image) VALUES ('$firstname','$lastname','$user_email','$user_password','$user_role','{$user_image}')");
    $insert_query= $query->execute();
    if($insert_query){
         pageLocationSpecial("users.php?source=view_all_users");
         SessionMessage('message_update',$user_role." added successfully");
    }else{
        echo 'error';
    }
    
}
?>

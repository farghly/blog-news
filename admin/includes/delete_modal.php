<?php include 'db.php'; 
?>
<div class="modal fade" id="delete_post_modal">
        <div class="modal-dialog">
            <div class="modal-content">
             <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                 <span aria-hidden="true">&times;</span><span class="sr-only">
                    close
                    </span>
                 
                 </button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-envelope"></i>
                Delete post
                 </h4>
                </div><!--modal header-->
                <div class="modal-body">
                    <h1>Are you sure to delete this post ?</h1>
                </div>
                <div class="modal-footer">
                <a href="" class="btn btn-danger modal_delete_link">Delete</a>
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                </div>
            
            </div>
        
        </div>
    
    </div>




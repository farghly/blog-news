var lastChecked = null;
$(document).ready(function(){
    $('.alert-success,.alert-danger').delay(2000).fadeOut(2000);
    // load screen
	var div_box ="<div id=load-screen><div id='loading'></div></div>";
	$("body").prepend(div_box);
	$('#load-screen').delay(300).fadeOut(400,function(){
		$(this).remove();
	})
    
    /*====== script of delete post ======== */
    $('.delete_link').on('click',function(){
       var id = $(this).attr('rel');
        var delete_url ="view_posts.php?delete="+id+" ";
        $('.modal_delete_link').attr("href",delete_url);
        $("#delete_post_modal").modal('show');
    });
    /*======end script of delete post ======== */
   
     /*========== script of  select all checkbox*/
    $("#selectAllBoxes").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
     /*========== end of script  select all checkbox*/
});
    /*========== script of shift + click to select checkbox*/
            var $chkboxes = $('.checkBoxes');
            $chkboxes.click(function(e) {
                if(!lastChecked) {
                    lastChecked = this;
                    return;
                }

                if(e.shiftKey) {
                    var start = $chkboxes.index(this);
                    var end = $chkboxes.index(lastChecked);

                    $chkboxes.slice(Math.min(start,end), Math.max(start,end)+ 1).prop('checked', lastChecked.checked);

                }
                lastChecked = this;
            });
    /*========== end of script  shift+click to select checkbox*/
});

$("input").keypress(function(event) {
    if (event.which == 13) {
        event.preventDefault();
        //return false;
        //$("form").submit();
    }
});
var lastChecked = null;
$(document).ready(function(){
	/*
	$('.alert.alert-success , .alert.alert-danger').delay(2000).fadeOut(2000);*/

	var div_box ="<div id=load-screen><div id='loading'></div></div>";
	$("body").prepend(div_box);
	$('#load-screen').delay(500).fadeOut(600,function(){
		$(this).remove();
	})
    
	/*
    $('.open-modal').click(function () {
        $('#DemoModal').modal('show');
    });*/
    /*==============   view profile script  ====================*/
   
   
    /*================== end of view profile script  ==================================*/
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

$(document).ready(function(){
    $('.alert-success,.alert-danger').delay(2000).slideUp(2000);
    
    $("input").val();
    
});
/*======= ctrl + s to save ====================*/
/*(function($) {
	window.addEvent('domready',function() {
		$('content-box').addEvent('keydown',function(event) {
			if((event.control || event.meta) && event.key == 's') {
				event.stop();
				$('edit-form').submit();
			}
		});
	});
})(document.id);*/
  /*==============================*/
 
    /*=========== counter function ===================*/
 


   

tinymce.init({
    selector: 'textarea',
    images_upload_url: 'postAcceptor.php',
    theme: 'modern',
    width: 900,
    height: 300,
    plugins: [
      'advlist autolink link image imagetools lists charmap print preview hr anchor pagebreak spellchecker',
      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
      'save table contextmenu directionality emoticons template paste textcolor'
    ],
    imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
   /* content_css: 'css/content.css',*/
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
  });
$('textarea.advanced_editor').tinymce({
    
    plugins : "…,directionality,…",
    directionality: "rtl",
    setup: function (ed) {
        ed.onInit.add(function(ed) {
            var direction = $('[name="'+ed.id+'"]').attr('dir');
            ed.getBody().dir = direction;
        });
    },
    file_browser_callback: function(field_name, url, type, win) {
    win.document.getElementById(field_name).value = 'my browser value';
  },
    
});
tinymce.activeEditor.uploadImages(function(success) {
  $.post('ajax/post.php', tinymce.activeEditor.getContent()).done(function() {
    console.log("Uploaded images and posted content as an ajax request.");
  });
});

   
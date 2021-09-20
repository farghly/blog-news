	<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <?php
     $url = $_SERVER['HTTP_HOST']."/admin/view_posts.php?source=add_post";
    if(isset($_GET['post_id'])|| $link == $url) :?>     
    <script type="text/javascript" src="js/bootstrap-tagsinput.js"></script>
    <?php endif; ?>
	<script type="text/javascript" src="js/javascript.js"></script>
</body>
</html>


<footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4  col-sm-4 col-xs-12">
                        <div class="about">
                            <a href="#" class="logo">
                                <img alt="" src="../assets/images/future_logo3.png" />
                            </a>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-md-offset-1 col-sm-4 col-xs-12">
                        <h3>Hot Categories</h3>
                        <ul class="list-category">
                            <?php
                             foreach($get_info as $row):?>
                            <li><a href="business.html"><?= $row['category_name'];?></a></li>
                          <?php endforeach;?>
                        </ul>
                    </div>
                    <div class="col-md-3 col-md-offset-1 col-sm-4 col-xs-12">
                        <h3>HOT TAGS</h3>

                        <div class="list-tags">
                            <a href="#">iPhone 7</a>
                            <a href="#">News</a>
                            <a href="#">Sport</a>
                            <a href="#">Apple</a>
                            <a href="#">Alcatel</a>
                            <a href="#">Pixi 4</a>
                            <a href="#">Elon Musk </a>
                            <a href="#">Smart phone</a>
                            <a href="#">Nexus</a>
                            <a href="#">Canvas</a>

                        </div>
                    </div>
                </div>
                <!--All right-->
                <div class="allright">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            <p>    © 2017 <a href="#">Future news</a>. All rights reserved.</p>
                        </div>

                        <div class="col-sm-6 col-xs-12">
                            <ul class="list-social-icon list-social-icon-footer">
                            
                            <li>
                                     <a href="#" class="facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="google">
                                        <i class="fa fa-google"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="youtube">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="pinterest">
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="rss">
                                        <i class="fa fa-rss"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
    </div>
    <!--scrip file-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollto.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
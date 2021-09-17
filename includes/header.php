<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="congnd91">
    <title>Technology news</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/images/favicon_3.png">
    <!--<link rel="apple-touch-icon" href="assets/images/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple-touch-icon-114x114.png">-->
    <!-- Online Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <!-- Vender -->
    <?php
    
   /* $css_files = array('font-awesome.min.css','bootstrap.min.css','normalize.min.css'
                      ,'owl.carousel.min.css','main.css');
    foreach($css_files as $css){*/?>
      <!--<link rel="stylesheet" href="\<?php /*echo CSS_PATH.$css*/?>" type="text/css" media="all"/>-->
      <?php /*}*/?>
      
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/normalize.min.css" rel="stylesheet" />
    <link href="assets/css/owl.carousel.min.css" rel="stylesheet" />
    <!-- Main CSS (SCSS Compile) -->
    <link href="assets/css/main.css" rel="stylesheet" />
    <link href="assets/css/responsive.css" rel="stylesheet" />
    <!-- JavaScripts -->
    <!--<script src="assets/js/modernizr.min.js"></script>-->
    <!-- HTML5 Shim and Respond.assets/js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.assets/js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.assets/js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.assets/js/1.4.2/respond.min.assets/js"></script>
    <![endif]-->
</head>
<body>
    <!--preload-->
    <div class="loader" id="page-loader">
        <div class="loader-status">
        </div>
    </div>
    <!--menu mobile-->
    <nav class="menu-res hidden-lg hidden-md ">
        <div class="menu-res-inner">
            <ul>
                 <?php
                
                    $catResults = selectTableLimit('categories','4');
                    foreach($catResults as $row):?>
                    <li><a href="category.php?cat_id"><?php echo $row['category_name'];?></a></li>
                  <?php endforeach;?>
                <li>
                    <p>
                        <a href="#">PAGE</a>
                        <span class="open-submenu"><i class="fa fa-angle-down"></i></span>
                    </p>
                    <ul>
                        <li>
                            <a href="404.html">404</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact us</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="page">
        <div class="container">
            <!--header-->
            <header class="header">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-xs-12">
                        <a href="#" class="logo">
                            <img alt="Logo" src="assets/images/future_logo3.png" />
                        </a>
                    </div>
                    <div class="col-md-6 col-md-offset-3 col-sm-8  text-right col-xs-12 hidden-xs">
                        <div class="owl-carousel owl-special">
                            <div>
                                <div class="special-news">
                                    <a href="#">
                                        <img alt="" src="assets/images/product/17.jpg" />
                                    </a>
                                    <h3><a href="#">Apple iPhone 7 review </a></h3>
                                    <div class="meta-post">
                                        <a href="#">
                                            john
                                        </a>
                                        <em></em>
                                        <span>
                                            21 Sep 2016
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="special-news">
                                    <a href="#">
                                        <img alt="" src="assets/images/product/11.jpg" />
                                    </a>
                                    <h3><a href="#">Watch out: That USB stick in your mailbox might be infected </a></h3>
                                    <div class="meta-post">
                                        <a href="#">
                                            admin
                                        </a>
                                        <em></em>
                                        <span>
                                            25 Sep 2016
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--menu-->
            <nav class="menu font-heading">
                <div class="menu-icon hidden-lg hidden-md">
                    <i class="fa fa-navicon"></i>
                    <span>MENU</span>
                </div>
                <ul class="hidden-sm hidden-xs">
                    
                     <?php 
                        /*
                            * display category table in nav menu
                            * SelectTable is a function to select data from table
                            * check file includes/function.php to know how SelectTable work
                        */?>
                        <li><a href="index.php">Home</a></li>
                        <?php $get_info =    selectTableConditionLimit('categories','category_status',1,3);
                            foreach($get_info as $row):?>
                               <li><a href="index.php"><?php echo $row['category_name'];?></a></li>
                       <?php endforeach; ?>
                        
                    <li class="mega">
                        <a href="reviews.html">Reviews<span></span></a>
                        <!--Mega menu-->
                        <div class="mega-menu">
                            <h3>
                                Latest Post
                            </h3>
                            <div class="row">
                               
                                
                                <div class="col-md-3">
                                    <div class="mega-col">
                                        <div class="mega-item">
                                            <div class="mega-item-img">
                                                <a href="article.html">
                                                    <img alt="" src="assets/images/product/4.jpg" />
                                                </a>
                                                <a href="#" class="cate-tag">Computing</a>
                                            </div>
                                            <p>
                                                <a href="article.html">
                                                    Six big ways MacOS Sierra is going to change your Apple experience
                                                </a>
                                            </p>
                                            <div class="meta-post">
                                                <a href="#">
                                                    Marion	Craig
                                                </a>
                                                <em></em>
                                                <span>
                                                    21 Sep 2016
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mega-col">
                                        <div class="mega-item">
                                            <div class="mega-item-img">
                                                <a href="article.html">
                                                    <img alt="" src="assets/images/product/5.jpg" />
                                                </a>
                                                <a href="#" class="cate-tag">Tech</a>
                                            </div>
                                            <p><a href="article.html">Messenger Bots Are Overhyped,  Growing like Crazy</a></p>
                                            <div class="meta-post">
                                                <a href="#">
                                                    admin
                                                </a>
                                                <em></em>
                                                <span>
                                                    26 Sep 2016
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="mega-col">
                                        <div class="mega-item">
                                            <div class="mega-item-img">
                                                <a href="article.html">
                                                    <img alt="" src="assets/images/product/6.jpg" />
                                                </a>
                                                <a href="#" class="cate-tag">Business</a>
                                            </div>
                                            <p><a href="article.html">7 essential lessons from agency marketing to startup growth</a></p>
                                            <div class="meta-post">
                                                <a href="#">
                                                    john
                                                </a>
                                                <em></em>
                                                <span>
                                                    26 September 2016
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-3">
                                    <div class="mega-col">
                                        <div class="mega-item">
                                            <div class="mega-item-img">
                                                <a href="article.html">
                                                    <img alt="" src="assets/images/product/5.jpg" />
                                                </a>
                                                <a href="#" class="cate-tag">Tech</a>
                                            </div>
                                            <p><a href="article.html">Messenger Bots Are Overhyped,  Growing like Crazy</a></p>
                                            <div class="meta-post">
                                                <a href="#">
                                                    admin
                                                </a>
                                                <em></em>
                                                <span>
                                                    26 Sep 2016
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </li>
                    
                     
                    
                    
                    
                    <li>
                        <a href="#">Page <span></span></a>
                        <ul class="submenu">
                            <li>
                                <a href="404.html">404</a>
                            </li>
                            <li>
                                <a href="contact.html">Contact us</a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
                <div class="search-icon">
                    <div class="search-icon-inner">
                        <i class="fa fa-search"></i>
                    </div>
                    <div class="search-box">
                        <input type="text" placeholder="Search..." />
                        <button type="submit">Search</button>
                    </div>
                </div>
            </nav>
            
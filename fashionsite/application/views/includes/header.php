<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo isset($seoTitle) ? $seoTitle : "Home | E-Nepal"; ?></title>
        <link href="<?php echo PUBLIC_URL; ?>application/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo PUBLIC_URL; ?>application/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo PUBLIC_URL; ?>application/css/prettyPhoto.css" rel="stylesheet">
        <link href="<?php echo PUBLIC_URL; ?>application/css/price-range.css" rel="stylesheet">
        <link href="<?php echo PUBLIC_URL; ?>application/css/animate.css" rel="stylesheet">
        <link href="<?php echo PUBLIC_URL; ?>application/css/main.css" rel="stylesheet">
        <link href="<?php echo PUBLIC_URL; ?>application/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="<?php echo PUBLIC_URL; ?>application/js/html5shiv.js"></script>
        <script src="<?php echo PUBLIC_URL; ?>application/js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
        <header id="header" ><!--header-->
            

            <div class="header-middle"><!--header-middle-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="<?php echo LINK_URL ?>site/index.html"><img src="<?php echo PUBLIC_URL; ?>application/images/home/logo copy.png" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right">
                                <ul class="nav navbar-nav">
                                    <?php if (isset($_SESSION[SESSION_KEY])): ?>
                                    <li><a><i class="fa fa-user"></i> <?php echo $_SESSION[SESSION_KEY]->fullname ?></a></li>
                                        <li><a href="<?php echo LINK_URL; ?>member/checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                        <li><a href="<?php echo LINK_URL; ?>member/cart.html"><i class="fa fa-shopping-cart"></i> Cart(<span id="cartCount"> <?php echo Functions::countCart(); ?></span>)</a></li>
                                        <li><a href="<?php echo LINK_URL ?>member/logout.html"><i class="fa fa-desktop"></i> Logout</a></li>
                                    <?php else: ?>
                                        <li><a href="<?php echo LINK_URL; ?>member/login.html"><i class="fa fa-lock"></i> Login</a></li>
                                        <li><a href="<?php echo LINK_URL; ?>member/register.html"><i class="fa fa-plus"></i> Register</a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/header-middle-->

            <div class="header-bottom"><!--header-bottom-->
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <?php
                                    foreach ($category->getCategories() as $row):
                                        $subCat = $category->getSubCategories($row->id);
                                        ?>
                                        <li class="dropdown"><a href="#"><?php echo $row->title; ?><i class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="sub-menu">
                                                <?php foreach ($subCat as $rows): ?>
                                                    <li><a href="<?php echo LINK_URL . "category/view/" . $category->getCatUrl($rows->category_id) . "/" . $rows->url ?>.html"><?php echo $rows->title; ?></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <form action="<?php echo LINK_URL?>site/search.html" method="post">
                        <div class="col-sm-3">
                            <div class="search_box pull-right">
                                <input type="text" name='searchKey' placeholder="Search"/>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div><!--/header-bottom-->
            <script src="<?php echo PUBLIC_URL; ?>application/js/jquery.js"></script>
            <script src="<?php echo PUBLIC_URL; ?>application/js/bootstrap.min.js"></script>
            <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
            <script src="<?php echo PUBLIC_URL; ?>application/js/angular.min.js"></script>
            <script src="<?php echo PUBLIC_URL; ?>application/js/jquery.scrollUp.min.js"></script>
            <script src="<?php echo PUBLIC_URL; ?>application/js/price-range.js"></script>
            <script src="<?php echo PUBLIC_URL; ?>application/js/jquery.prettyPhoto.js"></script>
            <script src="<?php echo PUBLIC_URL; ?>application/js/main.js"></script>
            
           
            <script>
                $(document).ready(function () {
                    //  console.log("Jquery loaded");
                    $('#confirmation').submit();
                });
            </script>
           
        </header><!--/header-->
        <section>
            <div class="container">



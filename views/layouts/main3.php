<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\Category;
use app\models\Product;
use app\models\Pages;
use app\components\CategoryWidget;
use app\components\MenuWidget;


AppAsset::register($this);

//$q = Yii::$app->request->get('q');

$category = Category::find()->where(['parent_id' => 0])->limit(3)->all();
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.png">

    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <!-- All CSS Files -->
    

    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700|Roboto+Condensed:300,400,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=cyrillic" rel="stylesheet">

    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>


<!-- Body main wrapper start -->
<div class="wrapper">

    <!-- START HEADER AREA -->
    <header class="header-area header-wrapper">
        <!-- header-top-bar -->
        <div class="header-top-bar plr-185">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 hidden-xs">
                        <div class="call-us">
                            <p class="mb-0 roboto">(+88) 01234-567890</p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <div class="top-link clearfix">
                            <ul class="link f-right">

                                <li>
                                    <a href="login.html">
                                        <i class="fa fa-lock"></i>
                                        Login
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header-middle-area -->
        <div class="header-middle-area plr-185">
            <div class="container-fluid">
                <div class="full-width-mega-dropdown">
                    <div class="row">
                        <!-- logo -->
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="logo">
                                <a href="/">
                                    <img style="height:50px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/1200px-Google_2015_logo.svg.png" alt="main logo">
                                </a>
                            </div>
                        </div>
                        <!-- primary-menu -->
                        <div class="col-md-8 hidden-sm hidden-xs">
                            <nav id="primary-menu">
                                <ul class="main-menu text-center">
                                    <li><a href="/">Главная</a>
                                    </li>
                                    <li class="mega-parent"><a href="shop.html">Товары</a>
                                        <div class="mega-menu-area clearfix">
                                            <div class="mega-menu-link f-left">
                                                <?php foreach($category as $cat): ?>
                                                <ul class="single-mega-item">
                                                    <li class="menu-title"><?=$cat['name']?></li>

                                                    <? $categ = Category::find()->where(['parent_id' => $cat['id']])->all(); ?>
                                                    <?php foreach($categ as $c): ?>

                                                        <li><a href="<?= Url::to(['site/category','id'=>$c['id'] ])?>"><?=$c['name'];?></a></li>
                                                    <?php endforeach;?>
                                                </ul>

                                                <?php endforeach;?>

                                                <?php foreach($category as $cat): ?>
                                                    <ul class="single-mega-item">
                                                        <li class="menu-title"><?=$cat['name']?></li>

                                                        <? $categ = Category::find()->where(['parent_id' => $cat['id']])->all(); ?>
                                                        <?php foreach($categ as $c): ?>

                                                            <li><a href="<?= Url::to(['site/category','id'=>$c['id'] ])?>"><?=$c['name'];?></a></li>
                                                        <?php endforeach;?>
                                                    </ul>

                                                <?php endforeach;?>
                                                
                                            </div>

                                        </div>
                                    </li>

                                    <li>
                                        <a href="about.html">О нас</a>
                                    </li>
                                    <li>
                                        <a href="contact.html">Контакты</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <!-- header-search & total-cart -->
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="search-top-cart  f-right">
                                <!-- header-search -->
                                <div class="header-search f-left">
                                    <div class="header-search-inner">
                                        <button class="search-toggle">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        <form method="get" action="/site/search">
                                            <div class="top-search-box">
                                                <input type="text" placeholder="Что вы ищите..." name="q" value="$q">
                                                <button type="submit">
                                                    <i class="fa fa-search">ddf</i>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- total-cart -->
                                <div class="total-cart f-left">
                                    <div class="total-cart-in">
                                        <div class="cart-toggler">
                                            <a href="#">
                                                <span class="cart-quantity">02</span><br>
                                                    <span class="cart-icon">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </span>
                                            </a>
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="top-cart-inner your-cart">
                                                    <h5 class="text-capitalize">Your Cart</h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="total-cart-pro">
                                                    <!-- single-cart -->
                                                    <div class="single-cart clearfix">
                                                        <div class="cart-img f-left">
                                                            <a href="#">
                                                                <img src="img/cart/1.jpg" alt="Cart Product" />
                                                            </a>
                                                            <div class="del-icon">
                                                                <a href="#">
                                                                    <i class="zmdi zmdi-close"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="cart-info f-left">
                                                            <h6 class="text-capitalize">
                                                                <a href="#">Dummy Product Name</a>
                                                            </h6>
                                                            <p>
                                                                <span>Brand <strong>:</strong></span>Brand Name
                                                            </p>
                                                            <p>
                                                                <span>Model <strong>:</strong></span>Grand s2
                                                            </p>
                                                            <p>
                                                                <span>Color <strong>:</strong></span>Black, White
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <!-- single-cart -->
                                                    <div class="single-cart clearfix">
                                                        <div class="cart-img f-left">
                                                            <a href="#">
                                                                <img src="img/cart/1.jpg" alt="Cart Product" />
                                                            </a>
                                                            <div class="del-icon">
                                                                <a href="#">
                                                                    <i class="zmdi zmdi-close"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="cart-info f-left">
                                                            <h6 class="text-capitalize">
                                                                <a href="#">Dummy Product Name</a>
                                                            </h6>
                                                            <p>
                                                                <span>Brand <strong>:</strong></span>Brand Name
                                                            </p>
                                                            <p>
                                                                <span>Model <strong>:</strong></span>Grand s2
                                                            </p>
                                                            <p>
                                                                <span>Color <strong>:</strong></span>Black, White
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="top-cart-inner subtotal">
                                                    <h4 class="text-uppercase g-font-2">
                                                        Total  =
                                                        <span>$ 500.00</span>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="top-cart-inner view-cart">
                                                    <h4 class="text-uppercase">
                                                        <a href="#">View cart</a>
                                                    </h4>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="top-cart-inner check-out">
                                                    <h4 class="text-uppercase">
                                                        <a href="#">Check out</a>
                                                    </h4>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- START MOBILE MENU AREA -->
    <div class="mobile-menu-area hidden-lg hidden-md">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="index.html">Главная</a>
                                </li>



                                <li><a href="blog.html">Товары</a>

                                    <ul>
                                        <?php foreach($category as $cat): ?>
                                            <? $categ = Category::find()->where(['parent_id' => $cat['id']])->all(); ?>
                                        <li> <a href="blog-left-sidebar.html"><?=$cat['name']?></a>
                                            <ul>

                                            <?php foreach($categ as $c): ?>
                                                <li><a href="<?= Url::to(['site/category','id'=>$c['id'] ])?>"><?=$c['name'];?></a></li>
                                            <?php endforeach;?>
                                            </ul>
                                        </li>
                                        <?php endforeach;?>
                                    </ul>

                                </li>
                                <li>
                                    <a href="about.html">О нас</a>
                                </li>
                                <li>
                                    <a href="contact.html">Контакты</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MOBILE MENU AREA -->

    <!-- END HEADER AREA -->

    <div class="content">
        <?=$content ?>
    </div>


    <!-- START FOOTER AREA -->
    <footer id="footer" class="footer-area">
        <div class="footer-bottom footer-bottom-2 text-center gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-5">
                        <div class="copyright-text copyright-text-2">
                            <p>© <a href="https://themeforest.net/user/codecarnival/portfolio" target="_blank">CodeCarnival</a> 2016. All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <ul class="footer-social footer-social-2">
                            <li>
                                <a class="facebook" href="" title="Facebook"><i class="zmdi zmdi-facebook"></i></a>
                            </li>
                            <li>
                                <a class="google-plus" href="" title="Google Plus"><i class="zmdi zmdi-google-plus"></i></a>
                            </li>
                            <li>
                                <a class="twitter" href="" title="Twitter"><i class="zmdi zmdi-twitter"></i></a>
                            </li>
                            <li>
                                <a class="rss" href="" title="RSS"><i class="zmdi zmdi-rss"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-3">
                        <ul class="footer-payment">
                            <li>
                                <a href="#"><img src="img/payment/1.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/payment/2.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/payment/3.jpg" alt=""></a>
                            </li>
                            <li>
                                <a href="#"><img src="img/payment/4.jpg" alt=""></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- END FOOTER AREA -->

    <!-- START QUICKVIEW PRODUCT -->
    <div id="quickview-wrapper">
        <!-- Modal -->
        <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-product clearfix">
                            <div class="product-images">
                                <div class="main-image images">
                                    <img alt="" src="img/product/quickview.jpg">
                                </div>
                            </div><!-- .product-images -->

                            <div class="product-info">
                                <h1>Aenean eu tristique</h1>
                                <div class="price-box-3">
                                    <div class="s-price-box">
                                        <span class="new-price">£160.00</span>
                                        <span class="old-price">£190.00</span>
                                    </div>
                                </div>
                                <a href="single-product-left-sidebar.html" class="see-all">See all features</a>
                                <div class="quick-add-to-cart">
                                    <form method="post" class="cart">
                                        <div class="numbers-row">
                                            <input type="number" id="french-hens" value="3">
                                        </div>
                                        <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                    </form>
                                </div>
                                <div class="quick-desc">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero.
                                </div>
                                <div class="social-sharing">
                                    <div class="widget widget_socialsharing_widget">
                                        <h3 class="widget-title-modal">Share this product</h3>
                                        <ul class="social-icons clearfix">
                                            <li>
                                                <a class="facebook" href="#" target="_blank" title="Facebook">
                                                    <i class="zmdi zmdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="google-plus" href="#" target="_blank" title="Google +">
                                                    <i class="zmdi zmdi-google-plus"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="twitter" href="#" target="_blank" title="Twitter">
                                                    <i class="zmdi zmdi-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="pinterest" href="#" target="_blank" title="Pinterest">
                                                    <i class="zmdi zmdi-pinterest"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="rss" href="#" target="_blank" title="RSS">
                                                    <i class="zmdi zmdi-rss"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .product-info -->
                        </div><!-- .modal-product -->
                    </div><!-- .modal-body -->
                </div><!-- .modal-content -->
            </div><!-- .modal-dialog -->
        </div>
        <!-- END Modal -->
    </div>
    <!-- END QUICKVIEW PRODUCT -->

</div>
<!-- Body main wrapper end -->


<!--<!-- jquery.nivo.slider js -->
<!--<script src="lib/js/jquery.nivo.slider.js"></script>-->
<!--<!-- All js plugins included in this file. -->
<!--<script src="js/plugins.js"></script>-->
<!--<!-- Main js file that contents all jQuery plugins activation. -->
<!--<script src="js/main.js"></script>-->

<script>

    function fix_size() {

        var images = $('.img-container img');
        images.each(setsize);

        function setsize() {
            var img = $(this),
                img_dom = img.get(0),
                container = img.parents('.img-container');
            if (img_dom.complete) {
                resize();
            } else img.one('load', resize);

            function resize() {
                if ((container.width() / container.height()) < (img_dom.width / img_dom.height)) {
                    img.width('100%');
                    img.height('auto');
                    return;
                }
                img.height('100%');
                img.width('auto');
            }
        }
    }
    fix_size();
    $(window).on('resize', fix_size);


</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
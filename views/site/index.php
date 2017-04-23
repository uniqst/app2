<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;

use app\models\Category;
use app\models\Product;
use app\components\CategoryWidget;
use yii\helpers\Html;

$this->title = 'ТЕХНОФАН - интернет-магазин техники';

?>

<div class="container-fluid">
    <!-- START SLIDER AREA -->
    <div class="slider-area theme-bg ptb-150 mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="slider-desc-3 slider-desc-4  text-center">
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
                            <h1 class="slider2-title-2 cd-headline clip is-full-width">
                                <span>New smart phone</span>
                                    <span class="cd-words-wrapper">
                                        <b class="is-visible">Samsung</b>
                                        <b>Apple</b>
                                        <b>Microsoft</b>
                                        <b>Nokia</b>
                                        <b>Sony</b>
                                    </span>
                            </h1>
                        </div>
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
                            <h2 class="slider2-title-3">Samsung grand 6</h2>
                        </div>
                        <div class="slider-button wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.5s">
                            <a href="#" class="button extra-small button-white">
                                <span class="text-uppercase">Buy now</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FEATURED PRODUCT SECTION START -->
    <div class="featured-product-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left mb-40 ">
                        <h2 class="uppercase text-center">Топ товары</h2>
<!--                        <h6>There are many variations of passages of brands available,</h6>-->
                    </div>
                </div>
            </div>
            <div class="featured-product">
                <div class="row active-featured-product slick-arrow-2">

                    <?php foreach($products as $product): ?>
                        <div class="col-xs-12">
                            <div class="product-item">
                                <div class="product-img">
                                    <a  href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product['id']]) ?>">
                                        <div class="img-container" >
                                            <img src="<?=Url::to(['web/'.$product->photo])?>" alt=""/>
                                        </div>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-title">
<!--                                        <a  href="--><?//= \yii\helpers\Url::to(['product/view', 'id' => $product['id'],'catId'=>$categoryName['id']]) ?><!--"></a>-->
                                        <a  href="<?= \yii\helpers\Url::to(['product/view', 'id' => $product['id']]) ?>"><?=$product['name']?></a>
                                    </h6>
                                    <div class="pro-rating mt-20 mb-40">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                    <h3 class="pro-price"><i aria-hidden="true">$</i> <?=$product['price']?></h3>
                                    <ul class="action-button">
<!--                                        <li>-->
<!--                                            <a href="#" title="Wishlist"><i class="fa fa-favorite"></i></a>-->
<!--                                        </li>-->
                                        <li>
                                            <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </li>
<!--                                        <li>-->
<!--                                            <a href="#" title="Compare"><i class="fa fa-refresh"></i></a>-->
<!--                                        </li>-->
                                        <li>
                                            <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    <?php endforeach;?>
                    
                    <!-- product-item start -->

                    <!-- product-item end -->
                    
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURED PRODUCT SECTION END -->

    <!-- FEATURED PRODUCT SECTION START -->
    <div class="featured-product-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">Новые товары</h2>
                        <h6>There are many variations of passages of brands available,</h6>
                    </div>
                </div>
            </div>
            <div class="featured-product">
                <div class="row active-featured-product slick-arrow-2">

                    <?php foreach($products as $product): ?>
                        <div class="col-xs-12">
                            <div class="product-item">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <div class="img-container" >
                                            <img src="<?=Url::to(['web/'.$product->photo])?>" alt=""/>
                                        </div>
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-title">
                                        <a href="single-product.html"><?=$product['name']?></a>
                                    </h6>
                                    <div class="pro-rating mt-20 mb-40">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                    </div>
                                    <h3 class="pro-price"><i aria-hidden="true">$</i> <?=$product['price']?></h3>
                                    <ul class="action-button">
                                        <!--                                        <li>-->
                                        <!--                                            <a href="#" title="Wishlist"><i class="fa fa-favorite"></i></a>-->
                                        <!--                                        </li>-->
                                        <li>
                                            <a href="#" data-toggle="modal"  data-target="#productModal" title="Quickview"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        </li>
                                        <!--                                        <li>-->
                                        <!--                                            <a href="#" title="Compare"><i class="fa fa-refresh"></i></a>-->
                                        <!--                                        </li>-->
                                        <li>
                                            <a href="#" title="Add to cart"><i class="fa fa-shopping-cart"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    <?php endforeach;?>

                    <!-- product-item start -->

                    <!-- product-item end -->

                </div>
            </div>
        </div>
    </div>
    <!-- FEATURED PRODUCT SECTION END -->

</div>


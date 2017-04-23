<?php
use yii\widgets\LinkPager;
use app\models\Product;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Поиск|'.$q;
?>
<div class="container-fluid">

    <?php if(!empty($product)):?>
        <h2>Поиск по запросу: <?=$q?></h2>
        <div class="site-index">
            <div class="body-content">
                <div class="row products">
                    <?php foreach($product as $prod){
                        include "_product.php";
                    }?>
                    <?php foreach($product as $prod){
                        include "_product.php";
                    }?>
                </div>
                <div class="clearfix"></div>
                <?=LinkPager::widget(['pagination' => $pagination])?>
            </div>
        </div>
    <?php else:?>
        <h2>По запросу <?=$q?> ничего не найдено...</h2>
    <?php endif;?>


</div>

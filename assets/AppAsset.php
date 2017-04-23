<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
//    public $css = [
//        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
//        'css/flexslider.css',
//        'css/animate.css',
//        'css/owl.carousel.css',
//        'css/dropdowns-enhancement.css',
//        'css/owl.carousel.css',
//        'css/site.css',
//        'css/my-style.css',
//        'css/responsive.css',
//        'css/bootstrap-dropdownhover.min.css',
//
//
//    ];
//    public $js = [
//
//        'js/jquery.sticky.js',
//        'js/jquery.flexslider-min.js',
//        'js/jquery.cookie.js',
//        'js/jquery.accordion.js',
//        'admin-lte/js/AdminLTE/app.js',
//        'js/dropdowns-enhancement.js',
//        'js/bootstrap-dropdownhover.min.js',
//        'js/owl.carousel.min.js',
//        'js/main.js',
//    ];
//    public $depends = [
//        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapPluginAsset',
//    ];

    public $css = [
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',
        'css/css/lib/css/nivo-slider.css',
        'css/css/core.css',
        'css/css/shortcode/shortcodes.css',
        'css/css/style.css',
        'css/css/responsive.css',
        'css/css/color/color-core.css',
        'css/css/custom.css',
    ];
    public $js = [
        'css/css/lib/js/jquery.nivo.slider.js',
        'js/js/plugins.js',
        'js/js/main.js',
        'js/js/custom.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

}

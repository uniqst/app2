<?php

namespace app\controllers;

use yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Category;
use app\models\Product;
use app\models\Pages;
use app\models\Options;
use app\models\OrderItem;
use app\models\Order;
use app\models\Cart;
use app\models\Qwe;
use app\models\Ewq;
use app\modules\admin\models\InCategory;
use app\modules\admin\models\CatOption;

use yii\data\Pagination;


class ProductController extends Controller
{
    public function actionView($id)
    {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);

        //$categoryName = Category::find()->where(['id'=>$catId])->one();
        //return $this->render('single-product',compact('product','categoryName'));

        return $this->render('view',compact('product'));
    }
}

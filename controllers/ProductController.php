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
    public $layout = 'main3';

    public function actionView($id)
    {
        $category = Category::find()->where(['parent_id' => 0])->all();
        $prod = Product::find()->where(['id' => $id])->one();
        $incat = InCategory::find()->where(['category_id' => $prod->category_id
        ])->with('catOption')->all();
        return $this->render('view', [
            'id' => $id,
            'product' => $prod,
            'title' => $prod->name,
            'category' => $category,
            'incat' => $incat,
        ]);
    }
}

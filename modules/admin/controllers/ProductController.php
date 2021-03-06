<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Product;
use app\modules\admin\models\Category;
use app\modules\admin\models\CatOption;
use app\modules\admin\models\InCategory;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\db\ActiveQuery;

/**
 * PtoductController implements the CRUD actions for Product model.
 */
class ProductController extends AdminController
{
    /**
     * @inheritdoc
     */

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find()->with('category'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        $catid - new InCategory();
        $model = new Product();
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            $model->file->saveAs('upload/' . $model->file->baseName . '.' . $model->file->extension);
            $model->photo = 'upload/' . $model->file->baseName . '.' . $model->file->extension;

            // $catid->save();
            $model->save();
             return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', compact('model', 'catid'));
        }
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $id = Yii::$app->request->get('id');
   
        $product = Product::find()->where(['id' => $id])->with(['category.inCategory.catOption' => function(ActiveQuery $query){
            $query->where(['product_id' => Yii::$app->request->get('id')]);
        }])->one();
       
      
        $catid = $product->category->inCategory;
        $value = Yii::$app->request->post('value'); 
        $createvalue = Yii::$app->request->post('createvalue');
        if ($createvalue){
        foreach($createvalue as $key => $val){
            $qwe = new CatOption();
            $qwe->incat_id = $key;
            $qwe->product_id = Yii::$app->request->get('id');
            $qwe->value = $val;
            $qwe->save();
          }
        }
        if (!empty($value)){
        foreach($value as $key => $val){
            $cat = CatOption::find()->where(['id' => $key])->one();
            $cat->value = $val;
            $cat->save();
        }
    }
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if(!empty($model->file)){
            $model->file->saveAs('upload/' . $model->file->baseName . '.' . $model->file->extension);
            $model->photo = 'upload/' . $model->file->baseName . '.' . $model->file->extension;
            }
            $model->save();
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'catid' => $catid,
                'catl' => $catl,
            ]);
        }
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

<?php

namespace app\module\admin\controllers;

use Yii;
use app\models\Category;
use app\models\Product;
use app\models\Photo;
use app\models\Dependency_product;
use yii\web\Controller;
use app\models\Orders;
use app\models\Dependency_orders;
use yii\web\UploadedFile;
use yii\db\Query;

class DefaultController extends Controller
{
    public $layout = 'main.php';
    public function actionIndex()
    {
        $model_category = Category::find()->limit(10)->all();
        $model_product = Product::find()->limit(10)->all();

        return $this->render('index', [
                                'model_category' => $model_category, 
                                'model_product' => $model_product, 
                            ]);
    }

    public function actionDeleteorder($id){
        $model_orders = Orders::findOne($id);
        if($model_orders->delete()){
            return $this->redirect(['orders']);
        }

    }

    public function actionOrders(){
        $model_orders = new Orders;
        $model_product = new Product;
        $model_dependency_orders = new Dependency_orders;

        $orders = (new Query)->select('*')
            ->from(['o' => Orders::tableName()])
            ->leftJoin(['d' => Dependency_orders::tableName()], 'd.id_orders = o.id_orders')
            ->leftJoin(['p' => Product::tableName()], 'p.id_product = d.id_product')
            ->all();

        return $this->render('orders', [
            'orders' => $orders,
            'model_dependency_orders' => $model_dependency_orders,
            'model_product' => $model_product,
            'model_orders' => $model_orders,
        ]);

    }

    public function actionCategory(){
    	$model = new Category;

    	if($_POST['Category']){
    		$model->name_category = $_POST['Category']['name_category'];
    		if($model->save()){
    			return $this->redirect(['category']);
    		}
    	}

    	return $this->render('category', ['model' => $model]);
    }

    public function actionDeletecategory($id){
        $model_category_delete = Category::findOne($id);
        if($model_category_delete->delete()){
            return $this->redirect(['category']);
        }
    }

    public function actionEditcategory($id){
        $model_category = Category::findOne($id);

        if(Yii::$app->request->post()){
            $model_category->name_category = Yii::$app->request->post('Category')['name_category'];
            if($model_category->update()){
                return $this->redirect(['category']);
            }
        }

        return $this->render('editcategory', ['model' => $model_category]);
    }

    public function actionEditproduct($id){
        $model_category = new Category;
        $model_product = Product::findOne($id);
        $model_category->id_category = Product::find()->where(['id_product' => $id])->with('category')->one()['category']['0']['id_category'];
        $model_dependency_product = new Dependency_product/*::find()->where(['id_product' => $id])->one()*/;
        $model_photo = new Photo;
        $model_photo->url = Photo::find()->where(['id_product' => $id])->all();

        if(Yii::$app->request->post()){
            $model_product->load(Yii::$app->request->post());
            $model_product->update();

            $model_dependency_product->deleteAll(['id_product' => $model_product->id_product]);
            $model_dependency_product_new = new Dependency_product;
            $model_dependency_product_new->id_category = Yii::$app->request->post('Category')['id_category'];
            $model_dependency_product_new->id_product = $model_product->id_product;
            $model_dependency_product_new->save();

            if($model_photo->imageFiles = UploadedFile::getInstances($model_photo, 'url')){
                foreach ($model_photo->url as $value){
                    unlink($value['url']);
                }
                $model_photo->deleteAll(['id_product' => $model_product->id_product]);
                $model_photo->imageFiles = UploadedFile::getInstances($model_photo, 'url');
                foreach ($model_photo->imageFiles as $file) {
                    $model_photo_new = new Photo;
                    $model_photo_new->namePhoto = 'web/img/'.Yii::$app->security->generateRandomString().'.'.$file->extension;
                    $file->saveAs($model_photo_new->namePhoto);
                    $model_photo_new->url = $model_photo_new->namePhoto;
                    $model_photo_new->id_product = $model_product->id_product;
                    $model_photo_new->save();
                }
            }
            return $this->redirect(['product']);
        }

        return $this->render('editproduct', [
                                'model_category' => $model_category, 
                                'model_product' => $model_product, 
                                'model_photo' => $model_photo,
                            ]);
    }

    public function actionDeleteproduct($id){
        $model_product_delete = Product::findOne($id);
        $photo_delete = $model_product_delete->photo;
        foreach ($photo_delete as $value) {
            unlink($value['url']);
        }
        if($model_product_delete->delete()){
            return $this->redirect(['product']);
        }
    }

    public function actionViewproduct($id){
        $model_product_view = Product::findOne($id);
        $model_photo_view = Photo::find()->where(['id_product' => $id])->all();
        $model_category_view = Product::find()->where(['id_product' => $id])->with('category')->one()['category']['0']['name_category'];

        return $this->render('viewproduct', [
                                'model_category_view' => $model_category_view, 
                                'model_product_view' => $model_product_view, 
                                'model_photo_view' => $model_photo_view
                            ]);
    }

    public function actionViewcategory($id){
        $model_category = Category::find()->where(['id_category' => $id])->with('product')->all()['0']['product'];
        return $this->render('viewcategory', [
                                'model_category' => $model_category, 
                            ]);
    }

    public function actionProduct(){
    	$model_category = new Category;
    	$model_product = new Product;
    	$model_dependency_product = new Dependency_product;
        $model_photo = new Photo;

    	if(Yii::$app->request->post()){
    		$model_product->load(Yii::$app->request->post());
    		if($model_product->save()){
    			$model_dependency_product->id_category = Yii::$app->request->post('Category')['id_category'];
    			$model_dependency_product->id_product = $model_product->id_product;
    			if($model_dependency_product->save()){
                    $model_photo->imageFiles = UploadedFile::getInstances($model_photo, 'url');
                    foreach ($model_photo->imageFiles as $file) {
                        $model_photo_new = new Photo;
                        $model_photo_new->namePhoto = 'web/img/'.Yii::$app->security->generateRandomString().'.'.$file->extension;
                        $file->saveAs($model_photo_new->namePhoto);
                        $model_photo_new->url = $model_photo_new->namePhoto;
                        $model_photo_new->id_product = $model_product->id_product;
                        $model_photo_new->save();
                    }
    				return $this->redirect(['product']);
    			}
    		}
    	}

    	return $this->render('product', [
                                'model_category' => $model_category, 
                                'model_product' => $model_product, 
                                'model_photo' => $model_photo
                            ]);
    }
}

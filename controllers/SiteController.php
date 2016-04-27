<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Category;
use app\models\Product;
use app\models\Photo;
use app\models\Orders;
use app\models\Dependency_product;
use app\models\Dependency_orders;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $model_category_product = new Category;
        $model_category = Category::find()->all();
        $model_product = Product::find()->all();
        $model_photo = new Photo;

        return $this->render('index', [
            'model_photo' => $model_photo,
            'model_product' => $model_product,
            'model_category' => $model_category,
            'model_category_product' => $model_category_product,
        ]); 
    }

    public function actionCart(){
        $model_order = new Orders;
        
        $model_product = new Product;

        if(Yii::$app->request->post()){
            $model_order->name_user = Yii::$app->request->post('Orders')['name_user'];
            $model_order->email_user = Yii::$app->request->post('Orders')['email_user'];
            if($model_order->save()){
                $cookies = Yii::$app->request->cookies;
                foreach ($cookies as $cookie_value) {
                    if(is_array($cookie_value->value)){
                        $model_dependency_orders = new Dependency_orders;
                        $model_dependency_orders->id_orders = $model_order->id_orders;
                        $model_dependency_orders->id_product = $cookie_value->value['id_product'];
                        $model_dependency_orders->count = Yii::$app->request->post('count');
                        $model_dependency_orders->save();
                        $cookies_delete = Yii::$app->response->cookies;
                        $cookies_delete->remove($model_dependency_orders->id_product);
                    }
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('cart', [
            'model_product' => $model_product,
            'model_order' => $model_order,
        ]);
    }

    public function actionProduct($id){
        $model_product_view = Product::findOne($id);
        $model_photo_view = Photo::find()->where(['id_product' => $id])->all();
        $model_category_view = Product::find()->where(['id_product' => $id])->with('category')->one()['category']['0']['name_category'];

        if(Yii::$app->request->post()){
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => $model_product_view->id_product,
                'value' =>[
                    'id_product' => $model_product_view->id_product,
                    'name_product' => $model_product_view->name_product,
                    'price' => $model_product_view->price,
                ],
                'expire' => time() +  60*60*24*365,
            ]));
            return $this->redirect(['cart']);
        }
        return $this->render('product', [
                                'model_category_view' => $model_category_view, 
                                'model_product_view' => $model_product_view, 
                                'model_photo_view' => $model_photo_view
                            ]);
    }

    public function actionCategory($id){
        $model_category = Category::find()->where(['id_category' => $id])->with('product')->all()['0']['product'];
        return $this->render('category', [
            'model_category' => $model_category, 
        ]);
    }
}

<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Orders extends ActiveRecord{

	public function rules(){
		return [
			[['name_user', 'email_user'], 'required'],
			['email_user', 'email'],
			['name_user', 'string'],
		];
	}

	public function getProduct(){
		return $this->hasMany(Product::className(), ['id_product' => 'id_product'])
            ->viaTable('dependency_orders', ['id_orders' => 'id_orders']);
	}

	public static function tableName(){
		return 'orders';
	}

    public function formName(){
    	return 'Orders';
    }
}
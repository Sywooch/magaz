<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Product extends ActiveRecord{

	// public $id_category;

	public function rules(){
		return [
			[['name_product', 'description', 'price'], 'required'],
			[['name_product', 'description'], 'string'],
		];
	}

	public function getCategory(){
		return $this->hasMany(Category::className(), ['id_category' => 'id_category'])
            ->viaTable('dependency_product', ['id_product' => 'id_product']);
	}

	public function getOrders(){
		return $this->hasMany(Orders::className(), ['id_orders' => 'id_orders'])
            ->viaTable('dependency_orders', ['id_product' => 'id_product']);
	}

	public function getPhoto(){
        return $this->hasMany(Photo::className(), ['id_product' => 'id_product']);
    }

	public static function tableName(){
		return 'product';
	}

    public function formName(){
    	return 'Product';
    }
}
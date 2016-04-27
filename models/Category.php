<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Category extends ActiveRecord{

	public function rules(){
		return [
			[['name_category'], 'required'],
			['name_category', 'string'],
		];
	}

	public function getProduct(){
		return $this->hasMany(Product::className(), ['id_product' => 'id_product'])
            ->viaTable('dependency_product', ['id_category' => 'id_category']);
	}

	public static function tableName(){
		return 'category';
	}

    public function formName(){
    	return 'Category';
    }
}
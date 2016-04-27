<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Photo extends ActiveRecord{

	public $imageFiles;
	public $namePhoto;

	public function rules(){
		return [
			// [['url'], 'required'],
			[['url'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
		];
	}

	public function getProduct(){
        return $this->hasOne(Product::className(), ['id_product' => 'id_product']);
    }

	public static function tableName(){
		return 'photo';
	}

    public function formName(){
    	return 'Photo';
    }
}
<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Dependency_product extends ActiveRecord{


	public static function tableName(){
		return 'dependency_product';
	}

	public function formName(){
    	return 'Dependency_product';
    }
}
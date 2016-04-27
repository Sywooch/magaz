<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Dependency_orders extends ActiveRecord{

	public static function tableName(){
		return 'dependency_orders';
	}

	public function formName(){
    	return 'Dependency_orders';
    }
}
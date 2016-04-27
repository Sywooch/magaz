<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use kartik\widgets\FileInput;
	use yii\web\UploadedFile;

	$arr = $model_category::find()->asArray()->indexBy('id_category')->all();
	$dropdownArr = array_map(function($category){return $category['name_category'];}, $arr);
	$arrPhoto = array();
	foreach ($model_photo->url as $value) {
		$arrPhoto[] = Html::img('/'.$value['url'], ['class'=>'file-preview-image']);
	}
?>
<h4>Сочетание стильности и производительности</h4>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="col-md-12">
	<div class="form-group">
		<div class="col-md-5">
			<?= $form->field($model_product, 'name_product')->textInput()?>
			<?= $form->field($model_category, 'id_category')->label("Category")->dropDownList($dropdownArr);?>
			<?= $form->field($model_product, 'description')->textarea(['rows' => '4']);?>
			<?= $form->field($model_product, 'price')->label("Price")->textInput();?>
		</div>
		<div class="col-md-7">
			<?
				echo $form->field($model_photo, 'url[]')->label("New photo")->widget(FileInput::classname(), [
				    'options' => [
				    	'multiple' => true,
				    ],
				    'pluginOptions' => [
				    	'previewFileType' => 'any',
				    	'showPreview' => true,
				        'showCaption' => true,
				        'showRemove' => true,
				        'showUpload' => false,
				        'initialPreview' => $arrPhoto,
				    ]
				]);
			?>
		</div>
		<div class="col-md-12">
			<?= Html::submitButton('Edit product', ['class' => 'btn btn-success', 'name' => 'add'])?>
			<a href="/admin/default/product" class="btn btn-success">Cancel</a>
		</div>
	</div>

</div>
<?php ActiveForm::end(); ?>
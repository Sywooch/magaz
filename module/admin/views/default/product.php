<?
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use kartik\widgets\FileInput;

	$arr = $model_category::find()->asArray()->indexBy('id_category')->all();
	$dropdownArr = array_map(function($category){return $category['name_category'];}, $arr);

?>


<div class="col-md-7">
	<table class="table_view">
	    <thead>
	        <tr>
	            <td>Name</td>
	            <td>Category</td>
	            <td>Price</td>
	        </tr>
	    </thead>
	    <tbody>
			<?php foreach ($model_product::find()->all() as $value): ?>
		        <tr>
		            <td><a href="/admin/default/viewproduct/<?=$value['id_product']?>"><?=$value['name_product']?></a></td>
		            <td>
		            	<a href="/admin/default/viewcategory/<?=$model_product::find()->where(['id_product' => $value['id_product']])->with('category')->one()['category']['0']['id_category']?>">
		            		<?=$model_product::find()->where(['id_product' => $value['id_product']])->with('category')->one()['category']['0']['name_category']?>
		            	</a>
		            </td>
		            <td><?=$value['price']?></td>
		            <td>
		                <a href="/admin/default/editproduct/<?=$value['id_product']?>">Edit</a>
		                |
		                <a href="/admin/default/deleteproduct/<?=$value['id_product']?>">Delete</a>
		            </td>
		        </tr>
		    <?php endforeach ?>
		</tbody>
	</table>
</div>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'name' => 'Category']]); ?>
<div class="col-md-5">
	<div class="form-group">
			<?= $form->field($model_product, 'name_product')->textInput()?>
			<?
				echo FileInput::widget([
				    'model' => $model_photo,
				    'attribute' => 'url[]',
				    'options' => [
				    	'multiple' => true,
				    	'accept' => 'image/*',
				    ],
				    'pluginOptions' => [
				    	'previewFileType' => 'any',
				    	'showPreview' => true,
				        'showCaption' => true,
				        'showRemove' => true,
				        'showUpload' => false,
				    ]
				]);
			?>
			<?= $form->field($model_category, 'id_category')->label("Category")->dropDownList($dropdownArr);?>
			<?= $form->field($model_product, 'description')->textarea(['rows' => '4']);?>
			<?= $form->field($model_product, 'price')->label("Price")->textInput();?>
			<?= Html::submitButton('New product', ['class' => 'btn btn-success', 'name' => 'add'])?>
	</div>
</div>
<?php ActiveForm::end(); ?>
<?php
	$this->title = $model_product_view['name_product'];
	use yii\bootstrap\Carousel;
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;

	$arrPhoto = array();
	foreach ($model_photo_view as $value) {
		$arrPhoto[] = array('content' => "<img style='width:474px;height:296px' src='/".$value['url']."'/>",);
	}
?>

<div class="col-md-12">
	<div class="col-md-12">
		<h2><?=$model_product_view['name_product']?></h2>
	</div>
	<div class="col-md-6">
		<h4>Category</h4>
		<p><?=$model_category_view?></p>
		<h4>Description</h4>
		<p><?=$model_product_view['description']?></p>
		<h4>Price</h4>
		<p><?=$model_product_view['price']?></p>
	</div>
	<div class="col-md-6">
		<?
			echo Carousel::widget([
				'items' => $arrPhoto,
				'options' => [
			       'style' => 'width:474px;' // Задаем ширину контейнера
			    ]
			]);
		?>
	</div>
	<?php $form = ActiveForm::begin(); ?>
		<div class="col-md-12">
			<?= Html::submitButton('Buy', ['class' => 'btn btn-success', 'name' => 'add'])?>
		</div>
	<?php ActiveForm::end(); ?>
</div>
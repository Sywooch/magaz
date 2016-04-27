<?php
	use yii\bootstrap\Carousel;
	use yii\helpers\Html;


	$arrPhoto = array();
	foreach ($model_photo_view as $value) {
		$arrPhoto[] = array('content' => "<img style='width:474px;height:296px' src='/".$value['url']."'/>",);
	}
?>

<a href="/admin/default/product">All Product</a>
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
	<div class="col-md-12">
		<a href="/admin/default/editproduct/<?=$model_product_view['id_product']?>" class="btn btn-success">Edit</a>
	</div>
</div>


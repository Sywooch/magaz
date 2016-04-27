<?
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>
<div class='col-md-12'>
	<div class="col-md-6">
		<?php $form = ActiveForm::begin(); ?>
			<?
				$cookies = Yii::$app->request->cookies;
				foreach ($cookies as $cookie_value) {
					if(is_array($cookie_value->value)){
						echo "Name:".$cookie_value->value['name_product']."<br>";
						echo "Price".$cookie_value->value['price']."<br>";
						echo "Count <input type='number' size='2' name='count' min='1' max='10' value='1'><br>";
					}
				}
			?>
			<?= $form->field($model_order, 'name_user')->label('Name')->textInput()?>
			<?= $form->field($model_order, 'email_user')->label('Email')->input('email')?>
			<?= Html::submitButton('Buy', ['class' => 'btn btn-success', 'name' => 'add'])?>

		<?php ActiveForm::end(); ?>
	</div>
</div>

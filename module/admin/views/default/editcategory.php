<?php
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>
<div class="col-md-5">
	<div class="form-group">
			<?= $form->field($model, 'name_category')->textInput()?>
			<?= Html::submitButton('Rename category', ['class' => 'btn btn-success', 'name' => 'add'])?>
			<a href="/admin/default/category" class="btn btn-success">Cancel</a>
	</div>
</div>
<?php ActiveForm::end(); ?>
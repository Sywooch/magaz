<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="row">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'name' => 'Category']]); ?>

    	<div class="col-md-3">
    			<?= $form->field($model, 'name_category')->textInput()?>
    			<?= Html::submitButton('Add', ['class' => 'btn btn-success', 'name' => 'add'])?>
    	</div>

    <?php ActiveForm::end(); ?>
    <div class="col-md-3">
        <table class="table_view">
            <thead>
                <tr>
                    <td>Category</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
            	<?php foreach ($model::find()->all() as $value): ?>
                    <tr>
                        <td><a href="/admin/default/viewcategory/<?=$value['id_category']?>"><?=$value['name_category']?></a></td>
                        <td>
                            <a href="/admin/default/editcategory/<?=$value['id_category']?>">Edit</a>
                            |
                            <a href="/admin/default/deletecategory/<?=$value['id_category']?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
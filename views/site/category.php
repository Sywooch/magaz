<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="row">
    <div class="col-md-3">
        <table>
        	<?php foreach ($model::find()->all() as $value): ?>
                <tr>
                    <td><a href="/admin/default/viewcategory/<?=$value['id_category']?>"><?=$value['name_category']?></a></td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>
</div>
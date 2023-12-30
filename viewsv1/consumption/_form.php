<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\RawMaterial;
use yii\helpers\ArrayHelper;
use app\models\MineLocation;
/* @var $this yii\web\View */
/* @var $model app\models\Consumption */
/* @var $form yii\widgets\ActiveForm */
$raw_material=ArrayHelper::map(RawMaterial::find()->where(['is_deleted' => 0])->all(),'raw_material_id','name');
$mine_location=ArrayHelper::map(MineLocation::find()->where(['is_deleted' => 0])->all(),'mine_location_id','name');
?>
<link rel="stylesheet" href="../css/select2.css">
<div class="consumption-form">
<div class="row">
<div class="col-md-6">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->Input('date') ?>

    <?= $form->field($model, 'raw_material_id')
        ->dropDownList(
            $raw_material   ,['prompt'=>'Select Raw Material'] 
        ); ?>

    <?= $form->field($model, 'mine_location_id')
        ->dropDownList(
            $mine_location   ,['prompt'=>'Select Mine Location'] 
        ); ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

</div>
</div>
<?php 
    $script = <<< JS
        $(document).ready(function() {
            $('#consumption-raw_material_id').select2();
            $('#consumption-mine_location_id').select2();
           

        });
JS;
    $this->registerJS($script);
?>
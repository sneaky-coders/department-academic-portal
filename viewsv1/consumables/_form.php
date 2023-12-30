<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\RawMaterial;
use yii\helpers\ArrayHelper;
use app\models\Currency;
use app\models\Units;
use app\models\Supplier;
/* @var $this yii\web\View */
/* @var $model app\models\Consumables */
/* @var $form yii\widgets\ActiveForm */
$raw_material=ArrayHelper::map(RawMaterial::find()->where(['is_deleted' => 0])->all(),'raw_material_id','name');
$currency=ArrayHelper::map(Currency::find()->where(['is_deleted' => 0])->all(),'currency_id','name');
$units=ArrayHelper::map(Units::find()->where(['is_deleted' => 0])->all(),'unit_id','name');
$supplier=ArrayHelper::map(Supplier::find()->where(['is_deleted' => 0])->all(),'supplier_id','name');
?>
<link rel="stylesheet" href="../css/select2.css">

<div class="consumables-form">
    <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->errorSummary($model); ?>

            <?= $form->field($model, 'date')->Input('date') ?>

            <?= $form->field($model, 'supplier_id')
                ->dropDownList(
                    $supplier   ,['prompt'=>'Select Supplier Name']  
                ); ?>

            <?= $form->field($model, 'raw_material_id')
                ->dropDownList(
                    $raw_material   ,['prompt'=>'Select Raw Material'] 
                ); ?>

            <?= $form->field($model, 'currency_id')
                ->dropDownList(
                    $currency   
                ); ?>

            <?= $form->field($model, 'price')->textInput() ?>

            <?= $form->field($model, 'vat')->textInput() ?>

            <?= $form->field($model, 'quantity')->textInput() ?>

            <?= $form->field($model, 'units_id')
                ->dropDownList(
                    $units   
                ); ?>

            <?= $form->field($model, 'remarks')->textarea(['rows' => 1]) ?>

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
            $('#consumables-supplier_id').select2();
            $('#consumables-raw_material_id').select2();
            $('#consumables-currency_id').select2();
            $('#consumables-units_id').select2();

        });
JS;
    $this->registerJS($script);
?>
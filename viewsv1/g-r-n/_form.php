<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\RawMaterial;
use app\models\Supplier;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\GRN */
/* @var $form yii\widgets\ActiveForm */
$raw_material=ArrayHelper::map(RawMaterial::find()->where(['is_deleted' => 0])->all(),'raw_material_id','name');
$supplier=ArrayHelper::map(Supplier::find()->where(['is_deleted' => 0])->all(),'supplier_id','name');

//$rm = RawMaterial::find()->where(['is_deleted' => 0,'raw_material_id' => $raw_material])->one();
//echo $procurement_id,"<br>",$po_no,'<br>',$raw_material;
 
?>

<link rel="stylesheet" href="../css/select2.css">
<div class="grn-form">
<div class="row">

<div class="col-md-6">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'purchase_contract_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'date')->input('date') ?>

    <?= $form->field($model, 'supplier_id')
        ->dropDownList(
            $supplier   ,['prompt'=>'Select Supplier','disabled' => 'true']
        ); ?>

    <?= $form->field($model, 'po_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'raw_material_id')
        ->dropDownList(
            $raw_material   ,['prompt'=>'Select Raw Material'] 
        ); ?>

    <?= $form->field($model, 'quantity_received')->textInput() ?>

    <?= $form->field($model, 'exchange_rate')->textInput() ?>

    <?= $form->field($model, 'truck_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'driver_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 1]) ?>



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
            $('#grn-raw_material_id').select2();
        });
JS;
    $this->registerJS($script);
?>

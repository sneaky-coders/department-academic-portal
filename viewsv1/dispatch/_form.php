<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\SalesContract;
use app\models\MineLocation;

$sales_contract=ArrayHelper::map(SalesContract::find()->where(['is_deleted' => 0])->all(),'sales_contract_id','contract_no');
$items=ArrayHelper::map(MineLocation::find()->where(['is_deleted' => 0])->all(),'mine_location_id','name');

/* @var $this yii\web\View */
/* @var $model app\models\Dispatch */
/* @var $form yii\widgets\ActiveForm */
?>
<link rel="stylesheet" href="../css/select2.css">

<div class="dispatch-form">
    <div class='row'>
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->errorSummary($model); ?>
            <?= $form->field($model, 'date')->Input('date') ?>

            
            <?= $form->field($model, 'mine_location_id')
            ->dropDownList(
                $items ,  ['prompt'=>'Select Mine Location'] 
            ); ?>

            <?= $form->field($model, 'sales_contract_id')
                ->dropDownList(
                    $sales_contract   ,['prompt'=>'Select Sales Contract No.']  
                ); ?>
            
            <?= $form->field($model, 'type_of_dispatch')->dropDownList([ 'Mined' => 'Mined', 'Procured' => 'Procured', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'exchange_rate')->textInput() ?>

            <?= $form->field($model, 'truck_no')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'trailer_no')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'driver_name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'driver_contact_no')->textInput(['maxlength' => true]) ?>


            <?= $form->field($model, 'quantity_dispatched')->textInput() ?>

            <?= $form->field($model, 'quantity_received')->textInput() ?>
                        
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
            $('#dispatch-mine_location_id').select2();
            $('#dispatch-sales_contract_id').select2();
        });
JS;
    $this->registerJS($script);
?>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MineLocation;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\DailyWorks */
/* @var $form yii\widgets\ActiveForm */
$mine_location=ArrayHelper::map(MineLocation::find()->where(['is_deleted' => 0])->all(),'mine_location_id','name');

?>
<link rel="stylesheet" href="../css/select2.css">
<div class="daily-works-form">
<div class="row">
<div class="col-md-6">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->Input('date') ?>

    <?= $form->field($model, 'nature_of_job')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput() ?>

    <?= $form->field($model, 'mine_location_id')
        ->dropDownList(
            $mine_location   ,['prompt'=>'Select Mine Location'] 
        ); ?>

    <?= $form->field($model, 'resources_employed')->textInput() ?>

    <?= $form->field($model, 'distance_travelled')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vehicles_used')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cost_incurred')->textInput() ?>


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
         
            $('#dailyworks-mine_location_id').select2();
           

        });
JS;
    $this->registerJS($script);
?>
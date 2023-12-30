<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MineLocation;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Machine */
/* @var $form yii\widgets\ActiveForm */
$mine_location=ArrayHelper::map(MineLocation::find()->where(['is_deleted' => 0])->all(),'mine_location_id','name');

?>
<link rel="stylesheet" href="../css/select2.css">
<div class="machine-form">


   <div class="row">
        <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'machine_name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'mine_location_id')
                    ->dropDownList(
                        $mine_location 
                    ); ?>


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
            $('#machine-mine_location_id').select2();
           
        });
JS;
    $this->registerJS($script);
?>
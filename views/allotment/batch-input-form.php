<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YourModel */  // Replace with the actual model you want to use

$this->title = 'Batch Input Form';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="your-controller-batch-input">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'batch')->textInput(['type' => 'number', 'min' => 2000, 'max' => date('Y')])->label('Enter Batch') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

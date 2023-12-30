<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Docs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docs-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<?= $form->field($model, 'TT')->fileInput()->label("Time Table") ?>
<?= $form->field($model, 'CP')->fileInput()->label("Course") ?>
<?= $form->field($model, 'LP')->fileInput()->label("Lecture") ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

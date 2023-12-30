<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\ProductGrade */

$this->title = 'Update Product Grade: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Grades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->product_grade_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-grade-update">

    <h1><?= Html::encode($this->title) ?></h1>

   
<div class="product-grade-form">
    <div class="row">
                <div class="col-md-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>        

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        
    </div>
</div>

</div>

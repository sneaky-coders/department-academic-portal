<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductComponent */

$this->title = 'Update Product Component: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Product Components', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->product_component_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-component-update">

    <h1><?= Html::encode($this->title) ?></h1>

   
<div class="product-component-form">
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

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Product;
use yii\helpers\ArrayHelper;



/* @var $this yii\web\View */
/* @var $model app\models\ProductComponent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-component-form">
<div class="row">
        <div class="col-md-6">
        <?php $form = ActiveForm::begin(); ?>

        
            
        <?= $form->field($model, 'product_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Product::find()->all(), 'product_id', 'product_name'),
            'options' => ['placeholder' => 'Select Product','lable' => 'Product'],
            'pluginOptions' => [
        
                'allowClear' => true
            ],
        ])->label('Product',['class'=>'label-class']);?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
</div>
</div>

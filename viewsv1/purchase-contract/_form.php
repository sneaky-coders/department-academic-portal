<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Units;
use app\models\MineLocation;
use app\models\Currency;
use app\models\Product;
use app\models\Supplier;

/* @var $this yii\web\View */
/* @var $model app\models\PurchaseContract */
/* @var $form yii\widgets\ActiveForm */
$mine_location=ArrayHelper::map(MineLocation::find()->where(['is_deleted' => 0])->all(),'mine_location_id','name');
$product=ArrayHelper::map(Product::find()->where(['is_delete' => 0])->all(),'product_id','product_name');
$supplier=ArrayHelper::map(Supplier::find()->where(['is_deleted' => 0])->all(),'supplier_id','name');
$units=ArrayHelper::map(Units::find()->where(['is_deleted' => 0])->all(),'unit_id','name');
$currency=ArrayHelper::map(Currency::find()->where(['is_deleted' => 0])->all(),'currency_id','name');

?>
<link rel="stylesheet" href="../css/select2.css">

<div class="purchase-contract-form">
<?php $form = ActiveForm::begin(); ?>
<?= $form->errorSummary($model); ?>
    <div class="row">
        <div class='col-md-6'>
            

            <?= $form->field($model, 'date')->Input('date') ?>

            <?= $form->field($model, 'contract_no')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'supplier_id')
            ->dropDownList(
                $supplier   ,['prompt'=>'Select Supplier'] 
            ); ?>

            <?= $form->field($model, 'product_id',['options' => ['class' => 'product','onChange' => "js:renderComponent()"]])
            ->dropDownList(
                $product   ,['prompt'=>'Select Product'] 
            ); ?>

            <?= $form->field($model, 'product_grade_id')
            ->dropDownList(
                ['prompt'=>'Select Grade']  
            ); ?>

            <?= $form->field($model, 'size')->textInput() ?>

            <?= $form->field($model, 'specification')->textarea(['rows' => 1]) ?>

            <?= $form->field($model, 'unit_id')
                    ->dropDownList(
                        $units   
                    ); ?>

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <div class="col-md-6">
                
                

                <?= $form->field($model, 'quantity')->textInput() ?>   

                <?= $form->field($model, 'mine_location_id')
                        ->dropDownList(
                            $mine_location   ,['prompt'=>'Select Mine Location'] 
                        ); ?>

                <?= $form->field($model, 'currency_id')
                                ->dropDownList(
                                    $currency   
                                ); ?>

                <?= $form->field($model, 'price')->textInput() ?>

                

                <?= $form->field($model, 'vat')->textInput() ?>

                <?= $form->field($model, 'mode_of_payment')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'terms_of_delivery')->textInput(['maxlength' => true]) ?>
        </div>    
        
    </div>
<?php ActiveForm::end(); ?>
</div>
<?php 
    $script = <<< JS
        $(document).ready(function() {
            $('#purchasecontract-supplier_id').select2();
            $('#purchasecontract-product_id').select2();
            $('#purchasecontract-product_grade_id').select2();
            $('#purchasecontract-unit_id').select2();
            $('#purchasecontract-currency_id').select2();
            $('#purchasecontract-mine_location_id').select2();

        });
JS;
    $this->registerJS($script);
?>
<script >
//window.onload = renderComponent;

function renderComponent(){
    document.getElementById('purchasecontract-product_grade_id').innerHTML = '';
    console.log('click');
    var product_id = document.getElementById('purchasecontract-product_id');
    console.log(product_id.value);
    var select = document.getElementById("purchasecontract-product_grade_id"); 
    $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/sales-contract/getcomponents' ?>',
           type: 'post',
           data: {'data':product_id.value},
          
           success: function (val) {
            var result = $.parseJSON(val);
            console.log(result.grades);
            var i = 0;
                while (i < result.grades.length){
                    var opt = result.grades[i].name;
                    var val = result.grades[i].product_grade_id;
                    var el = document.createElement("option");
                    el.textContent = opt;
                    el.value = val;
                    select.appendChild(el);
                    i++;

                }

           }
    })
}

</script>
<?php if(Yii::$app->controller->action->id == "update"){
    ?>
    <script>
         var ele = <?=$model->product_grade_id?>;
        // renderComponent();
        document.getElementById('purchasecontract-product_grade_id').innerHTML = '';
        console.log('click');
        var product_id = document.getElementById('purchasecontract-product_id');
        console.log(product_id.value);
        var select = document.getElementById("purchasecontract-product_grade_id"); 
        $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl. '/purchase-contract/getcomponents' ?>',
            type: 'post',
            data: {'data':product_id.value, '<?=Yii::$app->request->csrfParam?>': '<?=Yii::$app->request->getCsrfToken()?>'},
            
            success: function (val) {
                var result = $.parseJSON(val);
                console.log(result.grades);
                var i = 0;
                    while (i < result.grades.length){
                        var opt = result.grades[i].name;
                        var val = result.grades[i].product_grade_id;
                        var el = document.createElement("option");
                        el.textContent = opt;
                        el.value = val;
                        select.appendChild(el);
                        if(result.grades[i].product_grade_id == ele){
                            select.value = result.grades[i].product_grade_id;
                        }
                        i++;

                    }

            }
        })
    </script>
    <?php
}
?>
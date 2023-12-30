<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Product;
use yii\helpers\ArrayHelper;
use app\models\Currency;
use app\models\Units;
use app\models\Buyer;

/* @var $this yii\web\View */
/* @var $model app\models\SalesContract */
/* @var $form yii\widgets\ActiveForm */
$product=ArrayHelper::map(Product::find()->where(['is_delete' => 0])->all(),'product_id','product_name');
$currency=ArrayHelper::map(Currency::find()->where(['is_deleted' => 0])->all(),'currency_id','name');
$units=ArrayHelper::map(Units::find()->where(['is_deleted' => 0])->all(),'unit_id','name');
$buyer=ArrayHelper::map(Buyer::find()->where(['is_deleted' => 0])->all(),'buyer_id','name');

?>
<link rel="stylesheet" href="../css/select2.css">

<div class="sales-contract-form">
    <div class="row">
    <?php $form = ActiveForm::begin(); ?>
            <?= $form->errorSummary($model); ?>
        <div class="col-md-6">

            
            <?= $form->field($model, 'date')->Input('date') ?>

            <?= $form->field($model, 'contract_no')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'buyer_id')
                ->dropDownList(
                    $buyer   ,['prompt'=>'Select Buyer Name']  
                ); ?>

            <?= $form->field($model, 'buyer_po_no')->textInput(['maxlength' => true]) ?>

            

            <?= $form->field($model, 'product_id',['options' => ['class' => 'product','onChange' => "js:renderComponent()"]])
                    ->dropDownList(
                        $product   ,['prompt'=>'Select Product'] 
                    ); ?>

            <?= $form->field($model, 'product_grade_id')
                    ->dropDownList(
                        ['prompt'=>'Select Grade']  
                    ); ?>

            <?= $form->field($model, 'size')->textInput() ?>

            <?= $form->field($model, 'specification')->textInput(['maxlength' => true]) ?>


            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

        </div>
        <div class=col-md-6>

            <?= $form->field($model, 'units_id')
                ->dropDownList(
                    $units   
                ); ?>
            
            <?= $form->field($model, 'quantity')->textInput() ?>


            <?= $form->field($model, 'destination')->textInput() ?>

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
            $('#salescontract-buyer_id').select2();
            $('#salescontract-product_id').select2();
            $('#salescontract-product_grade_id').select2();
            $('#salescontract-units_id').select2();
            $('#salescontract-currency_id').select2();

        });
JS;
    $this->registerJS($script);
?>
<script >
//window.onload = renderComponent;

function renderComponent(){
    document.getElementById('salescontract-product_grade_id').innerHTML = '';
    console.log('click');
    var product_id = document.getElementById('salescontract-product_id');
    console.log(product_id.value);
    var select = document.getElementById("salescontract-product_grade_id"); 
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
        document.getElementById('salescontract-product_grade_id').innerHTML = '';
        console.log('click');
        var product_id = document.getElementById('salescontract-product_id');
        console.log(product_id.value);
        var select = document.getElementById("salescontract-product_grade_id"); 
        $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl. '/sales-contract/getcomponents' ?>',
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

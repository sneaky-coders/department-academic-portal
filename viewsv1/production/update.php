<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MineLocation;
use yii\helpers\ArrayHelper;
use app\models\Product;
use app\models\ProductionAnalysis;

/* @var $this yii\web\View */
/* @var $model app\models\Production */

$this->title = 'Update Production';
$this->params['breadcrumbs'][] = ['label' => 'Productions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->production_id, 'url' => ['view', 'id' => $model->production_id]];
$this->params['breadcrumbs'][] = 'Update';
$items=ArrayHelper::map(MineLocation::find()->where(['is_deleted' => 0])->all(),'mine_location_id','name');

$product=ArrayHelper::map(Product::find()->where(['is_delete' => 0])->all(),'product_id','product_name');

$product_analysis = ProductionAnalysis::find()->asArray()->where(['production_id' =>$model->production_id])->all();
?>
<link rel="stylesheet" href="../css/select2.css">
<div class="production-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="production-form">
<div class="row">

<div class="col-md-6">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date')->input("date") ?>

    <?= $form->field($model, 'mine_location_id')
        ->dropDownList(
            $items   
        ); ?>

  <?= $form->field($model, 'product_id',['options' => ['class' => 'product','onChange' => "js:renderComponent()"]])
        ->dropDownList(
            $product   ,['prompt'=>'Select Product'] 
        ); ?>

<div id="com">
   
    </div>
    <br>
    <?= $form->field($model, 'quantity')->textInput() ?> 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
</div>


</div>
<?php 
    $script = <<< JS
        $(document).ready(function() {
            $('#production-mine_location_id').select2();
            $('#production-product_id').select2();

        });
JS;
    $this->registerJS($script);
?>
<script>
window.onload = renderComponent;
function renderComponent(){
    
    document.getElementById('com').innerHTML = '';
    var product_id = document.getElementById('production-product_id');
    console.log(product_id.value);

    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var production_id = <?=$model->production_id ?>;
    var model_product_analysis = <?=json_encode($product_analysis);?>;
    console.log("p-an",model_product_analysis);

    // set value
  //  let element = document.getElementById(production-product_name);
    
    $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/production/componentup' ?>',
           type: 'post',
           data: {'data':product_id.value, '_csrf' : csrfToken,'production_id':production_id,'action':'update'},
          
           success: function (val) {
          
            var result = $.parseJSON(val);
           console.log("p-comp",result.comp);
           // console.log(result.product_analysis);
           //console.log(result.comp);

           if(result.comp.length == 0){   
              console.log("no components found");
            }else{   
                var i = 0;
                var newdiv = document.createElement('div');
                newdiv.innerHTML = "<lable class='lable'><b> Analysis </b></lable>";
                document.getElementById('com').appendChild(newdiv);
               
                while (i < result.comp.length) {
                        var newdiv = document.createElement('div');
                        newdiv.innerHTML = "<br><input type='text' value='' id='"+result.comp[i].product_component_id+"' placeholder='"+result.comp[i].name+"' name='comp_value[]' class='form-control'>";
                        document.getElementById('com').appendChild(newdiv);
                console.log("loop");
                i++;
                }
                
                var a = 0;
                while(a < model_product_analysis.length){
                    console.log("loop2");
                    var feild = document.getElementById(model_product_analysis[a].component_id);
                    feild.value = model_product_analysis[a].value;
                    a++;
                }
               
                
            }

            }
    
    
        })
    
}


</script>
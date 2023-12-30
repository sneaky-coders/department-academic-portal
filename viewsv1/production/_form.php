<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MineLocation;
use app\models\Product;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Production */
/* @var $form yii\widgets\ActiveForm */
$items=ArrayHelper::map(MineLocation::find()->where(['is_deleted' => 0])->all(),'mine_location_id','name');

$product=ArrayHelper::map(Product::find()->where(['is_delete' => 0])->all(),'product_id','product_name');

//$mine_location = new Machine();
//echo $product->product_id;
?>

<link rel="stylesheet" href="../css/select2.css">
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

function renderComponent(){
    
    document.getElementById('com').innerHTML = '';
    var product_id = document.getElementById('production-product_id');
    console.log(product_id.value);

    $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl. '/production/component' ?>',
           type: 'post',
           data: {'data':product_id.value},
          
           success: function (val) {
          
            var result = $.parseJSON(val);
           console.log(result.comp);
           //console.log(result.comp);

           if(result.comp.length == 0){   
              console.log("no components found");
            }else{   
                var i = 0;
                var newdiv = document.createElement('div');
                newdiv.innerHTML = "<lable class='lable'><b>Analysis </b> </lable>";
                document.getElementById('com').appendChild(newdiv);
               
                while (i < result.comp.length) {
                    var newdiv = document.createElement('div');

                    newdiv.innerHTML = "<br><input type='text' value='' placeholder='"+result.comp[i].name+"' name='comp_value[]' class='form-control'>";

                    document.getElementById('com').appendChild(newdiv);

                console.log("loop");
                i++;
                }
            }
           


            }
    
    
        })
    
}
</script>
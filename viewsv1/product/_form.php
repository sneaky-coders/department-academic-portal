<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ProductComponent;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
$component = new ProductComponent();
?>

<div class="product-form">
<?php $form = ActiveForm::begin(); ?>
    <div class="row">
    <div class="col-md-6">
    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-9 form-group">
                 <!-- grade -->
             
    <input class="btn btn-primary" class="glyphicon glyphicon-plus"  style ="float:right;"  onClick="addGrade();" type="button" id="add" name="add" value="Add Grade"> 

            </div>
           
            <div class="col-md-3">
              <!-- component -->
        <input class="btn btn-primary"  style ="float:right"  onClick="addCom();" type="button" id="add" name="add" value="Add Components"> 

            </div>
        </div>
    </div>
    
    </div>
    
    <div class="row">
        <div class="col-md-5" id="grade">
        
        </div>
       
        <div class="col-md-5" id="component">
        
        </div>
        <div class="col-md-2">
            </div>
    </div>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end(); ?>
</div>


<script>


function addCom(){
          var newdiv = document.createElement('div');

          newdiv.innerHTML = "<br><input type='text' placeholder='Component' name='component_name[]' class='form-control'>";

          document.getElementById('component').appendChild(newdiv);

}
function addGrade(){
          var newdiv = document.createElement('div');

          newdiv.innerHTML = "<br><input placeholder='Grade' type='text' name='grade_name[]' class='form-control'>";

          document.getElementById('grade').appendChild(newdiv);

}

</script>




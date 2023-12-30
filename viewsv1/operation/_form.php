<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MineLocation;
use yii\helpers\ArrayHelper;
use app\models\Machine;
use app\models\OperationData;


/* @var $this yii\web\View */
/* @var $model app\models\Operation */
/* @var $form yii\widgets\ActiveForm */
//$mine_location = new MineLocation();
$items=ArrayHelper::map(MineLocation::find()->where(['is_deleted' => 0])->all(),'mine_location_id','name');
//$mine_location = new Machine();
?> 
<link rel="stylesheet" href="../css/select2.css">
<body >
    
<div class="operation-form">
<?php $form = ActiveForm::begin(); ?>
<?= $form->errorSummary($model); ?>
<div class="row">
    <div class="col-md-6">
    
   
   
    <?= $form->field($model, 'date')->input('date') ?>

    <?= $form->field($model, 'mine_location_id',['options' => ['onChange' => "js:renderTable()"]])
        ->dropDownList(
            $items ,  ['prompt'=>'Select Mine Location'] 
        ); ?>


    <?= $form->field($model, 'other_costs')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
   

    
  
</div>
    <div class="col-md-6">
        <table id="table" class="table table-striped table-responsive">
                    <label id='label'></label>
                        <tr> 
                                
                            <th id="header_machine"></th>
                            <th id="header_hours"></th>
                            <th id="header_cost"></th>
                            
                        </tr>
                    
                        
        </table>
    </div>
    <?php ActiveForm::end(); ?>
</div>
</div>
</body>
<?php 
    $script = <<< JS
        $(document).ready(function() {
            $('#operation-mine_location_id').select2();
            $('#operation-machine_id').select2();
        });
JS;
    $this->registerJS($script);
?>
<?php if(Yii::$app->controller->action->id == "update"){
    $operationData = OperationData::find()->where(['operation_id' => $model->operation_id])->all();
        ?>
          
        <script>
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
            var location_id = $("#operation-mine_location_id").val();
            console.log(location_id);
            $(".removeRow").remove();
            $.ajax({
                url: '<?php echo Yii::$app->request->baseUrl. '/operation/gettableupdate' ?>',
                type: 'post',
                data: {'data':location_id,'_csrf': csrfToken,'operation_id' : <?=$model->operation_id?>},
                
            success: function (val) {
                var result = $.parseJSON(val);
                console.log(result.data);
                console.log(result.operations);
                var i;
                for (i = 0; i < result.data.length; i++) {
                    if(result.operations[i]){
                        var hours = result.operations[i].hours
                        var cost = result.operations[i].cost_of_machine_operation
                        $("#header_machine").html('Machine');
                        $("#header_hours").html('Hours of Operation');
                        $("#header_cost").html('Machine Cost');
                        $("#table").append("<tr class='removeRow'> <td><h5>"+result.data[i].machine_name+"</h5></td> <td> <input type=\"text\" id=\"operation-hours\" value="+hours+" class=\"form-control\" name=\"Operation[hours][]\" required></td> <td><input type=\"text\" id=\"operation-cost\" value="+cost+" class=\"form-control\" name=\"Operation[cost][]\" required></td> <td><input type=\"hidden\" value='"+result.data[i].machine_id+"' name=\"Operation[machines][]\"></td></tr>");
                    }else{
                        console.log(result.data[i].machine_name);
                    $("#header_machine").html('Machine');
                    $("#header_hours").html('Hours of Operation');
                    $("#header_cost").html('Machine Cost');
                    $("#table").append("<tr class='removeRow'> <td><h5>"+result.data[i].machine_name+"</h5></td> <td> <input type=\"text\" id=\"operation-hours\" class=\"form-control\" name=\"Operation[hours][]\" required></td> <td><input type=\"text\" id=\"operation-cost\" class=\"form-control\" name=\"Operation[cost][]\" required></td> <td><input type=\"hidden\" value='"+result.data[i].machine_id+"' name=\"Operation[machines][]\"></td></tr>");
               
                    }
                } 
            }
            })
                    
        </script>      
    <?php         
          
    }
?>
<script>
function renderTable(){
    var location_id = $("#operation-mine_location_id").val();
    console.log(location_id);
    $(".removeRow").remove();
    $.ajax({
        url: '<?php echo Yii::$app->request->baseUrl. '/operation/gettable' ?>',
        type: 'post',
        data: {'data':location_id},
        
        success: function (val) {
            var result = $.parseJSON(val);
            console.log(result.data[0]);
            var i;
            for (i = 0; i < result.data.length; i++) {
                console.log(result.data[i].machine_name);
                $("#header_machine").html('Machine');
                $("#header_hours").html('Hours of Operation');
                $("#header_cost").html('Machine Cost');
                $("#table").append("<tr class='removeRow'> <td><h5>"+result.data[i].machine_name+"</h5></td> <td> <input type=\"text\" id=\"operation-hours\" class=\"form-control\" name=\"Operation[hours][]\" required></td> <td><input type=\"text\" id=\"operation-cost\" class=\"form-control\" name=\"Operation[cost][]\" required></td> <td><input type=\"hidden\" value='"+result.data[i].machine_id+"' name=\"Operation[machines][]\"></td></tr>");
            } 
        }
    })
}
</script>
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MineLocation;
use app\models\Equipment;
use yii\helpers\ArrayHelper;
use app\models\RawMaterial;
use app\models\MaintenanceQuantity;
use app\models\MaintenanceEquipment;
/* @var $this yii\web\View */
/* @var $model app\models\DailyWorks */
/* @var $form yii\widgets\ActiveForm */
$mine_location=ArrayHelper::map(MineLocation::find()->where(['is_deleted' => 0])->all(),'mine_location_id','name');
$equipment=ArrayHelper::map(Equipment::find()->where(['is_deleted' => 0])->all(),'equipment_id','name');
$raw_material=ArrayHelper::map(RawMaterial::find()->where(['is_deleted' => 0])->all(),'raw_material_id','name');

?>

<link rel="stylesheet" href="../css/select2.css">
<div class="maintenance-form">
<?php $form = ActiveForm::begin(); ?>
<?= $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-md-6">
            

            <?= $form->field($model, 'date')->Input('date') ?>

            <?= $form->field($model, 'mine_location_id')
                ->dropDownList(
                    $mine_location   ,['prompt'=>'Select Mine Location'] 
                ); ?>
            

            <div class="row" style="padding-bottom:15px">
                <div class="col-md-9">
                    <label for="">Equipment</label>
                    <?= Html::dropDownList('equipment', null,
                    $equipment,['prompt'=>'Select Equipment','class' => 'form-control','id' =>'equipment','required']) ?>
                </div>
                <div class="col-md-2" style="padding-top:25px">
                    <?= Html::Button('<span class="glyphicon glyphicon-plus"></span> Add', [
                                    'class' => 'btn btn-success','id' => 'add_equipment']) ?>
                </div>
            </div>

            <div class="row" style="padding-bottom:15px">
                <div class="col-md-6">
                    <label for="">Materials Consumed</label>
                    <?= Html::dropDownList('raw_material', null,
                    $raw_material,['prompt'=>'Select Raw Material','class' => 'form-control','id' =>'raw_material','required']) ?>
                </div>
                <div class='col-md-3'>
                    <label for="">Quantity</label>
                    <input type="text" class="form-control" id='quantity'>
                </div>
                <div class="col-md-2" style="padding-top:25px">
                    <?= Html::Button('<span class="glyphicon glyphicon-plus"></span> Add', [
                                    'class' => 'btn btn-success','id' => 'add_raw_material']) ?>
                </div>
            </div>
            
            <?= $form->field($model, 'nature_of_maintenance')->dropDownList([ 'Vehicle' => 'Vehicle', 'Electrical' => 'Electrical', 'Mechanical' => 'Mechanical', 'Other' => 'Other', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'type_of_maintenance')->dropDownList([ 'Scheduled' => 'Scheduled', 'Breakdown' => 'Breakdown', ], ['prompt' => '']) ?>

            <?= $form->field($model, 'details')->textInput() ?>

            <?= $form->field($model, 'resources_employed')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'other_expenses')->textInput() ?>            

            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            
        </div>
        <div class="col-md-6">
            <table id="table" class="table table-striped table-responsive">
                    <label id='label'></label>
                        <tr>    
                            <th id=""></th>
                            <th id="header_raw_material"></th>
                            <th id=""></th>
                            <th id="header_quantity"></th>
                            <th id=""></th>
                        </tr>
            </table>
            <table id="e-table" class="table table-striped table-responsive">
                    <label id='label'></label>
                        <tr>    
                            <th id=""></th>
                            <th id="header_equipment"></th>
                            
                            <th id=""></th>
                        </tr>
            </table>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
<?php 
    $script = <<< JS
        $(document).ready(function() {
         
            $('#maintenance-mine_location_id').select2();
            $('#raw_material').select2();
            $('#equipment').select2();

        });
JS;
    $this->registerJS($script);
?>

<script>
//add_raw_material
var rm_ids = [];
$('#add_raw_material').click(function(){
    var raw_material_id = $("#raw_material").val();
    var raw_material_name = $("#raw_material :selected").text();
    var quantity = $("#quantity").val();
    console.log(raw_material_id,"==",raw_material_name,"--",quantity);
    if (rm_ids.includes(parseInt(raw_material_id))) {
        console.log('already added');
    }else{
        if(raw_material_id && quantity ){
            $("#header_raw_material").html('Materials Consumed');
            $("#header_quantity").html('Quantity');
            $("#table").append("<tr><td><input type=\"hidden\" value="+raw_material_id+" name=\"Maintenance[raw_material_id][]\"></td><td>"+raw_material_name+"</td><td><input type=\"hidden\" value="+quantity+" name=\"Maintenance[quantity][]\"></td><td>"+quantity+"</td><td><a onclick='return rm("+raw_material_id+")'>Remove</a></td></tr>");
            rm_ids.push(parseInt(raw_material_id));
        }

    }
    console.log(rm_ids);
    
});
// add_equipment
var e_ids = [];
$('#add_equipment').click(function(){

    var equipment_id = $("#equipment").val();
    var equipment_name = $("#equipment :selected").text();
    console.log(equipment_id,"==",equipment_name,"--");
    if (e_ids.includes(parseInt(equipment_id))) {
        console.log('already added');
    }else{
        if(equipment_id){
            $("#header_equipment").html('Equipment');
            $("#e-table").append("<tr><td><input type=\"hidden\" value="+equipment_id+" name=\"Maintenance[equipment_id][]\"></td><td>"+equipment_name+"</td><td><a onclick='return rm("+equipment_id+")'>Remove</a></td></tr>");
            e_ids.push(parseInt(equipment_id));
        }

    }
    console.log(e_ids);
    
});

//remove raw_material
function rm(raw_material_id) {
    $(event.target).closest("tr").remove();
    rm_ids.splice( $.inArray(raw_material_id, rm_ids), 1 );
    console.log(rm_ids);
}

//remove equipment
function rm(equipment_id) {
    $(event.target).closest("tr").remove();
    e_ids.splice($.inArray(equipment_id, e_ids), 1 );
    console.log(e_ids);
}
</script>
<?php 
    if(Yii::$app->controller->action->id == "update"){
    //raw_material
        $maintenance_qty =MaintenanceQuantity::find()->where(['maintenance_id' => $model->maintenance_id])->all();
        if($maintenance_qty){
            foreach($maintenance_qty as $one){
                ?>
                <script>
                    var raw_material_name = '<?=$one->rawMaterial->name?>';
                    $("#header_raw_material").html('Materials Consumed');
                    $("#header_quantity").html('Quantity');
                    $("#table").append("<tr><td><input type=\"hidden\" value="+<?=$one->raw_material_id?>+" name=\"Maintenance[raw_material_id][]\"></td><td>"+raw_material_name+"</td><td><input type=\"hidden\" value="+<?=$one->quantity?>+" name=\"Maintenance[quantity][]\"></td><td>"+<?=$one->quantity?>+"</td><td><a onclick='return rm("+<?=$one->raw_material_id?>+")'>Remove</a></td></tr>");
                    rm_ids.push(parseInt(<?=$one->raw_material_id?>));
                    console.log(rm_ids);
                </script>
                <?php
            }
        }

    //equipments
    $maintenance_equipent =MaintenanceEquipment::find()->where(['maintenance_id' => $model->maintenance_id])->all();
    if($maintenance_equipent){
        foreach($maintenance_equipent as $one){
            ?>
            <script>
                var eq_name = '<?=$one->equipment->name?>';
                $("#header_equipment").html('Equipment');
                $("#e-table").append("<tr><td><input type=\"hidden\" value="+<?=$one->equipment_id?>+" name=\"Maintenance[equipment_id][]\"></td><td>"+eq_name+"</td><td><a onclick='return rm("+<?=$one->equipment_id?>+")'>Remove</a></td></tr>");
                e_ids.push(parseInt(<?=$one->equipment_id?>));
                console.log(e_ids);
            </script>
            <?php
        }
    }
        
    }
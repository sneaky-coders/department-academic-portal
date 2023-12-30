<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\MaintenanceSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaintenanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maintenance Report';
$this->params['breadcrumbs'][] = $this->title;


?>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<h1><?= Html::encode($this->title) ?></h1>
  <?php $form = ActiveForm::begin([
        'method' => 'post',
    ]); ?>
        <div class="row">
            <div class="col-md-2">
              
                <label for="">From Date: </label>
                <input type="date" id="from"  class="form-control" name="from">
            </div>
            <div class="col-md-2">
            <label for="">To Date:</label>
            
            <input type="date" id="to"  class="form-control"  name="to">
            </div>
             <div class="col-md-3">
             <label for="">Nature of Maintenance:</label>
                <select name="nature" class="form-control">
                    <option value="">Select</option>
                    <option value="Vehicle">Vehicle</option>
                    <option value="Electrical">Electrical</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="">Type of Maintenance</label>
                <select name="type" class="form-control">
                    <option value="">Select</option>
                    <option value="Scheduled">Scheduled</option>
                    <option value="Breakdown">Breakdown</option>
                   
                </select>
            </div>
            
            <div class="col-md-2" style="padding:25px 0px 0px 20px;">
                <?= Html::submitButton('Search', ['class' => 'btn btn-success']) ?>
                
            </div>
        </div>
     <?php ActiveForm::end(); ?>
<br>
<div>
<?php
if($dataProvider->totalCount > 0){ ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">date</th>
      <th scope="col">Nature Of Maintenance</th>
      <th scope="col">Type Of Maintenance</th>
      <th scope="col">Equipment</th>
      <th scope="col">Resources Employed</th>
      <th scope="col">Other Expenses</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $x = 1;
foreach($dataProvider->getModels() as $data){
  ?>
  <tr>
  <th scope="row"><?= $x ?></th>
  <td><?= $data->date?> </td>
  <td><?= $data->nature_of_maintenance?> </td>
  <td><?= $data->type_of_maintenance?> </td>
  <td><?= $data->equipment->name?> </td>
  <td><?= $data->resources_employed?> </td>
  <td><?= $data->other_expenses?> </td>
</tr>
<?php
$x++;
}
?> 
  </tbody>
</table>
<?php }else{
    echo "<h3>No Results Found</h3>";
    }?>

</div>
<script>
window.onload = render;

function render(){
  //  var date = new Date("<?php //echo $formatted_date_from; ?>");
    
    // document.getElementById('from').value = '';
    // document.getElementById('to').Date = date.getDate();
    // console.log(date);
   
}

</script>

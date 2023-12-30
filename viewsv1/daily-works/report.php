<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\DailyWorksSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaintenanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daily Works/Jobs Report';
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
             <label for="">Location:</label>
             <input type="text" id="location"class="form-control"  name="location">

            </div>
            <div class="col-md-3">
                <label for="">Nature:</label>
                <input type="text" id="nature"class="form-control"  name="nature">                
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
      <th scope="col">Nature Of Job</th>
      <th scope="col">Location</th>
      <th scope="col">Resources Employed</th>
      <th scope="col">Distance Travelled</th>
      <th scope="col">Vehicles Used</th>
      <th scope="col">Cost Incurred</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
  $x = 1;
  $avg = 0;
foreach($dataProvider->getModels() as $data){
    $avg = $avg + $data->cost_incurred;
  ?>
  <tr>
  <th scope="row"><?= $x ?></th>
  <td><?= $data->date?> </td>
  <td><?= $data->nature_of_job?> </td>
  <td><?= $data->location?> </td>
  <td><?= $data->resources_employed?> </td>
  <td><?= $data->distance_travelled?> </td>
  <td><?= $data->vehicles_used?> </td>
  <td><?= $data->cost_incurred?> </td>
 
</tr>

<?php
$x++;
}
?>
<tr>
  <th scope="row"></th>
  <td> </td>
  <td> </td>
  <td> </td>
  <td></td>
  <td> </td>
  <td><b>Average</b> </td>
  <td><?= $avg/($x-1) ?></td>
</tr> 
  </tbody>
</table>
<?php }else{
    echo "<h3>No Results Found</h3>";
    }?>

</div>


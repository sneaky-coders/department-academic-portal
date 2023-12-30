<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use app\models\DispatchSearch;
use yii\helpers\ArrayHelper;
use app\models\Dispatch;


/* @var $this yii\web\View */
/* @var $searchModel app\models\MaintenanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dispatch Report';
$this->params['breadcrumbs'][] = $this->title;
$product=ArrayHelper::map(Dispatch::find()->where(['is_deleted' => 0])->all(),'productName.product_name','productName.product_name');
$buyer=ArrayHelper::map(Dispatch::find()->where(['is_deleted' => 0])->all(),'buyer.name','buyer.name');



?>
<link rel="stylesheet" href="../css/select2.css">
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
             <div class="col-md-2">

             <label for="">Product:</label>

            <?= Html::dropDownList('product', null,
      $product, ['class' => 'form-control', 'id' => 'product','prompt'=>'Select Product'])?>

             <!-- <input type="text" id="product" class="form-control"  name="product"> -->
 
            </div>

            <div class="col-md-2">
                <label for="">Buyer:</label>
                <?= Html::dropDownList('buyer', null,
      $buyer, ['class' => 'form-control', 'id' => 'buyer','prompt'=>'Select Buyer'])?>
                <!-- <input type="text" id="buyer" class="form-control"  name="buyer"> -->
            </div>
            <div class="col-md-2">
                <label for="">PO NO.:</label>
                <input type="text" id="po_no" class="form-control"  name="po_no">                
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
      <th scope="col">Product</th>
      <th scope="col">Buyer</th>
      <th scope="col">Quantity Dispatched</th>
      <th scope="col">Quantity Received</th>
      <th scope="col">Price</th>
      <th scope="col">PO No.</th>
      <th scope="col">Truck No.</th>
      <th scope="col">Driver's Name</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
  $x = 1;
  $avg = 0;
  $q_dis = 0;
  $q_rec = 0;
foreach($dataProvider->getModels() as $data){
    $avg = $avg + $data->price;
    $q_dis = $q_dis + $data->quantity_dispatched;
    $q_rec = $q_rec + $data->quantity_received;
    
  ?>
  <tr>
  <th scope="row"><?= $x ?></th>
  <td><?= $data->date?> </td>
  <td><?= $data->productName->product_name?> </td>
  <td><?= $data->buyer->name?> </td>
  <td><?= $data->quantity_dispatched?> </td>
  <td><?= $data->quantity_received?> </td>
  <td><?= $data->price?> </td>
  <td><?= $data->po_no?> </td>
  <td><?= $data->truck_no?> </td>
  <td><?= $data->driver_name?> </td>

 
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
  <td><b> Total: <?= $q_dis?></b></td>
  <td><b>Total: <?= $q_rec?></b> </td>
  <td><b>Avg: <?= $avg/($x-1)?></b> </td>
  <td></td>
  <td> </td>
  <td></td>
  
</tr> 
  </tbody>
</table>
<?php }else{
    echo "<h3>No Results Found</h3>";
    }?>

</div>
<?php 
$script = <<< JS
$(document).ready(function() {
  $('#product').select2();
  $('#buyer').select2();
});
JS;
$this->registerJS($script);
?>

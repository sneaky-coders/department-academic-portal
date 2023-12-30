<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GRN */

$this->title = 'Create Grn';
//$this->params['breadcrumbs'][] = ['label' => 'Grns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grn-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        // 'procurement_id'=> $procurement_id, 
        // 'po_no' => $po_no, 
        // 'raw_material' => $raw_material,
        // 'supplier_name' =>$supplier_name
    ]) ?>

</div>

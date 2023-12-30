<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GRNSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grn-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Grn', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'grn_id',
            'sales_contract_id',
            'date',
            'supplier_name',
            'po_no',
            //'raw_material',
            //'quantity_received',
            //'truck_no',
            //'driver_name',
            //'remark:ntext',
            //'created_at',
            //'updated_at',
            //'is_delete',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

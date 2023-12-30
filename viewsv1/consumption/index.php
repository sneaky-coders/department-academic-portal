<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConsumptionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consumption';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consumption-index">

  
<div class="row">
<br>
    <div class="col-md-6">

    <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-md-6 text-right">
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create Consumption', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    </div>
</div>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'consumption_id',
            'date',
            [
                'label' => 'Raw Material',
                'value' => 'rawMaterial.name',
                'attribute' => 'raw_material_id',
                ],
            [
                'label' => 'Mine Location',
                'value' => 'mineLocation.name',
                'attribute' => 'mine_location_id',
                ],
          
           // 'specs',
            'quantity',
            //'price',
            //'cost',
            //'created_at',
            //'updated_at',
            //'is_delete',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

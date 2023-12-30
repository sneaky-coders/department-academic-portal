<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Production';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="production-index">
<br>
<div class="row">

<div class="col-md-6">
    <h1><?= Html::encode($this->title) ?></h1>
</div>
<div class="col-md-6 text-right">
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create Production', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
</div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'production_id',
            'date',
            [
                'label' => 'Mine Location',
                'value' => 'mineLocation.name',
                'attribute' => 'mine_location_id',
                ],
           
            [
                'label' => 'Product Name',
                'value' => 'product.product_name',
                'attribute' => 'product_id',
                ],
            'quantity',
            //'production_analysis_id',
            //'created_at',
            //'updated_at',
            //'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

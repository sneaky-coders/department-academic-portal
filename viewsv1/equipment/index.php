<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-index">
<br>
<div class="row">
    <div class="col-md-6">

    <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <div class="col-md-6 text-right">
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create Equipment', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    </div>
</div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'equipment_id',
            'name',
            [
                'label' => 'Mine Location',
                'value' => 'mineLocation.name',
                'attribute' => 'mine_location_id',
                ],
         //   'created_at',
         //   'updated_at',
          //  'is_deleted',

          ['class' => 'yii\grid\ActionColumn',
          'template' => " {update} {delete}",
         ],
        ],
    ]); ?>


</div>

<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RawMaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Raw Materials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="raw-material-index">

<div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>
        
        </div>
        <div class="col-md-6 text-right">
        <br>
            <p>
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create Raw Material', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'raw_material_id',
            'name',
          //  'created_at',
          //  'updated_at',
          //  'is_deleted',


           [
                'class' => 'yii\grid\ActionColumn',
                'template' => " {update} {delete}",
            ],
        ],
    ]); ?>


</div>

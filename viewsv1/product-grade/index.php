<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductGradeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Product Grades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-grade-index">
<div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>
        
        </div>
        <div class="col-md-6 text-right">
        <br>
            <p>
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create Product Grade', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

         //   'product_grade_id',
            'product.product_name',
            'name',
         //   'created_at',
         //   'updated_at',

            ['class' => 'yii\grid\ActionColumn',
            'template' => " {update} {delete}",
        ],
        ],
    ]); ?>


</div>

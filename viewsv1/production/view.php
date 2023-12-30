<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\ProductionAnalysisSearch;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;


$searchProductionAnalysis = new ProductionAnalysisSearch();
$dataProviderProductionAnalysis = $searchProductionAnalysis->search(Yii::$app->request->queryParams,['pagination' => false]);
$dataProviderProductionAnalysis->query->where(['production_id' => $model->production_id]);

/* @var $this yii\web\View */
/* @var $model app\models\Production */

$this->title = $model->date;
$this->params['breadcrumbs'][] = ['label' => 'Productions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="production-view">
<br>
    <div class="text-right">
    <p>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> Update', ['update', 'id' => $model->production_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-trash"></span> Delete', ['delete', 'id' => $model->production_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    </div>

   
<div class="row">

            <div class=col-md-6>
            <h2>Production</h2>
                    <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                 //   'production_id',
                    'date',
                    [
                        'attribute' => ' mine_location_id ',
                        'value' => $model->mineLocation->name,
                        'label' => 'Mine Location',
                    ],
                    'product.product_name',
                    'quantity',
                // 'production_analysis_id',
                // 'created_at',
                // 'updated_at',
                // 'is_deleted',
                ],
            ]) ?>

            
            </div>

</div>
    
<div class="row">

    <div class="col-md-6">
     <!-- component analysis gridview -->

        <?php
        if ($dataProviderProductionAnalysis->totalCount > 0){

        echo "<h2>Production Analysis</h2>";
        echo GridView::widget([
            'dataProvider' => $dataProviderProductionAnalysis,
            'summary' => '',
        // 'filterModel' => $searchModelComponent,
        
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'label' => 'Component Name',
                    'value' => 'component.name',
                //  'attribute' => 'product_component_id',
                ],
                'value',
                ['class' => 'yii\grid\ActionColumn',
            
                'template' => '{leadVieww} {leadUpdatew}',
            //     'buttons' => [
            //      'leadVieww' => function ($url, $dataProviderProductionAnalysis) {
            //          $url = Url::to(['product-component/view','id' => $dataProviderProductionAnalysis->product_component_id]);
            //         return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => 'view']);
            //      },
            //      'leadUpdatew' => function ($url, $dataProviderProductionAnalysis) {
            //         $url = Url::to(['product-component/update','id' => $dataProviderProductionAnalysis->product_component_id]);
            //        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => 'update']);
            //     },
                
            //   ]
        ],
            
            
            ],


        
        ]);

        }?>

    </div>
</div>    


</div>

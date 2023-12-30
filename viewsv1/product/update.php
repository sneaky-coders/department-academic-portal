<?php

use yii\helpers\Html;
use app\models\ProductComponent;
use app\models\ProductComponentSearch;
use app\models\ProductGradeSearch;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Update Product: ' . $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_name, 'url' => ['view', 'id' => $model->product_id]];
$this->params['breadcrumbs'][] = 'Update';
// components
$searchModelComponent = new ProductComponentSearch();
$dataProviderComponent = $searchModelComponent->search(Yii::$app->request->queryParams);
$dataProviderComponent->query->where(['product_id' => $model->product_id]);

// grade
$searchModelGrade = new ProductGradeSearch();
$dataProviderGrade  = $searchModelGrade ->search(Yii::$app->request->queryParams);
$dataProviderGrade->query->where(['product_id' => $model->product_id]);
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ])
   
?>
<div class="row">
      <!-- Component Grid -->
      <div class="col-md-6">
      <?php
     //component gridview
if ($dataProviderComponent->totalCount > 0){

echo "<h2>Components</h2>";
echo GridView::widget([
    'dataProvider' => $dataProviderComponent,
   // 'filterModel' => $searchModelComponent,
  
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
       
      // 'product_component_id',
      //  'product_id',
        'name',
      //  'created_at',
      //  'updated_at',

        ['class' => 'yii\grid\ActionColumn',
       
        'template' => '{leadVieww} {leadUpdatew}',
        'buttons' => [
         'leadVieww' => function ($url, $dataProviderComponent) {
             $url = Url::to(['product-component/view','id' => $dataProviderComponent->product_component_id]);
            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => 'view']);
         },
         'leadUpdatew' => function ($url, $dataProviderComponent) {
            $url = Url::to(['product-component/update','id' => $dataProviderComponent->product_component_id]);
           return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => 'update']);
        },
         
      ]],
    
    
    ],


   
]);

}?>
      </div>
      <!-- Grade Grid -->
      <div class="col-md-6">
          <?php
// grade Gridview
if ($dataProviderGrade->totalCount > 0){

    echo "<h2>Grades</h2>";
    echo GridView::widget([
        'dataProvider' => $dataProviderGrade,
       // 'filterModel' => $searchModelComponent,
      
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
           
          // 'product_component_id',
          //  'product_id',
            'name',
          //  'created_at',
          //  'updated_at',
    
            ['class' => 'yii\grid\ActionColumn',
           
            'template' => '{leadVieww} {leadUpdatew}',
            'buttons' => [
             'leadVieww' => function ($url, $dataProviderGrade) {
                 $url = Url::to(['product-grade/view','id' => $dataProviderGrade->product_grade_id]);
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, ['title' => 'view']);
             },
             'leadUpdatew' => function ($url, $dataProviderGrade) {
                $url = Url::to(['product-grade/update','id' => $dataProviderGrade->product_grade_id]);
               return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, ['title' => 'update']);
            },
             
          ]],
        
        
        ],
    
    
       
    ]);
    
    }
?>
    
      </div>
</div>

 

</div>












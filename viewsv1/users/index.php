<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">
<div class="row">
        <div class="col-md-6">
            <h1><?= Html::encode($this->title) ?></h1>
        
        </div>
        <div class="col-md-6 text-right">
        <br>
            <p>
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create User', ['create'], ['class' => 'btn btn-success']) ?>
            </p>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'user_id',
            'username',
          //  'password:ntext',
            'name',
            'email:email',
            [
                'header' => '',
                'content' => function($model) {
                    return Html::a(' Change Password', ['change-password-admin', 'id'=>$model->user_id]);
                }           
            ],
            //'created_at',
            //'updated_at',
            //'is_deleted',

            ['class' => 'yii\grid\ActionColumn',
            
            'template' => " {update} {delete}",
        ],
        ],
    ]); ?>


</div>

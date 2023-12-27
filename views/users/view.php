<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

    <h1><?= Html::encode($this->title) ?></h1>

 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'user_id',
            [
                'attribute'=>'',
                'value'=> Yii::$app->request->baseUrl.'/uploads/'.$model->profile,
                'format' => ['image'],
             ],
            'username',
            'password',
            'email:email',
            'usn',
            'batch',
            'ismentor',
            'hasMentor',
            'xcgpa',
            'xiicgpa',
            'bachelorcgpa',
            'sem1cgpa',
            'sem2cgpa',
            'sem3cgpa',
            'sem4cgpa',
            'mentor_id',
           

            'level',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

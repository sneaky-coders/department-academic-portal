<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Certificationcourse */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Certificationcourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="certificationcourse-view">

    <h1><?= Html::encode($this->title) ?></h1>

   

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'certificate',
            'score',
            'marks',
            'certificate1',
            'created_at',
            'updated_at',
            'user_id',
            'mentor_id',
        ],
    ]) ?>

</div>

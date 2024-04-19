<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Internship */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Internships', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="internship-view">

    <h1><?= Html::encode($this->title) ?></h1>

 

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'mentor_id',
            'company',
            'startdate',
            'enddate',
            'hours',
            'certificate',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

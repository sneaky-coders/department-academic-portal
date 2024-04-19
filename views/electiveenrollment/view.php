<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Electiveenrollment */

$this->title = $model->id;

\yii\web\YiiAsset::register($this);
?>
<div class="electiveenrollment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            'elective1',
            'elective2',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>

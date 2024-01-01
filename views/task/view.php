<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Task */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

// Custom CSS for styling
$css = <<<CSS
.task-view {
    padding: 20px;
}

.panel {
    border: 1px solid #ddd;
    border-radius: 8px;
    margin-top: 20px;
}

.panel-heading {
    background-color: #007bff;
    color: #fff;
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
}

.panel-title {
    font-size: 18px;
}

.panel-body {
    padding: 15px;
}

.btn-action {
    margin-top: 10px;
    width: 100%;
}
CSS;

$this->registerCss($css);

?>

<div class="task-view">
    <div class="row">
        <div class="col-md-8">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'title',
                    'description:ntext',
                    [
                        'attribute' => 'created_at',
                        'format' => ['datetime', 'php:d-M-Y H:i:s'],
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => ['datetime', 'php:d-M-Y H:i:s'],
                    ],
                ],
                'options' => ['class' => 'table table-bordered detail-view'],
                'template' => '<tr><th{captionOptions}>{label}</th><td{contentOptions}>{value}</td></tr>',
            ]) ?>
        </div>

     
    </div>
</div>

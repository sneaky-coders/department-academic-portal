<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = 'DeadLines';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        overflow: hidden;
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: scale(1.02);
    }

    .card-header {
        background-color: #007bff;
        color: #fff;
        padding: 15px;
        border-bottom: 1px solid #ddd;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .card-body {
        padding: 15px;
    }

    .card-title {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .card-attribute {
        color: #555;
        margin-bottom: 5px;
    }

    .btn-details {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 8px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .btn-details:hover {
        background-color: #218838;
    }
</style>

<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <?php foreach ($tasks as $task): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= Html::encode($task->title) ?></h3>
                    </div>
                    <div class="card-body">
                        <?= DetailView::widget([
                            'model' => $task,
                            'attributes' => [
                                [
                                    'label' => 'Title',
                                    'value' => $task->title,
                                    'options' => ['class' => 'card-attribute'],
                                ],
                                [
                                    'label' => 'Description',
                                    'value' => $task->description,
                                    'options' => ['class' => 'card-attribute'],
                                ],
                                // Add more attributes as needed
                            ],
                        ]) ?>
                        <?= Html::a('View Details', ['task/view', 'id' => $task->id], ['class' => 'btn btn-details']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?= \edofre\fullcalendar\Fullcalendar::widget([
    'events' => $events,
    'clientOptions' => [
        'eventRender' => new \yii\web\JsExpression('function(event, element) {
            element.css("background-color", "green");
            element.find(".fc-title").append("<br/><span style=\'font-size:12px;\'><strong>Description:</strong> " + event.desciption + "</span>");
        }'),
    ],
]); ?>

</div>
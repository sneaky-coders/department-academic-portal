<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $timetableData app\models\Timetable[] */

$this->title = 'Random Timetable';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-random-timetable">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Generate Random Timetable', ['generate-random-timetable'], ['class' => 'btn btn-success', 'id' => 'generate-button']) ?>

    <br><br>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $timetableData,
            'pagination' => false,
        ]),
        'columns' => [
            'id',
            'course_id',
            'faculty_id',
            'time_slot',
            // Add other columns as needed
        ],
    ]); ?>

</div>

<?php
$js = <<<JS
$('#generate-button').click(function() {
    // You can add AJAX logic here to trigger the generation process
    alert('Generating random timetable...');
});
JS;
$this->registerJs($js);
?>

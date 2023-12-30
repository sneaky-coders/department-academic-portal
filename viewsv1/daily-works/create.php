<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DailyWorks */

$this->title = 'Create Daily Works/Jobs';
$this->params['breadcrumbs'][] = ['label' => 'Daily Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daily-works-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

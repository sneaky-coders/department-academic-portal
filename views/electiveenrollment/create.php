<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Electiveenrollment */

$this->title = 'Elective Enrollment';
$this->params['breadcrumbs'][] = ['label' => 'Electiveenrollments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="electiveenrollment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

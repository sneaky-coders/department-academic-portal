<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Facultyallotment */

$this->title = 'Create Facultyallotment';
$this->params['breadcrumbs'][] = ['label' => 'Facultyallotments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="facultyallotment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

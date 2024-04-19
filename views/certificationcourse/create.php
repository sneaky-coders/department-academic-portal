<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Certificationcourse */

$this->title = 'Create Certificationcourse';
$this->params['breadcrumbs'][] = ['label' => 'Certificationcourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="certificationcourse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

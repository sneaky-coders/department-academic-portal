<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\GRN */

$this->title = 'Update GRN';
//$this->params['breadcrumbs'][] = ['label' => 'Grns', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->grn_id, 'url' => ['view', 'id' => $model->grn_id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="grn-update">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

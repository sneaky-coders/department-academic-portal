<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="row">

    <div class="col-md-6">

        <h2>Change Password</h2>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'password1')->passwordInput() ?>

        <?= $form->field($model, 'password2')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>

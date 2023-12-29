<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Users;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Faculty */
/* @var $form yii\widgets\ActiveForm */

// Generate the URL for the AJAX request
$url = Url::to(['/faculty/get-user-details']);

$script = <<< JS
    $('#faculty-user_id').change(function() {
        var userId = $(this).val();
        if (userId !== '') {
            $.ajax({
                url: '{$url}',
                type: 'GET',
                data: {id: userId},
                dataType: 'json',
                success: function(data) {
                    console.log('AJAX success:', data);

                    // Populate other form fields with the fetched data
                    $('#faculty-name').val(data.name);
                    $('#faculty-email').val(data.email);
                    $('#faculty-contact').val(data.contact);
                    // Add or remove attributes as needed
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('AJAX Error:', textStatus, errorThrown);
                }
            });
        }
    });
JS;

$this->registerJs($script, yii\web\View::POS_READY);
?>

<div class="faculty-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(
        ArrayHelper::map(Users::find()->all(), 'id', 'username'),
        ['prompt' => 'Select User']
    )->label('Username') ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Name') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Email') ?>

    <?= $form->field($model, 'contact')->textInput()->label('Contact') ?>

    <?= $form->field($model, 'staffid')->textInput(['maxlength' => true])->label('Staff ID') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

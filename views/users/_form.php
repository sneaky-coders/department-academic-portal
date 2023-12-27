<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Mentor;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'usn')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'xcgpa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'xiicgpa')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'bachelorcgpa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sem1cgpa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sem2cgpa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sem3cgpa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sem4cgpa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profile')->fileInput() ?>



    <?= $form->field($model, 'level')->dropDownList(['prompt'=>'Select User Type',1=>'Admin',2=>'Faculty',3=>'Student',4=>'Tester']); ?>

    <?= $form->field($model, 'ismentor')->dropDownList(['prompt'=>'Select If You Are Mentor','Yes' => 'Yes', 'No' => 'No']); ?>

    <?= $form->field($model, 'hasMentor')->dropDownList(['prompt'=>'Select If You Have A Mentor','Yes' => 'Yes', 'No' => 'No']); ?>

    <?php $client = Mentor::find()->all();
 
 $data = ArrayHelper::map($client, 'id','name');
 
?>
<?= $form->field($model, 'mentor_id')->widget(Select2::classname(), [
'data' => $data,
'language' => 'en',
'options' => ['placeholder' => 'Search Mentor'],
'pluginOptions' => [
'allowClear' => true
],
]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

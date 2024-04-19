
<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Mentor;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Internship */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="internship-form" style="width:30%; display:block;">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

  
    <?php
  

$id= yii::$app->user->identity->user_id;


echo $form->field($model, 'user_id')

  ->hiddenInput(['value' => $id])

  ->label(false);
  


?>

    <?php $client = Mentor::find()->all();
 
 $data = ArrayHelper::map($client, 'id','name');
 
?>
<?= $form->field($model, 'mentor_id')->widget(Select2::classname(), [
'data' => $data,
'language' => 'en',
'options' => ['placeholder' => 'Search Client ...'],
'pluginOptions' => [
'allowClear' => true
],
]); ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'startdate')->textInput(['type' => 'date', 'placeholder' => 'Select Start Date ...']) ?>

<?= $form->field($model, 'enddate')->textInput(['type' => 'date', 'placeholder' => 'Select End Date ...']) ?>


    <?= $form->field($model, 'hours')->textInput() ?>

    <?= $form->field($model, 'certificate')->fileInput() ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

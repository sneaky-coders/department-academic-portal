
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

<div class="certificationcourse-form" style="width:30%; display:block;">

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
'options' => ['placeholder' => 'Search Mentor ...'],
'pluginOptions' => [
'allowClear' => true
],
]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'score')->textInput()->label("Percent Scored") ?>
    <?= $form->field($model, 'marks')->textInput()->label("Marks Scored") ?>


    <?= $form->field($model, 'certificate')->fileInput()->label("Completion Certificate") ?>
    <?= $form->field($model, 'certificate1')->fileInput()->label("Grade Certificate") ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


<script>

$("#Certificationcourse-score").keyup(function(){
        estimat =  parseInt($("#Certificationcourse-score").val())
        advance =  parseInt($("#Certificationcourse-marks").val())
        $('#Certificationcourse-marks').val(estimat)

  });





</script>


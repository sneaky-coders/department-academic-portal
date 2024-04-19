<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Electiveenrollment;

/* @var $this yii\web\View */
/* @var $model app\models\Electiveenrollment */
/* @var $form yii\widgets\ActiveForm */

$fullstck = Electiveenrollment::find()->Where(['elective1' => 'Full Stack Development'])->count();
$iot = Electiveenrollment::find()->Where(['elective1' => 'Internet Of Things'])->count();
$django = Electiveenrollment::find()->Where(['elective2' => 'Django Framework'])->count();


?>

<div class="electiveenrollment-form">
    

<div class="col-md-6">

<?php $form = ActiveForm::begin(); ?>

<?php


$id= yii::$app->user->identity->user_id;


echo $form->field($model, 'user_id')

->hiddenInput(['value' => $id])

->label(false);



?>
<?php 
if ($fullstck >= 30 && $iot >=30) {
    echo $form->field($model, 'elective1')->dropDownList(
        ['prompt' => 'Select Elective 1', 
        'Blockchain Technology' => 'Blockchain Technology', 
        'Management & Entrepreneurship for IT Industry' => 'Management & Entrepreneurship for IT Industry']);
}

elseif ($fullstck >=30)
{
    echo $form->field($model, 'elective1')->dropDownList(
        ['prompt' => 'Select Elective 1', 
        'Blockchain Technology' => 'Blockchain Technology', 
        'Management & Entrepreneurship for IT Industry' => 'Management & Entrepreneurship for IT Industry',
        'Internet Of Things' => 'Internet Of Things']);
}

elseif ($iot >=30)
{
    echo $form->field($model, 'elective1')->dropDownList(
        ['prompt' => 'Select Elective 1', 
        'Blockchain Technology' => 'Blockchain Technology', 
        'Management & Entrepreneurship for IT Industry' => 'Management & Entrepreneurship for IT Industry',
        'Full Stack Development' => 'Full Stack Development']);
}

else
{
    echo $form->field($model, 'elective1')->dropDownList(
        ['prompt' => 'Select Elective 1', 
        'Blockchain Technology' => 'Blockchain Technology', 
        'Management & Entrepreneurship for IT Industry' => 'Management & Entrepreneurship for IT Industry', 
        'Full Stack Development' => 'Full Stack Development', 
        'Internet Of Things' => 'Internet Of Things']);
}
?>
<?php 
if ($django >=30)
{
    echo $form->field($model, 'elective2')->dropDownList(
        ['prompt' => 'Select Elective 2', 
        'DevOps' => 'DevOps',
        'Artificial Intelligence' => 'Artificial Intelligence',
        'Software Project Management' => 'Software Project Management']);
        
}

else
{
    echo $form->field($model, 'elective2')->dropDownList(
        ['prompt' => 'Select Elective 2', 
        'Django Framework' => 'Django Framework', 
        'DevOps' => 'DevOps',
        'Artificial Intelligence' => 'Artificial Intelligence',
        'Software Project Management' => 'Software Project Management']);
}
?>

<div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>





   

</div>

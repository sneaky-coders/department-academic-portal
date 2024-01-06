<?php
use app\models\Mentor;
use app\models\Users;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YourModel */
// Replace with the actual model you want to use

$this->title = 'Custom Mentee Allotment';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="allotment-form">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    

    <?php
        $client = Mentor::find()->all();
        $client1 = Users::find()->all();

        $data = ArrayHelper::map($client, 'id', 'name');
        $data1 = ArrayHelper::map($client1, 'user_id', 'username');

    ?>
<?= $form->field($model, 'mentor_id')->widget(Select2::classname(), [
    'data' => $data,
    'language' => 'en',
    'options' => ['placeholder' => 'Search Mentor'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>


<?= $form->field($model, 'mentee_id')->widget(Select2::classname(), [
    'data' => $data1,
    'language' => 'en',
    'options' => ['placeholder' => 'Search Mentee'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]); ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

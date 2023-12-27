<?php


use rce\material\widgets\Card;
/* @var $this yii\web\View */

use app\models\User;
use practically\chartjs\Chart;
use deyraka\materialdashboard\widgets\CardChart;
use yii\helpers\Url;
use dosamigos\chartjs\ChartJs;
use miloschuman\highcharts\Highcharts;
use app\models\Questions;
use app\models\Register;
use app\models\Test;
use app\models\Users;
use app\models\Event;
use app\models\Set1;
use app\models\Set2;
use app\models\Allotment;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;
use yii\web\JsExpression;
use app\models\Electiveenrollment;




$this->registerJsFile('https://cdn.jsdelivr.net/npm/chart.js');

?>
<div class="site-index">

    <?php
    $fullstck = Electiveenrollment::find()->Where(['elective1' => 'Full Stack Development'])->count();
    $iot = Electiveenrollment::find()->Where(['elective1' => 'Internet Of Things'])->count();
    $django = Electiveenrollment::find()->Where(['elective2' => 'Django Framework'])->count();
    $mentees1 = Users::find()->where(['hasMentor' => 'Yes'])->andWhere(['batch' => 2024])->orderBy(['bachelorCGPA' => SORT_DESC])->count();
    $model = new Event();
    $user_id = Yii::$app->user->identity->user_id;
    $total_score = Set2::find()->Where(['user_id' => $user_id])->andWhere(['category' => 'Set2'])->sum('total');
    $out_of = Set2::find()->Where(['user_id' => $user_id])->andWhere(['category' => 'Set2'])->count();
    $out = 25;
    $total_out = 25 * ($out_of);

    $total_score1 = Set1::find()->Where(['user_id' => $user_id])->andWhere(['category' => 'Set1'])->sum('total');
    $out_of1 = Set1::find()->Where(['user_id' => $user_id])->andWhere(['category' => 'Set1'])->count();
    $out1 = 25;
    $total_out1 = 25 * ($out_of1);

    #$invoices_count = Invoice::find()->where(['user_id' => $user_id ])->count();
    # $students = Students::find()->count();
    #$teachers = Teacher::find()->count();
    #$parents = Parents::find()->count();
    #$expense = Expense::find()->sum('amount');

    $questions = Questions::find()->count();
    $students = Register::find()->count();
    $res = Set2::find()->count();
    $user = Users::find()->where(['level' => 1])->count();
    $user1 = Users::find()->where(['level' => 3])->count();
    $ment = Allotment::find()->count();
    $batch2023 = Users::find()->where(['level' => 3])->andWhere(['batch' => '2023'])->count();
    $batch2024 = Users::find()->where(['level' => 3])->andWhere(['batch' => '2024'])->count();
    $mentid = Yii::$app->user->identity->mentor_id;
    $ment1 = Users::find()->where(['level' => 3])->andWhere(['mentor_id' => $mentid])->andWhere(['hasMentor' => 'Yes'])->andWhere(['batch' => 2023])->count();
    $ment2 = Users::find()->where(['level' => 3])->andWhere(['mentor_id' => $mentid])->andWhere(['hasMentor' => 'Yes'])->andWhere(['batch' => 2024])->count();
    $mentname = Yii::$app->user->identity->username;

    $mapleLabels = array_column($mapleData, 'usn');
    $mapleScores = array_column($mapleData, 'total');
    $mapleLabelsJson = json_encode($mapleLabels);
    $mapleScoresJson = json_encode($mapleScores);

    $accentureLabels = array_column($accentureData, 'usn');
    $accentureScores = array_column($accentureData, 'total');
    $accentureLabelsJson = json_encode($accentureLabels);
    $accentureScoresJson = json_encode($accentureScores);

    $js = <<< JS
    var ctxMaple = document.getElementById('mapleGraph').getContext('2d');
    var mapleChart = new Chart(ctxMaple, {
        type: 'bar',
        data: {
            labels: $mapleLabelsJson,
            datasets: [{
                label: 'Set1 Scores',
                data: $mapleScoresJson,
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
    var ctxAccenture = document.getElementById('accentureGraph').getContext('2d');
    var accentureChart = new Chart(ctxAccenture, {
        type: 'bar',
        data: {
            labels: $accentureLabelsJson,
            datasets: [{
                label: 'Set2 Scores',
                data: $accentureScoresJson,
                backgroundColor: 'rgba(255, 99, 132, 0.7)',
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    JS;

    $this->registerJs($js);


    ?>

    

    <div class="body-content">
        <?php



        ?>
        <div class="row">
            <div class="col-md-2 col-sm-6 col-xs-12">
                <?php
                if (Yii::$app->user->identity->level == 1 || Yii::$app->user->identity->level == 2) {
                    echo \insolita\wgadminlte\LteSmallBox::widget([
                        'type' => \insolita\wgadminlte\LteConst::COLOR_YELLOW,
                        'title' => $fullstck,
                        'text' => 'Full Stack Enrolled',
                        'icon' => 'fa fa-book',
                        'footer' => 'More info</i>',
                        'link' => \yii\helpers\Url::to("#")
                    ]);
                } else {
                }
                ?>
            </div>

            <div class="col-md-2 col-sm-6 col-xs-12">
                <?php
                if (Yii::$app->user->identity->level == 1 || Yii::$app->user->identity->level == 2) {
                    echo \insolita\wgadminlte\LteSmallBox::widget([
                        'type' => \insolita\wgadminlte\LteConst::COLOR_LIGHT_BLUE,
                        'title' =>  $iot,
                        'text' => 'Internet Of Things Enrolled',
                        'icon' => 'fa fa-users',
                        'footer' => 'More info</i>',
                        'link' => \yii\helpers\Url::to("#")
                    ]);
                } else {
                }
                ?>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12">
                <?php
                if (Yii::$app->user->identity->level == 1 || Yii::$app->user->identity->level == 2) {
                    echo \insolita\wgadminlte\LteSmallBox::widget([
                        'type' => \insolita\wgadminlte\LteConst::COLOR_MAROON,
                        'title' => $django,
                        'text' => 'Django Enrolled',
                        'icon' => 'fa fa-user',
                        'footer' => 'More info</i>',
                        'link' => \yii\helpers\Url::to("#")
                    ]);
                } else {
                }
                ?>
            </div>
            <div class="col-md-2 col-sm-6 col-xs-12">
                <?php
                if (Yii::$app->user->identity->level == 1 || Yii::$app->user->identity->level == 2) {
                    echo \insolita\wgadminlte\LteSmallBox::widget([
                        'type' => \insolita\wgadminlte\LteConst::COLOR_GREEN,
                        'title' => $ment,
                        'text' => 'Mentors Alloted',
                        'icon' => 'fa fa-money',
                        'footer' => 'More info</i>',
                        'link' => \yii\helpers\Url::to("#")
                    ]);
                } else {
                }
                ?>
            </div>

            <div class="col-md-2 col-sm-6 col-xs-12">
                <?php
                if (Yii::$app->user->identity->level == 1 || Yii::$app->user->identity->level == 2) {
                    echo \insolita\wgadminlte\LteSmallBox::widget([
                        'type' => \insolita\wgadminlte\LteConst::COLOR_GREEN,
                        'title' => $ment1,
                        'text' => $mentname . '(Mentees 2023)',
                        'icon' => 'fa fa-money',
                        'footer' => 'More info</i>',
                        'link' => \yii\helpers\Url::to("#")
                    ]);
                } else {
                }
                ?>
            </div>



            <div class="col-md-2 col-sm-6 col-xs-12">
                <?php
                if (Yii::$app->user->identity->level == 1 || Yii::$app->user->identity->level == 2) {
                    echo \insolita\wgadminlte\LteSmallBox::widget([
                        'type' => \insolita\wgadminlte\LteConst::COLOR_GREEN,
                        'title' => $ment2,
                        'text' => $mentname . '(Mentees 2024)',
                        'icon' => 'fa fa-money',
                        'footer' => 'More info</i>',
                        'link' => \yii\helpers\Url::to("#")
                    ]);
                } else {
                }
                ?>
            </div>










        </div>
        <div class="col-md-4">

            <?php \insolita\wgadminlte\CollapseBox::begin([
                'type' => \insolita\wgadminlte\LteConst::TYPE_INFO,
                'collapseRemember' => true,
                'collapseDefault' => false,
                'isSolid' => true,
                'boxTools' => '<button class="btn btn-success btn-xs create_button" ><i class="fa fa-bell"></i> 2</button>',
                'tooltip' => 'Описание содаржимого',
                'title' => 'Notifications',
                'footer' => 'Login Bugs Fixes',
            ]) ?>
            Added Change Password Feature
            <?php \insolita\wgadminlte\CollapseBox::end() ?>


        </div>


        <div class="col-md-4">

            <?php \insolita\wgadminlte\CollapseBox::begin([
                'type' => \insolita\wgadminlte\LteConst::TYPE_INFO,
                'collapseRemember' => true,
                'collapseDefault' => false,
                'isSolid' => true,
                'boxTools' => '<button class="btn btn-success btn-xs create_button" ><i class="fa fa-calendar"></i> 2</button>',
                'tooltip' => 'Описание содаржимого',
                'title' => 'Upcoming Events',
                'footer' => 'Placement Preparation Test',
            ]) ?>
            Weekly Mock Test
            <?php \insolita\wgadminlte\CollapseBox::end() ?>


        </div>


        <div class="col-md-4">

            <?php \insolita\wgadminlte\CollapseBox::begin([
                'type' => \insolita\wgadminlte\LteConst::TYPE_INFO,
                'collapseRemember' => true,
                'collapseDefault' => false,
                'isSolid' => true,
                'boxTools' => '<button class="btn btn-success btn-xs create_button" ><i class="fa fa-school"></i> 2</button>',
                'tooltip' => 'Описание содаржимого',
                'title' => 'Your Latest Scores',
                'footer' => 'Your Set2 Score :' . $total_score . '/' . $total_out,
            ]) ?>
            Your Set1 Score : <?php echo $total_score1 . '/' . $total_out1 ?>
            <?php \insolita\wgadminlte\CollapseBox::end() ?>


        </div>

























    </div>



    <div class="col-md-6">



        <div class="graph-container">
            <canvas id="mapleGraph"></canvas>
        </div>

    </div>



    <div class="col-md-6">



        <div class="graph-container">
            <canvas id="accentureGraph"></canvas>
        </div>

    </div>














</div>

<?php

if (Yii::$app->user->identity->level == 3) {
    echo '<script src="//code.tidio.co/c0rhdns4svhui6il4vfl6p7fb6b8wch7.js" async></script>';
}

?>
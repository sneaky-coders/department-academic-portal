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

use app\models\Users;
use app\models\Event;

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
   
    $user_id = Yii::$app->user->identity->user_id;
   

    #$invoices_count = Invoice::find()->where(['user_id' => $user_id ])->count();
    # $students = Students::find()->count();
    #$teachers = Teacher::find()->count();
    #$parents = Parents::find()->count();
    #$expense = Expense::find()->sum('amount');

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
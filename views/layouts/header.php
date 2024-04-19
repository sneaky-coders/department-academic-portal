<?php

use yii\helpers\Html;
use app\models\Users;
use app\models\Task;
use yii\bootstrap\BootstrapAsset;
use yii\bootstrap\BootstrapPluginAsset;

/* @var $this \yii\web\View */
/* @var $content string */

$user = Yii::$app->user->identity;

// Retrieve the latest 3 notifications related to tasks
$taskNotifications = Task::find()
    ->orderBy(['created_at' => SORT_DESC])
    ->limit(3)
    ->all();

BootstrapAsset::register($this);
BootstrapPluginAsset::register($this);

?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">BO</span><span class="logo-lg">' .'Academic Portal' . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

                <!-- Messages: style can be found in dropdown.less-->
                
                
               
                <!-- Tasks: style can be found in dropdown.less -->
              
            
                <!-- User Account: style can be found in dropdown.less -->
                <!-- guest -->
                <?php if (Yii::$app->user->isGuest) {
    ?>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      
                        <span class="hidden-xs">login</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                       
                        <!-- Menu Body -->
                        <li class="user-body">
                   
                    <div class="pull-right">
                                <?= Html::a(
                                    'Login',
                                    ['/site/login'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                  </li>
                        <!-- Menu Footer-->
                    
                    </ul>
                </li>
                <!-- user -->
                <?php 
                }else{
                   $user=Users::find()->where(['user_id' => Yii::$app->user->id])->one();
                ?>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      
                        <span class="hidden-xs">Hello, <?=$user->username ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        
                       
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <!-- <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                            </div> -->
                            <div class="pull-left">
                                <?= Html::a(
                                    'Update Password',
                                    ['/users/change-password'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>

                         <!-- Notifications Dropdown -->
                  
                    </ul>
                </li>

                <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning"><?= count($taskNotifications) ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have <?= count($taskNotifications) ?> latest task notifications</li>
                            <li>
                                <ul class="menu">
                                    <?php foreach ($taskNotifications as $notification) : ?>
                                        <li>
                                            <a href="#">
                                 
                                                <i class="fa fa-tasks text-blue"></i> <?= Html::encode($notification->description) ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                <?php
                }?>
                <!-- User Account: style can be found in dropdown.less -->
                <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>

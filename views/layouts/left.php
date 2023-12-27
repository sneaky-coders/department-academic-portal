<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left info">
                <p></p>
                <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <?php
        if (!Yii::$app->user->isGuest) {

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree'],
                    'items' => [
                        ['label' => 'Dashboard', 'icon' => 'circle-o', 'url' => ['/site/index'],],
                    ],
                ]
            );


            // Navbar links for Admin
            if (Yii::$app->user->identity->level == 1) {

                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Elective Enrollment',
                                'icon' => 'book',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Enroll', 'icon' => 'circle-o', 'url' => ['/electiveenrollment/create'],],
                                    ['label' => 'View Enrolled', 'icon' => 'circle-o', 'url' => ['/electiveenrollment'],],




                                ],
                            ],
                        ],
                    ]
                );


                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Users',
                                'icon' => 'bug',
                                'url' => '#',
                                'items' => [
                                   
                                    ['label' => 'View Users', 'icon' => 'circle-o', 'url' => ['/users'],],




                                ],
                            ],
                        ],
                    ]
                );


                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Academic Documents',
                                'icon' => 'bug',
                                'url' => '#',
                                'items' => [
                                   
                                    ['label' => 'Upload', 'icon' => 'circle-o', 'url' => ['/docs/create'],],
                                    ['label' => 'View', 'icon' => 'circle-o', 'url' => ['/docs'],],




                                ],
                            ],
                        ],
                    ]
                );


                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Students',
                                'icon' => 'bug',
                                'url' => '#',
                                'items' => [
                                   
                                    ['label' => 'Upload', 'icon' => 'circle-o', 'url' => ['/students/create'],],
                                    ['label' => 'View', 'icon' => 'circle-o', 'url' => ['/students'],],




                                ],
                            ],
                        ],
                    ]
                );


                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Faculties',
                                'icon' => 'bug',
                                'url' => '#',
                                'items' => [
                                   
                                    ['label' => 'Upload', 'icon' => 'circle-o', 'url' => ['/faculty/create'],],
                                    ['label' => 'View', 'icon' => 'circle-o', 'url' => ['/faculty'],],




                                ],
                            ],
                        ],
                    ]
                );


                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Courses',
                                'icon' => 'bug',
                                'url' => '#',
                                'items' => [
                                   
                                    ['label' => 'Upload', 'icon' => 'circle-o', 'url' => ['/courses/create'],],
                                    ['label' => 'View', 'icon' => 'circle-o', 'url' => ['/courses'],],




                                ],
                            ],
                        ],
                    ]
                );

                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Timetable',
                                'icon' => 'bug',
                                'url' => '#',
                                'items' => [
                                   
                                    ['label' => 'Upload', 'icon' => 'circle-o', 'url' => ['/timetable/create'],],
                                    ['label' => 'View', 'icon' => 'circle-o', 'url' => ['/timetable'],],




                                ],
                            ],
                        ],
                    ]
                );

                
               
                
            }
        }

        ?>

    </section>

</aside>
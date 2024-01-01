<style>
    /* Customize the color scheme for the sidebar */
    body.skin-blue .main-sidebar {
        background-color: #343a40 !important; /* Set the background color */
        color: #c2c7d0 !important; /* Set the text color */
    }

    body.skin-blue .main-sidebar a {
        color: #c2c7d0 !important; /* Set the link color */
    }

    body.skin-blue .main-sidebar .sidebar-menu a:hover {
        background-color: #495057 !important; /* Set the background color for hovered links */
    }

    body.skin-blue .main-sidebar .treeview-menu {
        background-color: #343a40 !important; /* Set the background color for submenu */
    }
</style>

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
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Dashboard',
                            'icon' => 'circle-o',
                            'url' => ['/site/index'],
                        ],
                    ],
                ]
            );
           

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
                            'label' => 'Academic Documents',
                            'icon' => 'building',
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
                            'label' => 'Push Notifications',
                            'icon' => 'bell',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Upload', 'icon' => 'circle-o', 'url' => ['/task/create'],],
                                ['label' => 'View', 'icon' => 'circle-o', 'url' => ['/task'],],
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
                            'label' => 'Push Deadlines',
                            'icon' => 'calendar',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Upload', 'icon' => 'circle-o', 'url' => ['/deadlines/create'],],
                                ['label' => 'View', 'icon' => 'circle-o', 'url' => ['/deadlines'],],
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
                            'icon' => 'users',
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
                            'icon' => 'user',
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
                            'icon' => 'book',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Upload', 'icon' => 'circle-o', 'url' => ['/courses/create'],],
                                ['label' => 'View', 'icon' => 'circle-o', 'url' => ['/courses'],],
                            ],
                        ],
                    ],
                ]
            );

            echo dmstr\widgets\Menu::widget([
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    [
                        'label' => 'Timetable',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Add Time Table', 'icon' => 'circle-o', 'url' => ['/timetable/create'],],
                    
                            ['label' => 'Generate Random Timetable', 'url' => ['/timetable/generate-random-timetable']],

                            ['label' => 'Semester 1', 'icon' => 'circle-o', 'url' => '#',
                                'items' => [
                                    ['label' => 'Division A', 'icon' => 'circle-o', 'url' => ['/timetable/sem1a']],
                                    ['label' => 'Division B', 'icon' => 'circle-o', 'url' => ['/timetable/sem1b']],
                                ],
                            ],
                            ['label' => 'Semester 2', 'icon' => 'circle-o', 'url' => '#',
                                'items' => [
                                    ['label' => 'Division A', 'icon' => 'circle-o', 'url' => ['/timetable/sem2a']],
                                    ['label' => 'Division B', 'icon' => 'circle-o', 'url' => ['/timetable/sem2b']],
                                ],
                            ],
                            ['label' => 'Semester 3', 'icon' => 'circle-o', 'url' => '#',
                                'items' => [
                                    ['label' => 'Division A', 'icon' => 'circle-o', 'url' => ['/timetable/sem3a']],
                                    ['label' => 'Division B', 'icon' => 'circle-o', 'url' => ['/timetable/sem3b']],
                                ],
                            ],
                            ['label' => 'Semester 4', 'icon' => 'circle-o', 'url' => '#',
                                'items' => [
                                    ['label' => 'Division A', 'icon' => 'circle-o', 'url' => ['/timetable/sem4a']],
                                    ['label' => 'Division B', 'icon' => 'circle-o', 'url' => ['/timetable/sem4b']],
                                ],
                            ],
                        ],
                    ],
                ],
            ]);
            

            echo dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                    'items' => [
                        [
                            'label' => 'Faculty Allotment',
                            'icon' => 'circle-o',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Subject Allotment', 'icon' => 'circle-o', 'url' => ['/faculty-allotment/create'],],
                                ['label' => 'View Allotment', 'icon' => 'circle-o', 'url' => ['/faculty-allotment'],],
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
                            'label' => 'Week Days',
                            'icon' => 'circle-o',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Add Days', 'icon' => 'circle-o', 'url' => ['/day/create'],],
                                ['label' => 'View Records', 'icon' => 'circle-o', 'url' => ['/day'],],
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
                            'label' => 'Semester',
                            'icon' => 'circle-o',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Add Semester', 'icon' => 'circle-o', 'url' => ['/semester/create'],],
                                ['label' => 'View Record', 'icon' => 'circle-o', 'url' => ['/semester'],],
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
                            'label' => 'Settings',
                            'icon' => 'cog',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Users', 'icon' => 'circle-o', 'url' => ['/users'],],
                            ],
                        ],
                    ],
                ]
            );

        }
        ?>

    </section>

</aside>

<style>
    /* Customize the color scheme for the sidebar */
    body.skin-blue .main-sidebar {
        background-color: #007bff !important; /* Set the background color to #007bff */
        color: #FFFFFF !important; /* Set the text color to white */
    }

    body.skin-blue .main-sidebar a {
        color: #FFFFFF !important; /* Set the link color to white */
    }

    body.skin-blue .main-sidebar .sidebar-menu a:hover,
    body.skin-blue .main-sidebar .sidebar-menu li.active a {
        background-color: #0056b3 !important; /* Set the background color for hovered and active links */
    }

    body.skin-blue .main-sidebar .treeview-menu {
        background-color: #007bff !important; /* Set the background color for submenu to #007bff */
    }

    /* Adjust styles for the expanded state (open) */
    body.sidebar-mini.sidebar-collapse .main-sidebar {
        background-color: #007bff !important; /* Set the background color to #007bff when collapsed */
    }

    body.sidebar-mini.sidebar-collapse .main-sidebar a {
        color: #FFFFFF !important; /* Set the link color to white when collapsed */
    }

    body.sidebar-mini.sidebar-collapse .main-sidebar .treeview-menu {
        background-color: #007bff !important; /* Set the background color for submenu to #007bff when collapsed */
    }
    .skin-blue .sidebar-menu>li.menu-open>a
    {
        background :  #007bff;
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
                            'label' => 'Events',
                            'icon' => 'bell',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Add Events', 'icon' => 'circle-o', 'url' => ['/events/create'],],
                                ['label' => 'View Events', 'icon' => 'circle-o', 'url' => ['/events'],],
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
                            'label' => 'Corse Documents',
                            'icon' => 'book',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Add Documents', 'icon' => 'circle-o', 'url' => ['/impfiles/create'],],
                                ['label' => 'View Documents', 'icon' => 'circle-o', 'url' => ['/impfiles'],],
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
                            'label' => 'Allot Mentors',
                            'icon' => 'book',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Random Allot', 'icon' => 'circle-o', 'url' => ['/allotment/random-allotment'],],
                                ['label' => 'View Alloted', 'icon' => 'circle-o', 'url' => ['/allotment'],],
                                ['label' => 'Add Mentors', 'icon' => 'circle-o', 'url' => ['/mentor/create'],],
                                ['label' => 'View Mentors', 'icon' => 'circle-o', 'url' => ['/mentor/index'],],




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
                            'label' => 'Certification Course',
                            'icon' => 'building',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Upload', 'icon' => 'circle-o', 'url' => ['/certificationcourse/create'],],
                                ['label' => 'View', 'icon' => 'circle-o', 'url' => ['/certificationcourse'],],
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
                            'label' => 'Internship',
                            'icon' => 'building',
                            'url' => '#',
                            'items' => [
                                ['label' => 'Upload', 'icon' => 'circle-o', 'url' => ['/internship/create'],],
                                ['label' => 'View', 'icon' => 'circle-o', 'url' => ['/internship'],],
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



            echo dmstr\widgets\Menu::widget([
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    [
                        'label' => 'Random Timetable',
                        'icon' => 'circle-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Random Time Table', 'icon' => 'circle-o', 'url' => ['/randomtimetable/index'],],
                    
                    

                            ['label' => 'Semester 1', 'icon' => 'circle-o', 'url' => '#',
                                'items' => [
                                    ['label' => 'Division A', 'icon' => 'circle-o', 'url' => ['/randomtimetable/sem1a']],
                                    ['label' => 'Division B', 'icon' => 'circle-o', 'url' => ['/randomtimetable/sem1b']],
                                ],
                            ],
                            ['label' => 'Semester 2', 'icon' => 'circle-o', 'url' => '#',
                                'items' => [
                                    ['label' => 'Division A', 'icon' => 'circle-o', 'url' => ['/randomtimetable/sem2a']],
                                    ['label' => 'Division B', 'icon' => 'circle-o', 'url' => ['/randomtimetable/sem2b']],
                                ],
                            ],
                            ['label' => 'Semester 3', 'icon' => 'circle-o', 'url' => '#',
                                'items' => [
                                    ['label' => 'Division A', 'icon' => 'circle-o', 'url' => ['/randomtimetable/sem3a']],
                                    ['label' => 'Division B', 'icon' => 'circle-o', 'url' => ['/randomtimetable/sem3b']],
                                ],
                            ],
                            ['label' => 'Semester 4', 'icon' => 'circle-o', 'url' => '#',
                                'items' => [
                                    ['label' => 'Division A', 'icon' => 'circle-o', 'url' => ['/randomtimetable/sem4a']],
                                    ['label' => 'Division B', 'icon' => 'circle-o', 'url' => ['/randomtimetable/sem4b']],
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

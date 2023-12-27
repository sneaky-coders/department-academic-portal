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
                                'label' => 'Allot Mentors',
                                'icon' => 'book',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Random Allot', 'icon' => 'circle-o', 'url' => ['/allotment/random-allotment'],],
                                    ['label' => 'View Alloted', 'icon' => 'circle-o', 'url' => ['/allotment'],],




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
                                'label' => 'Faculty Location',
                                'icon' => 'book',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Add Building Details', 'icon' => 'circle-o', 'url' => ['/building/create'],],
                                    ['label' => 'Add Faculty', 'icon' => 'circle-o', 'url' => ['/faculty/create'],],
                                    ['label' => 'Locate', 'icon' => 'circle-o', 'url' => ['/faculty/search-form'],],




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
                                'label' => 'Expense Tracker',
                                'icon' => 'book',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Budget', 'icon' => 'circle-o', 'url' => ['/budget/create'],],
                                    ['label' => 'Expense Category', 'icon' => 'circle-o', 'url' => ['/expensecategory/create'],],
                                    ['label' => 'Expenses', 'icon' => 'circle-o', 'url' => ['/expenses/create'],],




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
                                'label' => 'Questions',
                                'icon' => 'book',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Add Questions', 'icon' => 'circle-o', 'url' => ['/questions'],],
                                    ['label' => 'Solutions', 'icon' => 'circle-o', 'url' => ['/solution'],],




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
                                'label' => 'Placement Practice Test',
                                'icon' => 'desktop',
                                'url' => '#',
                                'items' => [
                                    # ['label' => 'Set 1', 'icon' => 'circle-o', 'url' => ['/set1/create'],],
                                    ['label' => 'Mock Test', 'icon' => 'circle-o', 'url' => ['/set2/redder'],],
                                    ['label' => 'Mock Test Responses', 'icon' => 'circle-o', 'url' => ['/set2/index'],],
                                    ['label' => 'Mock Test Scores', 'icon' => 'circle-o', 'url' => ['/set2/report'],],
                                    # ['label' => 'Set 3', 'icon' => 'circle-o', 'url' => ['/set3/create'],],






                                ],
                            ],
                        ]
                    ]
                );

                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Jobconversion',
                                'icon' => 'desktop',
                                'url' => '#',
                                'items' => [
                                    # ['label' => 'Set 1', 'icon' => 'circle-o', 'url' => ['/set1/create'],],
                                    ['label' => 'Add Record', 'icon' => 'circle-o', 'url' => ['/jobconversion/create'],],
                                    ['label' => 'View Records', 'icon' => 'circle-o', 'url' => ['/jobconversion/index'],],

                                    # ['label' => 'Set 3', 'icon' => 'circle-o', 'url' => ['/set3/create'],],






                                ],
                            ],
                        ]
                    ]
                );

                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Quiz',
                                'icon' => 'clock-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Coming Soon', 'icon' => 'circle-o', 'url' => ['#'],],






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
                                'label' => 'Student Data Update',
                                'icon' => 'odnoklassniki',
                                'url' => '#',
                                'items' => [
                                    # ['label' => 'Set 1', 'icon' => 'circle-o', 'url' => ['/set1/create'],],
                                    ['label' => 'Add Details', 'icon' => 'circle-o', 'url' => ['/profile/create'],],
                                    # ['label' => 'Set 3', 'icon' => 'circle-o', 'url' => ['/set3/create'],],





                                    #],
                                ],
                            ],
                        ]
                    ]
                );

                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Add Mentors',
                                'icon' => 'group',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Add Mentor', 'icon' => 'circle-o', 'url' => ['/mentor/create'],],
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
                                'label' => 'Certification Course',
                                'icon' => 'chrome',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Add  Certification Record', 'icon' => 'circle-o', 'url' => ['/certificationcourse/create'],],
                                    ['label' => 'View Certification Record', 'icon' => 'circle-o', 'url' => ['/certificationcourse/index'],],





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
                                'icon' => 'file',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Add  Internship Record', 'icon' => 'circle-o', 'url' => ['/internship/create'],],
                                    ['label' => 'View Internship Record', 'icon' => 'circle-o', 'url' => ['/internship/index'],],





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
                                'label' => 'Login Details',
                                'icon' => 'safari',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Users', 'icon' => 'circle-o', 'url' => ['/users'],],
                                    ['label' => 'Registered ', 'icon' => 'circle-o', 'url' => ['/register'],],





                                ],
                            ],
                        ],
                    ]
                );

                // Navbar links for Faculty

                if (Yii::$app->user->identity->level == 2) {

                    echo dmstr\widgets\Menu::widget(
                        [
                            'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                            'items' => [
                                [
                                    'label' => 'Academics',
                                    'icon' => 'book',
                                    'url' => '#',
                                    'items' => [
                                        ['label' => 'Coming Soon', 'icon' => 'circle-o', 'url' => ['#'],],






                                    ],
                                ],
                            ],
                        ]
                    );
                }
            }


            // Navbar links If Faculty & Mentor
            if (Yii::$app->user->identity->level == 2 && Yii::$app->user->identity->ismentor == 'Yes') {

                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Academics',
                                'icon' => 'group',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'My Mentees', 'icon' => 'circle-o', 'url' => ['/users/mentee'],],
                                    ['label' => 'Course Registration Certificate', 'icon' => 'circle-o', 'url' => ['/certificationcourse/index'],],
                                    ['label' => 'Internship Certificate', 'icon' => 'circle-o', 'url' => ['/internship/index'],],
                                    ['label' => 'Other Assesment', 'icon' => 'circle-o', 'url' => ['#'],],






                                ],
                            ],
                        ],
                    ]
                );
            }

            // Navbar links for Student Batch 2024

            if (Yii::$app->user->identity->level == 3 && Yii::$app->user->identity->batch == 2024) {


                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Placement Practice Test',
                                'icon' => 'desktop',
                                'url' => '#',
                                'items' => [

                                    ['label' => 'Set1', 'icon' => 'circle-o', 'url' => ['/set1/redder'],],
                                    ['label' => 'Set1', 'icon' => 'circle-o', 'url' => ['/set2/redder'],],


                                    ['label' => 'Set 1 Scores', 'icon' => 'circle-o', 'url' => ['/set1/student'],],
                                    ['label' => 'Set 2 Scores', 'icon' => 'circle-o', 'url' => ['/set2/student'],],






                                    #],
                                ],
                            ],
                        ]
                    ]
                );


                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Account',
                                'icon' => 'users',
                                'url' => '#',
                                'items' => [

                                    ['label' => 'update profile', 'icon' => 'circle-o', 'url' => ['/users/index'],],
                                   

                                 





                                    #],
                                ],
                            ],
                        ]
                    ]
                );
            } else {
            }

            //2023 batch


            if (Yii::$app->user->identity->level == 3 && Yii::$app->user->identity->batch == 2023) {


                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Certification COurse',
                                'icon' => 'file',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Upload Certification COurse', 'icon' => 'circle-o', 'url' => ['/certificationcourse/create'],],






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
                                'icon' => 'file',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Upload Internship', 'icon' => 'circle-o', 'url' => ['/internship/create'],],






                                ],
                            ],
                        ],
                    ]
                );
            }

            // Navbar links for Tester

            if (Yii::$app->user->identity->level == 4) {


                echo dmstr\widgets\Menu::widget(
                    [
                        'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                        'items' => [
                            [
                                'label' => 'Placement Practice Test',
                                'icon' => 'desktop',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Set 1', 'icon' => 'circle-o', 'url' => ['/set1/create'],],
                                    ['label' => 'Mock Test', 'icon' => 'circle-o', 'url' => ['/set2/create'],],
                                    ['label' => 'Mock Test Responses', 'icon' => 'circle-o', 'url' => ['/set2/index'],],
                                    ['label' => 'Mock Test Scores', 'icon' => 'circle-o', 'url' => ['/set2/report'],],
                                    ['label' => 'Mock Test Scores', 'icon' => 'circle-o', 'url' => ['/set2/student'],],
                                    ['label' => 'Set 3', 'icon' => 'circle-o', 'url' => ['/set3/create'],],





                                    #],
                                ],
                            ],
                        ]
                    ]
                );
            }
        }

        ?>

    </section>

</aside>
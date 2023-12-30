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
            'items' => [['label' => 'Daily Operations', 'icon' => 'circle-o', 'url' => ['/operation'],],
            ],
        ]
        );
    
    echo dmstr\widgets\Menu::widget(
        [
             'options' => ['class' => 'sidebar-menu tree'],
            'items' => [['label' => 'Purchase Contract', 'icon' => 'circle-o', 'url' => ['/purchase-contract'],],
            ],
        ]
        );    

    echo dmstr\widgets\Menu::widget(
        [
             'options' => ['class' => 'sidebar-menu tree'],
            'items' => [['label' => 'Consumables', 'icon' => 'circle-o', 'url' => ['/consumables'],],
            ],
        ]
        );

    echo dmstr\widgets\Menu::widget(
        [
             'options' => ['class' => 'sidebar-menu tree'],
            'items' => [['label' => 'Consumption', 'icon' => 'circle-o', 'url' => ['/consumption'],],
            ],
        ]
        );

    echo dmstr\widgets\Menu::widget(
        [
            'options' => ['class' => 'sidebar-menu tree'],
            'items' => [['label' => 'Production', 'icon' => 'circle-o', 'url' => ['/production'],],
            ],
        ]
        );

    echo dmstr\widgets\Menu::widget(
        [
             'options' => ['class' => 'sidebar-menu tree'],
            'items' => [['label' => 'Sales Contract', 'icon' => 'circle-o', 'url' => ['/sales-contract'],],
            ],
        ]
        );


    echo dmstr\widgets\Menu::widget(
        [
             'options' => ['class' => 'sidebar-menu tree'],
            'items' => [['label' => 'Dispatch', 'icon' => 'circle-o', 'url' => ['/dispatch'],],
            ],
        ]
        );
    
    
    echo dmstr\widgets\Menu::widget(
        [
             'options' => ['class' => 'sidebar-menu tree'],
            'items' => [['label' => 'Daily Works/Jobs', 'icon' => 'circle-o', 'url' => ['/daily-works'],],
            ],
        ]
        );
    echo dmstr\widgets\Menu::widget(
        [
             'options' => ['class' => 'sidebar-menu tree'],
            'items' => [['label' => 'Maintenance', 'icon' => 'circle-o', 'url' => ['/maintenance'],],
            ],
        ]
        );
    


        echo dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    [
                        'label' => 'Reports',
                        'icon' => 'bar-chart',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Maintenance', 'icon' => 'circle-o', 'url' => ['/maintenance/report'],],
                            ['label' => 'Daily Works/Jobs', 'icon' => 'circle-o', 'url' => ['/daily-works/report'],],
                            ['label' => 'Dispatch', 'icon' => 'circle-o', 'url' => ['/dispatch/report'],],
                           
                          
                        ],
                    ],
                ],
            ]
            );
        
        

        echo dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    [
                        'label' => 'Settings',
                        'icon' => 'cog',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Machine', 'icon' => 'circle-o', 'url' => ['/machine'],],
                            ['label' => 'Product', 'icon' => 'circle-o', 'url' => ['/product'],],
                            ['label' => 'Raw Material', 'icon' => 'circle-o', 'url' => ['/raw-material'],],
                            ['label' => 'Buyer', 'icon' => 'circle-o', 'url' => ['/buyer'],],
                            ['label' => 'Supplier', 'icon' => 'circle-o', 'url' => ['/supplier'],],
                            ['label' => 'Mine Location', 'icon' => 'circle-o', 'url' => ['/mine-location'],],
                            ['label' => 'Units', 'icon' => 'circle-o', 'url' => ['/units'],],
                            ['label' => 'Currency', 'icon' => 'circle-o', 'url' => ['/currency'],],
                            ['label' => 'Equipment', 'icon' => 'circle-o', 'url' => ['/equipment'],],
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

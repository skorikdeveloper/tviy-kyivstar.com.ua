<?php
$currentUrl = Yii::$app->request->pathInfo;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity['username']?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],
                    [
                        'label' => 'Домашний интернет',
                        'icon' => 'internet-explorer',
                        'url' => ['/home-internet'],
                        'active' => strpos($currentUrl, 'home-internet') !== false,
                    ],
                    [
                        'label' => 'Домашнее телевидение',
                        'icon' => 'television',
                        'url' => ['/home-television'],
                        'active' => strpos($currentUrl, 'home-television') !== false,
                    ],
                    [
                        'label' => 'Все вместе',
                        'icon' => 'diamond',
                        'url' => ['/together'],
                        'active' => strpos($currentUrl, 'together') !== false,
                    ],
                    [
                        'label' => 'Вопросы',
                        'icon' => 'question',
                        'url' => ['/question-page'],
                        'active' => strpos($currentUrl, 'question-page') !== false,
                    ],
                    [
                        'label' => 'Контакты',
                        'icon' => 'phone',
                        'url' => ['/contact-page'],
                        'active' => strpos($currentUrl, 'contact-page') !== false,
                    ],
                    [
                        'label' => 'Виджеты',
                        'icon' => 'list',
                        'url' => ['/widgets'],
                        'active' => strpos($currentUrl, 'widgets') !== false,
                    ],
                    [
                        'label' => 'Города',
                        'icon' => 'home',
                        'url' => ['/city-page'],
                        'active' => strpos($currentUrl, 'city-page') !== false,
                    ],
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                ],
            ]
        ) ?>

    </section>

</aside>

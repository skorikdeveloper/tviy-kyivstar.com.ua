<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use frontend\models\Post;
use yii\bootstrap\Modal;

AppAsset::register($this);

$phone =  \backend\models\ContactPage::getPhone();
$mail = \backend\models\ContactPage::getMail();
$phone_a = str_replace("+", "", str_replace(" ", "", $phone));
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="/upload/images/favicon.webp" sizes="32x32">

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-P3R2HQ2');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P3R2HQ2"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php $this->beginBody() ?>

<div class="wrap">

    <header>
        <?php
        NavBar::begin([
            'options' => [
                'class' => '',
                'id'=>'top-menu',
            ],
        ]);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav left-nav'],
            'items' => Post::getMenuLinks('left'),
        ]);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav middle-nav'],
            'items' => Post::getMenuLinks('center'),
        ]);

        $menuRight = array();

        // список языков для меню
        foreach (Yii::$app->getModule('languages')->languages as $val => $lang){
            if(Yii::$app->language == $lang) {
                $active = 'active';
                $menuRight[] =  ['label' => $val, 'linkOptions' => ['class' => $active]];
            } else {
                $menuRight[] =  ['label' => $val, 'url' => ['/languages?lang='.$lang], 'linkOptions' => ['class' => $active]];
            }

            unset($active);
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav lang-switch'],
            'items' => $menuRight,
        ]);
        NavBar::end();
        ?>
    </header>

    <div class="page">
        <?= $content ?>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <?php print_r($all_info)?>
                <div class="col-md-3 col-sm-6 hidden-xs logo-footer">
                    <div class="logo"><a href="/"><img src="<?= Yii::getAlias('@web/upload/images/kiev-logo.webp')?>" alt=""></a></div>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-8 contacts-footer">
                    <?php \backend\controllers\AppController::printNamePage() ?>
                    <p><a href="tel:<?= $phone_a ?>"><?= $phone ?></a></p>
                    <p><a href="mailto:<?= $mail ?>"><?= $mail ?></a></p>
                </div>

                <div class="col-md-2 col-sm-6 col-xs-4 soc-links-footer">
                    <?= \frontend\widgets\SocLinksWidget::widget([]) ?>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 callback-footer">
                    <?= Html::a(Yii::t('app', 'Оставить заявку'), '#', ['class' => 'btn main-btn btn-for-gtm', 'data-toggle' => 'modal', 'data-target' => '#orderModal', 'data-info' => 'Футер. Оставить заявку.', 'data-class' => 'gtm-head-footer']) ?>
                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="cities">
                        <?= \frontend\widgets\CityLinksWidget::widget();?>
                        <p class="copy">&copy; <?= date('Y')?> Материалы для сайта использованы с https://kyivstar.ua. Официальный представитель Прат "Киевстар" - http://tviy-kyivstar.com.ua</p>
                    </div>
                </div>
            </div>

        </div>
    </footer>

</div>

<?php $this->endBody() ?>


<!-- Modal -->
<div id="orderThanksModal" class="fade modal in" role="dialog" tabindex="-1" style="padding-right: 17px;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h1><?= Yii::t('app', 'Спасибо')?>!</h1>
                <p><?= Yii::t('app', 'Наш менеджер свяжется с Вами в ближайшее время!')?></p>
                <i class="fa fa-check-circle"></i>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<?= \frontend\widgets\OrderModalWidget::widget([]) ?>

<script data-skip-moving="true">
    (function(w,d,u){
        var s=d.createElement('script');s.async=1;s.src=u+'?'+(Date.now()/60000|0);
        var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
    })(window,document,'https://b24t.perpetum.com.ua/upload/crm/site_button/loader_18_dk14k8.js');
</script>
</body>
</html>
<?php $this->endPage() ?>

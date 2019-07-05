<?php
use yii\helpers\Html;
?>

<?= $this->render('../layouts/banner', [
    'post' => $post,
    'lang_data' => $lang_data,
    'all_info' => $all_info
])?>

<div class="site" id="home-inet">
    <div class="container">
        <div class="row advantages">
            <div class="col-md-3 col-sm-3 text-center">
                <img src="<?= Yii::getAlias('@web/upload/images/advantages/advantages_home_internet_img_adv_1_'.$lang_data->lang.'.webp')?>">
                <p><?= $all_info['text_advantages_1']?></p>
            </div>
            <div class="col-md-3 col-sm-3 text-center">
                <img src="<?= Yii::getAlias('@web/upload/images/advantages/advantages_home_internet_img_adv_2_'.$lang_data->lang.'.webp')?>">
                <p><?= $all_info['text_advantages_2']?></p>
            </div>
            <div class="col-md-3 col-sm-3 text-center">
                <img src="<?= Yii::getAlias('@web/upload/images/advantages/advantages_home_internet_img_adv_3_'.$lang_data->lang.'.webp')?>">
                <p><?= $all_info['text_advantages_3']?></p>
            </div>
            <div class="col-md-3 col-sm-3 text-center">
                <img src="<?= Yii::getAlias('@web/upload/images/advantages/advantages_home_internet_img_adv_4_'.$lang_data->lang.'.webp')?>">
                <p><?= $all_info['text_advantages_4']?></p>
            </div>
        </div>
    </div>

    <div class="blocks_tarif">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="name_block"><?= $all_info['name_block']?></h2>
                </div>
            </div>

            <div class="row">
                <?php foreach ($all_info['blocks_tarif'] as $tarif):?>
                    <div class="col-md-6 <?php if(count($all_info['blocks_tarif']) == 1) echo 'col-md-offset-3'?>">

                        <div class="block-header"><h2 class="title_block text-center"><?= $tarif['title_block']?></h2></div>

                        <div class="block-wrapper">
                            <div class="block-content-tarif">
                                <div class="prices">
                                    <p>
                                        <?= Yii::t('app', 'Цена')?>:
                                        <span class="old-price"><?= $tarif['old_price']?> <?= Yii::t('app', 'грн/мес')?></span>
                                        <span class="new-price"><?= $tarif['new_price']?> <span style="font-weight: normal;font-size: 20px;"><?= Yii::t('app', 'грн/мес')?></span></span>
                                    </p>
                                </div>
                            </div>
                            <div class="block-content-tarif">
                                <div class="inets">
                                    <p>
                                        <?= Yii::t('app', 'Скорость')?>:
                                        <span class="inet_speed"><?= $tarif['inet_speed']?> <span style="font-weight: normal;font-size: 20px;"><?= Yii::t('app', 'Мбит/с')?></span></span>
                                    </p>
                                </div>
                            </div>

                            <div class="block-order-but"><?= Html::a(Yii::t('app', 'Заказать!'), '#', ['class' => 'btn main-btn', 'data-toggle' => 'modal', 'data-target' => '#orderModal', 'data-info' => 'Интернет. '.$tarif['title_block'], 'data-class' => 'gtm-tarif']) ?></div>
                        </div>

                    </div>
                <?php endforeach;?>
            </div>

        </div>
    </div>

    <?= \frontend\widgets\ShowContentWidget::widget(['widget_id' => 1])?>

    <div class="blocks_dop">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="name_block"><?= $all_info['name_dop_block']?></h2>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="dop_block">
                        <h2><?= $all_info['title_dop_1']?></h2>

                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <?= $all_info['text_dop_1_1']?></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <?= $all_info['text_dop_1_2']?></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <?= $all_info['text_dop_1_3']?></li>
                        </ul>
                        <p><?= Yii::t('app', 'Возвращаем')?> <span class="price"><?= $all_info['price_both_dop_1']?></span> <?= Yii::t('app', 'на ваш счет')?></p>

                        <div class="img-wrap">
                            <img src="<?= Yii::getAlias('@web/upload/images/inet/inet_home_internet_img_dop_1_'.$lang_data->lang.'.webp')?>" alt="">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="dop_block">
                        <h2><?= $all_info['title_dop_2']?></h2>

                        <ul>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <?= $all_info['text_dop_2_1']?></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <?= $all_info['text_dop_2_2']?></li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> <?= $all_info['text_dop_2_3']?></li>
                        </ul>
                        <p><?= Yii::t('app', 'Возвращаем')?> <span class="price"><?= $all_info['price_both_dop_2']?></span> <?= Yii::t('app', 'на ваш счет')?></p>

                        <div class="img-wrap">
                            <img src="<?= Yii::getAlias('@web/upload/images/inet/inet_home_internet_img_dop_2_'.$lang_data->lang.'.webp')?>" alt="">
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <div class="stock_block" style="background-image: url('/frontend/web/upload/images/inet/inet_home_internet_bgc_stock_<?= $lang_data->lang?>.webp')">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <h2><?= $all_info['name_stock']?></h2>
                    <p><?= $all_info['text_stock']?></p>

                    <div class="wrap-but"><?= Html::a(Yii::t('app', 'Отправить заявку'), '#', ['class' => 'btn main-btn', 'data-toggle' => 'modal', 'data-target' => '#orderModal', 'data-info' => 'Интернет. Акционное предложение', 'data-class' => 'gtm-head-footer']) ?></div>
                </div>
            </div>
        </div>
    </div>

    <?= \frontend\widgets\ShowContentWidget::widget(['widget_id' => 2])?>

</div>

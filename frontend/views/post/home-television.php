<?php
use yii\helpers\Html;
?>

<?= $this->render('../layouts/banner', [
    'post' => $post,
    'lang_data' => $lang_data,
    'all_info' => $all_info
])?>

<div class="site" id="home-television">
    <div class="container">
        <div class="row advantages">
            <div class="col-md-4 col-sm-4 text-center">
                <img src="<?= Yii::getAlias('@web/upload/images/advantages/advantages_home_television_img_adv_1_'.$lang_data->lang.'.webp')?>">
                <p><?= $all_info['text_advantages_1']?></p>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
                <img src="<?= Yii::getAlias('@web/upload/images/advantages/advantages_home_television_img_adv_2_'.$lang_data->lang.'.webp')?>">
                <p><?= $all_info['text_advantages_2']?></p>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
                <img src="<?= Yii::getAlias('@web/upload/images/advantages/advantages_home_television_img_adv_3_'.$lang_data->lang.'.webp')?>">
                <p><?= $all_info['text_advantages_3']?></p>
            </div>
        </div>
    </div>

    <div class="blocks-tarif">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="name_block"><?= $all_info['block_tarif_name']?></h2>
                </div>
            </div>

            <div class="row">
                <?php foreach($all_info['blocks_tarif'] as $row): ?>
                    <div class="col-md-12">

                        <div class="wrapper">
                            <div class="block-tarif">

                                <div class="icon-wrap">
                                    <img src="<?= Yii::getAlias('@web/upload/images/home-television/icon_tel.webp')?>" alt="">
                                </div>
                                <div class="title-wrap">
                                    <h2><?= $row['title_block']?></h2>
                                </div>
                                <div class="center-wrap">

                                    <span class="channels">
                                        <span class="num_channels">
                                            <?= $row['num_channels']?>
                                        </span>
                                        <?= Yii::t('app', 'каналов')?>
                                    </span>

                                    <span class="video_storage">
                                        <span>
                                            <?php $img_stor = $row['video_storage'] == 1 ? 'video_storage.webp' : 'not_video_storage.webp';?>
                                            <img src="<?= Yii::getAlias('@web/upload/images/home-television/'.$img_stor)?>" alt="">
                                        </span>
                                        <?= Yii::t('app', 'видеобиблиотека')?>
                                    </span>

                                    <span class="hd">
                                        <span>
                                            <?php $img_hd = $row['hd'] == 1 ? 'hd.webp' : 'not_hd.webp';?>
                                            <img src="<?= Yii::getAlias('@web/upload/images/home-television/'.$img_hd)?>" alt="">
                                        </span>
                                        <?= Yii::t('app', 'качество HD')?>
                                    </span>

                                    <span class="wrap-prices">
                                        <span class="prices">
                                            <span class="new_price"><?= $row['new_price']?></span>

                                            <?php if($row['old_price'] != 0) :?>
                                                <span class="old_price"> <?= $row['old_price']?></span>
                                            <?php endif;?>
                                        </span>
                                        <?= Yii::t('app', 'грн/мес')?>
                                    </span>

                                </div>
                                <div class="but-wrap">
                                    <?= Html::a(Yii::t('app', 'Заказать!'), '#', ['class' => 'btn main-btn', 'data-toggle' => 'modal', 'data-target' => '#orderModal', 'data-info' => 'Телевидение. '.$row['title_block'], 'data-class' => 'gtm-tarif']) ?>
                                </div>

                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                <?php endforeach; ?>
            </div>
            <?php if(!empty($all_info['block_tarif_text_both'])):?>
            <div class="row">
                <div class="col-md-12" style="font-size: 17px;">
                    <p class="text-center"><?= $all_info['block_tarif_text_both'] ?></p>
                </div>
            </div>
            <?php endif;?>
        </div>
    </div>

    <div class="tv_block">
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <h2><?= $all_info['name_tv_block']?></h2>
                    <p><?= $all_info['text_tv_block']?></p>

                </div>
                <div class="col-md-6">
                    <img src="<?= Yii::getAlias('@web/upload/images/home-television/tv_block_img.webp')?>" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="television-slider">
        <div id="owl-television" class="owl-carousel owl-theme">
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/1.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/2.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/3.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/4.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/5.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/6.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/7.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/8.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/9.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/10.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/11.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/12.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/13.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/14.webp')?>" alt=""></div>
            <div class="item"><img src="<?= Yii::getAlias('@web/upload/images/home-television/slider/15.webp')?>" alt=""></div>
        </div>
    </div>
    <?= \frontend\widgets\ShowContentWidget::widget(['widget_id' => 1])?>
    <?= \frontend\widgets\ShowContentWidget::widget(['widget_id' => 2])?>
</div>

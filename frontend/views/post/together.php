<?php
use yii\helpers\Html;
?>

<?= $this->render('../layouts/banner', [
    'post' => $post,
    'lang_data' => $lang_data,
    'all_info' => $all_info
])?>

<div class="site" id="together">
    <div class="container">
        <div class="row advantages">
            <div class="col-md-4 col-sm-4 text-center">
                <img src="<?= Yii::getAlias('@web/upload/images/advantages/advantages_together_'.$lang_data->lang.'_1.webp')?>">
                <p><?= $all_info['text_advantages_1']?></p>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
                <img src="<?= Yii::getAlias('@web/upload/images/advantages/advantages_together_'.$lang_data->lang.'_2.webp')?>">
                <p><?= $all_info['text_advantages_2']?></p>
            </div>
            <div class="col-md-4 col-sm-4 text-center">
                <img src="<?= Yii::getAlias('@web/upload/images/advantages/advantages_together_'.$lang_data->lang.'_3.webp')?>">
                <p><?= $all_info['text_advantages_3']?></p>
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
                <div class="col-md-12">
                    <div id="owl-together" class="owl-carousel owl-theme">
                        <?php
                            usort($all_info['blocks_tarif'], function($a, $b){
                                return ($a['sort'] - $b['sort']);
                            });
                        ?>
                        <?php foreach ($all_info['blocks_tarif'] as $row):?>
                        <div class="col-xs-12 col-md-12 col-lg-12">
                            <div class="block-container">
                                <div class="block-header">
                                    <h2><?= $row['title_block']?></h2>
                                </div>
                                <div class="block-content first">
                                    <h3><img src="<?= Yii::getAlias('@web/upload/images/together/tarif_1.webp')?>" alt=""><?= Yii::t('app', 'Мобильная связь')?></h3>
                                    <div>
                                        <img src="<?= Yii::getAlias('@web/upload/images/together/infin.webp')?>" alt="" class="infin">
                                        <p><?= Yii::t('app', 'звонки в сети киевстар')?></p>
                                    </div>
                                    <div>
                                        <b><?= $row['other_networks']?> <?= Yii::t('app', 'мин')?></b>
                                        <p><?= Yii::t('app', 'на другие мобильные сети и за границу')?></p>
                                    </div>
                                    <div>
                                        <b>
                                            <?= $row['mob_internet'] == 'безлимит' ? "<img src='".Yii::getAlias('@web/upload/images/together/infin.webp')."' alt='' class='infin'>" :$row['mob_internet'].' МБ';?>
                                        </b>
                                        <p><?= Yii::t('app', 'мобильный интернет')?></p>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <h3><img src="<?= Yii::getAlias('@web/upload/images/together/tarif_2.webp')?>" alt=""><?= Yii::t('app', 'Домашний Интернет')?></h3>
                                    <div>
                                        <b><?= $row['home_inet']?> <?= Yii::t('app', 'Мбит/с')?></b>
                                        <p><?= Yii::t('app', '+ возврат цены роутера')?></p>
                                    </div>
                                </div>
                                <div class="block-content television">
                                    <h3>
                                        <?php $src = !$row['is_wargaming'] ? Yii::getAlias('@web/upload/images/together/tarif_3.webp') : Yii::getAlias('@web/upload/images/together/wargaming_logo.webp');?>
                                        <img src="<?= $src?>" alt="">
                                        <?= $row['last_block_name']?>
                                    </h3>
                                    <div style="margin-top: 20px;">
                                        <?= $row['text_channels']?>
<!--                                        <b>--><?//= $row['number_of_channels']?><!-- --><?//= Yii::t('app', 'каналов')?><!--</b>-->
<!--                                        <p><b style="font-size: 16px;">(--><?//= Yii::t('app', 'при наличии smart TV')?><!--)</b></p>-->
<!--                                        <p>+ --><?//= Yii::t('app', 'видеобиблиотека')?><!--</p>-->
                                    </div>
                                </div>
                                <div class="block-footer">
                                    <h3>
                                        <span class="block-price-wrap">
                                            <?php if($row['old_price'] != 0) :?>
                                                <span class="price-old"> <?= $row['old_price']?></span>
                                            <?php endif;?>
                                            <span class="price-new"><strong><?= $row['new_price']?></strong> <?= Yii::t('app', 'грн/мес')?></span>
                                        </span>
                                    </h3>
                                </div>
                                <div class="block-order-but"><?= Html::a(Yii::t('app', 'Заказать пакет'), '#', ['class' => 'btn main-btn', 'data-toggle' => 'modal', 'data-target' => '#orderModal', 'data-info' => $row['title_block'], 'data-class' => 'gtm-tarif']) ?></div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= \frontend\widgets\ShowContentWidget::widget(['widget_id' => 1])?>
    <?= \frontend\widgets\ShowContentWidget::widget(['widget_id' => 2])?>
</div>

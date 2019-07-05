<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;

/* @var $this yii\web\View */

$all_info = unserialize($page_info->all_info);
?>
<div class="alert-warning alert fade in">Это главная страница сайта. Сменить URL нельзя.</div>
<div class="main-advantages-update box box-info">

    <div class="box-body">

        <div class="home-internet-form">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'title')->textInput(['value' => $page_info->title])?></div>
                <div class="col-md-6"><?= $form->field($model, 'meta_title')->textInput(['value' => $all_info['meta_title']])?></div>
            </div>

            <div class="row">
                <div class="col-md-12"><?= $form->field($model, 'meta_desc')->textInput(['value' => $all_info['meta_desc']])?></div>
            </div>

            <div class="row">
                <div class="col-md-3"><?= $form->field($model, 'bgc_banner')->fileInput()?></div>
                <div class="col-md-9">
                    <div class="form-group">
                        <strong>Текущий баннер:</strong> <img src="/frontend/web/upload/images/banner/banner_inet_<?= $page_info->lang?>.webp" alt=""></div>
                    </div>
            </div>

            <div class="row">
                <div class="col-md-8"><?= $form->field($model, 'title_banner')->textInput(['value' => $all_info['title_banner']])?></div>
                <div class="col-md-4"><?= $form->field($model, 'text_but_banner')->textInput(['value' => $all_info['text_but_banner']])?></div>
            </div>

            <div class="row">
                <div class="col-md-3"><?= $form->field($model, 'old_price_banner')->textInput(['value' => $all_info['old_price_banner']])?></div>
                <div class="col-md-3"><?= $form->field($model, 'left_text_banner')->textInput(['value' => $all_info['left_text_banner']])?></div>
                <div class="col-md-3"><?= $form->field($model, 'new_price_banner')->textInput(['value' => $all_info['new_price_banner']])?></div>
                <div class="col-md-3"><?= $form->field($model, 'right_text_banner')->textInput(['value' => $all_info['right_text_banner']])?></div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 style="margin-top: 50px;">Преимущества</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'text_advantages_1')->textInput(['value' => $all_info['text_advantages_1']])?></div>
                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <label class="control-label" style="display: block">Текущаяя картинка:</label>
                        <img src="/frontend/web/upload/images/advantages/advantages_home_internet_img_adv_1_<?= $page_info->lang?>.webp" onError="this.src='/frontend/web/upload/images/no-image.webp'" style="max-width: 61px;">
                    </div>
                </div>
                <div class="col-md-3"><?= $form->field($model, 'img_adv_1')->fileInput()?></div>
            </div>
            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'text_advantages_2')->textInput(['value' => $all_info['text_advantages_2']])?></div>
                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <label class="control-label" style="display: block">Текущаяя картинка:</label>
                        <img src="/frontend/web/upload/images/advantages/advantages_home_internet_img_adv_2_<?= $page_info->lang?>.webp" onError="this.src='/frontend/web/upload/images/no-image.webp'" style="max-width: 61px;">
                    </div>
                </div>
                <div class="col-md-3"><?= $form->field($model, 'img_adv_2')->fileInput()?></div>
            </div>
            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'text_advantages_3')->textInput(['value' => $all_info['text_advantages_3']])?></div>
                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <label class="control-label" style="display: block">Текущаяя картинка:</label>
                        <img src="/frontend/web/upload/images/advantages/advantages_home_internet_img_adv_3_<?= $page_info->lang?>.webp" onError="this.src='/frontend/web/upload/images/no-image.webp'" style="max-width: 61px;">
                    </div>
                </div>
                <div class="col-md-3"><?= $form->field($model, 'img_adv_3')->fileInput()?></div>
            </div>
            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'text_advantages_4')->textInput(['value' => $all_info['text_advantages_4']])?></div>
                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <label class="control-label" style="display: block">Текущаяя картинка:</label>
                        <img src="/frontend/web/upload/images/advantages/advantages_home_internet_img_adv_4_<?= $page_info->lang?>.webp" onError="this.src='/frontend/web/upload/images/no-image.webp'" style="max-width: 61px;">
                    </div>
                </div>
                <div class="col-md-3"><?= $form->field($model, 'img_adv_4')->fileInput()?></div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 style="margin-top: 50px;">Тарифы</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'name_block')->textInput(['value' => $all_info['name_block']])?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'blocks_tarif')->widget(MultipleInput::className(), [
                        'addButtonPosition' => MultipleInput::POS_HEADER, // show add button in the header
                        'addButtonOptions' => ['label' => 'Добавить тариф'],
                        'removeButtonOptions' => ['label' => 'Удалить тариф'],
                        'columns' => [
                            [
                                'name'  => 'title_block',
                                'type'  => 'textInput',
                                'title' => 'Название тарифа',
                                'enableError' => true,
                            ],
                            [
                                'name'  => 'old_price',
                                'type'  => 'textInput',
                                'title' => 'Старая цена',
                                'enableError' => true,
                            ],
                            [
                                'name'  => 'new_price',
                                'type'  => 'textInput',
                                'title' => 'Новая цена',
                                'enableError' => true,
                            ],
                            [
                                'name'  => 'inet_speed',
                                'type'  => 'textInput',
                                'title' => 'Скорость инета/Мб',
                                'enableError' => true,
                            ],
                        ]
                    ])->label(false);
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 style="margin-top: 50px;">Доп оборудование</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'name_dop_block')->textInput(['value' => $all_info['name_dop_block']])?>
                </div>
            </div>

            <div class="row" style="margin-bottom: 40px;">
                <div class="col-md-4">
                    <?= $form->field($model, 'title_dop_1')->textInput(['value' => $all_info['title_dop_1']])?>
                </div>
                <div class="col-md-2 text-center">
                    <div class="form-group">
                        <label class="control-label" style="display: block">Текущаяя картинка:</label>
                        <img src="/frontend/web/upload/images/inet/inet_home_internet_img_dop_1_<?= $page_info->lang?>.webp" onError="this.src='/frontend/web/upload/images/no-image.webp'" style="max-width: 61px;">
                    </div>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'img_dop_1')->fileInput()?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'price_both_dop_1')->textInput(['value' => $all_info['price_both_dop_1']])?>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4">
                    <?= $form->field($model, 'text_dop_1_1')->textInput(['value' => $all_info['text_dop_1_1']])?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'text_dop_1_2')->textInput(['value' => $all_info['text_dop_1_2']])?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'text_dop_1_3')->textInput(['value' => $all_info['text_dop_1_3']])?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'title_dop_2')->textInput(['value' => $all_info['title_dop_2']])?>
                </div>
                <div class="col-md-2 text-center">
                    <div class="form-group">
                        <label class="control-label" style="display: block">Текущаяя картинка:</label>
                        <img src="/frontend/web/upload/images/inet/inet_home_internet_img_dop_2_<?= $page_info->lang?>.webp" onError="this.src='/frontend/web/upload/images/no-image.webp'" style="max-width: 61px;">
                    </div>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'img_dop_2')->fileInput()?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'price_both_dop_2')->textInput(['value' => $all_info['price_both_dop_2']])?>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4">
                    <?= $form->field($model, 'text_dop_2_1')->textInput(['value' => $all_info['text_dop_2_1']])?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'text_dop_2_2')->textInput(['value' => $all_info['text_dop_2_2']])?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'text_dop_2_3')->textInput(['value' => $all_info['text_dop_2_3']])?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 style="margin-top: 50px;">Акционное предложение</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'name_stock')->textInput(['value' => $all_info['name_stock']])?>
                </div>
                <div class="col-md-4 text-center">
                    <div class="form-group">
                        <label class="control-label" style="display: block">Текущаяя картинка:</label>
                        <img src="/frontend/web/upload/images/inet/inet_home_internet_bgc_stock_<?= $page_info->lang?>.webp" onError="this.src='/frontend/web/upload/images/no-image.webp'" style="max-width: 100%;">
                    </div>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'bgc_stock')->fileInput()?>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-12">
                    <?= $form->field($model, 'text_stock')->textInput(['value' => $all_info['text_stock']])?>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 text-center">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                    <?= Html::a('Отмена', ['index'], ['class' => 'btn btn-danger']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>


        </div>

    </div>

</div>

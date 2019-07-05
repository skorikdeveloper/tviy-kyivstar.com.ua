<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;

/* @var $this yii\web\View */

$all_info = unserialize($page_info->all_info);
?>
<div class="main-advantages-update box box-info">

    <div class="box-body">

        <div class="home-internet-form">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'url')->textInput(['value' => $post->url])?>
                </div>
            </div>

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
                        <strong>Текущий баннер:</strong> <img src="/frontend/web/upload/images/banner/banner_tv_<?= $page_info->lang?>.webp" alt=""></div>
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
                        <img src="/frontend/web/upload/images/advantages/advantages_home_television_img_adv_1_<?= $page_info->lang?>.webp" onError="this.src='/frontend/web/upload/images/no-image.webp'" style="max-width: 61px;">
                    </div>
                </div>
                <div class="col-md-3"><?= $form->field($model, 'img_adv_1')->fileInput()?></div>
            </div>
            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'text_advantages_2')->textInput(['value' => $all_info['text_advantages_2']])?></div>
                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <label class="control-label" style="display: block">Текущаяя картинка:</label>
                        <img src="/frontend/web/upload/images/advantages/advantages_home_television_img_adv_2_<?= $page_info->lang?>.webp" onError="this.src='/frontend/web/upload/images/no-image.webp'" style="max-width: 61px;">
                    </div>
                </div>
                <div class="col-md-3"><?= $form->field($model, 'img_adv_2')->fileInput()?></div>
            </div>
            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'text_advantages_3')->textInput(['value' => $all_info['text_advantages_3']])?></div>
                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <label class="control-label" style="display: block">Текущаяя картинка:</label>
                        <img src="/frontend/web/upload/images/advantages/advantages_home_television_img_adv_3_<?= $page_info->lang?>.webp" onError="this.src='/frontend/web/upload/images/no-image.webp'" style="max-width: 61px;">
                    </div>
                </div>
                <div class="col-md-3"><?= $form->field($model, 'img_adv_3')->fileInput()?></div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 style="margin-top: 50px;">Тарифы</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'block_tarif_name')->textInput(['value' => $all_info['block_tarif_name']])?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'block_tarif_text_both')->textInput(['value' => $all_info['block_tarif_text_both']])?>
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
                                'name'  => 'num_channels',
                                'type'  => 'textInput',
                                'title' => 'Кол-во каналов',
                                'enableError' => true,
                            ],
                            [
                                'name'  => 'video_storage',
                                'type'  => 'checkbox',
                                'title' => 'Видеобиблиотека',
                            ],
                            [
                                'name'  => 'hd',
                                'type'  => 'checkbox',
                                'title' => 'Качество HD',
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
                        ]
                    ])->label(false);
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 style="margin-top: 50px;">ТВ для всей семьи</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <?= $form->field($model, 'name_tv_block')->textInput(['value' => $all_info['name_tv_block']])?>
                </div>
                <div class="col-md-9">
                    <?= $form->field($model, 'text_tv_block')->textarea(['value' => $all_info['text_tv_block'], 'rows' => 5])?>
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

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */

$all_info = unserialize($page_info->all_info);
?>
<div class="main-advantages-update box box-info">

    <div class="box-body">

        <div class="home-internet-form">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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
                        <strong>Текущий баннер:</strong> <img src="/frontend/web/upload/images/banner/banner_together_<?= $page_info->lang?>.webp" alt="">
                    </div>
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
                        <img src="/frontend/web/upload/images/advantages/advantages_together_<?= $page_info->lang?>_1.webp">
                    </div>
                </div>
                <div class="col-md-3"><?= $form->field($model, 'img_advantages[]')->fileInput()?></div>
            </div>
            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'text_advantages_2')->textInput(['value' => $all_info['text_advantages_2']])?></div>
                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <label class="control-label" style="display: block">Текущаяя картинка:</label>
                        <img src="/frontend/web/upload/images/advantages/advantages_together_<?= $page_info->lang?>_2.webp">
                    </div>
                </div>
                <div class="col-md-3"><?= $form->field($model, 'img_advantages[]')->fileInput()?></div>
            </div>
            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'text_advantages_3')->textInput(['value' => $all_info['text_advantages_3']])?></div>
                <div class="col-md-3 text-center">
                    <div class="form-group">
                        <label class="control-label" style="display: block">Текущаяя картинка:</label>
                        <img src="/frontend/web/upload/images/advantages/advantages_together_<?= $page_info->lang?>_3.webp">
                    </div>
                </div>
                <div class="col-md-3"><?= $form->field($model, 'img_advantages[]')->fileInput()?></div>
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
                                'name'  => 'other_networks',
                                'type'  => 'textInput',
                                'title' => 'На другие сети (мин)',
                                'enableError' => true,
                            ],
                            [
                                'name'  => 'mob_internet',
                                'type'  => 'textInput',
                                'title' => 'Моб. инет/Мб (безлимит)',
                                'defaultValue' => 'безлимит',
                                'enableError' => true,
                            ],
                            [
                                'name'  => 'home_inet',
                                'type'  => 'textInput',
                                'title' => 'Скорость домашнего инета/Мб',
                                'enableError' => true,
                            ],
//                            [
//                                'name'  => 'number_of_channels',
//                                'type'  => 'textInput',
//                                'title' => 'Количество каналов',
//                                'enableError' => true,
//                            ],
                            [
                                'name'  => 'last_block_name',
                                'type'  => 'textInput',
                                'title' => 'Название последнего блока',
                                'enableError' => true,
                            ],
                            [
                                'name' => 'text_channels',
                                'type' => CKEditor::className(),
                                'title' => 'Текст под последним блоком',
                                'enableError' => true,
                                'options' => [
                                    'editorOptions' => [
                                        'preset' => 'standart', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                                        'inline' => false, //по умолчанию false
                                    ],
                                ]
                            ],
                            [
                                'name'  => 'is_wargaming',
                                'type'  => 'checkbox',
                                'title' => 'Wargaming?',
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
                                'name'  => 'sort',
                                'title' => 'Порядок сортировки',
                                'enableError' => true,
                                'options' => [
                                    'type' => 'number',
                                    'class' => 'input-priority',
                                ]
                            ],
                        ]
                    ])->label(false);
                    ?>
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

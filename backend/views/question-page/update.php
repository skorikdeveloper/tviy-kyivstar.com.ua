<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use unclead\multipleinput\MultipleInput;

/* @var $this yii\web\View */

$all_info = unserialize($page_info->all_info);
?>
<div class="main-advantages-update box box-info questions">

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
                        <strong>Текущий баннер:</strong> <img src="/frontend/web/upload/images/banner/banner_question_page_<?= $page_info->lang?>.webp" alt=""></div>
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
                    <h2>Блоки с вопросами</h2>
                </div>
            </div>

            <div class="row wrapper-questions">
                <div class="col-md-12">
                    <?= $form->field($model, 'blocks')->widget(MultipleInput::className(), [
                        'addButtonPosition' => MultipleInput::POS_HEADER, // show add button in the header
                        'addButtonOptions' => ['label' => 'Добавить блок'],
                        'removeButtonOptions' => ['label' => 'Удалить блок'],
                        'columns' => [
                            [
                                'name'  => 'title_block',
                                'type'  => 'textInput',
                                'title' => 'Заголовок блока',
                                'enableError' => true,
                                'options' => ['style' => 'min-width: 300px;']
                            ],
                            [
                                'name'  => 'questions',
                                'type' => MultipleInput::class,
                                'title' => 'Вопрос-ответ',
                                'enableError' => true,
                                'options' => [
                                    'addButtonOptions' => ['label' => 'Добавить вопрос-ответ'],
                                    'addButtonPosition' => MultipleInput::POS_FOOTER,
                                    'removeButtonOptions' => ['label' => 'Удалить вопрос-ответ'],
                                    'columns' => [
                                        [
                                            'name' => 'question',
                                            'type' => \unclead\multipleinput\MultipleInputColumn::TYPE_TEXT_INPUT,
                                            'defaultValue'=>'Вопрос',
                                            'options' => ['style' => 'min-width: 400px'],
                                        ],
                                        [
                                            'name' => 'answer',
                                            'type' => CKEditor::className(),
                                            'defaultValue'=>'Ответ',
                                            'options' => [
                                                'editorOptions' => [
                                                    'preset' => 'standart', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                                                    'inline' => false, //по умолчанию false
                                                ],
                                            ]
                                        ]
                                    ]
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

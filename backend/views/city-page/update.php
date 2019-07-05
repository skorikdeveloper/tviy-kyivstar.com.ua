<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */

$all_info = unserialize($page_info->all_info);
?>
<div class="main-advantages-update box box-info">

    <div class="box-body">

        <div class="home-internet-form">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'url')->textInput(['value' => $post->url])?>
                </div>
                <?php $model->lang = $page_info->lang;?>
                <?php $model->is_active = $post->is_active;?>
                <div class="col-md-4"><?= $form->field($model, 'lang')->dropDownList([NULL => '','uk' => 'Украинский', 'ru' => 'Русский'])?></div>
                <div class="col-md-4"><?= $form->field($model, 'is_active')->dropDownList([NULL => '', 0 => 'Отключен', 1 => 'Включен'])?></div>
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
                        <strong>Текущий баннер:</strong> <img src="/frontend/web/upload/images/cities/banner_city_<?= $post->url?>.webp" alt=""></div>
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
                    <h2 style="margin-top: 50px;">Контент</h2>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
<?php
$model->first_text = $all_info['first_text'];
$model->second_text = $all_info['second_text'];
$model->third_text = $all_info['third_text'];
$model->fourth_text = $all_info['fourth_text'];
?>
                    <?= $form->field($model, 'first_text')->widget(CKEditor::className(),[
                        'editorOptions' => [
                            'preset' => 'standart', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                            'inline' => false, //по умолчанию false
                        ],
                    ]);?>
                </div>

                <div class="col-md-12">
                    <?= $form->field($model, 'second_text')->widget(CKEditor::className(),[
                        'editorOptions' => [
                            'preset' => 'standart', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                            'inline' => false, //по умолчанию false
                        ],
                    ]);?>
                </div>

                <div class="col-md-12">
                    <?= $form->field($model, 'third_text')->widget(CKEditor::className(),[
                        'editorOptions' => [
                            'preset' => 'standart', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                            'inline' => false, //по умолчанию false
                        ],
                    ]);?>
                </div>

                <div class="col-md-12">
                    <?= $form->field($model, 'fourth_text')->widget(CKEditor::className(),[
                        'editorOptions' => [
                            'preset' => 'standart', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                            'inline' => false, //по умолчанию false
                        ],
                    ]);?>
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

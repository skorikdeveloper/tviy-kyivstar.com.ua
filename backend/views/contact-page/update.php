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
                        <strong>Текущий баннер:</strong> <img src="/frontend/web/upload/images/banner/banner_contact_page_<?= $page_info->lang?>.webp" alt=""></div>
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
                <div class="col-md-4"><?= $form->field($model, 'email_for_contact')->textInput(['value' => $all_info['email_for_contact']])?></div>
                <div class="col-md-4"><?= $form->field($model, 'number_for_contact')->textInput(['value' => $all_info['number_for_contact']])?></div>
                <div class="col-md-4"><?= $form->field($model, 'working_hours')->textInput(['value' => $all_info['working_hours']])?></div>
            </div>

            <div class="row">
                <div class="col-md-4"><?= $form->field($model, 'where_are_we')->textInput(['value' => $all_info['where_are_we']])?></div>
                <div class="col-md-4"><?= $form->field($model, 'center_text')->textInput(['value' => $all_info['center_text']])?></div>
                <div class="col-md-4"><?= $form->field($model, 'name_form')->textInput(['value' => $all_info['name_form']])?></div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 style="margin-top: 50px;">Соц сети</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <?= $form->field($model, 'soc_links')->widget(MultipleInput::className(), [
                        'addButtonPosition' => MultipleInput::POS_HEADER, // show add button in the header
                        'addButtonOptions' => ['label' => 'Добавить ссылку'],
                        'removeButtonOptions' => ['label' => 'Удалить ссылку'],
                        'columns' => [
                            [
                                'name'  => 'name_link',
                                'type'  => 'textInput',
                                'title' => 'Название сети',
                                'enableError' => true,
                            ],
                            [
                                'name'  => 'url_link',
                                'type'  => 'textInput',
                                'title' => 'Ссылка сети',
                                'enableError' => true,
                            ],
                            [
                                'name'  => 'class_link',
                                'type'  => 'textInput',
                                'title' => 'Класс иконки Fontawesome',
                                'enableError' => true,
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

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
/* @var $this yii\web\View */

?>
<div class="main-advantages-update box box-info">

    <div class="box-header">
        <strong class="text-danger">Если вы добавляете перевод для какого-либо города, то должны указать такую же ссылку на страницу.</strong>
    </div>

    <div class="box-body">

        <div class="home-internet-form">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'url')->textInput()?>
                </div>
                <div class="col-md-4"><?= $form->field($model, 'lang')->dropDownList([NULL => '','uk' => 'Украинский', 'ru' => 'Русский'])?></div>
                <div class="col-md-4"><?= $form->field($model, 'is_active')->dropDownList([NULL => '', 0 => 'Отключен', 1 => 'Включен'])?></div>
            </div>

            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'title')->textInput()?></div>
                <div class="col-md-6"><?= $form->field($model, 'meta_title')->textInput()?></div>
            </div>

            <div class="row">
                <div class="col-md-12"><?= $form->field($model, 'meta_desc')->textInput()?></div>
            </div>

            <div class="row">
                <div class="col-md-4"><?= $form->field($model, 'title_banner')->textInput()?></div>
                <div class="col-md-4"><?= $form->field($model, 'text_but_banner')->textInput()?></div>
                <div class="col-md-4"><?= $form->field($model, 'bgc_banner')->fileInput()?></div>
            </div>

            <div class="row">
                <div class="col-md-3"><?= $form->field($model, 'old_price_banner')->textInput()?></div>
                <div class="col-md-3"><?= $form->field($model, 'left_text_banner')->textInput()?></div>
                <div class="col-md-3"><?= $form->field($model, 'new_price_banner')->textInput()?></div>
                <div class="col-md-3"><?= $form->field($model, 'right_text_banner')->textInput()?></div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 style="margin-top: 50px;">Контент</h2>
                </div>
            </div>

            <div class="row">

                <div class="col-md-12">
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

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$all_info = unserialize($widget_info->all_info);
?>
<div class="main-advantages-update box box-info update-connect">

    <div class="box-body">

        <div class="home-internet-form">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-12"><?= $form->field($model, 'center_text')->textInput(['value' => $all_info['center_text']])?></div>
            </div>

            <div class="row">
                <div class="col-md-2"><?= $form->field($model, 'first_step')->textInput(['value' => $all_info['first_step']])?></div>
                <div class="col-md-2 text-center">
                    <img src="/frontend/web/upload/images/widget/widget_connect_icon_1_<?= $widget_info->lang?>.webp" alt="Текущая иконка" onError="this.src='/frontend/web/upload/images/no-image.webp'">
                </div>
                <div class="col-md-2"><?= $form->field($model, 'icon_1')->fileInput()?></div>
                <div class="col-md-2"><?= $form->field($model, 'second_step')->textInput(['value' => $all_info['second_step']])?></div>
                <div class="col-md-2 text-center">
                    <img src="/frontend/web/upload/images/widget/widget_connect_icon_2_<?= $widget_info->lang?>.webp" alt="Текущая иконка" onError="this.src='/frontend/web/upload/images/no-image.webp'">
                </div>
                <div class="col-md-2"><?= $form->field($model, 'icon_2')->fileInput()?></div>
            </div>

            <div class="row">
                <div class="col-md-2"><?= $form->field($model, 'third_step')->textInput(['value' => $all_info['third_step']])?></div>
                <div class="col-md-2 text-center">
                    <img src="/frontend/web/upload/images/widget/widget_connect_icon_3_<?= $widget_info->lang?>.webp" alt="Текущая иконка" onError="this.src='/frontend/web/upload/images/no-image.webp'">
                </div>
                <div class="col-md-2"><?= $form->field($model, 'icon_3')->fileInput()?></div>
                <div class="col-md-2"><?= $form->field($model, 'fourth_step')->textInput(['value' => $all_info['fourth_step']])?></div>
                <div class="col-md-2 text-center">
                    <img src="/frontend/web/upload/images/widget/widget_connect_icon_4_<?= $widget_info->lang?>.webp" alt="Текущая иконка" onError="this.src='/frontend/web/upload/images/no-image.webp'">
                </div>
                <div class="col-md-2"><?= $form->field($model, 'icon_4')->fileInput()?></div>
            </div>

            <div class="row">
                <div class="col-md-2"><?= $form->field($model, 'fifth_step')->textInput(['value' => $all_info['fifth_step']])?></div>
                <div class="col-md-2 text-center">
                    <img src="/frontend/web/upload/images/widget/widget_connect_icon_5_<?= $widget_info->lang?>.webp" alt="Текущая иконка" onError="this.src='/frontend/web/upload/images/no-image.webp'">
                </div>
                <div class="col-md-2"><?= $form->field($model, 'icon_5')->fileInput()?></div>
                <div class="col-md-2"><?= $form->field($model, 'sixth_step')->textInput(['value' => $all_info['sixth_step']])?></div>
                <div class="col-md-2 text-center">
                    <img src="/frontend/web/upload/images/widget/widget_connect_icon_6_<?= $widget_info->lang?>.webp" alt="Текущая иконка" onError="this.src='/frontend/web/upload/images/no-image.webp'">
                </div>
                <div class="col-md-2"><?= $form->field($model, 'icon_6')->fileInput()?></div>
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

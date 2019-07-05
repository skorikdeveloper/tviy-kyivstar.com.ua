<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$all_info = unserialize($widget_info->all_info);
?>
<div class="main-advantages-update box box-info">

    <div class="box-body">

        <div class="home-internet-form">

            <?php $form = ActiveForm::begin(); ?>

            <div class="row">
                <div class="col-md-6"><?= $form->field($model, 'first_text')->textInput(['value' => $all_info['first_text']])?></div>
                <div class="col-md-6"><?= $form->field($model, 'second_text')->textInput(['value' => $all_info['second_text']])?></div>
            </div>
            <div class="row">
                <div class="col-md-4"><?= $form->field($model, 'working_hours')->textInput(['value' => $all_info['working_hours']])?></div>
                <div class="col-md-4"><?= $form->field($model, 'tel')->textInput(['value' => $all_info['tel']])?></div>
                <div class="col-md-4"><?= $form->field($model, 'bgc_img')->fileInput()?></div>
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

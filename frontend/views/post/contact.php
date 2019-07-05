<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$model = new \frontend\models\ContactForm();
?>

<?= $this->render('../layouts/banner', [
    'post' => $post,
    'lang_data' => $lang_data,
    'all_info' => $all_info
])?>

<div class="site" id="contact-page">
    <div class="container">

        <div class="row before-form">

            <div class="col-md-4 col-sm-push-4 col-sm-4 center_text">
                <?= $all_info['center_text']?>
            </div>

            <div class="col-md-4 col-sm-pull-4 col-sm-4">
                <a href="tel:<?= str_replace("+", "", str_replace(" ", "", $all_info['number_for_contact']))?>"><?= $all_info['number_for_contact']?></a>
                <p><?= $all_info['working_hours']?></p>
            </div>

            <div class="col-md-4 col-sm-4">
                <a href="mailto:<?= $all_info['email_for_contact']?>"><?= $all_info['email_for_contact']?></a>
                <p><?= $all_info['where_are_we']?></p>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-contact">
                    <h3 class="name-form"><?= $all_info['name_form']?></h3>
                    <?php $form_contact =  ActiveForm::begin(['action' => ['contact-form/call-back']])?>
                    <?= $form_contact->field($model,'name', ['template' => "{label}\n{input}"])->textInput()->label(Yii::t('app', 'Имя').':')?>
                    <?= $form_contact->field($model,'phone', ['template' => "{label}\n{input}"])->textInput()->label(Yii::t('app', 'Телефон').':')?>
                    <?= $form_contact->field($model,'order')->dropDownList([
                            'Домашний интернет' => 'Домашний интернет',
                            'Домашнее телевидение' => 'Домашнее телевидение',
                            'Вместе выгоднее' => 'Вместе выгоднее',
                        ])->label(Yii::t('app', 'Услуга').':')?>
                    <input type="hidden" name="class" value="gtm-contact">
                    <div class="form-group text-center">
                        <?= Html::submitButton(Yii::t('app', 'Отправить!'), ['class' => 'btn main-btn']) ?>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>

            </div>
        </div>

    </div>
</div>


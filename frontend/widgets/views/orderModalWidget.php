<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

?>

<!-- Modal -->
<?php
Modal::begin([
    'id' => 'orderModal',
]);
?>

    <div class="left"><img src="<?= Yii::getAlias('@web/upload/images/modal/img_modal.webp')?>"></div>

    <div class="right">

        <ul>
            <li>
                <img src="<?= Yii::getAlias('@web/upload/images/modal/tv.webp')?>" alt="">
                <p><?= Yii::t('app', 'Домашний интернет')?></p>
            </li>
            <li>
                <img src="<?= Yii::getAlias('@web/upload/images/modal/phone.webp')?>" alt="">
                <p><?= Yii::t('app', 'Мобильная связь')?></p>
            </li>
            <li>
                <img src="<?= Yii::getAlias('@web/upload/images/modal/tanks.webp')?>" alt="">
                <p><?= Yii::t('app', 'Игровые преимущества')?></p>
            </li>
        </ul>

        <?php $form = ActiveForm::begin(['id' => 'order-form']); ?>

        <p><?= Yii::t('app', 'Оставь свой номер и пользуйся самым передовым провайдером в Украине уже сейчас!')?></p>
        <?= $form->field($model,'name', ['template' => "{label}\n{input}"])->textInput(['placeholder' => Yii::t('app', 'Имя')])->label(false)?>
        <?= $form->field($model,'phone', ['template' => "{label}\n{input}"])->textInput(['placeholder' => Yii::t('app', 'Телефон')])->label(false)?>

        <input type="hidden" name="info">
        <input type="hidden" name="class">

        <?= Html::submitButton(Yii::t('app', 'Перезвоните мне!'), ['class' => 'btn main-btn']) ?>

        <?php ActiveForm::end(); ?>

    </div>

<?php Modal::end(); ?>
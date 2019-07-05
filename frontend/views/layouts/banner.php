<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$model = new \frontend\models\ContactForm();
?>
<div class="banner" style="background-image: url('<?= $all_info['banner_img']?>');">
    <div class="logo"><a href="/"><img src="<?= Yii::getAlias('@web/upload/images/kiev-logo.webp')?>" alt=""></a></div>

    <div class="container">
        <div class="row">
            <div class="col-md-7 banner-content">
                <h1><?= $all_info['title_banner']?></h1>

                <?php $form =  ActiveForm::begin()?>

                <?= $form->field($model,'name', ['template' => "{label}\n{input}"])->textInput(['placeholder' => Yii::t('app', 'Имя')])->label(false)?>
                <?= $form->field($model,'phone', ['template' => "{label}\n{input}"])->textInput(['placeholder' => Yii::t('app', 'Телефон')])->label(false)?>
                <input type="hidden" name="class" value="gtm-head-footer">

                <div class="banner-prices-wrap">
                    <?= Html::submitButton($all_info['text_but_banner'], ['class' => 'btn main-btn']) ?>

                    <span class="price-wrapper">
                        <?php echo $all_info['old_price_banner'] != '' ? '<span class="old-price">'.$all_info['old_price_banner'].'</span>': '';?>
                        <?php echo $all_info['left_text_banner'] != '' ? '<span style="color: #fff">'.$all_info['left_text_banner'].'</span>' : '';?>
                        <span class="new-price"><?= $all_info['new_price_banner']?></span>
                        <?php echo $all_info['right_text_banner'] != '' ? $all_info['right_text_banner'] : '';?>
                    </span>
                </div>

                <?php ActiveForm::end();?>

            </div>
        </div>
    </div>
</div>
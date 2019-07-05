<?php
use backend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

dmstr\web\AdminLteAsset::register($this);
AppAsset::register($this);

$this->registerJs("
    $(document).ready(function() {
        if($('.login-box-body #login-form div').hasClass('has-error')) {
           $('.login-box-body').removeClass('box-info').addClass('box-danger');
        } else if(!$('.login-box-body').hasClass('box-info')){ 
            $('.login-box-body').removeClass('box-danger').addClass('box-success');
        }
    });
");
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="/upload/images/favicon.webp" sizes="32x32">
</head>
<body class="login-page">

<?php $this->beginBody() ?>

<?= $content ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

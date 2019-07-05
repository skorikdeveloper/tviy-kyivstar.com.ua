<?php use yii\helpers\Html;?>
<?php if(!empty($post)) echo '<span>Подключение в городах:</span>'?>
<?php foreach($post as $link): ?>
    <?= Html::a($link['title'], \yii\helpers\Url::to(['post/city', 'url' => $link['url']]), ['target' => '_blank'])?>
<?php endforeach; ?>

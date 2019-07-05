<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
Yii::$app->session->set('error', true);
?>
<div class="site-error">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= Html::encode($this->title) ?></h1>

                <div class="alert alert-danger">
                    <?= nl2br(Html::encode($message)) ?>
                </div>

                <?php if(Yii::$app->language == 'ru') :?>
                    <p>
                        Если вы думаете, что это ошибка сервера, пожалуйста, свяжитесь с нами.
                    </p>
                    <p>
                        <?= Html::a('Вернуться на главную', ['/'])?>
                    </p>
                <?php else: ?>
                    <p>
                        Якщо ви думаєте, що це помилка сервера, будь ласка, зв'яжіться з нами.
                    </p>
                    <p>
                        <?= Html::a('Повернутися на головну', ['/'])?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>


</div>

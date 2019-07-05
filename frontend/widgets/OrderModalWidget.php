<?php

namespace frontend\widgets;

use frontend\models\ContactForm;
use Yii;
use yii\base\Widget;

class OrderModalWidget extends Widget
{

    public function run()
    {
        $model = new ContactForm();

        return $this->render('orderModalWidget', [
            'model' => $model,
        ]);
    }

}
<?php

namespace frontend\widgets;

use backend\models\Widgets;
use Yii;
use yii\base\Widget;
use yii\base\Exception;

class ShowContentWidget extends Widget
{
    public $widget_id;

    public function init()
    {
        parent::init();
        if ($this->widget_id === null) {
            throw new Exception('Введите widget_id.');
        }
    }

    public function run()
    {
        $widget = Widgets::find()->where(['widget_id' => $this->widget_id, 'lang' => Yii::$app->language])->one();
        $all_info = unserialize($widget->all_info);

        return $this->render('widget-'.$this->widget_id, [
            'widget' => $widget,
            'all_info' => $all_info
        ]);
    }

}
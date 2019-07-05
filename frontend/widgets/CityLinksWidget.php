<?php

namespace frontend\widgets;

use frontend\models\LangPost;
use Yii;
use yii\base\Widget;
use yii\base\Exception;
use frontend\models\Post;

class CityLinksWidget extends Widget
{

    public function run()
    {
        $model = new Post();
        $post = $model->find()->where(['is_city' => 1, 'is_active' => 1])->asArray()->all();

        $i=0;
        foreach ($post as $link){
            $post[$i]['title'] = LangPost::find()->where(['post_id' => $link['id'], 'lang' => Yii::$app->language])->one()->title;
            if(empty($post[$i]['title']))
                unset($post[$i]);
            $i++;
        }

        return $this->render('city-links', [
            'post' => $post,
        ]);
    }

}
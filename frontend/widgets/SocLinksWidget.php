<?php

namespace frontend\widgets;

use frontend\models\LangPost;
use Yii;
use yii\base\Widget;
use yii\base\Exception;
use frontend\models\Post;

class SocLinksWidget extends Widget
{

    public function run()
    {
        $model = new Post();
        $post = $model->find()->where(['id' => 5])->one();
        //данные поста из связанной таблицы lang_post
        $lang_data = $post->getDataPosts();

        $all_info = unserialize($lang_data->all_info);
        $soc_links = $all_info['soc_links'];

        return $this->render('soc-links', [
            'soc_links' => $soc_links,
        ]);
    }

}
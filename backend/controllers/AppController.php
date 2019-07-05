<?php

namespace backend\controllers;

use yii\web\Controller;
use frontend\models\Post;
use Yii;

class AppController extends Controller
{
    protected function setMeta($title = null, $keywords = null, $description = null) {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }

    public static function getDateForModel(){
        date_default_timezone_set('Europe/Kiev');
        return date('Y-m-d H:i:s');
    }

    public static function printR($obj){
        echo '<pre>';
        print_r($obj);
        echo '</pre>';
    }

    public static function printNamePage(){
        $links = Post::find()->all();
        $model = new Post();

        foreach ($links as $row) {
            $post = $model->find()->where(['id' => $row->id])->one();
            $lang_data = $post->getDataPosts();
            if($row->id == 1 && Yii::$app->request->pathInfo == '') {
                echo '<p class="name-page">'.$lang_data->title.'</p>';
                return;
            }
            else if(Yii::$app->request->pathInfo == $post->url || Yii::$app->request->pathInfo == 'city/'.$post->url) {
                echo '<p class="name-page">'.$lang_data->title.'</p>';
                return;
            }
            unset($lang_data, $post);
        }
    }
}
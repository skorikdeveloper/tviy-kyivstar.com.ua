<?php

namespace frontend\controllers;

use backend\controllers\AppController;
use backend\models\HomeInternet;
use backend\models\Together;
use frontend\models\Post;
use yii\web\HttpException;
use Yii;

class PostController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new Post();
        $post = $model->find()->where(['id' => 1])->one();
        //данные поста из связанной таблицы lang_post
        $lang_data = $post->getDataPosts();

        $all_info = unserialize($lang_data->all_info);
        $this->setMeta($all_info['meta_title'], '', $all_info['meta_desc']);

        return $this->render('index', [
            'post' => $post,
            'lang_data' => $lang_data,
            'all_info' => $all_info
        ]);
    }

    public function actionView($url)
    {
        $model = new Post();
        //пост соответствующий переданному url
        $post = $model->getPost($url);

        if(empty($post)) throw new HttpException(404 ,'Извините такой страницы не существует.');

        //данные поста из связанной таблицы lang_post
        $lang_data = $post->getDataPosts();

        $all_info = unserialize($lang_data->all_info);
        $this->setMeta($all_info['meta_title'], '', $all_info['meta_desc']);

        // Выбираем шаблон для рендера
        if($post->id == 2) $view = 'home-television';
        else if($post->id == 3) $view = 'together';
        else if($post->id == 4) $view = 'questions';
        else if($post->id == 5) $view = 'contact';
        else if($post->id == 1) $view = 'index';
        else throw new HttpException(404 ,'Извините такой страницы не существует.');

        return $this->render($view, [
            'post' => $post,
            'lang_data' => $lang_data,
            'all_info' => $all_info
        ]);
    }

    public function actionCity($url){
        $model = new Post();
        //пост соответствующий переданному url
        $post = $model->getPost($url);

        if(empty($post)) throw new HttpException(404 ,'Извините такой страницы не существует.');

        //данные поста из связанной таблицы lang_post
        $lang_data = $post->getDataPosts();

        if(empty($lang_data)) throw new HttpException(404 ,'Извините такой страницы не существует.');

        $all_info = unserialize($lang_data->all_info);
        $this->setMeta($all_info['meta_title'], '', $all_info['meta_desc']);

        $inet_data = HomeInternet::getAllData();
        $together_data = Together::getAllData();

        return $this->render('city', [
            'post' => $post,
            'lang_data' => $lang_data,
            'all_info' => $all_info,
            'inet_data' => $inet_data,
            'together_data' => $together_data
        ]);
    }

    public function actionError()
    {
        return $this->render('error');
    }

}

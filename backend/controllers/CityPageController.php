<?php
namespace backend\controllers;

use backend\models\CityPage;
use frontend\models\Post;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LangPost;
use yii\web\UploadedFile;

class CityPageController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'update', 'create', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->setMeta('Твой Киевстар | Города');

        $model = new ActiveDataProvider([
            'query' => LangPost::find()->where(['is_city' => 1]),
            'sort' => false
        ]);

        return $this->render('index', ['model' => $model]);
    }

    public function actionCreate(){

        $model = new CityPage();

        $this->setMeta('Твой Киевстар | Создать страницу города');

        if ($model->load(Yii::$app->request->post())) {
            // сохраняем главный баннер
            $model->bgc_banner = UploadedFile::getInstance($model, 'bgc_banner');
            if($model->bgc_banner) {
                $model->bgc_banner->name = 'banner_city_'.$model->url.'_'.$model->lang.'.webp';
                $path = Yii::getAlias('@frontend/web/upload/images/cities/').$model->bgc_banner->name;
                $model->bgc_banner->saveAs($path);
                $all_info['banner_img'] = '/frontend/web/upload/images/cities/'.$model->bgc_banner->name;
            }

            $all_info['meta_title'] = $model->meta_title;
            $all_info['meta_desc'] = $model->meta_desc;
            $all_info['title_banner'] = $model->title_banner;
            $all_info['text_but_banner'] = $model->text_but_banner;
            $all_info['old_price_banner'] = $model->old_price_banner;
            $all_info['new_price_banner'] = $model->new_price_banner;
            $all_info['left_text_banner'] = $model->left_text_banner;
            $all_info['right_text_banner'] = $model->right_text_banner;
            $all_info['first_text'] = $model->first_text;
            $all_info['second_text'] = $model->second_text;
            $all_info['third_text'] = $model->third_text;
            $all_info['fourth_text'] = $model->fourth_text;
            $all_info = serialize($all_info);

            $page_info = new LangPost();

            if(Post::find()->where(['url' => $model->url])->exists()) $page_info->post_id = Post::find()->where(['url' => $model->url])->one()->id;
            else {
                $post = new Post();
                $post->url = $model->url;
                $post->is_city = 1;
                $post->is_active = $model->is_active;
                $post->save();
                $page_info->post_id = $post->id;
            }

            $page_info->title = $model->title;
            $page_info->all_info = $all_info;
            $page_info->lang = $model->lang;
            $page_info->is_city = 1;

            if($page_info->save()){
                Yii::$app->session->setFlash('success', "Город успешно добавлен.");
                return $this->redirect(['index']);
            }

        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $page_info = LangPost::find()->where(['id' => $id])->one();
        $model = new CityPage();
        $post = Post::find()->where(['id' => $page_info->post_id])->one();

        $this->setMeta('Твой Киевстар | Изменить страницу "'. $page_info->title . '" | Язык - ' .$page_info->lang);

        $old_info = unserialize($page_info->all_info);

        if ($model->load(Yii::$app->request->post())) {
            // сохраняем главный баннер
            $model->bgc_banner = UploadedFile::getInstance($model, 'bgc_banner');
            if($model->bgc_banner) {
                $model->bgc_banner->name = 'banner_city_'.$model->url.'_'.$model->lang.'.webp';
                $path = Yii::getAlias('@frontend/web/upload/images/cities/').$model->bgc_banner->name;
                $model->bgc_banner->saveAs($path);
                $all_info['banner_img'] = '/frontend/web/upload/images/cities/'.$model->bgc_banner->name;
            } else $all_info['banner_img'] = $old_info['banner_img'];

            $all_info['meta_title'] = $model->meta_title;
            $all_info['meta_desc'] = $model->meta_desc;
            $all_info['title_banner'] = $model->title_banner;
            $all_info['text_but_banner'] = $model->text_but_banner;
            $all_info['old_price_banner'] = $model->old_price_banner;
            $all_info['new_price_banner'] = $model->new_price_banner;
            $all_info['left_text_banner'] = $model->left_text_banner;
            $all_info['right_text_banner'] = $model->right_text_banner;
            $all_info['first_text'] = $model->first_text;
            $all_info['second_text'] = $model->second_text;
            $all_info['third_text'] = $model->third_text;
            $all_info['fourth_text'] = $model->fourth_text;
            $all_info = serialize($all_info);

            $page_info->title = $model->title;
            $page_info->lang = $model->lang;
            $page_info->all_info = $all_info;

            $post->url = $model->url; // сохраняем url
            $post->is_active = $model->is_active; // сохраняем url

            if($page_info->save() && $post->save()){
                Yii::$app->session->setFlash('success', "Страница успешно изменена.");
                return $this->redirect(['index']);
            }

        }
        return $this->render('update', [
            'model' => $model,
            'page_info' => $page_info,
            'post' => $post,
        ]);
    }

    public function actionDelete($id, $lang, $post_id){

        if(count(LangPost::find()->where(['post_id' => $post_id])->asArray()->all()) < 2) Post::deleteAll(['id' => $post_id]);

        LangPost::deleteAll(['id' => $id, 'lang' => $lang]);
        $url = Post::find()->where(['id' => $post_id])->one()->url;

        if(file_exists(Yii::getAlias('@frontend/web/upload/images/cities/banner_city_'.$url.'_'.$lang.'.webp'))) {
            unlink(Yii::getAlias('@frontend/web/upload/images/cities/banner_city_'.$url.'_'.$lang.'.webp'));
        }

        Yii::$app->session->setFlash('danger', 'Город успешно удален.');
        return $this->redirect(['index']);
    }

}

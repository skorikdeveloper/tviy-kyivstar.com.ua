<?php
namespace backend\controllers;

use backend\models\HomeTelevision;
use frontend\models\Post;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LangPost;
use yii\web\UploadedFile;

class HomeTelevisionController extends AppController
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
                        'actions' => ['index', 'update'],
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
        $this->setMeta('Твой Киевстар | Домашнее телевидение');

        $model = new ActiveDataProvider([
            'query' => LangPost::find()->where(['post_id' => 2]),
            'sort' => false
        ]);

        return $this->render('index', ['model' => $model]);
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $page_info = LangPost::find()->where(['id' => $id])->one();
        $model = new HomeTelevision();
        $post = Post::find()->where(['id' => 2])->one();

        $this->setMeta('Твой Киевстар | Изменить страницу "'. $page_info->title . '" | Язык - ' .$page_info->lang);

        $old_info = unserialize($page_info->all_info);
        $model->blocks_tarif = $old_info['blocks_tarif'];

        if ($model->load(Yii::$app->request->post())) {
            // сохраняем картинки для преимуществ
            $i = 1;
            while($i<=3) {
                $model->upload('img_adv_'.$i, $page_info->lang);
                $i++;
            }

            // сохраняем главный баннер
            $model->bgc_banner = UploadedFile::getInstance($model, 'bgc_banner');
            if($model->bgc_banner) {
                $model->bgc_banner->name = 'banner_tv_'.$page_info->lang.'.webp';
                $path = Yii::getAlias('@frontend/web/upload/images/banner/').$model->bgc_banner->name;
                $model->bgc_banner->saveAs($path);
                $all_info['banner_img'] = '/frontend/web/upload/images/banner/'.$model->bgc_banner->name;
            } else $all_info['banner_img'] = $old_info['banner_img'];

            $all_info['meta_title'] = $model->meta_title;
            $all_info['meta_desc'] = $model->meta_desc;
            $all_info['title_banner'] = $model->title_banner;
            $all_info['text_but_banner'] = $model->text_but_banner;
            $all_info['old_price_banner'] = $model->old_price_banner;
            $all_info['new_price_banner'] = $model->new_price_banner;
            $all_info['left_text_banner'] = $model->left_text_banner;
            $all_info['right_text_banner'] = $model->right_text_banner;
            $all_info['text_advantages_1'] = $model->text_advantages_1;
            $all_info['text_advantages_2'] = $model->text_advantages_2;
            $all_info['text_advantages_3'] = $model->text_advantages_3;
            $all_info['name_tv_block'] = $model->name_tv_block;
            $all_info['text_tv_block'] = $model->text_tv_block;
            $all_info['block_tarif_name'] = $model->block_tarif_name;
            $all_info['blocks_tarif'] = $model->blocks_tarif;
            $all_info['block_tarif_text_both'] = $model->block_tarif_text_both;
            $all_info = serialize($all_info);

            $page_info->title = $model->title;
            $page_info->all_info = $all_info;

            $post->url = $model->url; // сохраняем url

            if($page_info->save() && $post->save()){
                Yii::$app->session->setFlash('success', "Страница успешно изменена.");
                return $this->redirect(['index']);
            }

        }
        return $this->render('update', [
            'model' => $model,
            'page_info' => $page_info,
            'post' => $post
        ]);
    }

}

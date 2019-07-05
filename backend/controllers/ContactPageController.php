<?php
namespace backend\controllers;

use backend\models\ContactPage;
use frontend\models\Post;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LangPost;
use yii\web\UploadedFile;

class ContactPageController extends AppController
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
        $this->setMeta('Твой Киевстар | Страница Контакты');

        $model = new ActiveDataProvider([
            'query' => LangPost::find()->where(['post_id' => 5]),
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
        $model = new ContactPage();
        $post = Post::find()->where(['id' => 5])->one();

        $this->setMeta('Твой Киевстар | Изменить страницу "'. $page_info->title . '" | Язык - ' .$page_info->lang);

        $old_info = unserialize($page_info->all_info);
        $model->soc_links = $old_info['soc_links'];

        if ($model->load(Yii::$app->request->post())) {
            // сохраняем главный баннер
            $model->bgc_banner = UploadedFile::getInstance($model, 'bgc_banner');
            if($model->bgc_banner) {
                $model->bgc_banner->name = 'banner_contact_page_'.$page_info->lang.'.webp';
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
            $all_info['email_for_contact'] = $model->email_for_contact;
            $all_info['working_hours'] = $model->working_hours;
            $all_info['number_for_contact'] = $model->number_for_contact;
            $all_info['where_are_we'] = $model->where_are_we;
            $all_info['center_text'] = $model->center_text;
            $all_info['name_form'] = $model->name_form;
            $all_info['soc_links'] = $model->soc_links;
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
            'post' => $post,
        ]);
    }

}

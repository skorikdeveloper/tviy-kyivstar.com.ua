<?php
namespace backend\controllers;

use backend\models\ConnectWidget;
use backend\models\NeedHelpWidget;
use backend\models\Widgets;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;

class WidgetsController extends AppController
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
                        'actions' => ['index', 'update', 'update-need-help', 'update-connect'],
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
        $this->setMeta('Твой Киевстар | Виджеты');

        $model = new ActiveDataProvider([
            'query' => Widgets::find(),
            'sort' => false
        ]);

        return $this->render('index', ['model' => $model]);
    }


    public function actionUpdateNeedHelp($id){

        $widget_info = $this->findModel($id);
        $model = new NeedHelpWidget();
        $this->setMeta('Твой Киевстар | Изменить виджет "'. $widget_info->title . '" | Язык - ' .$widget_info->lang);

        if ($model->load(Yii::$app->request->post())) {

            $old_info = unserialize($widget_info->all_info);

            // сохраняем задний фон
            $model->bgc_img = UploadedFile::getInstance($model, 'bgc_img');
            if($model->bgc_img) {
                $model->bgc_img->name = 'widget_need_help_banner_'.$widget_info->lang.'.webp';
                $path = Yii::getAlias('@frontend/web/upload/images/widget/').$model->bgc_img->name;
                $model->bgc_img->saveAs($path);
                $all_info['bgc_img'] = '/frontend/web/upload/images/widget/'.$model->bgc_img->name;
            } else $all_info['bgc_img'] = $old_info['bgc_img'];


            $all_info['first_text'] = $model->first_text;
            $all_info['second_text'] = $model->second_text;
            $all_info['tel'] = $model->tel;
            $all_info['working_hours'] = $model->working_hours;
            $all_info = serialize($all_info);

            $widget_info->all_info = $all_info;

            if($widget_info->save()){
                Yii::$app->session->setFlash('success', "Виджет успешно изменен.");
                return $this->redirect(['index']);
            }

        }
        return $this->render('update-need-help', [
            'model' => $model,
            'widget_info' => $widget_info
        ]);
    }

    public function actionUpdateConnect($id){

        $widget_info = $this->findModel($id);
        $model = new ConnectWidget();
        $this->setMeta('Твой Киевстар | Изменить виджет "'. $widget_info->title . '" | Язык - ' .$widget_info->lang);

        if ($model->load(Yii::$app->request->post())) {

            // сохраняем иконки для виджета
            $i = 1;
            while($i<=6) {
                $model->upload('icon_'.$i, $widget_info->lang);
                $i++;
            }

            $all_info['first_step'] = $model->first_step;
            $all_info['second_step'] = $model->second_step;
            $all_info['third_step'] = $model->third_step;
            $all_info['fourth_step'] = $model->fourth_step;
            $all_info['fifth_step'] = $model->fifth_step;
            $all_info['sixth_step'] = $model->sixth_step;
            $all_info['center_text'] = $model->center_text;
            $all_info = serialize($all_info);

            $widget_info->all_info = $all_info;

            if($widget_info->save()){
                Yii::$app->session->setFlash('success', "Виджет успешно изменен.");
                return $this->redirect(['index']);
            }

        }
        return $this->render('update-connect', [
            'model' => $model,
            'widget_info' => $widget_info
        ]);
    }

    /**
     * Finds the Widgets model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Widgets the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Widgets::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}

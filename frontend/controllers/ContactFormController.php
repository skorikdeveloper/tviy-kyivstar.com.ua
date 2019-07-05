<?php

namespace frontend\controllers;

use backend\controllers\AppController;
use frontend\models\ContactForm;
use Yii;
use yii\web\HttpException;

class ContactFormController extends AppController
{
    public function actionCallBack(){
        if(!Yii::$app->request->isAjax) throw new HttpException(404 ,'Извините такой страницы не существует.');

        $model = new ContactForm();
        $model->name = trim(Yii::$app->request->post('ContactForm')['name']);
        $model->phone = trim(Yii::$app->request->post('ContactForm')['phone']);
        $model->body = '<p>Имя: '.$model->name.'</p>';
        $model->body .= '<p>Телефон: '.$model->phone.'</p>';

        if(!empty(Yii::$app->request->post('ContactForm')['order'])) {
            $model->order = trim(Yii::$app->request->post('ContactForm')['order']);
            $model->body .= '<p>Услуга: '.$model->order.'</p>';
        }

        if(!empty(Yii::$app->request->post('info'))) {
            $model->body .= '<p>Источник: '.Yii::$app->request->post('info').'</p>';
        }

        $model->sendEmail();
        return Yii::$app->request->post('class');
    }
}
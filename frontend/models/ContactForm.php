<?php

namespace frontend\models;

use backend\models\ContactPage;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public  $name,
            $phone,
            $body,
            $order,
            $verifyCode;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'phone'], 'required'],
            [ ['phone'], 'number'],
            [ ['phone'], 'string', 'min'=>9, 'max'=>15, 'tooShort' => '{attribute} должен быть больше 9 символов' , 'tooLong' => '{attribute} должен быть меньше 15 символов' ],
            [ ['order', 'body'], 'string'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'order' => 'Услуга',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @return bool whether the email was sent
     */
    public function sendEmail()
    {
        return Yii::$app->mailer->compose()
            ->setTo(ContactPage::getMail())
            ->setFrom(ContactPage::getMail())
            ->setSubject('Заявка с сайта киевстар')
            ->setHtmlBody($this->body)
            ->send();
    }
}

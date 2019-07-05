<?php

namespace backend\models;

use frontend\models\LangPost;
use Yii;
use yii\db\ActiveRecord;

/**
 *
 */
class ContactPage extends ActiveRecord
{
    public $title,
            $url,
            $meta_title,
            $meta_desc,
            $bgc_banner,
            $title_banner,
            $text_but_banner,
            $old_price_banner,
            $new_price_banner,
            $left_text_banner,
            $right_text_banner,
            $email_for_contact,
            $working_hours,
            $number_for_contact,
            $where_are_we,
            $center_text,
            $name_form,
            $soc_links;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'meta_title', 'meta_desc', 'title_banner', 'text_but_banner', 'new_price_banner', 'url', 'email_for_contact', 'working_hours', 'number_for_contact', 'where_are_we', 'name_form', 'center_text', 'soc_links'], 'required',],
            [['post_id','id'], 'integer'],
            [['text_but_banner', 'old_price_banner', 'new_price_banner', 'left_text_banner', 'right_text_banner', 'name_form', 'number_for_contact'], 'string', 'max' => 32],
            [['title', 'url', 'working_hours', 'where_are_we'], 'string', 'max' => 64],
            [['meta_title'], 'string', 'max' => 70],
            [['meta_desc', 'center_text'], 'string', 'max' => 160],
            [['title_banner'], 'string', 'max' => 128],
            [['bgc_banner'], 'file', 'extensions' => 'webp'],
            [['email_for_contact'], 'email'],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function attributeLabels()
    {
        return [
            'title' => 'Название страницы (в меню сайта)',
            'url' => 'Ссылка на страницу',
            'meta_title' => 'Мета title страницы (не более 70 символов)',
            'meta_desc' => 'Мета description страницы (не более 160 символов)',
            'bgc_banner' => 'Задний фон баннера',
            'title_banner' => 'Заголовок на баннере',
            'text_but_banner' => 'Надпись в кнопке на баннере',
            'old_price_banner' => 'Старая цена на баннере',
            'new_price_banner' => 'Новая цена на баннере',
            'left_text_banner' => 'Подпись к цене слева',
            'right_text_banner' => 'Подпись к цене справа',
            'email_for_contact' => 'Email для связи с нами',
            'working_hours' => 'Время работы',
            'number_for_contact' => 'Номер телефона для связи',
            'where_are_we' => 'Где мы находимся',
            'center_text' => 'Центральный текст',
            'name_form' => 'Название формы',
            'soc_links' => 'Соц. сети'
        ];
    }

    static function getPhone(){
        $all_info = LangPost::find()->where(['post_id' => 5])->one()->all_info;
        $all_info = unserialize($all_info);
        return $all_info['number_for_contact'];
    }
    static function getMail(){
        $all_info = LangPost::find()->where(['post_id' => 5])->one()->all_info;
        $all_info = unserialize($all_info);
        return $all_info['email_for_contact'];
    }


}

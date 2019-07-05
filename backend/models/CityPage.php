<?php

namespace backend\models;

use yii\db\ActiveRecord;

/**
 *
 */
class CityPage extends ActiveRecord
{
    public $title,
        $url,
        $lang,
        $meta_title,
        $meta_desc,
        $bgc_banner,
        $title_banner,
        $text_but_banner,
        $old_price_banner,
        $new_price_banner,
        $left_text_banner,
        $right_text_banner,
        $first_text,
        $second_text,
        $third_text,
        $fourth_text,
        $is_active;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'meta_title', 'meta_desc', 'title_banner', 'text_but_banner', 'new_price_banner', 'url', 'lang', 'first_text', 'second_text', 'third_text', 'fourth_text', 'is_active'], 'required',],
            [['post_id','id', 'is_active'], 'integer'],
            [['text_but_banner', 'old_price_banner', 'new_price_banner', 'left_text_banner', 'right_text_banner'], 'string', 'max' => 32],
            [['title', 'url', 'lang'], 'string', 'max' => 64],
            [['meta_title'], 'string', 'max' => 70],
            [['meta_desc'], 'string', 'max' => 160],
            [['title_banner'], 'string', 'max' => 128],
            [['first_text', 'second_text', 'third_text', 'fourth_text'], 'string'],
            [['bgc_banner'], 'file', 'extensions' => 'webp'],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function attributeLabels()
    {
        return [
            'title' => 'Название города',
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
            'lang' => 'Язык',
            'first_text' => 'Первый блок',
            'second_text' => 'Второй блок',
            'third_text' => 'Третий блок',
            'fourth_text' => 'Четвертый блок',
            'is_active' => 'Отображение города на сайте',
        ];
    }

}

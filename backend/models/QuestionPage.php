<?php

namespace backend\models;

use frontend\models\LangPost;
use Yii;
use yii\db\ActiveRecord;

/**
 *
 */
class QuestionPage extends ActiveRecord
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
        $right_text_banner;

    public $blocks = [];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'meta_title', 'meta_desc', 'title_banner', 'text_but_banner', 'new_price_banner', 'url', 'blocks'], 'required'],
            [['post_id','id'], 'integer'],
            [['text_but_banner', 'old_price_banner', 'new_price_banner', 'left_text_banner', 'right_text_banner'], 'string', 'max' => 32],
            [['title', 'url'], 'string', 'max' => 64],
            [['meta_title'], 'string', 'max' => 70],
            [['meta_desc'], 'string', 'max' => 160],
            [['title_banner'], 'string', 'max' => 128],
            [['bgc_banner'], 'file', 'extensions' => 'webp'],
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
            'blocks' => 'Название блока',
        ];
    }

}

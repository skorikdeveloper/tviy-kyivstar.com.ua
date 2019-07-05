<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 *
 */
class HomeTelevision extends ActiveRecord
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
        $text_advantages_1,
        $text_advantages_2,
        $text_advantages_3,
        $name_tv_block,
        $text_tv_block;

    public  $img_adv_1,
            $img_adv_2,
            $img_adv_3;

    public  $block_tarif_name,
            $block_tarif_text_both;
    public $blocks_tarif = [];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'meta_title', 'meta_desc', 'title_banner', 'text_but_banner', 'new_price_banner', 'url', 'text_advantages_1', 'text_advantages_2', 'text_advantages_3', 'name_tv_block', 'text_tv_block', 'blocks_tarif', 'block_tarif_name'], 'required'],
            [['post_id','id'], 'integer'],
            [['text_but_banner', 'old_price_banner', 'new_price_banner', 'left_text_banner', 'right_text_banner'], 'string', 'max' => 32],
            [['title', 'url', 'name_tv_block', 'block_tarif_name'], 'string', 'max' => 64],
            [['meta_title'], 'string', 'max' => 70],
            [['meta_desc', 'text_advantages_1', 'text_advantages_2', 'text_advantages_3'], 'string', 'max' => 160],
            [['title_banner'], 'string', 'max' => 128],
            [['text_tv_block', 'block_tarif_text_both'], 'string'],
            [['bgc_banner', 'img_adv_1', 'img_adv_2', 'img_adv_3'], 'file', 'extensions' => 'webp']
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
            'text_advantages_1' => 'Подпись к картинке',
            'text_advantages_2' => 'Подпись к картинке',
            'text_advantages_3' => 'Подпись к картинке',
            'img_adv_1' => 'Картинка',
            'img_adv_2' => 'Картинка',
            'img_adv_3' => 'Картинка',
            'name_tv_block' => 'Заголовок',
            'text_tv_block' => 'Текст',
            'blocks_tarif' => 'это поле',
            'block_tarif_name' => 'Заголовок',
            'block_tarif_text_both' => 'Текст после тарифов',
        ];
    }

    public function upload($icon, $lang)
    {
        $this->$icon = UploadedFile::getInstance($this, $icon);
        if($this->$icon) {
            $this->$icon->name = 'advantages_home_television_' . $icon . '_' . $lang . '.webp';
            $path = Yii::getAlias('@frontend/web/upload/images/advantages/') . $this->$icon->name;
            $this->$icon->saveAs($path);
        }

        return true;
    }

}

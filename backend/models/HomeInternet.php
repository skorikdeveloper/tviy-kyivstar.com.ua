<?php

namespace backend\models;

use frontend\models\LangPost;
use yii\web\UploadedFile;
use Yii;
use yii\db\ActiveRecord;

/**
 *
 */
class HomeInternet extends ActiveRecord
{
    public $title,
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
            $text_advantages_4,
            $name_block;

    public  $name_dop_block,
            $title_dop_1,
            $text_dop_1_1,
            $text_dop_1_2,
            $text_dop_1_3,
            $price_both_dop_1,
            $img_dop_1,
            $title_dop_2,
            $text_dop_2_1,
            $text_dop_2_2,
            $text_dop_2_3,
            $price_both_dop_2,
            $img_dop_2;

    public  $name_stock,
            $text_stock,
            $bgc_stock;

    public $blocks_tarif = [];

    public  $img_adv_1,
            $img_adv_2,
            $img_adv_3,
            $img_adv_4;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'title',
                    'meta_title',
                    'meta_desc',
                    'title_banner',
                    'text_but_banner',
                    'new_price_banner',
                    'text_advantages_1',
                    'text_advantages_2',
                    'text_advantages_3',
                    'text_advantages_4',
                    'name_block',
                    'blocks_tarif',
                    'name_dop_block',
                    'title_dop_1',
                    'title_dop_2',
                    'text_dop_1_1',
                    'text_dop_1_2',
                    'text_dop_1_3',
                    'text_dop_2_1',
                    'text_dop_2_2',
                    'text_dop_2_3',
                    'price_both_dop_1',
                    'price_both_dop_2',
                    'name_stock',
                    'text_stock'
                ], 'required'
            ],
            [['post_id','id'], 'integer'],
            [[
                'text_but_banner',
                'old_price_banner',
                'new_price_banner',
                'left_text_banner',
                'right_text_banner',
            ], 'string', 'max' => 32],
            [['title', 'name_dop_block', 'title_dop_1', 'title_dop_2', 'price_both_dop_1', 'price_both_dop_2', 'text_dop_1_1',
                'text_dop_1_2',
                'text_dop_1_3',
                'text_dop_2_1',
                'text_dop_2_2',
                'text_dop_2_3',
                'name_stock'], 'string', 'max' => 64],
            [['meta_title'], 'string', 'max' => 70],
            [['meta_desc'], 'string', 'max' => 160],
            [['text_stock'], 'string'],
            [['title_banner', 'name_block'], 'string', 'max' => 128],
            [['bgc_banner', 'img_adv_1', 'img_adv_2', 'img_adv_3', 'img_adv_4', 'img_dop_1', 'img_dop_2', 'bgc_stock'], 'file', 'extensions' => 'webp']
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function attributeLabels()
    {
        return [
            'title' => 'Название страницы (в меню сайта)',
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
            'text_advantages_4' => 'Подпись к картинке',
            'img_adv_1' => 'Картинка',
            'img_adv_2' => 'Картинка',
            'img_adv_3' => 'Картинка',
            'img_adv_4' => 'Картинка',
            'blocks_tarif' => 'это поле',
            'name_block' => 'Заголовок блока',
            'name_dop_block' => 'Заголовок блока',
            'title_dop_1' => 'Заголовок тарифа',
            'title_dop_2' => 'Заголовок тарифа',
            'text_dop_1_1' => 'Первое предложение',
            'text_dop_1_2' => 'Второе предложение',
            'text_dop_1_3' => 'Третье предложение',
            'text_dop_2_1' => 'Первое предложение',
            'text_dop_2_2' => 'Второе предложение',
            'text_dop_2_3' => 'Третье предложение',
            'price_both_dop_1' => 'Сумма возврата грн',
            'price_both_dop_2' => 'Сумма возврата грн',
            'img_dop_1' => 'Картинка тарифа',
            'img_dop_2' => 'Картинка тарифа',
            'name_stock' => 'Заголовок',
            'text_stock' => 'Текст',
            'bgc_stock' => 'Задний фон',
        ];
    }

    public function upload($icon, $lang, $folder)
    {
        $this->$icon = UploadedFile::getInstance($this, $icon);
        if($this->$icon) {
            $this->$icon->name = $folder.'_home_internet_' . $icon . '_' . $lang . '.webp';
            $path = Yii::getAlias('@frontend/web/upload/images/'.$folder.'/') . $this->$icon->name;
            $this->$icon->saveAs($path);
        }

        return true;
    }

    static function getAllData() {
        return unserialize(LangPost::find()->where(['post_id' => 1, 'lang' => Yii::$app->language])->one()->all_info);
    }

}

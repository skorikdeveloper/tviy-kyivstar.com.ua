<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use frontend\models\LangPost;

/**
 *
 */
class Together extends ActiveRecord
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
        $name_block;

    public $blocks_tarif = [];

    /**
     * @var UploadedFile[]
     */
    public $img_advantages;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'meta_title', 'meta_desc', 'title_banner', 'text_but_banner', 'new_price_banner', 'url', 'text_advantages_1', 'text_advantages_2', 'text_advantages_3', 'blocks_tarif', 'name_block'], 'required'],
            [['post_id','id'], 'integer'],
            [['text_but_banner', 'old_price_banner', 'new_price_banner', 'left_text_banner', 'right_text_banner', 'name_block'], 'string', 'max' => 32],
            [['title', 'url', 'text_advantages_1', 'text_advantages_2', 'text_advantages_3'], 'string', 'max' => 64],
            [['meta_title'], 'string', 'max' => 70],
            [['meta_desc'], 'string', 'max' => 160],
            [['title_banner'], 'string', 'max' => 128],
            [['bgc_banner'], 'file', 'extensions' => 'webp'],
            [['img_advantages'], 'file', 'extensions' => 'webp', 'maxFiles' => 3]
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
            'img_advantages' => 'Картинка',
            'text_advantages_1' => 'Подпись к картинке',
            'text_advantages_2' => 'Подпись к картинке',
            'text_advantages_3' => 'Подпись к картинке',
            'blocks_tarif' => 'это поле',
            'name_block' => 'Заголовок блока',
        ];
    }

    public function upload($lang)
    {
        $i = 1;
        foreach ($this->img_advantages as $file) {
            $file->name = 'advantages_together_'.$lang.'_'.$i.'.webp';
            $file->saveAs(Yii::getAlias('@frontend/web/upload/images/advantages/').$file->name);
            $i++;
        }
        return true;
    }

    static function getAllData() {
        return unserialize(LangPost::find()->where(['post_id' => 3, 'lang' => Yii::$app->language])->one()->all_info);
    }

}

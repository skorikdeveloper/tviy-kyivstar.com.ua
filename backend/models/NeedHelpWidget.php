<?php

namespace backend\models;

use yii\db\ActiveRecord;

/**
 *
 */
class NeedHelpWidget extends ActiveRecord
{
    public $first_text,
        $second_text,
        $tel,
        $working_hours,
        $bgc_img;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_text', 'second_text', 'tel', 'working_hours'], 'required',],
            [['first_text', 'second_text', 'working_hours', 'tel'], 'string', 'max' => 128],
            [['bgc_img'], 'file', 'extensions' => 'webp'],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function attributeLabels()
    {
        return [
            'first_text' => 'Первое предложение',
            'second_text' => 'Второе предложение',
            'tel' => 'Телефон',
            'working_hours' => 'Время работы',
            'bgc_img' => 'Картинка на задний фон',
        ];
    }

}

<?php

namespace backend\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;
use Yii;

/**
 *
 */
class ConnectWidget extends ActiveRecord
{
    public  $first_step,
            $second_step,
            $third_step,
            $fourth_step,
            $fifth_step,
            $sixth_step,
            $center_text;

    public  $icon_1,
            $icon_2,
            $icon_3,
            $icon_4,
            $icon_5,
            $icon_6;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'first_step',
                    'second_step',
                    'third_step',
                    'fourth_step',
                    'fifth_step',
                    'sixth_step',
                    'center_text'
                ], 'required',],
            [[
                'first_step',
                'second_step',
                'third_step',
                'fourth_step',
                'fifth_step',
                'sixth_step',
                'center_text'
            ], 'string', 'max' => 128],
            [['icon_1', 'icon_2', 'icon_3', 'icon_4', 'icon_5', 'icon_6'], 'file', 'extensions' => 'webp'],
        ];
    }

    /**
     * {@inheritdoc}
     */

    public function attributeLabels()
    {
        return [
            'first_step' => 'Первый шаг',
            'second_step' => 'Второй шаг',
            'third_step' => 'Третий шаг',
            'fourth_step' => 'Четвертый шаг',
            'fifth_step' => 'Пятый шаг',
            'sixth_step' => 'Шестой шаг',
            'center_text' => 'Текст в центре',
            'icon_1' => 'Иконка',
            'icon_2' => 'Иконка',
            'icon_3' => 'Иконка',
            'icon_4' => 'Иконка',
            'icon_5' => 'Иконка',
            'icon_6' => 'Иконка',
        ];
    }

    public function upload($icon, $lang)
    {
        $this->$icon = UploadedFile::getInstance($this, $icon);
        if($this->$icon) {
            $this->$icon->name = 'widget_connect_' . $icon . '_' . $lang . '.webp';
            $path = Yii::getAlias('@frontend/web/upload/images/widget/') . $this->$icon->name;
            $this->$icon->saveAs($path);
        }

        return true;
    }

}

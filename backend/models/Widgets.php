<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "widgets".
 *
 * @property int $id
 * @property string $title
 * @property string $all_info
 * @property string $lang
 * @property string $url_action
 * @property int $widget_id
 */
class Widgets extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'widgets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['all_info'], 'string'],
            [['widget_id'], 'integer'],
            [['title'], 'string', 'max' => 64],
            [['lang'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название виджета',
            'all_info' => 'All Info',
            'lang' => 'Язык',
            'widget_id' => 'Widget ID',
        ];
    }
}

<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "lang_post".
 *
 * @property int $id
 * @property string $title
 * @property string $all_info
 * @property string $lang
 * @property int $post_id
 * @property int $is_city
 *
 * @property Post $post
 */
class LangPost extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lang_post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['all_info', 'title'], 'required'],
            [['all_info', 'title'], 'string'],
            [['post_id'], 'integer'],
            [['lang'], 'string', 'max' => 255],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lang' => 'Язык',
            'title' => 'Название страницы',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }
}

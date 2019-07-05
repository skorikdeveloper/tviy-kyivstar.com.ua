<?php

namespace frontend\models;

use Yii;
use yii\db\Exception;
use yii\helpers\Url;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $url
 * @property int $is_city
 * @property int $is_active
 *
 * @property LangPost[] $langPosts
 */
class Post extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'required'],
            [['url'], 'string', 'max' => 255],
            [['url'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'url' => Yii::t('app', 'Url'),
        ];
    }

    /*
 * Возвращает массив объектов модели Post
 */
    public function getPosts(){
        return $this->find()->all();
    }
    /*
     * Возвращает данные для указанного языка
     */
    public function getDataPosts(){
        $language = Yii::$app->language;
        $data_lang = $this->getLangPosts()->where(['lang'=>$language])->one();
        return $data_lang;
    }

    /*
     * Возвращает объект поста по его url
     */
    public function getPost($url){
        return $this->find()->where(['url' => $url])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     * создаем ссылки для меню
     */
    public function getLangPosts()
    {
        return $this->hasMany(LangPost::className(), ['post_id' => 'id']);
    }

    static function getMenuLinks($position){
        if($position != 'left' && $position != 'center') throw new Exception('Укажите позицию меню - left or center.');
        if($position == 'left') $links = Post::find()
            ->where(['id' => 1])
            ->orWhere(['id' => 2])
            ->orWhere(['id' => 3])
            ->all();

        if($position == 'center') $links = Post::find()
            ->where(['id' => 4])
            ->orWhere(['id' => 5])
            ->orderBy(['id' => SORT_ASC])
            ->all();

        $menu = array();
        $model = new Post();

        foreach ($links as $row) {
            $post = $model->find()->where(['id' => $row->id])->one();
            $lang_data = $post->getDataPosts();
            $url = Url::to(['post/view', 'url' => $post->url]);
            if($row->id == 1) {
                $url = Url::to(['post/index']);
            }
            if(Yii::$app->request->pathInfo == $post->url) $class = 'active';
            else if($row->id == 1 && Yii::$app->request->pathInfo == '') $class = 'active';
            $menu[] = ['label' => $lang_data['title'], 'url' => $url, 'linkOptions' => ['class' => $class]];
            unset($class, $url, $lang_data, $post);
        }

        return $menu;
    }
}

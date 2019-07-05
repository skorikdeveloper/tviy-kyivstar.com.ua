<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="site-index box box-primary">

    <div class="box-header">
        <?= Html::a('Добавить город', ['create'], ['class' => 'btn btn-success'])?>
    </div>

    <div class="box-body">

        <?= GridView::widget([
            'dataProvider' => $model,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'title',
                [
                    'attribute' => 'lang',
                    'value' => function ($data){
                        return $data->lang == 'uk' ? 'Украинский' : 'Русский';
                    }
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update}{delete}',
                    'contentOptions' => ['style' => 'text-align:center;width: 200px;'],
                    'buttons' => [
                        //update button
                        'update' => function ($url, $model) {
                            return Html::a('<span class="fa fa-pencil"></span> Редактировать', ['update', 'id' => $model->id], [
                                'class'=>'btn btn-primary btn-xs',
                                'style' => 'padding: 5px 20px; margin-right: 10px;'
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<span class="fa fa-trash"></span> Удалить', ['delete', 'id' => $model->id, 'lang' => $model->lang, 'post_id' => $model->post_id], [
                                'class'=>'btn btn-danger btn-xs',
                                'style' => 'padding: 5px 20px',
                                'data' => [
                                    'confirm' => 'Удалить этот город?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                    ],
                ]
            ],
        ]); ?>

    </div>
</div>

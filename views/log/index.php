<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-index">

    <h1 class="clearfix"><?= Html::encode($this->title) ?>
        <?= Html::a(Yii::t('app', 'Create Log'), ['create'], ['class' => 'btn btn-success pull-right']) ?>
    </h1>
    <?php Pjax::begin() ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'tableOptions' => [
            'class' => 'table table-bordered table-condensed table-hover',
        ],
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => [
                    'width' => '40',
                ],
            ],

            // 'id',
            [
                'attribute' => 'item',
                'format' => 'html',
                'value' => function ($model) {
                    $item = Html::a($model->item, Url::to(['update', 'id' => $model->id]), [
                            'style' => 'display:block;',
                        ]);
                    return $item;
                }
            ],
            'desc:ntext',
            [
                'attribute' => 'type',
                'format' => 'html',
                'value' => function ($model) {
                    if( 'Credit' == $model->type ) {
                        $class = 'label alert-danger';
                    } else if( 'Debit' == $model->type ) {
                        $class = 'label alert-success';                        
                    }
                    $type = Html::tag('span', $model->type, [
                            'class' => $class,
                        ]);
                    return $type;
                },
                'headerOptions' => [
                    'style' => 'text-align: center;',
                    'width' => '80',
                ],
                'contentOptions' => [
                    'style' => 'text-align: center;',
                ],
                'filter' => Html::activeDropDownList($searchModel, 'type', 
                    ['Credit' => 'Credit', 'Debit' => 'Debit'],
                    [ 
                        'class'=>'form-control','prompt' => ''
                    ]
                ),
            ],
            [
                'attribute' => 'cost',
                'value' => function ($model) {
                    $cost = $model->cost.'/=';
                    return $cost;
                },
                'contentOptions' => [
                    'style' => 'text-align: right; padding-right: 20px;',
                ],
                'headerOptions' => [
                    'style' => 'text-align: center;',
                    'width' => '120',
                ],
            ],
            [
                'attribute' => 'datetime',
                'value' => function($model) {
                    return date('d M, Y', strtotime($model->datetime));
                },
                'headerOptions' => [
                    'style' => 'text-align: center;',
                    'width' => '120',
                ],
                'contentOptions' => [
                    'style' => 'text-align: center;',
                ],
                'filter' => (Html::activeDropDownList($searchModel, 'datetime', 
                    array_combine (
                        array_map (
                            function($el){
                                return (string) sprintf("-%02d-", $el);
                            }, range(1,12)
                        ), 
                        array_values(cal_info(0)['months'])
                    ),
                    // ['Credit' => 'Credit', 'Debit' => 'Debit'],
                    [ 
                        'class'=>'form-control','prompt' => ''
                    ]
                )),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{delete}',
                'headerOptions' => [
                    'style' => 'text-align: center;',
                    'width' => '40',
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end() ?>

</div>

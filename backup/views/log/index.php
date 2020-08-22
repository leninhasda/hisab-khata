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
<div class="log-index card">

    <div class="header">
        <h4 class="title clearfix"><?= Html::encode($this->title) ?>
            <?= Html::a(Yii::t('app', 'Create Log'), ['create'], ['class' => 'btn btn-success pull-right btn-sm btn-fill']) ?>
        </h4>
    </div>

    <?= $this->render('_form.inline.php', ['model' => $model]) ?>

    <?php Pjax::begin() ?>
    <div class="content table-responsive table-full-width">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => false,
        'tableOptions' => [
            'class' => 'table table-condensed table-hover',
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
                },
                'headerOptions' => [
                    'width' => '255',
                ],
            ],
            [
                'attribute' => 'desc',
                'format' => 'ntext',
                'headerOptions' => [
                    'width' => '255',
                ],
            ],
            [
                'attribute' => 'type',
                'format' => 'html',
                'value' => function ($model) {
                    if( 'credit' == strtolower($model->type) ) {
                        $class = 'label alert-danger';
                    } else if( 'debit' == strtolower($model->type) ) {
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
                        ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L"]
                        // array_values(cal_info(0)['months'])
                    ),
                    // ['Credit' => 'Credit', 'Debit' => 'Debit'],
                    [
                        'class'=>'form-control','prompt' => ''
                    ]
                )),
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                // 'template' => '{update} {delete}',
                // 'headerOptions' => [
                    // 'style' => 'text-align: right;',
                //     'width' => '40',
                // ],
                'contentOptions' => [
                    'style' => 'text-align: right;',
                ]
            ],
        ],
    ]); ?>
    </div>
    <?php Pjax::end() ?>

</div>

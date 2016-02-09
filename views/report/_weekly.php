<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Log;
use app\models\LogSearch;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */

$n = 7;
$query = Log::find()->where('datetime >= ( CURDATE() - INTERVAL '.$n.' DAY )')->orderby('datetime desc');
$logs = $query->all();
$dataProvider = new ActiveDataProvider([
    'query' => $query,
]);
// echo '<pre>';
// echo count($logs);
// die();
?>
<section><br>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#totalView" aria-expanded="true" aria-controls="totalView">Total View - <?= date('F') ?></a>
                </h4>
            </div>
            <div id="totalView" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <?php 
                        $sno = 0;
                        $logTotal = 0;
                        $totalCredit = 0;
                        $totalDebit = 0;
                        $today = '';
                        $date = '';
                        $dayTotal = 0;
                        $currentDate = -1;
                        $tableView = [];
                        foreach ($logs as $log) {
                            $logTotal += $log->cost;
                            if('Debit' == $log->type) {
                                $totalDebit += $log->cost;
                            } else {
                                $time = strtotime($log->datetime);
                                $today = ucfirst(date('l', $time));
                                $date = date('d/m/Y', $time);
                                $totalCredit += $log->cost;
                                if( $currentDate == date('j', $time) ) {
                                    $dayTotal += $log->cost;
                                } else {
                                    $currentDate = date('j', $time);
                                    $sno++;
                                    $dayTotal += $log->cost;
                                    if( $sno ) {
                                        $tableView[] = "<tr>
                                            <td>{$today}</td>
                                            <td>{$date}</td>
                                            <td align=\"right\">{$dayTotal}/-</td>
                                        </tr>";
                                        $dayTotal = 0;
                                    }
                                }
                            }
                        }
                        rsort($tableView);
                        $tableView[] = '<tr class="bg-danger">
                            <td colspan="2">Total</td>
                            <td align="right">'.$totalCredit.'/=</td>
                        </tr>';
                    ?>
                    <p>Total Debit = <?= $totalDebit ?></p>
                    <p>Total Credit = <?= $totalCredit ?></p>
                    <p><?= ($totalDebit+$totalCredit) ?>=<?= $logTotal ?></p>
                    <table class="table table-striped table-condensed table-hover">
                        <thead>
                            <tr class="bg-info">
                                <th>Day</th>
                                <th>Date</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= join('', $tableView) ?>
                        </tbody>
                    </table>
                        
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#detailView" aria-controls="detailView">Detail View - <?= date('F') ?></a>
                </h4>
            </div>
            <div id="detailView" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    <?php Pjax::begin() ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'tableOptions' => [
                            'class' => 'table table-striped table-condensed table-hover',
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
            </div>
        </div>
    </div>
</section>

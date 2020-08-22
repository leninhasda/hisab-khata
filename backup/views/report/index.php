<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Report';
?>
<section>
    <h1 class="text-center"><?= $this->title ?></h1>
    <p class="hide">
        <?= Html::a('Weekly', ['weekly'], ['class' => 'btn btn-default']); ?>
        <?= Html::a('Monthly', ['monthly'], ['class' => 'btn btn-default']); ?>
        <?= Html::a('Yearly', ['yearly'], ['class' => 'btn btn-default']); ?>
    </p>
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#summary" aria-controls="summary" role="tab" data-toggle="tab">Summary</a></li>
            <li role="presentation"><a href="#weekly" aria-controls="weekly" role="tab" data-toggle="tab">Weekly</a></li>
            <li role="presentation"><a href="#monthly" aria-controls="monthly" role="tab" data-toggle="tab">Monthly</a></li>
            <li role="presentation"><a href="#yearly" aria-controls="yearly" role="tab" data-toggle="tab">Yearly</a></li>
            <li role="presentation"><a href="#custom" aria-controls="custom" role="tab" data-toggle="tab">Custom</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="summary">
                <?= $this->render('_summary') ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="weekly">
                <?= $this->render('_weekly') ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="monthly">
                <?= $this->render('_monthly') ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="yearly">
                <?= $this->render('_yearly') ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="custom">
                <?= $this->render('_custom') ?>
            </div>
        </div>
    </div>
</section>

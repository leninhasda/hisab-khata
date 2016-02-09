<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
?>
<h1>report/index</h1>
<p>
    <?= Html::a('Weekly', ['weekly'], ['class' => 'btn btn-default']); ?>
    <?= Html::a('Monthly', ['monthly'], ['class' => 'btn btn-default']); ?>
    <?= Html::a('Yearly', ['yearly'], ['class' => 'btn btn-default']); ?>
</p>

<?php
use yii\helpers\Url;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Finance Log';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>finance</h1>

        <p class="lead">personal accounting software</p>

        <p>
			<?= Html::a('Report', ['/report'], ['class' => 'btn btn-lg btn-primary']) ?>
			<?= Html::a('New Entry', ['/log/create'], ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>
</div>

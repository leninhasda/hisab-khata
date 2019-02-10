<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Log */

$this->title = Yii::t('app', 'Add Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="log-create card">
    <div class="header">
        <h4 class="title"><?= Html::encode($this->title) ?></h4>
    </div>
    <div class="content">
        <?= $this->render('_form', [
            'model' => $model,
            ]) ?>

    </div>
</div>

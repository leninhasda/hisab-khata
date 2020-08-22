<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\Tools;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Log */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-form form-inline">

    <?php $form = ActiveForm::begin([
        'action' => Url::to(['create'])
    ]); ?>

    <?= $form->field($model, 'item')->textInput([
        'maxlength' => true
        , 'autofocus' => 'true'
        , 'class' => 'form-control border-input'
        , 'placeholder' => 'Item'
    ])->label(false)
    ->error(false) ?>
    <?= $form->field($model, 'desc')->textInput(['class' => 'form-control border-input'])->label(false)->error(false) ?>
    <?= $form->field($model, 'cost')->textInput(['class' => 'form-control border-input'])->label(false)->error(false) ?>
    <?= $form->field($model, 'type')->dropDownList(['Credit' => 'Credit', 'Debit' => 'Debit'], ['class' => 'form-control border-input'])->label(false)->error(false) ?>
    <?= $form->field($model, 'datetime')->widget(DatePicker::classname(), [
        // 'value' => Tools::today(),
        'value' => '2019-02-10',
        'type' => DatePicker::TYPE_INPUT,
	    'pluginOptions' => [
    		'format' => Tools::$Format,
	        'todayHighlight' => true
	    ],
        'class' => 'form-control border-input',
	])->label(false)->error(false) ?>

    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-fill' : 'btn btn-primary btn-fill']) ?>

    <?php ActiveForm::end(); ?>

</div>

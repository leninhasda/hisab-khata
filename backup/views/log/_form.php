<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\components\Tools;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Log */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item')->textInput([
        'maxlength' => true
        , 'autofocus' => 'true'
        , 'class' => 'form-control border-input'
    ]) ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'cost')->textInput(['class' => 'form-control border-input']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'type')->dropDownList(['Credit' => 'Credit', 'Debit' => 'Debit'], ['class' => 'form-control border-input']) ?>
        </div>
    </div>

    <?= $form->field($model, 'desc')->textarea(['rows' => 4,'class' => 'form-control border-input']) ?>

    <?= $form->field($model, 'datetime')->widget(DatePicker::classname(), [
	    'value' => Tools::today(),
	    'pluginOptions' => [
    		'format' => Tools::$Format,
	        'todayHighlight' => true
	    ],
        'class' => 'form-control border-input',
	]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success btn-fill' : 'btn btn-primary btn-fill']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

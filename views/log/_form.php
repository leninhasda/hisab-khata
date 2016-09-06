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
    ]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'type')->dropDownList(['Credit' => 'Credit', 'Debit' => 'Debit']) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <?= $form->field($model, 'datetime')->widget(DatePicker::classname(), [
	    'value' => Tools::today(),
	    'pluginOptions' => [
    		'format' => Tools::$Format,
	        'todayHighlight' => true
	    ]
	]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

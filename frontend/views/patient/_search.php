<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PatientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-search">

	<?php $form=ActiveForm::begin([
			'action'=>['index'],
			'method'=>'get',
	]); ?>

	<?= $form->field($model, 'id') ?>

	<?= $form->field($model, 'name') ?>

	<?= $form->field($model, 'birthdate') ?>

	<?= $form->field($model, 'address') ?>

	<?= $form->field($model, 'tel') ?>

	<?php // echo $form->field($model, 'gender') ?>

    <div class="form-group">
		<?= Html::submitButton('Search', ['class'=>'btn btn-primary']) ?>
		<?= Html::resetButton('Reset', ['class'=>'btn btn-default']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>

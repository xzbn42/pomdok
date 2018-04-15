<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\HistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-search">

	<?php $form=ActiveForm::begin([
			'action'=>['index'],
			'method'=>'get',
	]); ?>

	<?= $form->field($model, 'id') ?>

	<?= $form->field($model, 'patient') ?>

	<?= $form->field($model, 'medicalcard_number') ?>

	<?= $form->field($model, 'receiptdate') ?>

	<?= $form->field($model, 'chamber') ?>

	<?php // echo $form->field($model, 'extra') ?>

	<?php // echo $form->field($model, 'planed') ?>

	<?php // echo $form->field($model, 'diagnosis_main') ?>

	<?php // echo $form->field($model, 'diagnosis_concomitant') ?>

	<?php // echo $form->field($model, 'complications') ?>

	<?php // echo $form->field($model, 'doctor') ?>

	<?php // echo $form->field($model, 'complains') ?>

	<?php // echo $form->field($model, 'medical_history') ?>

	<?php // echo $form->field($model, 'postponed_disease') ?>

	<?php // echo $form->field($model, 'smoke') ?>

	<?php // echo $form->field($model, 'alcohol') ?>

	<?php // echo $form->field($model, 'gynecological_history') ?>

	<?php // echo $form->field($model, 'allergy') ?>

	<?php // echo $form->field($model, 'state') ?>

	<?php // echo $form->field($model, 'position') ?>

	<?php // echo $form->field($model, 'diet') ?>

	<?php // echo $form->field($model, 'temperature') ?>

	<?php // echo $form->field($model, 'edema') ?>

	<?php // echo $form->field($model, 'lymphonodus') ?>

	<?php // echo $form->field($model, 'musculoskeletal') ?>

	<?php // echo $form->field($model, 'nose_breath') ?>

	<?php // echo $form->field($model, 'breath') ?>

	<?php // echo $form->field($model, 'percussion') ?>

	<?php // echo $form->field($model, 'wheeze') ?>

	<?php // echo $form->field($model, 'heartscopes') ?>

	<?php // echo $form->field($model, 'heartones') ?>

	<?php // echo $form->field($model, 'pressure') ?>

	<?php // echo $form->field($model, 'pulse') ?>

	<?php // echo $form->field($model, 'pulsetype') ?>

	<?php // echo $form->field($model, 'toungue') ?>

	<?php // echo $form->field($model, 'yawn') ?>

	<?php // echo $form->field($model, 'stomach') ?>

	<?php // echo $form->field($model, 'stomach_tension') ?>

	<?php // echo $form->field($model, 'peritoneum_irritation') ?>

	<?php // echo $form->field($model, 'intestine_palpation') ?>

	<?php // echo $form->field($model, 'excretion_type') ?>

	<?php // echo $form->field($model, 'feces_color') ?>

	<?php // echo $form->field($model, 'feces_blood') ?>

	<?php // echo $form->field($model, 'liver_papation') ?>


	<?php // echo $form->field($model, 'liver_edge') ?>

	<?php // echo $form->field($model, 'spleen') ?>

	<?php // echo $form->field($model, 'loin') ?>

	<?php // echo $form->field($model, 'kidneys') ?>

	<?php // echo $form->field($model, 'kindeney_area') ?>

	<?php // echo $form->field($model, 'pasternatskiy') ?>

	<?php // echo $form->field($model, 'pissing') ?>

	<?php // echo $form->field($model, 'urinestream') ?>

	<?php // echo $form->field($model, 'urinary_bladder') ?>

	<?php // echo $form->field($model, 'rectum') ?>

	<?php // echo $form->field($model, 'local_status') ?>

	<?php // echo $form->field($model, 'diagnosis_preliminary') ?>

	<?php // echo $form->field($model, 'diagnosis_clinical') ?>

	<?php // echo $form->field($model, 'gallbladder') ?>

	<?php // echo $form->field($model, 'extractdate') ?>

    <div class="form-group">
		<?= Html::submitButton('Search', ['class'=>'btn btn-primary']) ?>
		<?= Html::resetButton('Reset', ['class'=>'btn btn-default']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>

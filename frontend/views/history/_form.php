<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use yii\bootstrap\Tabs;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model frontend\models\History */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-form">

	<?php
	$form=ActiveForm::begin();
	echo Tabs::widget([
			'items'=>[
					[
							'label'  =>'Общие сведения',
							'content'=>$this->render('block/common', ['form'=>$form, 'model'=>$model]),
							'active' =>true
					],
					[
							'label'  =>'Первичный осмотр',
							'content'=>$this->render('block/primary_inspection', ['form'=>$form, 'model'=>$model])
					],
					[
							'label'  =>'Объективное обследование',
							'content'=>$this->render('block/objective_examination', ['form'=>$form, 'model'=>$model])
					]
			]
	]);
	?>


    <div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class'=>$model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>

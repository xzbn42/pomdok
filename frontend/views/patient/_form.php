<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */
/* @var $form yii\widgets\ActiveForm */
$genders=['1'=>'Муж', '2'=>'Жен'];
?>


<div class="patient-form">

	<?php $form=ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8"><?= $form->field($model, 'name')->textInput(['maxlength'=>true]) ?></div>
        <div class="col-md-2"><?= $form->field($model, 'birthdate')->widget(DateControl::classname(), [
					'value'        =>time(),
					'type'         =>DateControl::FORMAT_DATE,
					'autoWidget'   =>true,
					'displayFormat'=>'dd.MM.yyyy',
					'saveFormat'   =>'yyyy-MM-dd',
					'widgetOptions'=>[
							'type'         =>DatePicker::TYPE_INPUT,
							'pluginOptions'=>[
									'autoclose'=>true
							]
					]
			]); ?></div>
        <div class="col-md-2">
			<?= $form->field($model, 'gender')->dropDownList([
					'1'=>'Муж',
					'2'=>'Жен'
			]); ?></div>
    </div>
    <div class="row">
        <div class="col-md-8">
			<?= $form->field($model, 'address')->textArea() ?>
        </div>
        <div class="col-md-4">
			<?= $form->field($model, 'tel')->widget(\yii\widgets\MaskedInput::className(), [
					'mask'=>'+7 (999) 999-99-99',
			]) ?>
        </div>
    </div>


    <div class="form-group">
		<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class'=>$model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

	<?php ActiveForm::end(); ?>

</div>

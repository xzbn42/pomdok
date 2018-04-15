<?php
/**
 * Created by PhpStorm.
 * User: tashi
 * Date: 20.07.17
 * Time: 14:27
 */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\web\JsExpression;
use kartik\select2\Select2;
use frontend\models\Patient;
use frontend\models\Doctor;
use frontend\models\BaseDiagnosis;
use kartik\datecontrol\DateControl;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\History */
/* @var $form yii\widgets\ActiveForm */
?>

<?= $form->field($model, 'patient')->widget(Select2::classname(), [
		'initValueText'=>empty($model->patient) ? '' : Patient::findOne($model->patient)->name,
		// set the initial display text
		'options'      =>['placeholder'=>'Начните ввод фамилии'],
		'pluginOptions'=>[
				'allowClear'        =>true,
				'minimumInputLength'=>0,
				'language'          =>[
						'errorLoading'=>new JsExpression("function () { return 'Waiting for results...'; }"),
				],
				'ajax'              =>[
						'url'     =>\yii\helpers\Url::to(['patientlist']),
						'dataType'=>'json',
						'data'    =>new JsExpression('function(params) { return {q:params.term}; }')
				],
				'escapeMarkup'      =>new JsExpression('function (markup) { return markup; }'),
				'templateResult'    =>new JsExpression('function(city) { return city.text; }'),
				'templateSelection' =>new JsExpression('function (city) { return city.text; }'),
		],
]); ?>

<?= $form->field($model, 'medicalcard_number')->textInput(['maxlength'=>true]) ?>

<?= $form->field($model, 'receiptdate')->widget(DateControl::classname(), [
		'value'        =>time(),
		'type'         =>DateControl::FORMAT_DATETIME,
		'autoWidget'   =>true,
		'displayFormat'=>'dd.MM.yyyy HH:mm',
		'saveFormat'   =>'yyyy-MM-dd hh:mm:ss',
		'widgetOptions'=>[
				'type'         =>DatePicker::TYPE_INPUT,
				'pluginOptions'=>[
						'autoclose'=>true
				]
		]
]); ?>

<?= $form->field($model, 'chamber')->textInput() ?>

<?= $form->field($model, 'hospitalisation')->radioList([
		'1'=>'Плановая',
		'2'=>'Экстренная'
]); ?>

<?= $form->field($model, 'diagnosis_main')->widget(Select2::classname(), [
		'initValueText'=>empty($model->diagnosis_main) ? '' : BaseDiagnosis::findOne($model->diagnosis_main)->name,
		// set the initial display text
		'options'      =>['placeholder'=>'Начните ввод диагноза'],
		'pluginOptions'=>[
				'allowClear'        =>true,
				'minimumInputLength'=>0,
				'language'          =>[
						'errorLoading'=>new JsExpression("function () { return 'Waiting for results...'; }"),
				],
				'ajax'              =>[
						'url'     =>\yii\helpers\Url::to(['diagnosislist']),
						'dataType'=>'json',
						'data'    =>new JsExpression('function(params) { return {q:params.term}; }')
				],
				'escapeMarkup'      =>new JsExpression('function (markup) { return markup; }'),
				'templateResult'    =>new JsExpression('function(city) { return city.text; }'),
				'templateSelection' =>new JsExpression('function (city) { return city.text; }'),
		],
]); ?>

<?= $form->field($model, 'diagnosis_concomitant')->widget(Select2::classname(), [
		'initValueText'=>empty($model->diagnosis_concomitant) ? [] : BaseDiagnosis::findOne($model->diagnosis_concomitant)->name,
		// set the initial display text
		'data'         =>$model->diagnosis_concomitant,
		'options'      =>['placeholder'=>'Начните ввод диагноза'],
		'pluginOptions'=>[
				'multiple'          =>true,
				'allowClear'        =>true,
				'minimumInputLength'=>0,
				'language'          =>[
						'errorLoading'=>new JsExpression("function () { return 'Waiting for results...'; }"),
				],
				'ajax'              =>[
						'url'     =>\yii\helpers\Url::to(['diagnosislist']),
						'dataType'=>'json',
						'data'    =>new JsExpression('function(params) { return {q:params.term}; }')
				],
				'escapeMarkup'      =>new JsExpression('function (markup) { return markup; }'),
				'templateResult'    =>new JsExpression('function(city) { return city.text; }'),
				'templateSelection' =>new JsExpression('function (city) { return city.text; }'),
		],
]); ?>

<?= $form->field($model, 'complications')->textarea(['maxlength'=>true]) ?>

<?= $form->field($model, 'doctor')->widget(Select2::classname(), [
		'data'         =>Doctor::getDoctorsMap(),
		'options'      =>['placeholder'=>'Выбирите'],
		'pluginOptions'=>[
				'allowClear'        =>true,
				'minimumInputLength'=>0,
		],
]); ?>

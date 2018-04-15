<?php
/**
 * Created by PhpStorm.
 * User: tashi
 * Date: 20.07.17
 * Time: 13:45
 */
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use frontend\models\BaseAlcohol;

/* @var $this yii\web\View */
/* @var $model frontend\models\History */
/* @var $form yii\widgets\ActiveForm */

?>

<?= $form->field($model, 'complains')->textarea(['maxlength'=>true]) ?>

<?= $form->field($model, 'medical_history')->textarea(['maxlength'=>true]) ?>

<?php $a=$model->getPostponedDisease() ?>


<?= $form->field($model, 'postponed_disease')->widget(Select2::classname(), [
		'initValueText'=>empty($model->postponed_disease) ? [] : $model->postponed_disease,
		// set the initial display text
		'options'      =>['placeholder'=>'Начните ввод диагноза', 'multiple'=>true],
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

<?= $form->field($model, 'smoke')->radioList([
		'1'=>'Курит',
		'2'=>'Не курит'
]); ?>

<?= $form->field($model, 'alcohol')->widget(Select2::classname(), [
		'data'         =>ArrayHelper::map(BaseAlcohol::find()->all(), 'id', 'name'),
		'options'      =>['placeholder'=>'Выбирите'],
		'pluginOptions'=>[
				'allowClear'        =>true,
				'minimumInputLength'=>0,
		],
]); ?>
<?= $form->field($model, 'addict')->textarea() ?>

<?= $form->field($model, 'gynecological_history')->textarea(['maxlength'=>true]) ?>

<?= $form->field($model, 'allergy')->textarea(['maxlength'=>true]) ?>
<?= $form->field($model, 'primary_inspection_commnet')->textarea(['maxlength'=>true]) ?>

<?php
/**
 * Created by PhpStorm.
 * User: tashi
 * Date: 20.07.17
 * Time: 14:33
 */

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use frontend\models\BaseState;
use frontend\models\BasePosition;
use frontend\models\BaseDiet;
use frontend\models\BaseBreathing;
use frontend\models\BaseHeartscopes;
use frontend\models\BaseHearttone;
use frontend\models\BasePulsetype;
use frontend\models\BaseTongue;
use frontend\models\BaseYawn;
use frontend\models\BaseStomach;
use frontend\models\BaseStomachtension;
use frontend\models\BasePeritoneumirritation;
use frontend\models\BaseExcretiotype;
use frontend\models\BaseFecesblood;
use frontend\models\BaseFecescolor;
use frontend\models\BaseLiveredge;
use frontend\models\BaseLiverpalpation;
use frontend\models\BaseGallbladder;
use frontend\models\BaseSpleen;
use frontend\models\BaseLoin;
use frontend\models\BaseKidneys;
use frontend\models\BaseKidneyarea;
use frontend\models\BasePiss;
use frontend\models\BaseUrinaryBladder;
use frontend\models\BaseUrinestream;
use frontend\models\BaseRectum;


/* @var $this yii\web\View */
/* @var $model frontend\models\History */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="row">
    <div class="col-md-4"><?= $form->field($model, 'state')->widget(Select2::classname(), [
				'data'         =>ArrayHelper::map(BaseState::find()->all(), 'id', 'name'),
				'options'      =>['placeholder'=>'Выбирите'],
				'pluginOptions'=>[
						'allowClear'        =>true,
						'minimumInputLength'=>0,
				],
		]); ?>
    </div>
    <div class="col-md-3"><?= $form->field($model, 'position')->widget(Select2::classname(), [
				'data'         =>ArrayHelper::map(BasePosition::find()->all(), 'id', 'name'),
				'options'      =>['placeholder'=>'Выбирите'],
				'pluginOptions'=>[
						'allowClear'        =>true,
						'minimumInputLength'=>0,
				],
		]); ?></div>
    <div class="col-md-3">
		<?= $form->field($model, 'diet')->widget(Select2::classname(), [
				'data'         =>ArrayHelper::map(BaseDiet::find()->all(), 'id', 'name'),
				'options'      =>['placeholder'=>'Выбирите'],
				'pluginOptions'=>[
						'allowClear'        =>true,
						'minimumInputLength'=>0,
				],
		]); ?></div>
    <div class="col-md-2"><?= $form->field($model, 'temperature')->widget(\yii\widgets\MaskedInput::className(), [
				'mask'=>'9{1,2}.9',
		]) ?>
    </div>
</div>
<?= $form->field($model, 'edema')->textInput(['maxlength'=>true]) ?>

<?= $form->field($model, 'lymphonodus')->textarea(['maxlength'=>true]) ?>

<?= $form->field($model, 'musculoskeletal')->textarea() ?>
<fieldset>
    <legend>Система орагнов дыхания</legend>
    <div class="row">
        <div class="col-md-4">
			<?= $form->field($model, 'nose_breath')->widget(\yii\widgets\MaskedInput::className(), [
					'mask'=>'a{1,10}, число дыханий 9{1,3} в 1 минуту, ритм a{1,10}',
			]) ?>
        </div>
        <div class="col-md-3">
			<?= $form->field($model, 'breath')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseBreathing::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?>
        </div>
        <div class="col-md-5">
			<?= $form->field($model, 'percussion')->textInput([
					'maxlength'  =>true,
					'placeholder'=>'Звук легочный/измененый'
			]) ?>
        </div>
    </div>


	<?= $form->field($model, 'wheeze')->textarea() ?>
</fieldset>

<fieldset>
    <legend>Система кровобращения</legend>
    <div class="row">
        <div class="col-md-3"><?= $form->field($model, 'heartscopes')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseHeartscopes::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите', 'multiple'=>true],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?></div>
        <div class="col-md-3"><?= $form->field($model, 'heartones')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseHearttone::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите', 'multiple'=>true],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?></div>
        <div class="col-md-2"><?= $form->field($model, 'pressure')->widget(\yii\widgets\MaskedInput::className(), [
					'mask'=>'9{2,3}/9{2,3}',
			]) ?></div>
        <div class="col-md-1"><?= $form->field($model, 'pulse')->widget(\yii\widgets\MaskedInput::className(), [
					'mask'=>'9{1,3}',
			]) ?></div>
        <div class="col-md-3"><?= $form->field($model, 'pulsetype')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BasePulsetype::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?></div>
    </div>


</fieldset>


<fieldset>
    <legend>Система пищеварения</legend>
    <div class="row">
        <div class="col-md-3"><?= $form->field($model, 'toungue')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseTongue::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите', 'multiple'=>true],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?></div>
        <div class="col-md-3"><?= $form->field($model, 'yawn')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseYawn::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?></div>
        <div class="col-md-3"><?= $form->field($model, 'stomach')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseStomach::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите', 'multiple'=>true],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?></div>
        <div class="col-md-3"><?= $form->field($model, 'stomach_tension')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseStomachtension::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите', 'multiple'=>true],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?></div>
    </div>

    <div class="row">
        <div class="col-md-6">
			<?= $form->field($model, 'peritoneum_irritation')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BasePeritoneumirritation::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?>
        </div>
        <div class="col-md-6">
			<?= $form->field($model, 'intestine_palpation')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(\frontend\models\BaseIntestinePalpation::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?></div>
    </div>


    <div class="row">
        <div class="col-md-4">
			<?= $form->field($model, 'excretion_type')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseExcretiotype::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?></div>
        <div class="col-md-4">
			<?= $form->field($model, 'feces_color')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseFecescolor::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?></div>
        <div class="col-md-4">
			<?= $form->field($model, 'feces_blood')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseFecesblood::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3"><?= $form->field($model, 'liver_papation')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseLiverpalpation::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите', 'multiple'=>true],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?></div>
        <div class="col-md-2"><?= $form->field($model, 'liver_edge')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseLiveredge::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?></div>
        <div class="col-md-4">
			<?= $form->field($model, 'gallbladder')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseGallbladder::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите', 'multiple'=>true],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?>
        </div>
        <div class="col-md-3">
			<?= $form->field($model, 'spleen')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseSpleen::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?>
        </div>
    </div>


</fieldset>


<fieldset>
    <legend>Мочеполовая система</legend>
    <div class="row">
        <div class="col-md-3">
			<?= $form->field($model, 'loin')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseLoin::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?>
        </div>
        <div class="col-md-3">
			<?= $form->field($model, 'kidneys')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseKidneys::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?>
        </div>
        <div class="col-md-3">
			<?= $form->field($model, 'kindeney_area')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseKidneyarea::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите', 'multiple'=>true],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?>
        </div>
        <div class="col-md-3"><?= $form->field($model, 'pasternatskiy')->textInput() ?></div>
    </div>

    <div class="row">
        <div class="col-md-4">
			<?= $form->field($model, 'pissing')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BasePiss::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?>
        </div>
        <div class="col-md-4">
			<?= $form->field($model, 'urinestream')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseUrinestream::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?>
        </div>
        <div class="col-md-4">
			<?= $form->field($model, 'urinary_bladder')->widget(Select2::classname(), [
					'data'         =>ArrayHelper::map(BaseUrinaryBladder::find()->all(), 'id', 'name'),
					'options'      =>['placeholder'=>'Выбирите'],
					'pluginOptions'=>[
							'allowClear'        =>true,
							'minimumInputLength'=>0,
					],
			]); ?>
        </div>
    </div>
	<?= $form->field($model, 'rectum')->widget(Select2::classname(), [
			'data'         =>ArrayHelper::map(BaseRectum::find()->all(), 'id', 'name'),
			'options'      =>['placeholder'=>'Выбирите', 'multiple'=>true],
			'pluginOptions'=>[
					'allowClear'        =>true,
					'minimumInputLength'=>0,
			],
	]); ?>
</fieldset>
<?= $form->field($model, 'local_status')->textarea(['maxlength'=>true]) ?>

<?= $form->field($model, 'diagnosis_preliminary')->widget(Select2::classname(), [
		'initValueText'=>empty($model->diagnosis_preliminary) ? [] : $model->diagnosis_preliminary,
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

<?= $form->field($model, 'diagnosis_clinical')->widget(Select2::classname(), [
		'initValueText'=>empty($model->diagnosis_clinical) ? [] : $model->diagnosis_clinical,
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

<?= $form->field($model, 'extractdate')->textInput() ?>

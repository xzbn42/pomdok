<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\HistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                  ='Истории болезни';
$this->params['breadcrumbs'][]=$this->title;
?>
<div class="history-index">

    <h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
		<?= Html::a('Новая история болезни', ['create'], ['class'=>'btn btn-success']) ?>
    </p>
	<?php Pjax::begin(); ?>    <?= GridView::widget([
			'dataProvider'=>$dataProvider,
			'filterModel' =>$searchModel,
			'columns'     =>[
					['class'=>'yii\grid\SerialColumn'],

					//'id',
					'patient',
					'medicalcard_number',
					'receiptdate',
					'chamber',
					// 'extra',
					// 'planed',
					'diagnosis_main',
					'diagnosis_concomitant',
					// 'complications',
					'doctor',
					// 'complains',
					// 'medical_history',
					// 'postponed_disease',
					// 'smoke',
					// 'alcohol',
					// 'gynecological_history',
					// 'allergy',
					// 'state',
					// 'position',
					// 'diet',
					// 'temperature',
					// 'edema',
					// 'lymphonodus',
					// 'musculoskeletal',
					// 'nose_breath',
					// 'breath',
					// 'percussion',
					// 'wheeze',
					// 'heartscopes',
					// 'heartones',
					// 'pressure',
					// 'pulse',
					// 'pulsetype',
					// 'toungue',
					// 'yawn',
					// 'stomach',
					// 'stomach_tension',
					// 'peritoneum_irritation',
					// 'intestine_palpation',
					// 'excretion_type',
					// 'feces_color',
					// 'feces_blood',
					// 'liver_papation',
					// 'liver_ledge',
					// 'liver_edge',
					// 'spleen',
					// 'loin',
					// 'kidneys',
					// 'kindeney_area',
					// 'pasternatskiy',
					// 'pissing',
					// 'urinestream',
					// 'urinary_bladder',
					// 'rectum',
					// 'local_status',
					// 'diagnosis_preliminary',
					'diagnosis_clinical',
					// 'gallbladder',
					'extractdate',

					['class'=>'yii\grid\ActionColumn'],
			],
	]); ?>
	<?php Pjax::end(); ?></div>

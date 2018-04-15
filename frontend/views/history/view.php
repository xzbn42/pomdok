<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\History */

$this->title                  =$model->id;
$this->params['breadcrumbs'][]=['label'=>'Histories', 'url'=>['index']];
$this->params['breadcrumbs'][]=$this->title;
?>
<div class="history-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('Update', ['update', 'id'=>$model->id], ['class'=>'btn btn-primary']) ?>
		<?= Html::a('Delete', ['delete', 'id'=>$model->id], [
				'class'=>'btn btn-danger',
				'data' =>[
						'confirm'=>'Are you sure you want to delete this item?',
						'method' =>'post',
				],
		]) ?>
    </p>

	<?= DetailView::widget([
			'model'     =>$model,
			'attributes'=>[
					'id',
					'patient',
					'medicalcard_number',
					'receiptdate',
					'chamber',
					'extra',
					'planed',
					'diagnosis_main',
					'diagnosis_concomitant',
					'complications',
					'doctor',
					'complains',
					'medical_history',
					'postponed_disease',
					'smoke',
					'alcohol',
					'gynecological_history',
					'allergy',
					'state',
					'position',
					'diet',
					'temperature',
					'edema',
					'lymphonodus',
					'musculoskeletal',
					'nose_breath',
					'breath',
					'percussion',
					'wheeze',
					'heartscopes',
					'heartones',
					'pressure',
					'pulse',
					'pulsetype',
					'toungue',
					'yawn',
					'stomach',
					'stomach_tension',
					'peritoneum_irritation',
					'intestine_palpation',
					'excretion_type',
					'feces_color',
					'feces_blood',
					'liver_papation',
					'liver_edge',
					'spleen',
					'loin',
					'kidneys',
					'kindeney_area',
					'pasternatskiy',
					'pissing',
					'urinestream',
					'urinary_bladder',
					'rectum',
					'local_status',
					'diagnosis_preliminary',
					'diagnosis_clinical',
					'gallbladder',
					'extractdate',
			],
	]) ?>

</div>

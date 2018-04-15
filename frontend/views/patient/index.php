<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                  ='Пациенты';
$this->params['breadcrumbs'][]=$this->title;
$genders                      =['1'=>'Муж', '2'=>'Жен'];
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
		<?= Html::a('Новый пациент', ['create'], ['class'=>'btn btn-success']) ?>
    </p>
	<?php Pjax::begin(); ?>    <?= GridView::widget([
			'dataProvider'=>$dataProvider,
			'filterModel' =>$searchModel,
			'columns'     =>[
					['class'=>'yii\grid\SerialColumn'],

					//'id',
					[
							'attribute'=>'name',
							'label'    =>'ФИО',
							'format'   =>'raw',
							'value'    =>function ($data) {
								return Html::a($data->name, Url::to(['view', 'id'=>$data->id]), [
												'title' =>$data->name,
												'target'=>'_blank'
										]);
							}
					],
					[
							'attribute'=>'birthdate',
							'format'   =>['date', 'dd.MM.Y'],
							'options'  =>['width'=>'135']
					],
					'address',
					'tel',
					[
							'attribute'=>'gender',
							'filter'   =>$genders,
							'options'  =>['width'=>'50'],
							'value'    =>function ($data) {
								$genders=['1'=>'Муж', '2'=>'Жен'];

								return $genders[$data->gender];
							}
					],

					[
							'class'   =>'yii\grid\ActionColumn',
							'template'=>'{update} {delete}'
					],
			],
	]); ?>
	<?php Pjax::end(); ?></div>

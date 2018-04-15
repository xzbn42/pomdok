<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Patient */

$this->title                  =$model->name;
$this->params['breadcrumbs'][]=['label'=>'Пациенты', 'url'=>['index']];
$this->params['breadcrumbs'][]=$this->title;
switch($model->gender){
	case 1:
		$model->gender="Мужской";
		break;
	case 2:
		$model->gender="Женский";
		break;
}

$model->birthdate=\Yii::$app->formatter->asDate($model->birthdate, 'dd.MM.yyyy');
?>
<div class="patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('Изменить', ['update', 'id'=>$model->id], ['class'=>'btn btn-primary']) ?>
		<?= Html::a('Удалить', ['delete', 'id'=>$model->id], [
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
				//'id',
				'name',
				'birthdate',
				'address',
				'tel',
				'gender',
			],
	]) ?>

</div>

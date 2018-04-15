<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\History */

$this->title                  ='Новая история болезни';
$this->params['breadcrumbs'][]=['label'=>'Истории болезни', 'url'=>['index']];
$this->params['breadcrumbs'][]=$this->title;
?>
<div class="history-create">

    <h1><?= Html::encode($this->title) ?></h1>

	<?= $this->render('_form', [
			'model'=>$model,
	]) ?>

</div>

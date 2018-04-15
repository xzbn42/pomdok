<?php

namespace frontend\controllers;

use Yii;
use frontend\models\History;
use frontend\models\HistorySearch;
use frontend\models\BaseDiagnosis;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

/**
 * HistoryController implements the CRUD actions for History model.
 */
class HistoryController extends Controller
{
	/**
	 * @inheritdoc
	 */
	public function behaviors()
	{
		return [
				'verbs'=>[
						'class'  =>VerbFilter::className(),
						'actions'=>[
								'delete'=>['POST'],
						],
				],
		];
	}

	/**
	 * Lists all History models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel =new HistorySearch();
		$dataProvider=$searchModel->search(Yii::$app->request->queryParams);

		return $this->render('index', [
				'searchModel' =>$searchModel,
				'dataProvider'=>$dataProvider,
		]);
	}

	/**
	 * Displays a single History model.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionView($id)
	{
		return $this->render('view', [
				'model'=>$this->findModel($id),
		]);
	}

	/**
	 * Creates a new History model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model =new History();
		$params=Yii::$app->request->post();
		$s     =$model->load(Yii::$app->request->post());
		$s1    =$model->save();
		if($model->load(Yii::$app->request->post()) && $model->save()){
			return $this->redirect(['view', 'id'=>$model->id]);
		}
		else{
			return $this->render('create', [
					'model'=>$model,
			]);
		}
	}

	/**
	 * Updates an existing History model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model=$this->findModel($id);

		if($model->load(Yii::$app->request->post()) && $model->save()){
			return $this->redirect(['view', 'id'=>$model->id]);
		}
		else{
			return $this->render('update', [
					'model'=>$model,
			]);
		}
	}

	/**
	 * Deletes an existing History model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 *
	 * @param integer $id
	 *
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();

		return $this->redirect(['index']);
	}

	/**
	 * Finds the History model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 *
	 * @param integer $id
	 *
	 * @return History the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if(($model=History::findOne($id))!==null){
			return $model;
		}
		else{
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}


	public function actionPatientlist($q=null, $id=null)
	{
		Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
		$out                       =['results'=>['id'=>'', 'text'=>'']];
		if(!is_null($q)){
			$query=new Query;
			$query->select('id, name AS text, birthdate')->from('patient')->where(['like', 'name', $q])->limit(20);
			$command       =$query->createCommand();
			$data          =$command->queryAll();
			$out['results']=array_values($data);
			foreach($out['results'] as &$result){
				$result['text'].=' ('.$result['birthdate'].')';
			}
		}
		elseif($id>0){
			$patient       =Patient::find($id)->all();
			$out['results']=['id'=>$id, 'text'=>$patient->name.' ('.$patient->birthdate.')'];
		}

		return $out;
	}

	public function actionDiagnosislist($q=null, $id=null)
	{
		Yii::$app->response->format=\yii\web\Response::FORMAT_JSON;
		$out                       =['results'=>['id'=>'', 'text'=>'']];
		if(!is_null($q)){
			$query=new Query;
			$query->select('id, name AS text')->from('base_diagnosis')->where(['like', 'name', $q])->limit(20);
			$command       =$query->createCommand();
			$data          =$command->queryAll();
			$out['results']=array_values($data);
		}
		elseif($id>0){
			$diagnossis    =BaseDiagnosis::find($id)->all();
			$out['results']=['id'=>$id, 'text'=>$diagnossis->name];
		}

		return $out;
	}
}

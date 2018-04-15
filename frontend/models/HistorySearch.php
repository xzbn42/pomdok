<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\History;

/**
 * HistorySearch represents the model behind the search form about `frontend\models\History`.
 */
class HistorySearch extends History
{
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[
						[
								'id',
								'patient',
								'chamber',
								'hospitalisation',
								'diagnosis_main',
								'diagnosis_concomitant',
								'doctor',
								'postponed_disease',
								'smoke',
								'alcohol',
								'state',
								'position',
								'diet',
								'musculoskeletal',
								'breath',
								'wheeze',
								'heartscopes',
								'heartones',
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
								'diagnosis_preliminary',
								'diagnosis_clinical',
								'gallbladder'
						],
						'integer'
				],
				[
						[
								'medicalcard_number',
								'receiptdate',
								'complications',
								'complains',
								'medical_history',
								'gynecological_history',
								'allergy',
								'edema',
								'lymphonodus',
								'nose_breath',
								'percussion',
								'pressure',
								'local_status',
								'extractdate'
						],
						'safe'
				],
				[['temperature'], 'number'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios()
	{
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params)
	{
		$query=History::find();

		// add conditions that should always apply here

		$dataProvider=new ActiveDataProvider([
				'query'=>$query,
		]);

		$this->load($params);

		if(!$this->validate()){
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// grid filtering conditions
		$query->andFilterWhere([
				'id'                   =>$this->id,
				'patient'              =>$this->patient,
				'receiptdate'          =>$this->receiptdate,
				'chamber'              =>$this->chamber,
				'hospitalisation'      =>$this->hospitalisation,
				'diagnosis_main'       =>$this->diagnosis_main,
				'diagnosis_concomitant'=>$this->diagnosis_concomitant,
				'doctor'               =>$this->doctor,
				'postponed_disease'    =>$this->postponed_disease,
				'smoke'                =>$this->smoke,
				'alcohol'              =>$this->alcohol,
				'state'                =>$this->state,
				'position'             =>$this->position,
				'diet'                 =>$this->diet,
				'temperature'          =>$this->temperature,
				'musculoskeletal'      =>$this->musculoskeletal,
				'breath'               =>$this->breath,
				'wheeze'               =>$this->wheeze,
				'heartscopes'          =>$this->heartscopes,
				'heartones'            =>$this->heartones,
				'pulse'                =>$this->pulse,
				'pulsetype'            =>$this->pulsetype,
				'toungue'              =>$this->toungue,
				'yawn'                 =>$this->yawn,
				'stomach'              =>$this->stomach,
				'stomach_tension'      =>$this->stomach_tension,
				'peritoneum_irritation'=>$this->peritoneum_irritation,
				'intestine_palpation'  =>$this->intestine_palpation,
				'excretion_type'       =>$this->excretion_type,
				'feces_color'          =>$this->feces_color,
				'feces_blood'          =>$this->feces_blood,
				'liver_papation'       =>$this->liver_papation,
				'liver_edge'           =>$this->liver_edge,
				'spleen'               =>$this->spleen,
				'loin'                 =>$this->loin,
				'kidneys'              =>$this->kidneys,
				'kindeney_area'        =>$this->kindeney_area,
				'pasternatskiy'        =>$this->pasternatskiy,
				'pissing'              =>$this->pissing,
				'urinestream'          =>$this->urinestream,
				'urinary_bladder'      =>$this->urinary_bladder,
				'rectum'               =>$this->rectum,
				'diagnosis_preliminary'=>$this->diagnosis_preliminary,
				'diagnosis_clinical'   =>$this->diagnosis_clinical,
				'gallbladder'          =>$this->gallbladder,
				'extractdate'          =>$this->extractdate,
		]);

		$query->andFilterWhere(['like', 'medicalcard_number', $this->medicalcard_number])->andFilterWhere([
						'like',
						'complications',
						$this->complications
				])->andFilterWhere(['like', 'complains', $this->complains])->andFilterWhere([
						'like',
						'medical_history',
						$this->medical_history
				])->andFilterWhere([
						'like',
						'gynecological_history',
						$this->gynecological_history
				])->andFilterWhere(['like', 'allergy', $this->allergy])->andFilterWhere([
						'like',
						'edema',
						$this->edema
				])->andFilterWhere(['like', 'lymphonodus', $this->lymphonodus])->andFilterWhere([
						'like',
						'nose_breath',
						$this->nose_breath
				])->andFilterWhere(['like', 'percussion', $this->percussion])->andFilterWhere([
						'like',
						'pressure',
						$this->pressure
				])->andFilterWhere(['like', 'local_status', $this->local_status]);

		return $dataProvider;
	}
}

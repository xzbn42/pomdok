<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Patient;

/**
 * PatientSearch represents the model behind the search form about `frontend\models\Patient`.
 */
class PatientSearch extends Patient
{
	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['id', 'gender'], 'integer'],
				[['name', 'birthdate', 'address', 'tel'], 'safe'],
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
		$query=Patient::find();

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
				'id'=>$this->id,
				'birthdate'=>$this->birthdate,
				'gender'=>$this->gender,
		]);

		$query->andFilterWhere(['like', 'name', $this->name])->andFilterWhere([
						'like',
						'address',
						$this->address
				])->andFilterWhere(['like', 'tel', $this->tel]);

		return $dataProvider;
	}
}

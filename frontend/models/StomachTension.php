<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "stomach_tension".
 *
 * @property integer            $stomach_tension_id
 * @property integer            $stomach_tension_base_id
 *
 * @property History[]          $histories
 * @property BaseStomachTension $stomachTensionBase
 */
class StomachTension extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'stomach_tension';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['stomach_tension_id', 'stomach_tension_base_id'], 'required'],
				[['stomach_tension_id', 'stomach_tension_base_id'], 'integer'],
				[
						['stomach_tension_base_id'],
						'exist',
						'skipOnError'    =>true,
						'targetClass'    =>BaseStomachTension::className(),
						'targetAttribute'=>['stomach_tension_base_id'=>'id']
				],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'stomach_tension_id'     =>'Stomach Tension ID',
				'stomach_tension_base_id'=>'Stomach Tension Base ID',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getHistories()
	{
		return $this->hasMany(History::className(), ['stomach_tension'=>'stomach_tension_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getStomachTensionBase()
	{
		return $this->hasOne(BaseStomachTension::className(), ['id'=>'stomach_tension_base_id']);
	}
}

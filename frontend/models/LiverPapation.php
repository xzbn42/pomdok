<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "liver_papation".
 *
 * @property integer            $liver_papation_id
 * @property integer            $liver_papation_base_id
 *
 * @property History[]          $histories
 * @property BaseLiverPalpation $liverPapationBase
 */
class LiverPapation extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'liver_papation';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['liver_papation_id'], 'required'],
				[['liver_papation_id', 'liver_papation_base_id'], 'integer'],
				[
						['liver_papation_base_id'],
						'exist',
						'skipOnError'    =>true,
						'targetClass'    =>BaseLiverPalpation::className(),
						'targetAttribute'=>['liver_papation_base_id'=>'id']
				],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'liver_papation_id'     =>'Liver Papation ID',
				'liver_papation_base_id'=>'Liver Papation Base ID',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getHistories()
	{
		return $this->hasMany(History::className(), ['liver_papation'=>'liver_papation_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getLiverPapationBase()
	{
		return $this->hasOne(BaseLiverPalpation::className(), ['id'=>'liver_papation_base_id']);
	}
}

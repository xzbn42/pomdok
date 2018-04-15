<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "stomach".
 *
 * @property integer     $stomach_id
 * @property integer     $stomach_base_id
 *
 * @property Dairy[]     $dairies
 * @property BaseStomach $stomachBase
 */
class Stomach extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'stomach';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['stomach_id', 'stomach_base_id'], 'required'],
				[['stomach_id', 'stomach_base_id'], 'integer'],
				[
						['stomach_base_id'],
						'exist',
						'skipOnError'    =>true,
						'targetClass'    =>BaseStomach::className(),
						'targetAttribute'=>['stomach_base_id'=>'id']
				],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'stomach_id'     =>'Stomach ID',
				'stomach_base_id'=>'Stomach Base ID',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getDairies()
	{
		return $this->hasMany(Dairy::className(), ['stomach'=>'stomach_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getStomachBase()
	{
		return $this->hasOne(BaseStomach::className(), ['id'=>'stomach_base_id']);
	}
}

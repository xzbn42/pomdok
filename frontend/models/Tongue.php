<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "tongue".
 *
 * @property integer    $tongue_id
 * @property integer    $tongue_base_id
 *
 * @property History[]  $histories
 * @property BaseTongue $tongueBase
 */
class Tongue extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'tongue';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['tongue_id', 'tongue_base_id'], 'required'],
				[['tongue_id', 'tongue_base_id'], 'integer'],
				[
						['tongue_base_id'],
						'exist',
						'skipOnError'    =>true,
						'targetClass'    =>BaseTongue::className(),
						'targetAttribute'=>['tongue_base_id'=>'id']
				],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'tongue_id'     =>'Tongue ID',
				'tongue_base_id'=>'Tongue Base ID',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getHistories()
	{
		return $this->hasMany(History::className(), ['toungue'=>'tongue_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTongueBase()
	{
		return $this->hasOne(BaseTongue::className(), ['id'=>'tongue_base_id']);
	}
}

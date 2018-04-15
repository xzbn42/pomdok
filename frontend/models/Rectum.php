<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "rectum".
 *
 * @property integer    $rectum_id
 * @property integer    $rectum_base_id
 *
 * @property BaseRectum $rectumBase
 */
class Rectum extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'rectum';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['rectum_id'], 'required'],
				[['rectum_id', 'rectum_base_id'], 'integer'],
				[
						['rectum_base_id'],
						'exist',
						'skipOnError'    =>true,
						'targetClass'    =>BaseRectum::className(),
						'targetAttribute'=>['rectum_base_id'=>'id']
				],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'rectum_id'     =>'Rectum ID',
				'rectum_base_id'=>'Rectum Base ID',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRectumBase()
	{
		return $this->hasOne(BaseRectum::className(), ['id'=>'rectum_base_id']);
	}
}

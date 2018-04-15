<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "doctor".
 *
 * @property integer $id
 * @property string  $name
 *
 * @property Dairy[] $dairies
 */
class Doctor extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'doctor';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['name'], 'required'],
				[['name'], 'string', 'max'=>250],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'id'  =>'ID',
				'name'=>'Name',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getDairies()
	{
		return $this->hasMany(Dairy::className(), ['doctor'=>'id']);
	}


	public static function getDoctorsMap()
	{
		return ArrayHelper::map(Doctor::find()->all(), 'id', 'name');
	}

}

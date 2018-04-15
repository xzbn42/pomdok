<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $id
 * @property string  $name
 * @property string  $birthdate
 * @property string  $address
 * @property string  $tel
 * @property integer $gender
 */
class Patient extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'patient';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['name', 'birthdate'], 'required'],
				[['birthdate'], 'safe'],
				[['gender'], 'integer'],
				[['name', 'tel'], 'string', 'max'=>250],
				[['address'], 'string', 'max'=>500],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'id'       =>'ID',
				'name'     =>'ФИО',
				'birthdate'=>'Дата рождения',
				'address'  =>'Домащний адрес',
				'tel'      =>'Телефон',
				'gender'   =>'Пол',
		];
	}
}

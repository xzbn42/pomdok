<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "base_heartscopes".
 *
 * @property integer       $id
 * @property string        $name
 */
class BaseHeartscopes extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'base_heartscopes';
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

	public static function getHeartscopeByName($name)
	{
		$hs=BaseHeartscopes::find()->where(['name'=>$name])->one();
		if(!$hs){
			$hs      =new BaseHeartscopes();
			$hs->name=$name;
			$hs->save(false);
		}

		return $hs;
	}

	public static function getHeartscopeById($id)
	{
		$hs=BaseHeartscopes::find()->where(['id'=>$id])->one();

		return $hs;
	}

}

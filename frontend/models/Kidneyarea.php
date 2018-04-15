<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "kidneyarea".
 *
 * @property integer        $kidneys_area_id
 * @property integer        $kidneyarea_base_id
 *
 * @property BaseKidneyarea $kidneyareaBase
 */
class Kidneyarea extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'kidneyarea';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
				[['kidneys_area_id', 'kidneyarea_base_id'], 'required'],
				[['kidneys_area_id', 'kidneyarea_base_id'], 'integer'],
				[
						['kidneyarea_base_id'],
						'exist',
						'skipOnError'    =>true,
						'targetClass'    =>BaseKidneyarea::className(),
						'targetAttribute'=>['kidneyarea_base_id'=>'id']
				],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
				'kidneys_area_id'   =>'Kidneys Area ID',
				'kidneyarea_base_id'=>'Kidneyarea Base ID',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getKidneyareaBase()
	{
		return $this->hasOne(BaseKidneyarea::className(), ['id'=>'kidneyarea_base_id']);
	}
}

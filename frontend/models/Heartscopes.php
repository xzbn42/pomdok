<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "heartscopes".
 *
 * @property integer $heartscope_id
 * @property integer $heartscopes_base_id
 *
 * @property BaseHeartscopes $heartscopesBase
 * @property History[] $histories
 * @property Hearttones[] $heartones
 */
class Heartscopes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'heartscopes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['heartscope_id', 'heartscopes_base_id'], 'required'],
            [['heartscope_id', 'heartscopes_base_id'], 'integer'],
            [['heartscopes_base_id'], 'exist', 'skipOnError' => true, 'targetClass' => BaseHeartscopes::className(), 'targetAttribute' => ['heartscopes_base_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'heartscope_id' => 'Heartscope ID',
            'heartscopes_base_id' => 'Heartscopes Base ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeartscopesBase()
    {
        return $this->hasOne(BaseHeartscopes::className(), ['id' => 'heartscopes_base_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistories()
    {
        return $this->hasMany(History::className(), ['heartscopes' => 'heartscope_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeartones()
    {
        return $this->hasMany(Hearttones::className(), ['heartone_id' => 'heartones'])->viaTable('history', ['heartscopes' => 'heartscope_id']);
    }
}

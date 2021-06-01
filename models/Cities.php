<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Cityes".
 *
 * @property int $id
 * @property string $cityname
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cityname'], 'required'],
            [['cityname'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cityname' => 'Cityname',
        ];
    }
}

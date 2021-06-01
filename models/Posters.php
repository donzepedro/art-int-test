<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Posters".
 *
 * @property int $id
 * @property string $FIO
 * @property string $PosterText
 * @property int $City
 * @property string $address
 */
class Posters extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Posters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FIO', 'PosterText', 'City', 'address'], 'required'],
            [['City'], 'integer'],
            [['FIO', 'address'], 'string', 'max' => 100],
            [['PosterText'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'FIO' => 'Fio',
            'PosterText' => 'Poster Text',
            'City' => 'City',
            'address' => 'Address',
        ];
    }
}

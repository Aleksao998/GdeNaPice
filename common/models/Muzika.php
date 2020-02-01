<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "muzika".
 *
 * @property int $idMuzika
 * @property string $naziv
 *
 * @property RadnoVreme[] $radnoVremes
 */
class Muzika extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'muzika';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['naziv'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idMuzika' => 'Id Muzika',
            'naziv' => 'Naziv',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadnoVremes()
    {
        return $this->hasMany(RadnoVreme::className(), ['muzika' => 'idMuzika']);
    }
}

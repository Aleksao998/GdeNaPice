<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dani".
 *
 * @property int $idDani
 * @property string $naziv
 *
 * @property RadnoVreme[] $radnoVremes
 */
class Dani extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dani';
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
            'idDani' => 'Id Dani',
            'naziv' => 'Naziv',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadnoVremes()
    {
        return $this->hasMany(RadnoVreme::className(), ['dan' => 'idDani']);
    }
}

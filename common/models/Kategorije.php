<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "Kategorije".
 *
 * @property int $kategorijaId
 * @property string $naziv
 *
 * @property Promocije[] $promocijes
 */
class Kategorije extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Kategorije';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['naziv'], 'required'],
            [['naziv'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kategorijaId' => 'Kategorija ID',
            'naziv' => 'Naziv',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromocijes()
    {
        return $this->hasMany(Promocije::className(), ['kategorijeId' => 'kategorijaId']);
    }
}

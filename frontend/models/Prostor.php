<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prostor".
 *
 * @property int $idprostor
 * @property string $ime
 */
class Prostor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prostor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ime'], 'required'],
            [['ime'], 'string', 'max' => 252],
            [['ime'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idprostor' => 'Idprostor',
            'ime' => 'Ime',
        ];
    }
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vrstaProstora".
 *
 * @property int $idVrstaProstora
 * @property string $naziv
 *
 * @property Prostor[] $prostors
 */
class VrstaProstora extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vrstaProstora';
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
            'idVrstaProstora' => 'Id Vrsta Prostora',
            'naziv' => 'Naziv',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProstors()
    {
        return $this->hasMany(Prostor::className(), ['vrstaProstora' => 'idVrstaProstora']);
    }
    static public function GetNameById($id){
      $item=VrstaProstora::find()
      ->where (['idVrstaProstora'=>$id])
      ->one();
      return $item;
    }
    
}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lokacija".
 *
 * @property int $idLokacija
 * @property int $prostorId
 * @property string $adresa
 * @property string $grad
 * @property string $drzava
 * @property string $longitude
 * @property string $latitude
 *
 * @property Prostor $prostor
 */
class Lokacija extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lokacija';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prostorId', 'adresa', 'grad', 'drzava'], 'required'],
            [['prostorId'], 'integer'],
            [['longitude', 'latitude'], 'number'],
            [['adresa'], 'string', 'max' => 255],
            [['grad', 'drzava'], 'string', 'max' => 45],
            [['prostorId'], 'exist', 'skipOnError' => true, 'targetClass' => Prostor::className(), 'targetAttribute' => ['prostorId' => 'idProstor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idLokacija' => 'Id Lokacija',
            'prostorId' => 'Prostor ID',
            'adresa' => 'Adresa',
            'grad' => 'Grad',
            'drzava' => 'Drzava',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProstor()
    {
        return $this->hasOne(Prostor::className(), ['idProstor' => 'prostorId']);
    }
    static public function getAllLokacion(){
      $item=Lokacija::find()
      ->all();
      return $item;

    }
    public function setIdProstor($id)
    {
      $this->prostorId=$id;
    }
    public function setGrad($grad)
    {
      $this->grad=$grad;
    }
    public function setDrzava($drzava)
    {
      $this->drzava=$drzava;
    }
    public function setLongitude($drzava)
    {
      $this->longitude=$drzava;
    }
    public function setLatitude($drzava)
    {
      $this->latitude=$drzava;
    }
    static public function getLokacijaById($id){
      $item=Lokacija::find()
      ->where (['prostorId'=>$id])
      ->one();
      return $item;
    }
}

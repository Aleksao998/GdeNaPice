<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "promocije".
 *
 * @property int $promocijeId
 * @property int $prostorId
 * @property int $vrstaProstoraId
 * @property string $nazivProstora
 * @property string $opis
 * @property int $danId
 * @property int $kategorijeId
 * @property int $kontakt
 *
 * @property Dani $dan
 * @property Kategorije $kategorije
 * @property Prostor $prostor
 * @property VrstaProstora $vrstaProstora
 */
class Promocije extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promocije';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prostorId', 'vrstaProstoraId', 'nazivProstora', 'opis', 'danId', 'kategorijeId'], 'required'],
            [['prostorId', 'vrstaProstoraId', 'danId', 'kategorijeId'], 'integer'],
            [['nazivProstora'], 'string', 'max' => 45],
 	   [['opis'], 'string', 'max' => 100],
            [['danId'], 'exist', 'skipOnError' => true, 'targetClass' => Dani::className(), 'targetAttribute' => ['danId' => 'idDani']],
            [['kategorijeId'], 'exist', 'skipOnError' => true, 'targetClass' => Kategorije::className(), 'targetAttribute' => ['kategorijeId' => 'kategorijaId']],
            [['prostorId'], 'exist', 'skipOnError' => true, 'targetClass' => Prostor::className(), 'targetAttribute' => ['prostorId' => 'idProstor']],
            [['vrstaProstoraId'], 'exist', 'skipOnError' => true, 'targetClass' => VrstaProstora::className(), 'targetAttribute' => ['vrstaProstoraId' => 'idVrstaProstora']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'promocijeId' => 'Promocije ID',
            'prostorId' => 'Prostor ID',
            'vrstaProstoraId' => 'Vrsta Prostora ID',
            'nazivProstora' => 'Naziv Prostora',
            'opis' => 'Opis',
            'danId' => 'Dan ID',
            'kategorijeId' => 'Kategorije ID',
            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDan()
    {
        return $this->hasOne(Dani::className(), ['idDani' => 'danId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKategorije()
    {
        return $this->hasOne(Kategorije::className(), ['kategorijaId' => 'kategorijeId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProstor()
    {
        return $this->hasOne(Prostor::className(), ['idProstor' => 'prostorId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVrstaProstora()
    {
        return $this->hasOne(VrstaProstora::className(), ['idVrstaProstora' => 'vrstaProstoraId']);
    }
    public function setProstorId($id){
      $this->prostorId=$id;
    }
    public function setvrstaProstoraId($id){
      $this->vrstaProstoraId=$id;
    }
    public function setnazivProstora($naziv){
      $this->nazivProstora=$naziv;
    }
    public function setKategorije($id){
      $this->kategorijeId=$id;
    }
       static public function GetPromocijaByDay($id){
      $item=Promocije::find()
      ->where (['danId'=>$id])
      ->all();
      return $item;
    }

}

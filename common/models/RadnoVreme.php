<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "radnoVreme".
 *
 * @property int $idRadnoVreme
 * @property int $prostorId
 * @property int $dan
 * @property string $vremeOtvaranja
 * @property string $vremeZatvranja
 *
 * @property Dani $dan0
 * @property Prostor $prostor
 */
class RadnoVreme extends \yii\db\ActiveRecord
{
  
  public $day=array("Volvo", "BMW", "Toyota","Volvo", "BMW", "Toyota","Volvo", "BMW", "Toyota");
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'radnoVreme';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prostorId', 'dan'], 'required'],
            [['prostorId', 'dan'], 'integer'],
            [['vremeOtvaranja', 'vremeZatvranja'], 'safe'],
            [['dan'], 'exist', 'skipOnError' => true, 'targetClass' => Dani::className(), 'targetAttribute' => ['dan' => 'idDani']],
            [['prostorId'], 'exist', 'skipOnError' => true, 'targetClass' => Prostor::className(), 'targetAttribute' => ['prostorId' => 'idProstor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idRadnoVreme' => 'Id Radno Vreme',
            'prostorId' => 'Prostor ID',
            'dan' => 'Dan',
            'vremeOtvaranja' => 'Vreme Otvaranja',
            'vremeZatvranja' => 'Vreme Zatvranja',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDan0()
    {
        return $this->hasOne(Dani::className(), ['idDani' => 'dan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProstor()
    {
        return $this->hasOne(Prostor::className(), ['idProstor' => 'prostorId']);
    }
    public function setProstorId($id){
      $this->prostorId=$id;
    }
    public function setDan($dan){
      $this->dan=$dan;
    }
    public function setVremeOtvaranj($vreme){
      $this->$vreme;
    }
  public function setVremeOtvaranja(){
      $this->vremeOtvaranja='08:00:00';
    }
    public function setVremeZatvaranja(){
      $this->vremeZatvranja='23:00:00';
    }
    static public function GetRadnoVremeByUserIdAndDay($id, $day){
      $item=RadnoVreme::find()
      ->where (['prostorId'=>$id])
      ->andwhere (['dan'=>$day])
      ->one();
      return $item;
    }
    static public function GetRadnoVremeByProstorId($id){
      $item=RadnoVreme::find()
      ->where (['prostorId'=>$id])
      ->all();
      return $item;
    }
}

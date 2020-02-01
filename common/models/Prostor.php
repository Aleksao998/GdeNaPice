<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "prostor".
 *
 * @property int $idProstor
 * @property int $userId
 * @property string $imeProstora
 * @property string $brTelefona
 * @property string $igLink
 * @property int $vrstaProstora
 *
 * @property Lokacija[] $lokacijas
 * @property Promocije[] $promocijes
 * @property User $user
 * @property VrstaProstora $vrstaProstora0
 * @property RadnoVreme[] $radnoVremes
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
            [['userId', 'imeProstora', 'brTelefona', 'vrstaProstora'], 'required'],
            [['userId', 'vrstaProstora'], 'integer'],
            [['imeProstora', 'brTelefona', 'igLink'], 'string', 'max' => 255],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['userId' => 'id']],
            [['vrstaProstora'], 'exist', 'skipOnError' => true, 'targetClass' => VrstaProstora::className(), 'targetAttribute' => ['vrstaProstora' => 'idVrstaProstora']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idProstor' => 'Id Prostor',
            'userId' => 'User ID',
            'imeProstora' => 'Ime Prostora',
            'brTelefona' => 'Br Telefona',
            'igLink' => 'Ig Link',
            'vrstaProstora' => 'Vrsta Prostora',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLokacijas()
    {
        return $this->hasMany(Lokacija::className(), ['prostorId' => 'idProstor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromocijes()
    {
        return $this->hasMany(Promocije::className(), ['prostorId' => 'idProstor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVrstaProstora0()
    {
        return $this->hasOne(VrstaProstora::className(), ['idVrstaProstora' => 'vrstaProstora']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRadnoVremes()
    {
        return $this->hasMany(RadnoVreme::className(), ['prostorId' => 'idProstor']);
    }
    static public function GetProstorById($id){
      $item=Prostor::find()
      ->where (['idProstor'=>$id])
      ->one();
      return $item;
    }
    static public function GetProstorAndLocationById($id){

      $item=Prostor::find()
      ->innerJoinWith('lokacija','lokacija.prostorId=idProstor')
      ->where(['userId'=>$id])
      ->one();
      return $item;
    }
    static public function GetProstorByUserId($id){
      $item=Prostor::find()
      ->where (['userId'=>$id])
      ->one();
      return $item;
    }
   public function setUserId($id)
    {
      $this->userId=$id;
    }
    public function setImeProstora($ime)
    {
      $this->imeProstora=$ime;
    }
    public function getProstorId()
   {
     return $this->getPrimaryKey();
   }
   static public function getAllProstor(){
     $item=Prostor::find()
     ->all();
     return $item;
   }
 public function setbr($br){
       $this->brTelefona=$br;
     }
     public function setIg($ig){
       $this->igLink=$ig;
     }
}

<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_s1_prodi".
 *
 * @property int $id
 * @property int $id_akreditasi_prodi_s1
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7AkreditasiProdiS1 $akreditasiProdiS1
 * @property S7BorangS1ProdiStandar1 $borangS1ProdiStandar1s
 * @property S7BorangS1ProdiStandar2 $borangS1ProdiStandar2s
 * @property S7BorangS1ProdiStandar3 $borangS1ProdiStandar3s
 * @property S7BorangS1ProdiStandar4 $borangS1ProdiStandar4s
 * @property S7BorangS1ProdiStandar5 $borangS1ProdiStandar5s
 * @property S7BorangS1ProdiStandar6 $borangS1ProdiStandar6s
 * @property S7BorangS1ProdiStandar7 $borangS1ProdiStandar7s
 * @property DokumenBorangS1Prodi[] $dokumenBorangS1Prodis
 */
class S7BorangS1Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_s1_prodi';
    }

    public function behaviors()
    {
        return[
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_akreditasi_prodi_s1', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi_prodi_s1'], 'exist', 'skipOnError' => true, 'targetClass' => S7AkreditasiProdiS1::className(), 'targetAttribute' => ['id_akreditasi_prodi_s1' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi_prodi_s1' => 'Id S7Akreditasi Prodi S1',
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiS1()
    {
        return $this->hasOne(S7AkreditasiProdiS1::className(), ['id' => 'id_akreditasi_prodi_s1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar1s()
    {
        return $this->hasOne(S7BorangS1ProdiStandar1::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar2s()
    {
        return $this->hasOne(S7BorangS1ProdiStandar2::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar3s()
    {
        return $this->hasOne(S7BorangS1ProdiStandar3::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar4s()
    {
        return $this->hasOne(S7BorangS1ProdiStandar4::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar5s()
    {
        return $this->hasOne(S7BorangS1ProdiStandar5::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar6s()
    {
        return $this->hasOne(S7BorangS1ProdiStandar6::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar7s()
    {
        return $this->hasOne(S7BorangS1ProdiStandar7::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenBorangS1Prodis()
    {
        return $this->hasMany(DokumenBorangS1Prodi::className(), ['id_borang_s1_prodi' => 'id']);
    }

    public function updateProgress(){
        $s1= $this->borangS1ProdiStandar1s->progress/100;
        $s2= $this->borangS1ProdiStandar2s->progress/100;
        $s3= $this->borangS1ProdiStandar3s->progress/100;
        $s4= $this->borangS1ProdiStandar4s->progress/100;
        $s5= $this->borangS1ProdiStandar5s->progress/100;
        $s6= $this->borangS1ProdiStandar6s->progress/100;
        $s7= $this->borangS1ProdiStandar7s->progress/100;

        $progress = round((($s1+$s2+$s3+$s4+$s5+$s6+$s7)/7) *100,2);

        $this->progress = $progress;
        $this->save(false);
    }


}

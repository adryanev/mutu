<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_institusi".
 *
 * @property int $id
 * @property int $id_akreditasi_institusi
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7AkreditasiInstitusi $akreditasiInstitusi
 * @property S7BorangInstitusiStandar1 $borangInstitusiStandar1s
 * @property S7BorangInstitusiStandar2 $borangInstitusiStandar2s
 * @property S7BorangInstitusiStandar3 $borangInstitusiStandar3s
 * @property S7BorangInstitusiStandar4 $borangInstitusiStandar4s
 * @property S7BorangInstitusiStandar5 $borangInstitusiStandar5s
 * @property S7BorangInstitusiStandar6 $borangInstitusiStandar6s
 * @property S7BorangInstitusiStandar7 $borangInstitusiStandar7s
 * @property S7DokumenBorangInstitusi[] $dokumenBorangInstitusis
 */
class S7BorangInstitusi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_institusi';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_akreditasi_institusi', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi_institusi'], 'exist', 'skipOnError' => true, 'targetClass' => S7AkreditasiInstitusi::className(), 'targetAttribute' => ['id_akreditasi_institusi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi_institusi' => 'Id S7Akreditasi Institusi',
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiInstitusi()
    {
        return $this->hasOne(S7AkreditasiInstitusi::className(), ['id' => 'id_akreditasi_institusi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangInstitusiStandar1s()
    {
        return $this->hasOne(S7BorangInstitusiStandar1::className(), ['id_borang_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangInstitusiStandar2s()
    {
        return $this->hasOne(S7BorangInstitusiStandar2::className(), ['id_borang_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangInstitusiStandar3s()
    {
        return $this->hasOne(S7BorangInstitusiStandar3::className(), ['id_borang_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangInstitusiStandar4s()
    {
        return $this->hasOne(S7BorangInstitusiStandar4::className(), ['id_borang_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangInstitusiStandar5s()
    {
        return $this->hasOne(S7BorangInstitusiStandar5::className(), ['id_borang_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangInstitusiStandar6s()
    {
        return $this->hasOne(S7BorangInstitusiStandar6::className(), ['id_borang_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangInstitusiStandar7s()
    {
        return $this->hasOne(S7BorangInstitusiStandar7::className(), ['id_borang_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenBorangInstitusis()
    {
        return $this->hasMany(S7DokumenBorangInstitusi::className(), ['id_borang_institusi' => 'id']);
    }

    public function updateProgress(){
        $s1= $this->borangInstitusiStandar1s->progress/100;
        $s2= $this->borangInstitusiStandar2s->progress/100;
        $s3= $this->borangInstitusiStandar3s->progress/100;
        $s4= $this->borangInstitusiStandar4s->progress/100;
        $s5= $this->borangInstitusiStandar5s->progress/100;
        $s6= $this->borangInstitusiStandar6s->progress/100;
        $s7= $this->borangInstitusiStandar7s->progress/100;

        $progress = round((($s1+$s2+$s3+$s4+$s5+$s6+$s7)/7) *100,2);

        $this->progress = $progress;
        $this->save(false);
    }
}

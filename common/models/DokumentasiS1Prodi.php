<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "dokumentasi_s1_prodi".
 *
 * @property int $id
 * @property int $id_akreditasi_prodi_s1
 * @property double $progress
 * @property int $is_publik
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7AkreditasiProdiS1 $akreditasiProdiS1
 * @property DokumentasiS1ProdiStandar1[] $dokumentasiS1ProdiStandar1s
 * @property DokumentasiS1ProdiStandar2[] $dokumentasiS1ProdiStandar2s
 * @property DokumentasiS1ProdiStandar3[] $dokumentasiS1ProdiStandar3s
 * @property DokumentasiS1ProdiStandar4[] $dokumentasiS1ProdiStandar4s
 * @property DokumentasiS1ProdiStandar5[] $dokumentasiS1ProdiStandar5s
 * @property DokumentasiS1ProdiStandar6[] $dokumentasiS1ProdiStandar6s
 * @property DokumentasiS1ProdiStandar7[] $dokumentasiS1ProdiStandar7s
 */
class DokumentasiS1Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokumentasi_s1_prodi';
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
            [['id_akreditasi_prodi_s1', 'is_publik', 'created_at', 'updated_at'], 'integer'],
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
            'is_publik' => 'Is Publik',
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
    public function getDokumentasiS1ProdiStandar1s()
    {
        return $this->hasMany(DokumentasiS1ProdiStandar1::className(), ['id_dokumentasi_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1ProdiStandar2s()
    {
        return $this->hasMany(DokumentasiS1ProdiStandar2::className(), ['id_dokumentasi_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1ProdiStandar3s()
    {
        return $this->hasMany(DokumentasiS1ProdiStandar3::className(), ['id_dokumentasi_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1ProdiStandar4s()
    {
        return $this->hasMany(DokumentasiS1ProdiStandar4::className(), ['id_dokumentasi_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1ProdiStandar5s()
    {
        return $this->hasMany(DokumentasiS1ProdiStandar5::className(), ['id_dokumentasi_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1ProdiStandar6s()
    {
        return $this->hasMany(DokumentasiS1ProdiStandar6::className(), ['id_dokumentasi_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1ProdiStandar7s()
    {
        return $this->hasMany(DokumentasiS1ProdiStandar7::className(), ['id_dokumentasi_s1_prodi' => 'id']);
    }
}

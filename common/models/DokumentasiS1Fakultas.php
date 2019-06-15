<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "dokumentasi_s1_fakultas".
 *
 * @property int $id
 * @property int $id_akreditasi_prodi_s1
 * @property double $progress
 * @property int $is_publik
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7AkreditasiProdiS1 $akreditasiProdiS1
 * @property DokumentasiS1FakultasStandar1[] $dokumentasiS1FakultasStandar1s
 * @property DokumentasiS1FakultasStandar2[] $dokumentasiS1FakultasStandar2s
 * @property DokumentasiS1FakultasStandar3[] $dokumentasiS1FakultasStandar3s
 * @property DokumentasiS1FakultasStandar4[] $dokumentasiS1FakultasStandar4s
 * @property DokumentasiS1FakultasStandar5[] $dokumentasiS1FakultasStandar5s
 * @property DokumentasiS1FakultasStandar6[] $dokumentasiS1FakultasStandar6s
 * @property DokumentasiS1FakultasStandar7[] $dokumentasiS1FakultasStandar7s
 */
class DokumentasiS1Fakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokumentasi_s1_fakultas';
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
    public function getDokumentasiS1FakultasStandar1s()
    {
        return $this->hasMany(DokumentasiS1FakultasStandar1::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1FakultasStandar2s()
    {
        return $this->hasMany(DokumentasiS1FakultasStandar2::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1FakultasStandar3s()
    {
        return $this->hasMany(DokumentasiS1FakultasStandar3::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1FakultasStandar4s()
    {
        return $this->hasMany(DokumentasiS1FakultasStandar4::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1FakultasStandar5s()
    {
        return $this->hasMany(DokumentasiS1FakultasStandar5::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1FakultasStandar6s()
    {
        return $this->hasMany(DokumentasiS1FakultasStandar6::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1FakultasStandar7s()
    {
        return $this->hasMany(DokumentasiS1FakultasStandar7::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }
}

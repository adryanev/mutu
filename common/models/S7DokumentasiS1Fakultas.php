<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "dokumentasi_s1_fakultas".
 *
 * @property int $id
 * @property int $id_akreditasi
 * @property int $id_fakultas
 * @property double $progress
 * @property int $is_publik
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7Akreditasi $akreditasi
 * @property FakultasAkademi $fakultas
 * @property S7DokumentasiS1FakultasStandar1[] $dokumentasiS1FakultasStandar1s
 * @property S7DokumentasiS1FakultasStandar2[] $dokumentasiS1FakultasStandar2s
 * @property S7DokumentasiS1FakultasStandar3[] $dokumentasiS1FakultasStandar3s
 * @property S7DokumentasiS1FakultasStandar4[] $dokumentasiS1FakultasStandar4s
 * @property S7DokumentasiS1FakultasStandar5[] $dokumentasiS1FakultasStandar5s
 * @property S7DokumentasiS1FakultasStandar6[] $dokumentasiS1FakultasStandar6s
 * @property S7DokumentasiS1FakultasStandar7[] $dokumentasiS1FakultasStandar7s
 */
class S7DokumentasiS1Fakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_dokumentasi_s1_fakultas';
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
            [['id_akreditasi','id_fakultas', 'is_publik', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi'], 'exist', 'skipOnError' => true, 'targetClass' => S7Akreditasi::className(), 'targetAttribute' => ['id_akreditasi' => 'id']],
            [['id_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => FakultasAkademi::className(), 'targetAttribute' => ['id_akreditasi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi' => 'ID Akreditasi',
            'progress' => 'Progress',
            'is_publik' => 'Is Publik',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasi()
    {
        return $this->hasOne(S7Akreditasi::className(), ['id' => 'id_akreditasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFakultas()
    {
        return $this->hasOne(FakultasAkademi::className(), ['id' => 'id_fakultas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1FakultasStandar1s()
    {
        return $this->hasMany(S7DokumentasiS1FakultasStandar1::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1FakultasStandar2s()
    {
        return $this->hasMany(S7DokumentasiS1FakultasStandar2::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1FakultasStandar3s()
    {
        return $this->hasMany(S7DokumentasiS1FakultasStandar3::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1FakultasStandar4s()
    {
        return $this->hasMany(S7DokumentasiS1FakultasStandar4::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1FakultasStandar5s()
    {
        return $this->hasMany(S7DokumentasiS1FakultasStandar5::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1FakultasStandar6s()
    {
        return $this->hasMany(S7DokumentasiS1FakultasStandar6::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1FakultasStandar7s()
    {
        return $this->hasMany(S7DokumentasiS1FakultasStandar7::className(), ['id_dokumentasi_s1_fakultas' => 'id']);
    }
}

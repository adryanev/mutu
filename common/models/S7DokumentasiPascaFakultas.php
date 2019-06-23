<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "s7_dokumentasi_pasca_fakultas".
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
 * @property S7DokumentasiPascaFakultasStandar1[] $s7DokumentasiPascaFakultasStandar1s
 * @property S7DokumentasiPascaFakultasStandar2[] $s7DokumentasiPascaFakultasStandar2s
 * @property S7DokumentasiPascaFakultasStandar3[] $s7DokumentasiPascaFakultasStandar3s
 * @property S7DokumentasiPascaFakultasStandar4[] $s7DokumentasiPascaFakultasStandar4s
 * @property S7DokumentasiPascaFakultasStandar5[] $s7DokumentasiPascaFakultasStandar5s
 * @property S7DokumentasiPascaFakultasStandar6[] $s7DokumentasiPascaFakultasStandar6s
 * @property S7DokumentasiPascaFakultasStandar7[] $s7DokumentasiPascaFakultasStandar7s
 */
class S7DokumentasiPascaFakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_dokumentasi_pasca_fakultas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_akreditasi', 'id_fakultas', 'is_publik', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi'], 'exist', 'skipOnError' => true, 'targetClass' => S7Akreditasi::className(), 'targetAttribute' => ['id_akreditasi' => 'id']],
            [['id_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => FakultasAkademi::className(), 'targetAttribute' => ['id_fakultas' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi' => 'Id Akreditasi',
            'id_fakultas' => 'Id Fakultas',
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
    public function getS7DokumentasiPascaFakultasStandar1s()
    {
        return $this->hasMany(S7DokumentasiPascaFakultasStandar1::className(), ['id_dokumentasi_pasca_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaFakultasStandar2s()
    {
        return $this->hasMany(S7DokumentasiPascaFakultasStandar2::className(), ['id_dokumentasi_pasca_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaFakultasStandar3s()
    {
        return $this->hasMany(S7DokumentasiPascaFakultasStandar3::className(), ['id_dokumentasi_pasca_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaFakultasStandar4s()
    {
        return $this->hasMany(S7DokumentasiPascaFakultasStandar4::className(), ['id_dokumentasi_pasca_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaFakultasStandar5s()
    {
        return $this->hasMany(S7DokumentasiPascaFakultasStandar5::className(), ['id_dokumentasi_pasca_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaFakultasStandar6s()
    {
        return $this->hasMany(S7DokumentasiPascaFakultasStandar6::className(), ['id_dokumentasi_pasca_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaFakultasStandar7s()
    {
        return $this->hasMany(S7DokumentasiPascaFakultasStandar7::className(), ['id_dokumentasi_pasca_fakultas' => 'id']);
    }
}

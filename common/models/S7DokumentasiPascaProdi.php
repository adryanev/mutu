<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_dokumentasi_pasca_prodi".
 *
 * @property int $id
 * @property int $id_akreditasi_prodi_pasca
 * @property double $progress
 * @property int $is_publik
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7AkreditasiProdiPasca $akreditasiProdiPasca
 * @property S7DokumentasiPascaProdiStandar1[] $s7DokumentasiPascaProdiStandar1s
 * @property S7DokumentasiPascaProdiStandar2[] $s7DokumentasiPascaProdiStandar2s
 * @property S7DokumentasiPascaProdiStandar3[] $s7DokumentasiPascaProdiStandar3s
 * @property S7DokumentasiPascaProdiStandar4[] $s7DokumentasiPascaProdiStandar4s
 * @property S7DokumentasiPascaProdiStandar5[] $s7DokumentasiPascaProdiStandar5s
 * @property S7DokumentasiPascaProdiStandar6[] $s7DokumentasiPascaProdiStandar6s
 * @property S7DokumentasiPascaProdiStandar7[] $s7DokumentasiPascaProdiStandar7s
 */
class S7DokumentasiPascaProdi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_dokumentasi_pasca_prodi';
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
            [['id_akreditasi_prodi_pasca', 'is_publik', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi_prodi_pasca'], 'exist', 'skipOnError' => true, 'targetClass' => S7AkreditasiProdiPasca::className(), 'targetAttribute' => ['id_akreditasi_prodi_pasca' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi_prodi_pasca' => 'Id Akreditasi Prodi Pasca',
            'progress' => 'Progress',
            'is_publik' => 'Is Publik',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiPasca()
    {
        return $this->hasOne(S7AkreditasiProdiPasca::className(), ['id' => 'id_akreditasi_prodi_pasca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaProdiStandar1s()
    {
        return $this->hasMany(S7DokumentasiPascaProdiStandar1::className(), ['id_dokumentasi_pasca_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaProdiStandar2s()
    {
        return $this->hasMany(S7DokumentasiPascaProdiStandar2::className(), ['id_dokumentasi_pasca_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaProdiStandar3s()
    {
        return $this->hasMany(S7DokumentasiPascaProdiStandar3::className(), ['id_dokumentasi_pasca_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaProdiStandar4s()
    {
        return $this->hasMany(S7DokumentasiPascaProdiStandar4::className(), ['id_dokumentasi_pasca_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaProdiStandar5s()
    {
        return $this->hasMany(S7DokumentasiPascaProdiStandar5::className(), ['id_dokumentasi_pasca_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaProdiStandar6s()
    {
        return $this->hasMany(S7DokumentasiPascaProdiStandar6::className(), ['id_dokumentasi_pasca_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaProdiStandar7s()
    {
        return $this->hasMany(S7DokumentasiPascaProdiStandar7::className(), ['id_dokumentasi_pasca_prodi' => 'id']);
    }
}

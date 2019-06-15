<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "akreditasi".
 *
 * @property int $id
 * @property string $nama
 * @property string $tahun
 * @property int $id_jenis_akreditasi
 * @property string $lembaga
 * @property int $created_at
 * @property int $updated_at
 *
 * @property JenisAkreditasi $jenisAkreditasi
 * @property S7AkreditasiInstitusi[] $akreditasiInstitusis
 * @property S7AkreditasiProdiDiploma[] $akreditasiProdiDiplomas
 * @property S7AkreditasiProdiS1[] $akreditasiProdiS1s
 * @property S7AkreditasiProdiS2[] $akreditasiProdiS2s
 * @property S7AkreditasiProdiS3[] $akreditasiProdiS3s
 */
class S7Akreditasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_akreditasi';
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
            [['id_jenis_akreditasi', 'created_at', 'updated_at'], 'integer'],
            [['nama', 'lembaga'], 'string', 'max' => 255],
            [['tahun'], 'string', 'max' => 4],
            [['id_jenis_akreditasi'], 'exist', 'skipOnError' => true, 'targetClass' => JenisAkreditasi::className(), 'targetAttribute' => ['id_jenis_akreditasi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'tahun' => 'Tahun',
            'id_jenis_akreditasi' => 'Id Jenis S7Akreditasi',
            'lembaga' => 'Lembaga',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisAkreditasi()
    {
        return $this->hasOne(JenisAkreditasi::className(), ['id' => 'id_jenis_akreditasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiInstitusis()
    {
        return $this->hasMany(S7AkreditasiInstitusi::className(), ['id_akreditasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiDiplomas()
    {
        return $this->hasMany(S7AkreditasiProdiDiploma::className(), ['id_akreditasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiS1s()
    {
        return $this->hasMany(S7AkreditasiProdiS1::className(), ['id_akreditasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiS2s()
    {
        return $this->hasMany(S7AkreditasiProdiS2::className(), ['id_akreditasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiS3s()
    {
        return $this->hasMany(S7AkreditasiProdiS3::className(), ['id_akreditasi' => 'id']);
    }
}

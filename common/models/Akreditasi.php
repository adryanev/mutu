<?php

namespace common\models;

use Yii;

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
 * @property AkreditasiInstitusi[] $akreditasiInstitusis
 * @property AkreditasiProdiDiploma[] $akreditasiProdiDiplomas
 * @property AkreditasiProdiS1[] $akreditasiProdiS1s
 * @property AkreditasiProdiS2[] $akreditasiProdiS2s
 * @property AkreditasiProdiS3[] $akreditasiProdiS3s
 */
class Akreditasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'akreditasi';
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
            'id_jenis_akreditasi' => 'Id Jenis Akreditasi',
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
        return $this->hasMany(AkreditasiInstitusi::className(), ['id_akreditasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiDiplomas()
    {
        return $this->hasMany(AkreditasiProdiDiploma::className(), ['id_akreditasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiS1s()
    {
        return $this->hasMany(AkreditasiProdiS1::className(), ['id_akreditasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiS2s()
    {
        return $this->hasMany(AkreditasiProdiS2::className(), ['id_akreditasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiS3s()
    {
        return $this->hasMany(AkreditasiProdiS3::className(), ['id_akreditasi' => 'id']);
    }
}

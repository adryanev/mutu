<?php

namespace common\models\kriteria9\akreditasi;

use common\models\JenisAkreditasi;
use common\models\kriteria9\led\fakultas\K9LedFakultas;
use common\models\kriteria9\lk\fakultas\K9LkFakultas;
use Yii;

/**
 * This is the model class for table "k9_akreditasi".
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
 * @property K9AkreditasiInstitusi[] $k9AkreditasiInstitusis
 * @property K9AkreditasiProdi[] $k9AkreditasiProdis
 * @property K9LedFakultas[] $k9LedFakultas
 * @property K9LkFakultas[] $k9LkFakultas
 */
class K9Akreditasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_akreditasi';
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
    public function getK9AkreditasiInstitusis()
    {
        return $this->hasMany(K9AkreditasiInstitusi::className(), ['id_akreditasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9AkreditasiProdis()
    {
        return $this->hasMany(K9AkreditasiProdi::className(), ['id_akreditasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LedFakultas()
    {
        return $this->hasMany(K9LedFakultas::className(), ['id_akreditasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkFakultas()
    {
        return $this->hasMany(K9LkFakultas::className(), ['id_akreditasi' => 'id']);
    }
}

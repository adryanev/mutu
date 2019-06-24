<?php

namespace common\models;

use common\models\led\S7LedProdiPasca;
use Yii;

/**
 * This is the model class for table "s7_akreditasi_prodi_pasca".
 *
 * @property int $id
 * @property int $id_akreditasi
 * @property int $id_prodi
 * @property double $progress
 * @property string $peringkat
 * @property int $skor
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7Akreditasi $akreditasi
 * @property ProgramStudi $prodi
 * @property S7BorangPascaProdi[] $s7BorangPascaProdis
 * @property S7DokumentasiPascaFakultas[] $s7DokumentasiPascaFakultas
 * @property S7DokumentasiPascaProdi[] $s7DokumentasiPascaProdis
 * @property S7LedProdiPasca[] $s7LedProdiPascas
 */
class S7AkreditasiProdiPasca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_akreditasi_prodi_pasca';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_akreditasi', 'id_prodi', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi'], 'exist', 'skipOnError' => true, 'targetClass' => S7Akreditasi::className(), 'targetAttribute' => ['id_akreditasi' => 'id']],
            [['id_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => ProgramStudi::className(), 'targetAttribute' => ['id_prodi' => 'id']],
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
            'id_prodi' => 'Id Prodi',
            'progress' => 'Progress',
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
    public function getProdi()
    {
        return $this->hasOne(ProgramStudi::className(), ['id' => 'id_prodi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaProdis()
    {
        return $this->hasMany(S7BorangPascaProdi::className(), ['id_akreditasi_prodi_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaFakultas()
    {
        return $this->hasMany(S7DokumentasiPascaFakultas::className(), ['id_akreditasi_prodi_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumentasiPascaProdis()
    {
        return $this->hasMany(S7DokumentasiPascaProdi::className(), ['id_akreditasi_prodi_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7LedProdiPascas()
    {
        return $this->hasMany(S7LedProdiPasca::className(), ['id_akreditasi_prodi_pasca' => 'id']);
    }
}

<?php

namespace common\models;

use common\models\led\S7LedProdiS1;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "akreditasi_prodi_s1".
 *
 * @property int $id
 * @property int $id_akreditasi
 * @property int $id_prodi
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7Akreditasi $akreditasi
 * @property ProgramStudi $prodi
 * @property S7BorangS1Fakultas[] $borangS1Fakultas
 * @property S7BorangS1Prodi[] $borangS1Prodis
 * @property S7DokumentasiS1Fakultas[] $dokumentasiS1Fakultas
 * @property S7DokumentasiS1Prodi[] $dokumentasiS1Prodis
 * @property S7LedProdiS1[] $ledProdiS1s
 */
class S7AkreditasiProdiS1 extends \yii\db\ActiveRecord
{
    public function behaviors()
    {

        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_akreditasi_prodi_s1';
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
            'id_akreditasi' => 'Id S7Akreditasi',
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

    public function getLedProdiS1s()
    {
        return $this->hasMany(S7LedProdiS1::class, ['id_akreditasi_prodi_s1' => 'id']);
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
    public function getBorangS1Fakultas()
    {
        return $this->hasMany(S7BorangS1Fakultas::className(), ['id_akreditasi_prodi_s1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1Prodis()
    {
        return $this->hasMany(S7BorangS1Prodi::className(), ['id_akreditasi_prodi_s1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1Fakultas()
    {
        return $this->hasMany(S7DokumentasiS1Fakultas::className(), ['id_akreditasi_prodi_s1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1Prodis()
    {
        return $this->hasMany(S7DokumentasiS1Prodi::className(), ['id_akreditasi_prodi_s1' => 'id']);
    }
}

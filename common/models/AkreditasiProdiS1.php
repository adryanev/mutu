<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "akreditasi_prodi_s1".
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
 * @property Akreditasi $akreditasi
 * @property ProgramStudi $prodi
 * @property BorangS1Fakultas[] $borangS1Fakultas
 * @property BorangS1Prodi[] $borangS1Prodis
 */
class AkreditasiProdiS1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'akreditasi_prodi_s1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_akreditasi', 'id_prodi', 'skor', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['peringkat'], 'string', 'max' => 1],
            [['id_akreditasi'], 'exist', 'skipOnError' => true, 'targetClass' => Akreditasi::className(), 'targetAttribute' => ['id_akreditasi' => 'id']],
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
            'peringkat' => 'Peringkat',
            'skor' => 'Skor',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasi()
    {
        return $this->hasOne(Akreditasi::className(), ['id' => 'id_akreditasi']);
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
        return $this->hasMany(BorangS1Fakultas::className(), ['id_akreditasi_prodi_s1' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1Prodis()
    {
        return $this->hasMany(BorangS1Prodi::className(), ['id_akreditasi_prodi_s1' => 'id']);
    }
}

<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "akreditasi_prodi_diploma".
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
 * @property BorangDiplomaAkademi[] $borangDiplomaAkademis
 * @property BorangDiplomaProdi[] $borangDiplomaProdis
 */
class S7AkreditasiProdiDiploma extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_akreditasi_prodi_diploma';
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
            [['id_akreditasi', 'id_prodi', 'skor', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['peringkat'], 'string', 'max' => 1],
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
    public function getBorangDiplomaAkademis()
    {
        return $this->hasMany(BorangDiplomaAkademi::className(), ['id_akreditasi_prodi_diploma' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangDiplomaProdis()
    {
        return $this->hasMany(BorangDiplomaProdi::className(), ['id_akreditasi_prodi_diploma' => 'id']);
    }
}

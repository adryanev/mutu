<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "program_studi".
 *
 * @property int $id
 * @property string $nama
 * @property int $id_program
 * @property int $id_fakultas_akademi
 * @property int $created_at
 * @property int $updated_at
 *
 * @property AkreditasiProdiDiploma[] $akreditasiProdiDiplomas
 * @property AkreditasiProdiS1[] $akreditasiProdiS1s
 * @property AkreditasiProdiS2[] $akreditasiProdiS2s
 * @property AkreditasiProdiS3[] $akreditasiProdiS3s
 * @property ProfilUser[] $profilUsers
 * @property Program $program
 * @property FakultasAkademi $fakultasAkademi
 */
class ProgramStudi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'program_studi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_program', 'id_fakultas_akademi', 'created_at', 'updated_at'], 'integer'],
            [['nama'], 'string', 'max' => 255],
            [['id_program'], 'exist', 'skipOnError' => true, 'targetClass' => Program::className(), 'targetAttribute' => ['id_program' => 'id']],
            [['id_fakultas_akademi'], 'exist', 'skipOnError' => true, 'targetClass' => FakultasAkademi::className(), 'targetAttribute' => ['id_fakultas_akademi' => 'id']],
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
            'id_program' => 'Id Program',
            'id_fakultas_akademi' => 'Id Fakultas Akademi',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiDiplomas()
    {
        return $this->hasMany(AkreditasiProdiDiploma::className(), ['id_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiS1s()
    {
        return $this->hasMany(AkreditasiProdiS1::className(), ['id_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiS2s()
    {
        return $this->hasMany(AkreditasiProdiS2::className(), ['id_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiS3s()
    {
        return $this->hasMany(AkreditasiProdiS3::className(), ['id_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfilUsers()
    {
        return $this->hasMany(ProfilUser::className(), ['id_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgram()
    {
        return $this->hasOne(Program::className(), ['id' => 'id_program']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFakultasAkademi()
    {
        return $this->hasOne(FakultasAkademi::className(), ['id' => 'id_fakultas_akademi']);
    }
}

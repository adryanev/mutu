<?php

namespace common\models;

use common\models\led\S7LedInstitusi;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "akreditasi_institusi".
 *
 * @property int $id
 * @property int $id_akreditasi
 * @property double $progress
 * @property string $peringkat
 * @property int $skor
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7Akreditasi $akreditasi
 * @property S7BorangInstitusi[] $borangInstitusis
 * @property S7DokumentasiInstitusi[] $dokumentasiInstitusis
 * @property S7LedInstitusi[] $ledInstitusi
 *
 */
class S7AkreditasiInstitusi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_akreditasi_institusi';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_akreditasi', 'skor', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['peringkat'], 'string', 'max' => 1],
            [['id_akreditasi'], 'exist', 'skipOnError' => true, 'targetClass' => S7Akreditasi::className(), 'targetAttribute' => ['id_akreditasi' => 'id']],
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
    public function getLedInstitusi()
    {
        return $this->hasOne(S7LedInstitusi::className(), ['id_akreditasi_institusi' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangInstitusis()
    {
        return $this->hasMany(S7BorangInstitusi::className(), ['id_akreditasi_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusis()
    {
        return $this->hasMany(S7DokumentasiInstitusi::className(), ['id_akreditasi_institusi' => 'id']);
    }
}

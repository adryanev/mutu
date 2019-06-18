<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "dokumentasi_institusi".
 *
 * @property int $id
 * @property int $id_akreditasi_institusi
 * @property double $progress
 * @property int $is_publik
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7AkreditasiInstitusi $akreditasiInstitusi
 * @property S7DokumentasiInstitusiStandar1[] $dokumentasiInstitusiStandar1s
 * @property S7DokumentasiInstitusiStandar2[] $dokumentasiInstitusiStandar2s
 * @property S7DokumentasiInstitusiStandar3[] $dokumentasiInstitusiStandar3s
 * @property S7DokumentasiInstitusiStandar4[] $dokumentasiInstitusiStandar4s
 * @property S7DokumentasiInstitusiStandar5[] $dokumentasiInstitusiStandar5s
 * @property S7DokumentasiInstitusiStandar6[] $dokumentasiInstitusiStandar6s
 * @property S7DokumentasiInstitusiStandar7[] $dokumentasiInstitusiStandar7s
 */
class S7DokumentasiInstitusi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_dokumentasi_institusi';
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
            [['id_akreditasi_institusi', 'is_publik', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi_institusi'], 'exist', 'skipOnError' => true, 'targetClass' => S7AkreditasiInstitusi::className(), 'targetAttribute' => ['id_akreditasi_institusi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi_institusi' => 'Id S7Akreditasi Institusi',
            'progress' => 'Progress',
            'is_publik' => 'Is Publik',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiInstitusi()
    {
        return $this->hasOne(S7AkreditasiInstitusi::className(), ['id' => 'id_akreditasi_institusi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar1s()
    {
        return $this->hasMany(S7DokumentasiInstitusiStandar1::className(), ['id_dokumentasi_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar2s()
    {
        return $this->hasMany(S7DokumentasiInstitusiStandar2::className(), ['id_dokumentasi_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar3s()
    {
        return $this->hasMany(S7DokumentasiInstitusiStandar3::className(), ['id_dokumentasi_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar4s()
    {
        return $this->hasMany(S7DokumentasiInstitusiStandar4::className(), ['id_dokumentasi_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar5s()
    {
        return $this->hasMany(S7DokumentasiInstitusiStandar5::className(), ['id_dokumentasi_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar6s()
    {
        return $this->hasMany(S7DokumentasiInstitusiStandar6::className(), ['id_dokumentasi_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar7s()
    {
        return $this->hasMany(S7DokumentasiInstitusiStandar7::className(), ['id_dokumentasi_institusi' => 'id']);
    }
}

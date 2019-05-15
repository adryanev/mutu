<?php

namespace common\models;

use Yii;

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
 * @property AkreditasiInstitusi $akreditasiInstitusi
 * @property DokumentasiInstitusiStandar1[] $dokumentasiInstitusiStandar1s
 * @property DokumentasiInstitusiStandar2[] $dokumentasiInstitusiStandar2s
 * @property DokumentasiInstitusiStandar3[] $dokumentasiInstitusiStandar3s
 * @property DokumentasiInstitusiStandar4[] $dokumentasiInstitusiStandar4s
 * @property DokumentasiInstitusiStandar5[] $dokumentasiInstitusiStandar5s
 * @property DokumentasiInstitusiStandar6[] $dokumentasiInstitusiStandar6s
 * @property DokumentasiInstitusiStandar7[] $dokumentasiInstitusiStandar7s
 */
class DokumentasiIntitusi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokumentasi_institusi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_akreditasi_institusi', 'is_publik', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi_institusi'], 'exist', 'skipOnError' => true, 'targetClass' => AkreditasiInstitusi::className(), 'targetAttribute' => ['id_akreditasi_institusi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi_institusi' => 'Id Akreditasi Institusi',
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
        return $this->hasOne(AkreditasiInstitusi::className(), ['id' => 'id_akreditasi_institusi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar1s()
    {
        return $this->hasMany(DokumentasiInstitusiStandar1::className(), ['id_dokumentasi_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar2s()
    {
        return $this->hasMany(DokumentasiInstitusiStandar2::className(), ['id_dokumentasi_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar3s()
    {
        return $this->hasMany(DokumentasiInstitusiStandar3::className(), ['id_dokumentasi_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar4s()
    {
        return $this->hasMany(DokumentasiInstitusiStandar4::className(), ['id_dokumentasi_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar5s()
    {
        return $this->hasMany(DokumentasiInstitusiStandar5::className(), ['id_dokumentasi_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar6s()
    {
        return $this->hasMany(DokumentasiInstitusiStandar6::className(), ['id_dokumentasi_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusiStandar7s()
    {
        return $this->hasMany(DokumentasiInstitusiStandar7::className(), ['id_dokumentasi_institusi' => 'id']);
    }
}

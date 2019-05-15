<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dokumentasi_s1_prodi_standar5".
 *
 * @property int $id
 * @property int $id_dokumentasi_s1_prodi
 * @property string $kode
 * @property string $dokumen
 * @property int $is_publik
 * @property int $is_asesor
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property DokumentasiS1Prodi $dokumentasiS1Prodi
 * @property User $createdBy
 * @property User $updatedBy
 */
class DokumentasiS1ProdiStandar5 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokumentasi_s1_prodi_standar5';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_dokumentasi_s1_prodi', 'is_publik', 'is_asesor', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['kode', 'dokumen'], 'string', 'max' => 255],
            [['id_dokumentasi_s1_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => DokumentasiS1Prodi::className(), 'targetAttribute' => ['id_dokumentasi_s1_prodi' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_dokumentasi_s1_prodi' => 'Id Dokumentasi S1 Prodi',
            'kode' => 'Kode',
            'dokumen' => 'Dokumen',
            'is_publik' => 'Is Publik',
            'is_asesor' => 'Is Asesor',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiS1Prodi()
    {
        return $this->hasOne(DokumentasiS1Prodi::className(), ['id' => 'id_dokumentasi_s1_prodi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}

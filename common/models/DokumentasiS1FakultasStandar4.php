<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dokumentasi_s1_fakultas_standar4".
 *
 * @property int $id
 * @property int $id_dokumentasi_s1_fakultas
 * @property string $kode
 * @property string $dokumen
 * @property int $is_publik
 * @property int $is_asesor
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property DokumentasiS1Fakultas $dokumentasiS1Fakultas
 * @property User $createdBy
 * @property User $updatedBy
 */
class DokumentasiS1FakultasStandar4 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokumentasi_s1_fakultas_standar4';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_dokumentasi_s1_fakultas', 'is_publik', 'is_asesor', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['kode', 'dokumen'], 'string', 'max' => 255],
            [['id_dokumentasi_s1_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => DokumentasiS1Fakultas::className(), 'targetAttribute' => ['id_dokumentasi_s1_fakultas' => 'id']],
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
            'id_dokumentasi_s1_fakultas' => 'Id Dokumentasi S1 Fakultas',
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
    public function getDokumentasiS1Fakultas()
    {
        return $this->hasOne(DokumentasiS1Fakultas::className(), ['id' => 'id_dokumentasi_s1_fakultas']);
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

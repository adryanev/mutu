<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "dokumentasi_institusi_standar4".
 *
 * @property int $id
 * @property int $id_dokumentasi_institusi
 * @property string $kode
 * @property string $dokumen
 * @property int $is_publik
 * @property int $is_asesor
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7DokumentasiInstitusi $dokumentasiInstitusi
 * @property User $createdBy
 * @property User $updatedBy
 */
class S7DokumentasiInstitusiStandar4 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_dokumentasi_institusi_standar4';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_dokumentasi_institusi', 'is_publik', 'is_asesor', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['progress'], 'number'],
            [['kode', 'dokumen'], 'string', 'max' => 255],
            [['id_dokumentasi_institusi'], 'exist', 'skipOnError' => true, 'targetClass' => S7DokumentasiInstitusi::className(), 'targetAttribute' => ['id_dokumentasi_institusi' => 'id']],
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
            'id_dokumentasi_institusi' => 'Id Dokumentasi Institusi',
            'kode' => 'Kode',
            'dokumen' => 'Dokumen',
            'is_publik' => 'Is Publik',
            'is_asesor' => 'Is Asesor',
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumentasiInstitusi()
    {
        return $this->hasOne(S7DokumentasiInstitusi::className(), ['id' => 'id_dokumentasi_institusi']);
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

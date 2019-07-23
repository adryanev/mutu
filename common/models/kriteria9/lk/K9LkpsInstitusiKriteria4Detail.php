<?php

namespace common\models\kriteria9\lk;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "k9_lkps_institusi_kriteria4_detail".
 *
 * @property int $id
 * @property int $id_lkps_institusi_kriteria4
 * @property string $kode_dokumen
 * @property string $nama_dokumen
 * @property string $jenis_dokumen
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property K9LkpsInstitusiKriteria4 $lkpsInstitusiKriteria4
 * @property User $createdBy
 * @property User $updatedBy
 */
class K9LkpsInstitusiKriteria4Detail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_lkps_institusi_kriteria4_detail';
    }

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
            [['id_lkps_institusi_kriteria4', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['kode_dokumen', 'nama_dokumen', 'jenis_dokumen'], 'string', 'max' => 255],
            [['id_lkps_institusi_kriteria4'], 'exist', 'skipOnError' => true, 'targetClass' => K9LkpsInstitusiKriteria4::className(), 'targetAttribute' => ['id_lkps_institusi_kriteria4' => 'id']],
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
            'id_lkps_institusi_kriteria4' => 'Id Lkps Institusi Kriteria4',
            'kode_dokumen' => 'Kode Dokumen',
            'nama_dokumen' => 'Nama Dokumen',
            'jenis_dokumen' => 'Jenis Dokumen',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLkpsInstitusiKriteria4()
    {
        return $this->hasOne(K9LkpsInstitusiKriteria4::className(), ['id' => 'id_lkps_institusi_kriteria4']);
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

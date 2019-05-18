<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dokumen_borang_s1_prodi".
 *
 * @property int $id
 * @property int $id_borang_s1_prodi
 * @property string $nama_dokumen
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BorangS1Prodi $borangS1Prodi
 */
class DokumenBorangS1Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokumen_borang_s1_prodi';
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
            [['id_borang_s1_prodi', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nama_dokumen'], 'string', 'max' => 255],
            [['id_borang_s1_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => BorangS1Prodi::className(), 'targetAttribute' => ['id_borang_s1_prodi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_borang_s1_prodi' => 'Id Borang S1 Prodi',
            'nama_dokumen' => 'Nama Dokumen',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1Prodi()
    {
        return $this->hasOne(BorangS1Prodi::className(), ['id' => 'id_borang_s1_prodi']);
    }
}

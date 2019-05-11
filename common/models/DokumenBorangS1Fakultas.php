<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dokumen_borang_s1_fakultas".
 *
 * @property int $id
 * @property int $id_borang_s1_fakultas
 * @property string $nama_dokumen
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BorangS1Fakultas $borangS1Fakultas
 */
class DokumenBorangS1Fakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokumen_borang_s1_fakultas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_borang_s1_fakultas', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['progress'], 'number'],
            [['nama_dokumen'], 'string', 'max' => 255],
            [['id_borang_s1_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => BorangS1Fakultas::className(), 'targetAttribute' => ['id_borang_s1_fakultas' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_borang_s1_fakultas' => 'Id Borang S1 Fakultas',
            'nama_dokumen' => 'Nama Dokumen',
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
    public function getBorangS1Fakultas()
    {
        return $this->hasOne(BorangS1Fakultas::className(), ['id' => 'id_borang_s1_fakultas']);
    }
}

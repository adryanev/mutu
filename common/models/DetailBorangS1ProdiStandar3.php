<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detail_borang_s1_prodi_standar3".
 *
 * @property int $id
 * @property int $id_borang_s1_prodi_standar3
 * @property string $nomor_dokumen
 * @property string $nama_dokumen
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BorangS1ProdiStandar3 $borangS1ProdiStandar3
 */
class DetailBorangS1ProdiStandar3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_borang_s1_prodi_standar3';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_borang_s1_prodi_standar3', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nomor_dokumen', 'nama_dokumen'], 'string', 'max' => 255],
            [['id_borang_s1_prodi_standar3'], 'exist', 'skipOnError' => true, 'targetClass' => BorangS1ProdiStandar3::className(), 'targetAttribute' => ['id_borang_s1_prodi_standar3' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_borang_s1_prodi_standar3' => 'Id Borang S1 Prodi Standar3',
            'nomor_dokumen' => 'Nomor Dokumen',
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
    public function getBorangS1ProdiStandar3()
    {
        return $this->hasOne(BorangS1ProdiStandar3::className(), ['id' => 'id_borang_s1_prodi_standar3']);
    }
}

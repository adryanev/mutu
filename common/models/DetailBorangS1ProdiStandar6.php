<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detail_borang_s1_prodi_standar6".
 *
 * @property int $id
 * @property int $id_borang_s1_prodi_standar6
 * @property string $nomor_dokumen
 * @property string $nama_dokumen
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BorangS1ProdiStandar6 $borangS1ProdiStandar6
 */
class DetailBorangS1ProdiStandar6 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_borang_s1_prodi_standar6';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_borang_s1_prodi_standar6', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nomor_dokumen', 'nama_dokumen'], 'string', 'max' => 255],
            [['id_borang_s1_prodi_standar6'], 'exist', 'skipOnError' => true, 'targetClass' => BorangS1ProdiStandar6::className(), 'targetAttribute' => ['id_borang_s1_prodi_standar6' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_borang_s1_prodi_standar6' => 'Id Borang S1 Prodi Standar6',
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
    public function getBorangS1ProdiStandar6()
    {
        return $this->hasOne(BorangS1ProdiStandar6::className(), ['id' => 'id_borang_s1_prodi_standar6']);
    }
}

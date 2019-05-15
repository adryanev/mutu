<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detail_borang_institusi_standar3".
 *
 * @property int $id
 * @property int $id_borang_institusi_standar3
 * @property string $nomor_dokumen
 * @property string $nama_dokumen
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property BorangInstitusiStandar3 $borangInstitusiStandar3
 */
class DetailBorangInstitusiStandar3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_borang_institusi_standar3';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_borang_institusi_standar3', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nomor_dokumen', 'nama_dokumen'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['id_borang_institusi_standar3'], 'exist', 'skipOnError' => true, 'targetClass' => BorangInstitusiStandar3::className(), 'targetAttribute' => ['id_borang_institusi_standar3' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_borang_institusi_standar3' => 'Id Borang Institusi Standar3',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangInstitusiStandar3()
    {
        return $this->hasOne(BorangInstitusiStandar3::className(), ['id' => 'id_borang_institusi_standar3']);
    }
}

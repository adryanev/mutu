<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "detail_borang_s1_prodi_standar4".
 *
 * @property int $id
 * @property int $id_borang_s1_prodi_standar4
 * @property string $nomor_dokumen
 * @property string $nama_dokumen
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7BorangS1ProdiStandar4 $borangS1ProdiStandar4
 */
class S7DetailBorangS1ProdiStandar4 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_detail_borang_s1_prodi_standar4';
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
            [['id_borang_s1_prodi_standar4', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['nomor_dokumen', 'nama_dokumen'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
            [['id_borang_s1_prodi_standar4'], 'exist', 'skipOnError' => true, 'targetClass' => S7BorangS1ProdiStandar4::className(), 'targetAttribute' => ['id_borang_s1_prodi_standar4' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_borang_s1_prodi_standar4' => 'Id Borang S1 Prodi Standar4',
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
    public function getBorangS1ProdiStandar4()
    {
        return $this->hasOne(S7BorangS1ProdiStandar4::className(), ['id' => 'id_borang_s1_prodi_standar4']);
    }
}

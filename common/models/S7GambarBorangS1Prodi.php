<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "gambar_borang_s1_prodi".
 *
 * @property int $id
 * @property int $id_borang_s1_prodi
 * @property string $nomor_borang
 * @property string $nama_file
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangS1Prodi $borangS1Prodi
 * @property User $createdBy
 * @property User $updatedBy
 */
class S7GambarBorangS1Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_gambar_borang_s1_prodi';
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
            [['nomor_borang', 'nama_file'], 'string', 'max' => 255],
            [['id_borang_s1_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => S7BorangS1Prodi::className(), 'targetAttribute' => ['id_borang_s1_prodi' => 'id']],
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
            'id_borang_s1_prodi' => 'Id Borang S1 Prodi',
            'nomor_borang' => 'Nomor Borang',
            'nama_file' => 'Nama File',
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
        return $this->hasOne(S7BorangS1Prodi::className(), ['id' => 'id_borang_s1_prodi']);
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

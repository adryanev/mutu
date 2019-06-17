<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "isian_borang_s1_prodi".
 *
 * @property int $id
 * @property int $id_isian_borang
 * @property string $nama_file
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $id_borang_s1_prodi
 *
 * @property S7BorangS1Prodi $borangS1Prodi
 * @property S7IsianBorang $isianBorang
 * @property User $createdBy
 * @property User $updatedBy
 */
class S7IsianBorangS1Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_isian_borang_s1_prodi';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_isian_borang', 'created_at', 'updated_at', 'created_by', 'updated_by', 'id_borang_s1_prodi'], 'integer'],
            [['nama_file'], 'string', 'max' => 255],
            [['id_borang_s1_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => S7BorangS1Prodi::className(), 'targetAttribute' => ['id_borang_s1_prodi' => 'id']],
            [['id_isian_borang'], 'exist', 'skipOnError' => true, 'targetClass' => S7IsianBorang::className(), 'targetAttribute' => ['id_isian_borang' => 'id']],
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
            'id_isian_borang' => 'Id Isian Borang',
            'nama_file' => 'Nama File',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'id_borang_s1_prodi' => 'Id Borang S1 Prodi',
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
    public function getIsianBorang()
    {
        return $this->hasOne(S7IsianBorang::className(), ['id' => 'id_isian_borang']);
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

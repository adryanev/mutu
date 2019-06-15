<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "isian_borang_s1_fakultas".
 *
 * @property int $id
 * @property int $id_isian_borang
 * @property string $nama_file
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 * @property int $id_borang_s1_fakultas
 *
 * @property S7BorangS1Fakultas $borangS1Fakultas
 * @property IsianBorang $isianBorang
 * @property User $createdBy
 * @property User $updatedBy
 */
class IsianBorangS1Fakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'isian_borang_s1_fakultas';
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
            [['id_isian_borang', 'created_at', 'updated_at', 'created_by', 'updated_by', 'id_borang_s1_fakultas'], 'integer'],
            [['nama_file'], 'string', 'max' => 255],
            [['id_borang_s1_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => S7BorangS1Fakultas::className(), 'targetAttribute' => ['id_borang_s1_fakultas' => 'id']],
            [['id_isian_borang'], 'exist', 'skipOnError' => true, 'targetClass' => IsianBorang::className(), 'targetAttribute' => ['id_isian_borang' => 'id']],
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
            'id_borang_s1_fakultas' => 'Id Borang S1 Fakultas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1Fakultas()
    {
        return $this->hasOne(S7BorangS1Fakultas::className(), ['id' => 'id_borang_s1_fakultas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIsianBorang()
    {
        return $this->hasOne(IsianBorang::className(), ['id' => 'id_isian_borang']);
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

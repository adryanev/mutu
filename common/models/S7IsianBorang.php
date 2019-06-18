<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "isian_borang".
 *
 * @property int $id
 * @property string $nomor_borang
 * @property string $nama_file
 * @property string $untuk
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7IsianBorangS1Fakultas[] $isianBorangS1Fakultas
 * @property S7IsianBorangS1Prodi[] $isianBorangS1Prodis
 */
class S7IsianBorang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_isian_borang';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['nomor_borang', 'nama_file', 'untuk'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomor_borang' => 'Nomor Borang',
            'nama_file' => 'Nama File',
            'untuk' => 'Untuk',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIsianBorangS1Fakultas()
    {
        return $this->hasMany(S7IsianBorangS1Fakultas::className(), ['id_isian_borang' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIsianBorangS1Prodis()
    {
        return $this->hasMany(S7IsianBorangS1Prodi::className(), ['id_isian_borang' => 'id']);
    }
}

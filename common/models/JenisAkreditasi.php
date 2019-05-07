<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jenis_akreditasi".
 *
 * @property int $id
 * @property string $nama
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Akreditasi[] $akreditasis
 */
class JenisAkreditasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_akreditasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['nama'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasis()
    {
        return $this->hasMany(Akreditasi::className(), ['id_jenis_akreditasi' => 'id']);
    }
}

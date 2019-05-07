<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fakultas_akademi".
 *
 * @property int $id
 * @property string $nama
 * @property int $created_at
 * @property int $updated_at
 *
 * @property ProgramStudi[] $programStudis
 */
class FakultasAkademi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fakultas_akademi';
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
    public function getProgramStudis()
    {
        return $this->hasMany(ProgramStudi::className(), ['id_fakultas_akademi' => 'id']);
    }
}

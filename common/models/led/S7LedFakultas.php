<?php

namespace common\models\led;

use common\models\FakultasAkademi;
use common\models\S7Akreditasi;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_led_fakultas".
 *
 * @property int $id
 * @property int $id_akreditasi
 * @property int $id_fakultas
 * @property int $created_at
 * @property int $updated_at
 *
 * @property FakultasAkademi $fakultas
 * @property S7Akreditasi $akreditasi
 * @property S7LedFakultasDetail[] $s7LedFakultasDetails
 */
class S7LedFakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_led_fakultas';
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
            [['id_akreditasi', 'id_fakultas', 'created_at', 'updated_at'], 'integer'],
            [['id_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => FakultasAkademi::className(), 'targetAttribute' => ['id_fakultas' => 'id']],
            [['id_akreditasi'], 'exist', 'skipOnError' => true, 'targetClass' => S7Akreditasi::className(), 'targetAttribute' => ['id_akreditasi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi' => 'Id Akreditasi',
            'id_fakultas' => 'Id Fakultas',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFakultas()
    {
        return $this->hasOne(FakultasAkademi::className(), ['id' => 'id_fakultas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasi()
    {
        return $this->hasOne(S7Akreditasi::className(), ['id' => 'id_akreditasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7LedFakultasDetails()
    {
        return $this->hasMany(S7LedFakultasDetail::className(), ['id_led_fakultas' => 'id']);
    }
}

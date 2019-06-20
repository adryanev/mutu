<?php

namespace common\models\led;

use common\models\S7AkreditasiInstitusi;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_led_institusi".
 *
 * @property int $id
 * @property int $id_akreditasi_institusi
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7AkreditasiInstitusi $akreditasiInstitusi
 * @property S7LedInstitusiDetail[] $s7LedInstitusiDetails
 */
class S7LedInstitusi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_led_institusi';
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
            [['id_akreditasi_institusi', 'created_at', 'updated_at'], 'integer'],
            [['id_akreditasi_institusi'], 'exist', 'skipOnError' => true, 'targetClass' => S7AkreditasiInstitusi::className(), 'targetAttribute' => ['id_akreditasi_institusi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi_institusi' => 'Id Akreditasi Institusi',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiInstitusi()
    {
        return $this->hasOne(S7AkreditasiInstitusi::className(), ['id' => 'id_akreditasi_institusi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7LedInstitusiDetails()
    {
        return $this->hasMany(S7LedInstitusiDetail::className(), ['id_led_institusi' => 'id']);
    }
}

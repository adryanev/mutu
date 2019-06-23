<?php

namespace common\models\led;

use common\models\S7AkreditasiProdiS1;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_led_prodi_s1".
 *
 * @property int $id
 * @property int $id_akreditasi_prodi_s1
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7AkreditasiProdiS1 $akreditasiProdiS1
 * @property S7LedProdiS1Detail[] $s7LedProdiS1Details
 */
class S7LedProdiS1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_led_prodi_s1';
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
            [['id_akreditasi_prodi_s1', 'created_at', 'updated_at'], 'integer'],
            [['id_akreditasi_prodi_s1'], 'exist', 'skipOnError' => true, 'targetClass' => S7AkreditasiProdiS1::className(), 'targetAttribute' => ['id_akreditasi_prodi_s1' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi_prodi_s1' => 'Id Akreditasi Prodi S1',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiS1()
    {
        return $this->hasOne(S7AkreditasiProdiS1::className(), ['id' => 'id_akreditasi_prodi_s1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7LedProdiS1Details()
    {
        return $this->hasMany(S7LedProdiS1Detail::className(), ['id_led_prodi_s1' => 'id']);
    }
}

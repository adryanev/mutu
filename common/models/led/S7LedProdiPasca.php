<?php

namespace common\models\led;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_led_prodi_pasca".
 *
 * @property int $id
 * @property int $id_akreditasi_prodi_pasca
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7AkreditasiProdiPasca $akreditasiProdiPasca
 * @property S7LedProdiPascaDetail[] $s7LedProdiPascaDetails
 */
class S7LedProdiPasca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_led_prodi_pasca';
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
            [['id_akreditasi_prodi_pasca', 'created_at', 'updated_at'], 'integer'],
            [['id_akreditasi_prodi_pasca'], 'exist', 'skipOnError' => true, 'targetClass' => S7AkreditasiProdiPasca::className(), 'targetAttribute' => ['id_akreditasi_prodi_pasca' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi_prodi_pasca' => 'Id Akreditasi Prodi Pasca',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiPasca()
    {
        return $this->hasOne(S7AkreditasiProdiPasca::className(), ['id' => 'id_akreditasi_prodi_pasca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7LedProdiPascaDetails()
    {
        return $this->hasMany(S7LedProdiPascaDetail::className(), ['created_by' => 'id']);
    }
}

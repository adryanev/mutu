<?php

namespace common\models\kriteria9\led\prodi;

use common\models\kriteria9\akreditasi\K9AkreditasiProdi;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "k9_led_prodi".
 *
 * @property int $id
 * @property int $id_akreditasi_prodi
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property K9AkreditasiProdi $akreditasiProdi
 * @property K9LedProdiKriteria1[] $k9LedProdiKriteria1s
 * @property K9LedProdiKriteria2[] $k9LedProdiKriteria2s
 * @property K9LedProdiKriteria3[] $k9LedProdiKriteria3s
 * @property K9LedProdiKriteria4[] $k9LedProdiKriteria4s
 * @property K9LedProdiKriteria5[] $k9LedProdiKriteria5s
 * @property K9LedProdiKriteria6[] $k9LedProdiKriteria6s
 * @property K9LedProdiKriteria7[] $k9LedProdiKriteria7s
 * @property K9LedProdiKriteria8[] $k9LedProdiKriteria8s
 * @property K9LedProdiKriteria9[] $k9LedProdiKriteria9s
 */
class K9LedProdi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_led_prodi';
    }

    /**
     * {@inheritdoc}
     */
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
            [['id_akreditasi_prodi', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => K9AkreditasiProdi::className(), 'targetAttribute' => ['id_akreditasi_prodi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi_prodi' => 'Id Akreditasi Prodi',
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdi()
    {
        return $this->hasOne(K9AkreditasiProdi::className(), ['id' => 'id_akreditasi_prodi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LedProdiKriteria1s()
    {
        return $this->hasMany(K9LedProdiKriteria1::className(), ['id_led_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LedProdiKriteria2s()
    {
        return $this->hasMany(K9LedProdiKriteria2::className(), ['id_led_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LedProdiKriteria3s()
    {
        return $this->hasMany(K9LedProdiKriteria3::className(), ['id_led_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LedProdiKriteria4s()
    {
        return $this->hasMany(K9LedProdiKriteria4::className(), ['id_led_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LedProdiKriteria5s()
    {
        return $this->hasMany(K9LedProdiKriteria5::className(), ['id_led_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LedProdiKriteria6s()
    {
        return $this->hasMany(K9LedProdiKriteria6::className(), ['id_led_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LedProdiKriteria7s()
    {
        return $this->hasMany(K9LedProdiKriteria7::className(), ['id_led_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LedProdiKriteria8s()
    {
        return $this->hasMany(K9LedProdiKriteria8::className(), ['id_led_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LedProdiKriteria9s()
    {
        return $this->hasMany(K9LedProdiKriteria9::className(), ['id_led_prodi' => 'id']);
    }
}

<?php

namespace common\models\kriteria9\lk;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "k9_lkps_prodi".
 *
 * @property int $id
 * @property int $id_akreditasi_prodi
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property K9AkreditasiProdi $akreditasiProdi
 * @property K9LkpsProdiKriteria1[] $k9LkpsProdiKriteria1s
 * @property K9LkpsProdiKriteria2[] $k9LkpsProdiKriteria2s
 * @property K9LkpsProdiKriteria3[] $k9LkpsProdiKriteria3s
 * @property K9LkpsProdiKriteria4[] $k9LkpsProdiKriteria4s
 * @property K9LkpsProdiKriteria5[] $k9LkpsProdiKriteria5s
 * @property K9LkpsProdiKriteria6[] $k9LkpsProdiKriteria6s
 * @property K9LkpsProdiKriteria7[] $k9LkpsProdiKriteria7s
 * @property K9LkpsProdiKriteria8[] $k9LkpsProdiKriteria8s
 * @property K9LkpsProdiKriteria9[] $k9LkpsProdiKriteria9s
 */
class K9LkpsProdi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_lkps_prodi';
    }

    public function behaviors()
    {

        return [
            TimestampBehavior::class,
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
    public function getK9LkpsProdiKriteria1s()
    {
        return $this->hasMany(K9LkpsProdiKriteria1::className(), ['id_lkps_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsProdiKriteria2s()
    {
        return $this->hasMany(K9LkpsProdiKriteria2::className(), ['id_lkps_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsProdiKriteria3s()
    {
        return $this->hasMany(K9LkpsProdiKriteria3::className(), ['id_lkps_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsProdiKriteria4s()
    {
        return $this->hasMany(K9LkpsProdiKriteria4::className(), ['id_lkps_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsProdiKriteria5s()
    {
        return $this->hasMany(K9LkpsProdiKriteria5::className(), ['id_lkps_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsProdiKriteria6s()
    {
        return $this->hasMany(K9LkpsProdiKriteria6::className(), ['id_lkps_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsProdiKriteria7s()
    {
        return $this->hasMany(K9LkpsProdiKriteria7::className(), ['id_lkps_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsProdiKriteria8s()
    {
        return $this->hasMany(K9LkpsProdiKriteria8::className(), ['id_lkps_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsProdiKriteria9s()
    {
        return $this->hasMany(K9LkpsProdiKriteria9::className(), ['id_lkps_prodi' => 'id']);
    }
}

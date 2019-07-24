<?php

namespace common\models\kriteria9\lk;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "k9_lkps_institusi".
 *
 * @property int $id
 * @property int $id_akreditasi_institusi
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property K9AkreditasiInstitusi $akreditasiInstitusi
 * @property K9LkpsInstitusiKriteria1[] $k9LkpsInstitusiKriteria1s
 * @property K9LkpsInstitusiKriteria2[] $k9LkpsInstitusiKriteria2s
 * @property K9LkpsInstitusiKriteria3[] $k9LkpsInstitusiKriteria3s
 * @property K9LkpsInstitusiKriteria4[] $k9LkpsInstitusiKriteria4s
 * @property K9LkpsInstitusiKriteria5[] $k9LkpsInstitusiKriteria5s
 * @property K9LkpsInstitusiKriteria6[] $k9LkpsInstitusiKriteria6s
 * @property K9LkpsInstitusiKriteria7[] $k9LkpsInstitusiKriteria7s
 * @property K9LkpsInstitusiKriteria8[] $k9LkpsInstitusiKriteria8s
 * @property K9LkpsInstitusiKriteria9[] $k9LkpsInstitusiKriteria9s
 */
class K9LkpsInstitusi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_lkps_institusi';
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
            [['id_akreditasi_institusi', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi_institusi'], 'exist', 'skipOnError' => true, 'targetClass' => K9AkreditasiInstitusi::className(), 'targetAttribute' => ['id_akreditasi_institusi' => 'id']],
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
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiInstitusi()
    {
        return $this->hasOne(K9AkreditasiInstitusi::className(), ['id' => 'id_akreditasi_institusi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsInstitusiKriteria1s()
    {
        return $this->hasMany(K9LkpsInstitusiKriteria1::className(), ['id_lkps_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsInstitusiKriteria2s()
    {
        return $this->hasMany(K9LkpsInstitusiKriteria2::className(), ['id_lkps_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsInstitusiKriteria3s()
    {
        return $this->hasMany(K9LkpsInstitusiKriteria3::className(), ['id_lkps_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsInstitusiKriteria4s()
    {
        return $this->hasMany(K9LkpsInstitusiKriteria4::className(), ['id_lkps_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsInstitusiKriteria5s()
    {
        return $this->hasMany(K9LkpsInstitusiKriteria5::className(), ['id_lkps_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsInstitusiKriteria6s()
    {
        return $this->hasMany(K9LkpsInstitusiKriteria6::className(), ['id_lkps_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsInstitusiKriteria7s()
    {
        return $this->hasMany(K9LkpsInstitusiKriteria7::className(), ['id_lkps_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsInstitusiKriteria8s()
    {
        return $this->hasMany(K9LkpsInstitusiKriteria8::className(), ['id_lkps_institusi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsInstitusiKriteria9s()
    {
        return $this->hasMany(K9LkpsInstitusiKriteria9::className(), ['id_lkps_institusi' => 'id']);
    }
}

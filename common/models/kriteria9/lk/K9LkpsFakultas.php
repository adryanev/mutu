<?php

namespace common\models\kriteria9\lk;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "k9_lkps_fakultas".
 *
 * @property int $id
 * @property int $id_akreditasi
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property K9Akreditasi $akreditasi
 * @property K9LkpsFakultasKriteria1[] $k9LkpsFakultasKriteria1s
 * @property K9LkpsFakultasKriteria2[] $k9LkpsFakultasKriteria2s
 * @property K9LkpsFakultasKriteria3[] $k9LkpsFakultasKriteria3s
 * @property K9LkpsFakultasKriteria4[] $k9LkpsFakultasKriteria4s
 * @property K9LkpsFakultasKriteria5[] $k9LkpsFakultasKriteria5s
 * @property K9LkpsFakultasKriteria6[] $k9LkpsFakultasKriteria6s
 * @property K9LkpsFakultasKriteria7[] $k9LkpsFakultasKriteria7s
 * @property K9LkpsFakultasKriteria8[] $k9LkpsFakultasKriteria8s
 * @property K9LkpsFakultasKriteria9[] $k9LkpsFakultasKriteria9s
 */
class K9LkpsFakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_lkps_fakultas';
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
            [['id_akreditasi', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi'], 'exist', 'skipOnError' => true, 'targetClass' => K9Akreditasi::className(), 'targetAttribute' => ['id_akreditasi' => 'id']],
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
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasi()
    {
        return $this->hasOne(K9Akreditasi::className(), ['id' => 'id_akreditasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsFakultasKriteria1s()
    {
        return $this->hasMany(K9LkpsFakultasKriteria1::className(), ['id_lkps_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsFakultasKriteria2s()
    {
        return $this->hasMany(K9LkpsFakultasKriteria2::className(), ['id_lkps_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsFakultasKriteria3s()
    {
        return $this->hasMany(K9LkpsFakultasKriteria3::className(), ['id_lkps_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsFakultasKriteria4s()
    {
        return $this->hasMany(K9LkpsFakultasKriteria4::className(), ['id_lkps_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsFakultasKriteria5s()
    {
        return $this->hasMany(K9LkpsFakultasKriteria5::className(), ['id_lkps_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsFakultasKriteria6s()
    {
        return $this->hasMany(K9LkpsFakultasKriteria6::className(), ['id_lkps_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsFakultasKriteria7s()
    {
        return $this->hasMany(K9LkpsFakultasKriteria7::className(), ['id_lkps_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsFakultasKriteria8s()
    {
        return $this->hasMany(K9LkpsFakultasKriteria8::className(), ['id_lkps_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsFakultasKriteria9s()
    {
        return $this->hasMany(K9LkpsFakultasKriteria9::className(), ['id_lkps_fakultas' => 'id']);
    }
}

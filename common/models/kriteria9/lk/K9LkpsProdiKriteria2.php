<?php

namespace common\models\kriteria9\lk;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "k9_lkps_prodi_kriteria2".
 *
 * @property int $id
 * @property int $id_lkps_prodi
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property K9LkpsProdi $lkpsProdi
 * @property K9LkpsProdiKriteria2Detail[] $k9LkpsProdiKriteria2Details
 */
class K9LkpsProdiKriteria2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_lkps_prodi_kriteria2';
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
            [['id_lkps_prodi', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_lkps_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => K9LkpsProdi::className(), 'targetAttribute' => ['id_lkps_prodi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_lkps_prodi' => 'Id Lkps Prodi',
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLkpsProdi()
    {
        return $this->hasOne(K9LkpsProdi::className(), ['id' => 'id_lkps_prodi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsProdiKriteria2Details()
    {
        return $this->hasMany(K9LkpsProdiKriteria2Detail::className(), ['id_lkps_prodi_kriteria2' => 'id']);
    }
}

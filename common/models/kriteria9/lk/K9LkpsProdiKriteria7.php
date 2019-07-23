<?php

namespace common\models\kriteria9\lk;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "k9_lkps_prodi_kriteria7".
 *
 * @property int $id
 * @property int $id_lkps_prodi
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property K9LkpsProdi $lkpsProdi
 * @property K9LkpsProdiKriteria7Detail[] $k9LkpsProdiKriteria7Details
 */
class K9LkpsProdiKriteria7 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_lkps_prodi_kriteria7';
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
    public function getK9LkpsProdiKriteria7Details()
    {
        return $this->hasMany(K9LkpsProdiKriteria7Detail::className(), ['id_lkps_prodi_kriteria7' => 'id']);
    }
}

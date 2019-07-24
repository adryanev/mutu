<?php

namespace common\models\kriteria9\led\prodi;

use Yii;

/**
 * This is the model class for table "k9_led_prodi_kriteria2".
 *
 * @property int $id
 * @property int $id_led_prodi
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property K9LedProdi $ledProdi
 * @property K9LedProdiKriteria2Detail[] $k9LedProdiKriteria2Details
 */
class K9LedProdiKriteria2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_led_prodi_kriteria2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_led_prodi', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_led_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => K9LedProdi::className(), 'targetAttribute' => ['id_led_prodi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_led_prodi' => 'Id Led Prodi',
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLedProdi()
    {
        return $this->hasOne(K9LedProdi::className(), ['id' => 'id_led_prodi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LedProdiKriteria2Details()
    {
        return $this->hasMany(K9LedProdiKriteria2Detail::className(), ['id_led_prodi_kriteria2' => 'id']);
    }
}

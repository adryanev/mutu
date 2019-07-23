<?php

namespace common\models\kriteria9\lk;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "k9_lkps_institusi_kriteria2".
 *
 * @property int $id
 * @property int $id_lkps_institusi
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property K9LkpsInstitusi $lkpsInstitusi
 * @property K9LkpsInstitusiKriteria2Detail[] $k9LkpsInstitusiKriteria2Details
 */
class K9LkpsInstitusiKriteria2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_lkps_institusi_kriteria2';
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
            [['id_lkps_institusi', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_lkps_institusi'], 'exist', 'skipOnError' => true, 'targetClass' => K9LkpsInstitusi::className(), 'targetAttribute' => ['id_lkps_institusi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_lkps_institusi' => 'Id Lkps Institusi',
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLkpsInstitusi()
    {
        return $this->hasOne(K9LkpsInstitusi::className(), ['id' => 'id_lkps_institusi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsInstitusiKriteria2Details()
    {
        return $this->hasMany(K9LkpsInstitusiKriteria2Detail::className(), ['id_lkps_institusi_kriteria2' => 'id']);
    }
}

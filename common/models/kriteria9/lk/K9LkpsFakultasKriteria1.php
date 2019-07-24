<?php

namespace common\models\kriteria9\lk;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "k9_lkps_fakultas_kriteria1".
 *
 * @property int $id
 * @property int $id_lkps_fakultas
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property K9LkpsFakultas $lkpsFakultas
 * @property K9LkpsFakultasKriteria1Detail[] $k9LkpsFakultasKriteria1Details
 */
class K9LkpsFakultasKriteria1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_lkps_fakultas_kriteria1';
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
            [['id_lkps_fakultas', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_lkps_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => K9LkpsFakultas::className(), 'targetAttribute' => ['id_lkps_fakultas' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_lkps_fakultas' => 'Id Lkps Fakultas',
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLkpsFakultas()
    {
        return $this->hasOne(K9LkpsFakultas::className(), ['id' => 'id_lkps_fakultas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getK9LkpsFakultasKriteria1Details()
    {
        return $this->hasMany(K9LkpsFakultasKriteria1Detail::className(), ['id_lkps_fakultas_kriteria1' => 'id']);
    }
}

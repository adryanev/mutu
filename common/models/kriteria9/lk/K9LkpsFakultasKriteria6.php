<?php

namespace common\models\kriteria9\lk;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "k9_lkps_fakultas_kriteria6".
 *
 * @property int $id
 * @property int $id_lkps_fakultas
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property K9LkpsFakultas $lkpsFakultas
 * @property K9LkpsFakultasKriteria6Detail[] $k9LkpsFakultasKriteria6Details
 */
class K9LkpsFakultasKriteria6 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'k9_lkps_fakultas_kriteria6';
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
    public function getK9LkpsFakultasKriteria6Details()
    {
        return $this->hasMany(K9LkpsFakultasKriteria6Detail::className(), ['id_lkps_fakultas_kriteria6' => 'id']);
    }
}

<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_s1_fakultas_standar5".
 *
 * @property int $id
 * @property int $id_borang_s1_fakultas
 * @property string $_5_1 Kurikulum
 * @property string $_5_2 Pembelajaran
 * @property string $_5_3 Suasana Akademik
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BorangS1Fakultas $borangS1Fakultas
 * @property DetailBorangS1FakultasStandar5[] $detailBorangS1FakultasStandar5s
 */
class BorangS1FakultasStandar5 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_s1_fakultas_standar5';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_borang_s1_fakultas', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['_5_1', '_5_2', '_5_3'], 'string'],
            [['id_borang_s1_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => BorangS1Fakultas::className(), 'targetAttribute' => ['id_borang_s1_fakultas' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_borang_s1_fakultas' => 'Id Borang S1 Fakultas',
            '_5_1' => '5 1',
            '_5_2' => '5 2',
            '_5_3' => '5 3',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1Fakultas()
    {
        return $this->hasOne(BorangS1Fakultas::className(), ['id' => 'id_borang_s1_fakultas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailBorangS1FakultasStandar5s()
    {
        return $this->hasMany(DetailBorangS1FakultasStandar5::className(), ['id_borang_s1_fakultas_standar5' => 'id']);
    }
}

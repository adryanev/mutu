<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_s1_fakultas_standar2".
 *
 * @property int $id
 * @property int $id_borang_s1_fakultas
 * @property string $_2_1 Tata Pamong
 * @property string $_2_2 Struktur Organisasi, Koordinasi dan Cara Kerja Fakultas/Sekolah Tinggi
 * @property string $_2_3 Karakteristik kepemimpinan
 * @property string $_2_4 Sistem Pengelolaan
 * @property string $_2_5 Sistem Penjaminan Mutu Fakultas/Sekolah Tinggi
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangS1Fakultas $borangS1Fakultas
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7DetailBorangS1FakultasStandar2[] $detailBorangS1FakultasStandar2s
 */
class S7BorangS1FakultasStandar2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_s1_fakultas_standar2';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_borang_s1_fakultas', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['_2_1', '_2_2', '_2_3', '_2_4', '_2_5'], 'string'],
            [['progress'], 'number'],
            [['id_borang_s1_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => S7BorangS1Fakultas::className(), 'targetAttribute' => ['id_borang_s1_fakultas' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
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
            '_2_1' => '2 1',
            '_2_2' => '2 2',
            '_2_3' => '2 3',
            '_2_4' => '2 4',
            '_2_5' => '2 5',
            'progress' => 'Progress',
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
        return $this->hasOne(S7BorangS1Fakultas::className(), ['id' => 'id_borang_s1_fakultas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailBorangS1FakultasStandar2s()
    {
        return $this->hasMany(S7DetailBorangS1FakultasStandar2::className(), ['id_borang_s1_fakultas_standar2' => 'id']);
    }
}

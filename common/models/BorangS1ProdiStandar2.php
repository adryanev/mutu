<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "borang_s1_prodi_standar2".
 *
 * @property int $id
 * @property int $id_borang_s1_prodi
 * @property string $_2_1 Sistem Tata Pamong
 * @property string $_2_2 Kepemimpinan
 * @property string $_2_3 Sistem Pengelolaan
 * @property string $_2_4 Penjaminan Mutu
 * @property string $_2_5 Umpan Balik
 * @property string $_2_6 Keberlanjutan
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BorangS1Prodi $borangS1Prodi
 * @property DetailBorangS1ProdiStandar2[] $detailBorangS1ProdiStandar2s
 */
class BorangS1ProdiStandar2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_s1_prodi_standar2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_borang_s1_prodi', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['_2_1', '_2_2', '_2_3', '_2_4', '_2_5', '_2_6'], 'string'],
            [['progress'], 'number'],
            [['id_borang_s1_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => BorangS1Prodi::className(), 'targetAttribute' => ['id_borang_s1_prodi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_borang_s1_prodi' => 'Id Borang S1 Prodi',
            '_2_1' => '2 1',
            '_2_2' => '2 2',
            '_2_3' => '2 3',
            '_2_4' => '2 4',
            '_2_5' => '2 5',
            '_2_6' => '2 6',
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
    public function getBorangS1Prodi()
    {
        return $this->hasOne(BorangS1Prodi::className(), ['id' => 'id_borang_s1_prodi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailBorangS1ProdiStandar2s()
    {
        return $this->hasMany(DetailBorangS1ProdiStandar2::className(), ['id_borang_s1_prodi_standar2' => 'id']);
    }
}

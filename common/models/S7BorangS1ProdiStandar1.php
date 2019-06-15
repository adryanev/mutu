<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_s1_prodi_standar1".
 *
 * @property int $id
 * @property int $id_borang_s1_prodi
 * @property string $_1_1 Visi, Misi, Sasaran, serta Strategi Pencapaian
 * @property string $_1_1_1 Mekanisme penyusunan visi, misi, tujuan dan sasaran program studi, serta pihak-pihak yang dilibatkan
 * @property string $_1_1_2 Visi
 * @property string $_1_1_3 Misi
 * @property string $_1_1_4 Tujuan
 * @property string $_1_1_5 Sasaran dan Strategi Pencapaian
 * @property string $_1_2 Sosialisasi
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangS1Prodi $borangS1Prodi
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7DetailBorangS1ProdiStandar1[] $detailBorangS1ProdiStandar1s
 */
class S7BorangS1ProdiStandar1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_s1_prodi_standar1';
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
            [['id_borang_s1_prodi', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['_1_1', '_1_1_1', '_1_1_2', '_1_1_3', '_1_1_4', '_1_1_5', '_1_2'], 'string'],
            [['progress'], 'number'],
            [['id_borang_s1_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => S7BorangS1Prodi::className(), 'targetAttribute' => ['id_borang_s1_prodi' => 'id']],
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
            'id_borang_s1_prodi' => 'Id Borang S1 Prodi',
            '_1_1' => '1 1',
            '_1_1_1' => '1 1 1',
            '_1_1_2' => '1 1 2',
            '_1_1_3' => '1 1 3',
            '_1_1_4' => '1 1 4',
            '_1_1_5' => '1 1 5',
            '_1_2' => '1 2',
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
        return $this->hasOne(S7BorangS1Prodi::className(), ['id' => 'id_borang_s1_prodi']);
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
    public function getDetailBorangS1ProdiStandar1s()
    {
        return $this->hasMany(S7DetailBorangS1ProdiStandar1::className(), ['id_borang_s1_prodi_standar1' => 'id']);
    }
}

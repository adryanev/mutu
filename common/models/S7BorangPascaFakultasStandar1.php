<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_borang_pasca_fakultas_standar1".
 *
 * @property int $id
 * @property int $id_borang_pasca
 * @property string $_1_1 Visi, misi, tujuan, dan sasaran serta strategi pencapaian Fakultas/Sekolah Tinggi
 * @property string $_1_1_1 Visi
 * @property string $_1_1_2 Misi
 * @property string $_1_1_3 Tujuan
 * @property string $_1_1_4 Sasaran dan Strategi Pencapaiannya
 * @property string $_1_2 Upaya penyebaran/sosialisasi, serta tingkat pemahaman sivitas akademika (dosen dan mahasiswa) dan tenaga kependidikan tentang visi, misi dan tujuan Fakultas/Sekolah Tinggi.
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangPascaFakultas $borangPasca
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7DetailBorangPascaFakultasStandar1[] $s7DetailBorangPascaFakultasStandar1s
 */
class S7BorangPascaFakultasStandar1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_pasca_fakultas_standar1';
    }

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
            [['id_borang_pasca', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['_1_1', '_1_1_1', '_1_1_2', '_1_1_3', '_1_1_4', '_1_2'], 'string'],
            [['progress'], 'number'],
            [['id_borang_pasca'], 'exist', 'skipOnError' => true, 'targetClass' => S7BorangPascaFakultas::className(), 'targetAttribute' => ['id_borang_pasca' => 'id']],
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
            'id_borang_pasca' => 'Id Borang Pasca',
            '_1_1' => '1 1',
            '_1_1_1' => '1 1 1',
            '_1_1_2' => '1 1 2',
            '_1_1_3' => '1 1 3',
            '_1_1_4' => '1 1 4',
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
    public function getBorangPasca()
    {
        return $this->hasOne(S7BorangPascaFakultas::className(), ['id' => 'id_borang_pasca']);
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
    public function getS7DetailBorangPascaFakultasStandar1s()
    {
        return $this->hasMany(S7DetailBorangPascaFakultasStandar1::className(), ['id_borang_pasca_fakultas_standar1' => 'id']);
    }
}

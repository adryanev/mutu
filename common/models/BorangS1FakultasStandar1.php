<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_s1_fakultas_standar1".
 *
 * @property int $id
 * @property int $id_borang_s1_fakultas
 * @property string $_1_1 Visi, misi, tujuan, dan sasaran serta strategi pencapaian Fakultas/Sekolah Tinggi
 * @property string $_1_1_1 Visi
 * @property string $_1_1_2 Misi
 * @property string $_1_1_3 Tujuan
 * @property string $_1_1_4 Sasaran dan Strategi Pencapaiannya
 * @property string $_1_2 Upaya penyebaran/sosialisasi, serta tingkat pemahaman sivitas akademika (dosen dan mahasiswa) dan tenaga kependidikan tentang visi, misi dan tujuan Fakultas/Sekolah Tinggi.
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BorangS1Fakultas $borangS1Fakultas
 * @property DetailBorangS1FakultasStandar1[] $detailBorangS1FakultasStandar1s
 */
class BorangS1FakultasStandar1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_s1_fakultas_standar1';
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
            [['_1_1', '_1_1_1', '_1_1_2', '_1_1_3', '_1_1_4', '_1_2'], 'string'],
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
            '_1_1' => '1 1',
            '_1_1_1' => '1 1 1',
            '_1_1_2' => '1 1 2',
            '_1_1_3' => '1 1 3',
            '_1_1_4' => '1 1 4',
            '_1_2' => '1 2',
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
    public function getDetailBorangS1FakultasStandar1s()
    {
        return $this->hasMany(DetailBorangS1FakultasStandar1::className(), ['id_borang_s1_fakultas_standar1' => 'id']);
    }
}

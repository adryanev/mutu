<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "borang_s1_fakultas_standar4".
 *
 * @property int $id
 * @property int $id_borang_s1_fakultas
 * @property string $_4_1 Dosen tetap
 * @property string $_4_1_1 Jumlah dosen tetap yang bidang keahliannya sesuai dengan masing-masing PS di lingkungan Fakultas/Sekolah Tinggi, berdasarkan jabatan fungsional dan pendidikan tertinggi
 * @property string $_4_1_2 Banyaknya penggantian dan perekrutan serta pengembangan dosen tetap yang bidang keahliannya sesuai dengan program studi pada Fakultas/Sekolah Tinggi dalam tiga tahun terakhir
 * @property string $_4_1_3 Pandangan Fakultas/Sekolah Tinggi tentang data pada butir 4.1.1 dan 4.1.2, yang mencakup aspek: kecukupan, kualifikasi, dan pengembangan karir
 * @property string $_4_2 Tenaga kependidikan
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BorangS1Fakultas $borangS1Fakultas
 * @property DetailBorangS1FakultasStandar4[] $detailBorangS1FakultasStandar4s
 */
class BorangS1FakultasStandar4 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_s1_fakultas_standar4';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_borang_s1_fakultas', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['_4_1', '_4_1_1', '_4_1_2', '_4_1_3', '_4_2'], 'string'],
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
            '_4_1' => '4 1',
            '_4_1_1' => '4 1 1',
            '_4_1_2' => '4 1 2',
            '_4_1_3' => '4 1 3',
            '_4_2' => '4 2',
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
    public function getDetailBorangS1FakultasStandar4s()
    {
        return $this->hasMany(DetailBorangS1FakultasStandar4::className(), ['id_borang_s1_fakultas_standar4' => 'id']);
    }
}

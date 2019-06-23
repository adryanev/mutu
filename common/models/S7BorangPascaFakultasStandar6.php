<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_borang_pasca_fakultas_standar6".
 *
 * @property int $id
 * @property int $id_borang_pasca
 * @property string $_6_1 Pembiayaan
 * @property string $_6_1_1 Jumlah dana termasuk gaji dan upah yang diterima di Fakultas/Sekolah Tinggi selama tiga tahun terakhir
 * @property string $_6_1_2 Pendapat pimpinan Fakultas/Sekolah Tinggi tentang perolehan dana pada butir 6.1.1, yang mencakup aspek: kecukupan dan upaya pengembangannya
 * @property string $_6_2 Sarana
 * @property string $_6_2_1 Penilaian Fakultas/Sekolah Tinggi tentang sarana untuk menjamin penyelenggaraan program Tridarma PT yang bermutu tinggi. Uraian ini mencakup aspek: kecukupan/ketersediaan/akses dan kewajaran serta rencana pengembangan dalam lima tahun mendatang.
 * @property string $_6_2_2 Sarana tambahan untuk meningkatkan mutu penyelenggarakan program Tridarma PT pada semua program studi yang dikelola dalam tiga tahun terakhir.
 * @property string $_6_3 Prasarana
 * @property string $_6_3_1 Penilaian Fakultas/Sekolah Tinggi tentang prasarana yang telah dimiliki, khususnya yang digunakan untuk program-program studi. Uraian ini mencakup aspek: kecukupan dan kewajaran serta rencana pengembangan dalam lima tahun mendatang
 * @property string $_6_3_2 Prasarana tambahan untuk semua program studi yang dikelola dalam tiga tahun terakhir. Uraikan pula rencana investasi untuk prasarana dalam lima tahun mendatang,
 * @property string $_6_4 Sistem Informasi
 * @property string $_6_4_1 Sistem informasi manajemen dan fasilitas ICT (Information and Communication Technology) yang digunakan Fakultas/Sekolah Tinggi untuk proses penyelenggaraan akademik dan administrasi (misalkan SIAKAD, SIMKEU, SIMAWA, SIMFA, SIMPEG dan sejenisnya), termasuk distance-learning.
 * @property string $_6_4_2 Aksesibilitas tiap jenis data
 * @property string $_6_4_3 Upaya penyebaran informasi/kebijakan untuk sivitas akademika di Fakultas/ Sekolah Tinggi (misalnya melalui surat, faksimili, mailing list, e-mail,sms, buletin).
 * @property string $_6_4_4 Rencana pengembangan sistem informasi jangka panjang dan upaya pencapaiannya. Uraikan pula kendala-kendala yang dihadapi.
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangPascaFakultas $borangPasca
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7DetailBorangPascaFakultasStandar6[] $s7DetailBorangPascaFakultasStandar6s
 */
class S7BorangPascaFakultasStandar6 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_pasca_fakultas_standar6';
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
            [['_6_1', '_6_1_1', '_6_1_2', '_6_2', '_6_2_1', '_6_2_2', '_6_3', '_6_3_1', '_6_3_2', '_6_4', '_6_4_1', '_6_4_2', '_6_4_3', '_6_4_4'], 'string'],
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
            '_6_1' => '6 1',
            '_6_1_1' => '6 1 1',
            '_6_1_2' => '6 1 2',
            '_6_2' => '6 2',
            '_6_2_1' => '6 2 1',
            '_6_2_2' => '6 2 2',
            '_6_3' => '6 3',
            '_6_3_1' => '6 3 1',
            '_6_3_2' => '6 3 2',
            '_6_4' => '6 4',
            '_6_4_1' => '6 4 1',
            '_6_4_2' => '6 4 2',
            '_6_4_3' => '6 4 3',
            '_6_4_4' => '6 4 4',
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
    public function getS7DetailBorangPascaFakultasStandar6s()
    {
        return $this->hasMany(S7DetailBorangPascaFakultasStandar6::className(), ['id_borang_pasca_fakultas_standar6' => 'id']);
    }
}

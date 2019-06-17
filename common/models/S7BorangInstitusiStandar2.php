<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_institusi_standar2".
 *
 * @property int $id
 * @property int $id_borang_institusi
 * @property string $_2_1 Tata Pamong
 * @property string $_2_1_1 Uraikan secara ringkas sistem tata pamong (sebutkan lembaga yang berperan, perangkat pendukung, kebijakan dan peraturan/ketentuan termasuk kode etik yang dijadikan pedoman dalam penyelenggaraan perguruan tinggi, serta prosedur penetapannya) di institusi perguruan tinggi dalam membangun sistem tata pamong yang kredibel, transparan, akuntabel, bertanggung jawab, dan adil, serta pelaksanaannya
 * @property string $_2_1_2 Struktur Organisasi, Koordinasi, dan Cara Kerja Institusi Perguran Tinggi. Gambarkan struktur organisasi perguruan tinggi serta tugas dan fungsi dari tiap unit yang ada. Sebutkan nama lembaga, fakultas, jurusan dan laboratorium yang ada
 * @property string $_2_1_3 Kelembagaan Kode Etik
 * @property string $_2_2 Kepemimpinan
 * @property string $_2_3 Sistem Pengelolaan
 * @property string $_2_3_1 Jelaskan sistem pengelolaan institusi perguruan tinggi serta dokumen pendukungnya (jelaskan unit / bagian / lembaga yang berperan dalam setiap fungsi pengelolaan serta proses pengambilan keputusan)
 * @property string $_2_3_2 Jelaskan program peningkatan kompetensi manajerial untuk menjamin proses pengelolaan yang efektif dan efisien di setiap unit
 * @property string $_2_3_3 Jelaskan diseminasi hasil kerja perguruan tinggi sebagai akuntabilitas publik
 * @property string $_2_3_4 Jelaskan sistem audit internal (lembaga/unit kerja, ruang lingkup tugas, prosedur kerja dsb)
 * @property string $_2_3_5 Jelaskan sistem audit eksternal (lembaga/unit kerja, ruang lingkup tugas, prosedur kerja dsb)
 * @property string $_2_4 Sistem Penjaminan Mutu
 * @property string $_2_4_1 Jelaskan keberadaan manual mutu yang mencakup informasi tentang kebijakan, pernyataan, unit pelaksana, standar, prosedur, SOP, dan pentahapan sasaran mutu perguruan tinggi
 * @property string $_2_4_2 Jelaskan implementasi penjaminan mutu perguruan tinggi
 * @property string $_2_4_3 Jelaskan monitoring dan evaluasi penjaminan mutu perguruan tinggi, serta tindak lanjutnya
 * @property string $_2_4_4 Jelaskan peranan institusi dalam pembinaan program studi (pengembangan program studi serta bantuan penyusunan dokumen akreditasi dalam bentuk pelatihan, dana dan informasi)
 * @property string $_2_4_5 Jelaskan ketersediaan dan pelaksanaan basis data institusi dan program studi untuk mendukung penyusunan dokumen evaluasi diri
 * @property string $_2_4_6 Tuliskan jumlah program studi yang ada dan status akreditasi BAN-PT
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangInstitusi $borangInstitusi
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7DetailBorangInstitusiStandar2[] $detailBorangInstitusiStandar2s
 */
class S7BorangInstitusiStandar2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_institusi_standar2';
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
            [['id_borang_institusi', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['_2_1', '_2_1_1', '_2_1_2', '_2_1_3', '_2_2', '_2_3', '_2_3_1', '_2_3_2', '_2_3_3', '_2_3_4', '_2_3_5', '_2_4', '_2_4_1', '_2_4_2', '_2_4_3', '_2_4_4', '_2_4_5', '_2_4_6'], 'string'],
            [['progress'], 'number'],
            [['id_borang_institusi'], 'exist', 'skipOnError' => true, 'targetClass' => S7BorangInstitusi::className(), 'targetAttribute' => ['id_borang_institusi' => 'id']],
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
            'id_borang_institusi' => 'Id Borang Institusi',
            '_2_1' => '2 1',
            '_2_1_1' => '2 1 1',
            '_2_1_2' => '2 1 2',
            '_2_1_3' => '2 1 3',
            '_2_2' => '2 2',
            '_2_3' => '2 3',
            '_2_3_1' => '2 3 1',
            '_2_3_2' => '2 3 2',
            '_2_3_3' => '2 3 3',
            '_2_3_4' => '2 3 4',
            '_2_3_5' => '2 3 5',
            '_2_4' => '2 4',
            '_2_4_1' => '2 4 1',
            '_2_4_2' => '2 4 2',
            '_2_4_3' => '2 4 3',
            '_2_4_4' => '2 4 4',
            '_2_4_5' => '2 4 5',
            '_2_4_6' => '2 4 6',
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
    public function getBorangInstitusi()
    {
        return $this->hasOne(S7BorangInstitusi::className(), ['id' => 'id_borang_institusi']);
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
    public function getDetailBorangInstitusiStandar2s()
    {
        return $this->hasMany(S7DetailBorangInstitusiStandar2::className(), ['id_borang_institusi_standar2' => 'id']);
    }
}

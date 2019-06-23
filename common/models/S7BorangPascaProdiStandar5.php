<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_borang_pasca_prodi_standar5".
 *
 * @property int $id
 * @property int $id_borang_pasca
 * @property string $_5_1 Kurikulum
 * @property string $_5_1_1 Kompetensi
 * @property string $_5_1_1_1 Uraikan secara ringkas kompetensi utama lulusan
 * @property string $_5_1_1_2 Uraikan secara ringkas kompetensi pendukung lulusan
 * @property string $_5_1_1_3 Uraikan secara ringkas kompetensi lainnya/pilihan lulusan
 * @property string $_5_1_2 Struktur Kurikulum
 * @property string $_5_1_2_1 Jumlah sks PS (minimum untuk kelulusan) : … sks yang tersusun sebagai berikut
 * @property string $_5_1_2_2 Struktur kurikulum berdasarkan urutan mata kuliah (MK) semester demi semester
 * @property string $_5_1_3 Mata kuliah pilihan yang dilaksanakan dalam tiga tahun terakhir
 * @property string $_5_1_4 Substansi praktikum/praktek yang mandiri ataupun yang merupakan bagian dari mata kuliah tertentu
 * @property string $_5_2 Peninjauan Kurikulum dalam 5 Tahun Terakhir
 * @property string $_5_3 Peninjauan Kurikulum dalam 5 Tahun Terakhir
 * @property string $_5_3_1 Mekanisme Penyusunan Materi Kuliah dan Monitoring Perkuliahan
 * @property string $_5_3_2 Contoh soal ujian dalam 1 tahun terakhir untuk 5 mata kuliah keahlian berikut silabusnya
 * @property string $_5_4 Sistem Pembimbingan Akademik
 * @property string $_5_4_1 Dosen PA dan Jumlah Mahasiswa
 * @property string $_5_4_2 Jelaskan proses pembimbingan akademik yang diterapkan pada Program Studi ini dalam hal-hal berikut:
 * @property string $_5_5 Pembimbingan Tugas Akhir / Skripsi
 * @property string $_5_5_1 Jelaskan pelaksanaan pembimbingan Tugas Akhir atau Skripsi yang diterapkan pada PS ini
 * @property string $_5_5_2 Rata-rata lama penyelesaian tugas akhir/skripsi pada tiga tahun terakhir
 * @property string $_5_6 Upaya perbaikan pembelajaran serta hasil yang telah dilakukan dan dicapai dalam tiga tahun terakhir dan hasilnya
 * @property string $_5_7 Upaya perbaikan pembelajaran serta hasil yang telah dilakukan dan dicapai dalam tiga tahun terakhir dan hasilnya
 * @property string $_5_7_1 Gambaran yang jelas mengenai upaya dan kegiatan untuk menciptakan suasana akademik yang kondusif di lingkungan PS
 * @property string $_5_7_2 Ketersediaan dan jenis prasarana, sarana dan dana yang memungkinkan terciptanya interaksi akademik antara sivitas akademika
 * @property string $_5_7_3 Program dan kegiatan di dalam dan di luar proses pembelajaran, yang dilaksanakan baik di dalam maupun di luar kelas, untuk menciptakan suasana akademik yang kondusif (misalnya seminar, simposium, lokakarya, bedah buku, penelitian bersama, pengenalan kehidupan kampus, dan temu dosen-mahasiswa-alumni). 	
 * @property string $_5_7_4 Interaksi akademik antara dosen-mahasiswa, antar mahasiswa, serta antar dosen
 * @property string $_5_7_5 Pengembangan perilaku kecendikiawanan
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangPascaProdi $borangPasca
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7DetailBorangPascaProdiStandar5[] $s7DetailBorangPascaProdiStandar5s
 */
class S7BorangPascaProdiStandar5 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_pasca_prodi_standar5';
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
            [['_5_1', '_5_1_1', '_5_1_1_1', '_5_1_1_2', '_5_1_1_3', '_5_1_2', '_5_1_2_1', '_5_1_2_2', '_5_1_3', '_5_1_4', '_5_2', '_5_3', '_5_3_1', '_5_3_2', '_5_4', '_5_4_1', '_5_4_2', '_5_5', '_5_5_1', '_5_5_2', '_5_6', '_5_7', '_5_7_1', '_5_7_2', '_5_7_3', '_5_7_4', '_5_7_5'], 'string'],
            [['progress'], 'number'],
            [['id_borang_pasca'], 'exist', 'skipOnError' => true, 'targetClass' => S7BorangPascaProdi::className(), 'targetAttribute' => ['id_borang_pasca' => 'id']],
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
            '_5_1' => '5 1',
            '_5_1_1' => '5 1 1',
            '_5_1_1_1' => '5 1 1 1',
            '_5_1_1_2' => '5 1 1 2',
            '_5_1_1_3' => '5 1 1 3',
            '_5_1_2' => '5 1 2',
            '_5_1_2_1' => '5 1 2 1',
            '_5_1_2_2' => '5 1 2 2',
            '_5_1_3' => '5 1 3',
            '_5_1_4' => '5 1 4',
            '_5_2' => '5 2',
            '_5_3' => '5 3',
            '_5_3_1' => '5 3 1',
            '_5_3_2' => '5 3 2',
            '_5_4' => '5 4',
            '_5_4_1' => '5 4 1',
            '_5_4_2' => '5 4 2',
            '_5_5' => '5 5',
            '_5_5_1' => '5 5 1',
            '_5_5_2' => '5 5 2',
            '_5_6' => '5 6',
            '_5_7' => '5 7',
            '_5_7_1' => '5 7 1',
            '_5_7_2' => '5 7 2',
            '_5_7_3' => '5 7 3',
            '_5_7_4' => '5 7 4',
            '_5_7_5' => '5 7 5',
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
        return $this->hasOne(S7BorangPascaProdi::className(), ['id' => 'id_borang_pasca']);
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
    public function getS7DetailBorangPascaProdiStandar5s()
    {
        return $this->hasMany(S7DetailBorangPascaProdiStandar5::className(), ['id_borang_pasca_prodi_standar5' => 'id']);
    }
}

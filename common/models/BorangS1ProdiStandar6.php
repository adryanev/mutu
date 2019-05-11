<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_s1_prodi_standar6".
 *
 * @property int $id
 * @property int $id_borang_s1_prodi
 * @property string $_6_1 Pengelolaan Dana Keterlibatan aktif program studi harus tercerminkan dalam dokumen tentang proses perencanaan, pengelolaan dan pelaporan serta pertanggungjawaban penggunaan dana kepada pemangku kepentingan melalui mekanisme yang transparan dan akuntabel.
 * @property string $_6_2 Perolehan dan Alokasi Dana.
 * @property string $_6_2_1 Realisasi Perolehan dan Alokasi Dana.
 * @property string $_6_2_2 Tuliskan dana untuk kegiatan penelitian pada tiga tahun terakhir yang melibatkan dosen yang bidang keahliannya sesuai dengan program studi.
 * @property string $_6_2_3 Dana Kegiatan Pengabdian Kepada Masyarakat
 * @property string $_6_3_1 Data ruang kerja dosen tetap yang bidang keahliannya sesuai dengan PS
 * @property string $_6_3_2 Tuliskan data prasarana (kantor, ruang kelas, ruang laboratorium, studio, ruang perpustakaan, kebun percobaan, dsb. kecuali ruang dosen) yang dipergunakan PS dalam proses belajar mengajar dengan mengikuti format tabel berikut:
 * @property string $_6_3_3 Data prasarana lain yang menunjang
 * @property string $_6_3_7 Aksesibiltas Data
 * @property string $_6_4 Sarana Pelaksanaan Kegiatan Akademik
 * @property string $_6_4_1 Pustaka (buku teks, karya ilmiah, dan jurnal; termasuk juga dalam bentuk CD-ROM dan media lainnya)
 * @property string $_6_4_2 Sumber-sumber pustaka di lembaga lain (lembaga perpustakaan/ sumber dari internet beserta alamat website) yang biasa diakses/dimanfaatkan oleh dosen dan mahasiswa program studi ini.
 * @property string $_6_4_3 Tuliskan peralatan utama yang digunakan di laboratorium (tempat praktikum, bengkel, studio, ruang simulasi, rumah sakit, puskesmas/balai kesehatan, green house, lahan untuk pertanian, dan sejenisnya) yang dipergunakan dalam proses pembelajaran di jurusan/fakultas dengan mengikuti format tabel berikut:
 * @property string $_6_5 Sistem Informasi 
 * @property string $_6_5_1 Jelaskan sistem informasi dan fasilitas yang digunakan oleh program studi untuk proses pembelajaran (hardware, software, e-learning, perpustakaan, dll.).
 * @property string $_6_5_2 Aksesibilitas tiap jenis data
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BorangS1Prodi $borangS1Prodi
 * @property User $createdBy
 * @property User $updatedBy
 * @property DetailBorangS1ProdiStandar6[] $detailBorangS1ProdiStandar6s
 */
class BorangS1ProdiStandar6 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_s1_prodi_standar6';
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
            [['_6_1', '_6_2', '_6_2_1', '_6_2_2', '_6_2_3', '_6_3_1', '_6_3_2', '_6_3_3', '_6_3_7', '_6_4', '_6_4_1', '_6_4_2', '_6_4_3', '_6_5', '_6_5_1', '_6_5_2'], 'string'],
            [['progress'], 'number'],
            [['id_borang_s1_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => BorangS1Prodi::className(), 'targetAttribute' => ['id_borang_s1_prodi' => 'id']],
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
            '_6_1' => '6 1',
            '_6_2' => '6 2',
            '_6_2_1' => '6 2 1',
            '_6_2_2' => '6 2 2',
            '_6_2_3' => '6 2 3',
            '_6_3_1' => '6 3 1',
            '_6_3_2' => '6 3 2',
            '_6_3_3' => '6 3 3',
            '_6_3_7' => '6 3 7',
            '_6_4' => '6 4',
            '_6_4_1' => '6 4 1',
            '_6_4_2' => '6 4 2',
            '_6_4_3' => '6 4 3',
            '_6_5' => '6 5',
            '_6_5_1' => '6 5 1',
            '_6_5_2' => '6 5 2',
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
    public function getDetailBorangS1ProdiStandar6s()
    {
        return $this->hasMany(DetailBorangS1ProdiStandar6::className(), ['id_borang_s1_prodi_standar6' => 'id']);
    }
}

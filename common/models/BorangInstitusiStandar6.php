<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "borang_institusi_standar6".
 *
 * @property int $id
 * @property int $id_borang_institusi
 * @property string $_6_1 Pembiayaan
 * @property string $_6_1_1 Jelaskan proses pengelolaan dana institusi perguruan tinggi mulai dari perencanaan, penerimaan, pengalokasian, pelaporan, audit, monitoring dan evaluasi, serta pertanggungjawaban kepada pemangku kepentingan
 * @property string $_6_1_2 Jelaskan mekanisme penetapan biaya pendidikan (SPP dan biaya lainnya), serta jelaskan pihak-pihak yang berperan dalam penetapan tersebut
 * @property string $_6_1_3 Jelaskan kebijakan mengenai pembiayaan mahasiswa yang berpotensi secara akademik dan kurang mampu, jumlah dan persentase mahasiswa yang mendapatkan keringanan atau pembebasan biaya pendidikan terhadap total mahasiswa
 * @property string $_6_1_4 Tuliskan realisasi penerimaan dana (termasuk hibah) dalam juta rupiah, selama tiga tahun terakhir, pada tabel berikut
 * @property string $_6_1_5 Tuliskan penggunaan dana yang diterima pada Tabel 6.2.2 selama tiga tahun terakhir pada tabel berikut
 * @property string $_6_1_6 Tuliskan dana untuk kegiatan penelitian dalam tiga tahun terakhir dengan mengikuti format tabel berikut
 * @property string $_6_1_7 Tuliskan dana yang diperoleh dari/untuk kegiatan pelayanan/pengabdian kepada masyarakat pada tiga tahun terakhir dengan mengikuti format tabel berikut
 * @property string $_6_1_8 Jelaskan sistem monitoring dan evaluasi pendanaan internal untuk pemanfaatan dana yang lebih efektif, transparan, dan memenuhi aturan keuangan yang berlaku
 * @property string $_6_1_9 Jelaskan tentang lembaga audit eksternal keuangan, pelaksanaan audit, ketersediaan laporan bagi pemangku kepentingan, serta tindak lanjutnya oleh perguruan tinggi
 * @property string $_6_2 Prasarana dan Sarana
 * @property string $_6_2_1 Jelaskan sistem pengelolaan prasarana dan sarana (kebijakan pengembangan dan pencatatan, penetapan penggunaan, pemeliharaan/perbaikan/kebersihan, keamanan dan keselamatan prasarana dan sarana) yang digunakan dalam penyelenggaraan kegiatan akademik dan non-akademik, untuk mencapai tujuan institusi
 * @property string $_6_2_2 Tuliskan lokasi, status, penggunaan dan luas lahan yang digunakan perguruan tinggi untuk menjamin penyelenggaraan pendidikan yang bermutu, dalam tabel berikut
 * @property string $_6_2_3 Prasarana untuk kegiatan akademik dan non-akademik
 * @property string $_6_2_4 Sebutkan prasarana tambahan yang dikelola dalam tiga tahun terakhir. Uraikan pula rencana investasi untuk prasarana dalam lima tahun mendatang, dengan mengikuti format tabel berikut
 * @property string $_6_2_5 Pustaka (buku teks, karya ilmiah, dan jurnal; termasuk juga dalam bentuk elektronik/e-library)
 * @property string $_6_2_6 Jelaskan pula aksesibilitas dan pemanfaatan pustaka di atas
 * @property string $_6_2_7 Jelaskan upaya perguruan tinggi menyediakan prasarana dan sarana pembelajaran yang terpusat, serta aksesibilitasnya bagi sivitas akademika
 * @property string $_6_3 Sistem Informasi
 * @property string $_6_3_1 Jelaskan sistem informasi dan fasilitas yang digunakan oleh perguruan tinggi untuk kegiatan pembelajaran (hardware, software, e-learning, e-library)
 * @property string $_6_3_2 Jelaskan sistem informasi dan fasilitas yang digunakan oleh perguruan tinggi untuk kegiatan administrasi (akademik, keuangan, dan personil) serta aksesibilitasnya
 * @property string $_6_3_3 Jelaskan sistem informasi dan fasilitas yang digunakan oleh institusi perguruan tinggi untuk pengelolaan prasarana dan sarana (hardware, software)
 * @property string $_6_3_4 Jelaskan sistem pendukung pengambilan keputusan
 * @property string $_6_3_5 Jelaskan sistem informasi (misalnya website institusi, fasilitas internet, jaringan lokal, jaringan nirkabel) yang dimanfaatkan untuk komunikasi internal dan eksternal kampus. Jelaskan juga akses mahasiswa dan dosen terhadap sumber informasi
 * @property string $_6_3_6 Jelaskan kapasitas internet yang tersedia dan bandwidth per mahasiswa
 * @property string $_6_3_7 Aksesibiltas Data
 * @property string $_6_3_8 Blue print sistem informasi
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BorangInstitusi $borangInstitusi
 * @property User $createdBy
 * @property User $updatedBy
 * @property DetailBorangInstitusiStandar6[] $detailBorangInstitusiStandar6s
 */
class BorangInstitusiStandar6 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_institusi_standar6';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_borang_institusi', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['_6_1', '_6_1_1', '_6_1_2', '_6_1_3', '_6_1_4', '_6_1_5', '_6_1_6', '_6_1_7', '_6_1_8', '_6_1_9', '_6_2', '_6_2_1', '_6_2_2', '_6_2_3', '_6_2_4', '_6_2_5', '_6_2_6', '_6_2_7', '_6_3', '_6_3_1', '_6_3_2', '_6_3_3', '_6_3_4', '_6_3_5', '_6_3_6', '_6_3_7', '_6_3_8'], 'string'],
            [['progress'], 'number'],
            [['id_borang_institusi'], 'exist', 'skipOnError' => true, 'targetClass' => BorangInstitusi::className(), 'targetAttribute' => ['id_borang_institusi' => 'id']],
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
            '_6_1' => '6 1',
            '_6_1_1' => '6 1 1',
            '_6_1_2' => '6 1 2',
            '_6_1_3' => '6 1 3',
            '_6_1_4' => '6 1 4',
            '_6_1_5' => '6 1 5',
            '_6_1_6' => '6 1 6',
            '_6_1_7' => '6 1 7',
            '_6_1_8' => '6 1 8',
            '_6_1_9' => '6 1 9',
            '_6_2' => '6 2',
            '_6_2_1' => '6 2 1',
            '_6_2_2' => '6 2 2',
            '_6_2_3' => '6 2 3',
            '_6_2_4' => '6 2 4',
            '_6_2_5' => '6 2 5',
            '_6_2_6' => '6 2 6',
            '_6_2_7' => '6 2 7',
            '_6_3' => '6 3',
            '_6_3_1' => '6 3 1',
            '_6_3_2' => '6 3 2',
            '_6_3_3' => '6 3 3',
            '_6_3_4' => '6 3 4',
            '_6_3_5' => '6 3 5',
            '_6_3_6' => '6 3 6',
            '_6_3_7' => '6 3 7',
            '_6_3_8' => '6 3 8',
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
        return $this->hasOne(BorangInstitusi::className(), ['id' => 'id_borang_institusi']);
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
    public function getDetailBorangInstitusiStandar6s()
    {
        return $this->hasMany(DetailBorangInstitusiStandar6::className(), ['id_borang_institusi_standar6' => 'id']);
    }
}

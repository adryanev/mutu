<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_institusi_standar3".
 *
 * @property int $id
 * @property int $id_borang_institusi
 * @property string $_3_1 Mahasiswa
 * @property string $_3_1_1 Jelaskan sistem rekruitmen dan seleksi calon mahasiswa baru untuk program sarjana, magister, doktor dan/atau diploma yang diterapkan pada institusi ini serta ketersediaan pedoman tertulis tentang rekrutmen dan seleksi mahasiswa baru
 * @property string $_3_1_10 Jelaskan pelaksanaan program layanan bimbingan karir dan informasi kerja bagi mahasiswa dan lulusan yang mencakup: (1) penyebaran informasi kerja, (2) penyelenggaraan bursa kerja, (3) perencanaan karir, (4) pelatihan melamar kerja, dan (5) layanan penempatan kerja
 * @property string $_3_1_11 Sebutkan pencapaian prestasi mahasiswa dalam tiga tahun terakhir di bidang akademik dan non-akademik, antara lain prestasi dalam penelitian dan lomba karya ilmiah, PkM, olahraga, dan seni dalam tabel berikut
 * @property string $_3_1_12 Jelaskan upaya institusi untuk meningkatkan prestasi mahasiswa dalam bidang akademik dan non-akademik, antara lain prestasi dalam penelitian dan lomba karya ilmiah, PkM, olahraga, dan seni
 * @property string $_3_1_2 Jelaskan kebijakan mengenai penerimaan mahasiswa yang memiliki potensi akademik dan kurang mampu secara ekonomi, fisik, serta implementasinya
 * @property string $_3_1_3 Jelaskan kebijakan mengenai penerimaan mahasiswa berdasarkan prinsip ekuitas (SARA-suku, agama, ras, antar golongan, gender, status sosial, dan politik)
 * @property string $_3_1_4 Jelaskan kebijakan mengenai penerimaan mahasiswa yang berdasarkan prinsip pemerataan wilayah asal mahasiswa, serta informasi mengenai jumlah provinsi asal mahasiswa
 * @property string $_3_1_5 Profil Mahasiswa
 * @property string $_3_1_6 Jelaskan tata cara dan instrumen yang digunakan untuk mengetahui kepuasan mahasiswa terhadap layanan kemahasiswaan
 * @property string $_3_1_7 Jelaskan hasil pelaksanaan pengukuran kepuasan mahasiswa menggunakan instrumen tersebut
 * @property string $_3_1_8 Lengkapilah tabel berikut, untuk data pelayanan kepada mahasiswa dalam satu tahun terakhir
 * @property string $_3_1_9 Jelaskan program layanan bimbingan karir dan informasi kerja bagi mahasiswa dan lulusan yang mencakup: (1) penyebaran informasi kerja, (2) penyelenggaraan bursa kerja, (3) perencanaan karir, (4) pelatihan melamar kerja, dan (5) layanan penempatan kerja
 * @property string $_3_2 Lulusan
 * @property string $_3_2_1a Jumlah mahasiswa dan lulusan program pendidikan sarjana
 * @property string $_3_2_1b Tuliskan data jumlah mahasiswa dan lulusan program pendidikan magister (S-2) lima tahun terakhir dengan mengikuti format tabel berikut
 * @property string $_3_2_1c Tuliskan data jumlah mahasiswa dan lulusan program pendidikan doktor (S-3) enam tahun terakhir dengan mengikuti format tabel berikut
 * @property string $_3_2_1d Tuliskan data jumlah mahasiswa dan lulusan program pendidikan diploma IV (D-4)tujuh tahun terakhir dengan mengikuti format tabel berikut
 * @property string $_3_2_1e Tuliskan data jumlah mahasiswa dan lulusan program pendidikan diploma III (D-3) lima tahun terakhir dengan mengikuti format tabel berikut
 * @property string $_3_2_1f Tuliskan data jumlah mahasiswa dan lulusan program pendidikan diploma II (D-2) tiga tahun terakhir dengan mengikuti format tabel berikut
 * @property string $_3_2_1g Tuliskan data jumlah mahasiswa dan lulusan program pendidikan diploma I (D-1) dua tahun terakhir dengan mengikuti format tabel berikut
 * @property string $_3_2_2 Tuliskan rata-rata masa studi mahasiswa dan IPK lulusan dalam tabel berikut
 * @property string $_3_2_3 Jelaskan kebijakan institusi terkait dengan studi pelacakan baik dari lulusan maupun dari pengguna lulusan, berikut keberadaan pedoman. Informasi mencakup: (1) kebijakan dan strategi, (2) instrumen, (3) monitoring dan evaluasi, dan (4) tindak lanjut
 * @property string $_3_2_4 Jelaskan pelaksanaan studi pelacakan, hasil evaluasi dalam lima tahun terakhir, dan tindak lanjut dari evaluasi terhadap peningkatan mutu lulusan
 * @property string $_3_2_5 Himpunan Alumni
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangInstitusi $borangInstitusi
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7DetailBorangInstitusiStandar3[] $detailBorangInstitusiStandar3s
 */
class S7BorangInstitusiStandar3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_institusi_standar3';
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
            [['_3_1', '_3_1_1', '_3_1_10', '_3_1_11', '_3_1_12', '_3_1_2', '_3_1_3', '_3_1_4', '_3_1_5', '_3_1_6', '_3_1_7', '_3_1_8', '_3_1_9', '_3_2', '_3_2_1a', '_3_2_1b', '_3_2_1c', '_3_2_1d', '_3_2_1e', '_3_2_1f', '_3_2_1g', '_3_2_2', '_3_2_3', '_3_2_4', '_3_2_5'], 'string'],
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
            '_3_1' => '3 1',
            '_3_1_1' => '3 1 1',
            '_3_1_10' => '3 1 10',
            '_3_1_11' => '3 1 11',
            '_3_1_12' => '3 1 12',
            '_3_1_2' => '3 1 2',
            '_3_1_3' => '3 1 3',
            '_3_1_4' => '3 1 4',
            '_3_1_5' => '3 1 5',
            '_3_1_6' => '3 1 6',
            '_3_1_7' => '3 1 7',
            '_3_1_8' => '3 1 8',
            '_3_1_9' => '3 1 9',
            '_3_2' => '3 2',
            '_3_2_1a' => '3 2 1a',
            '_3_2_1b' => '3 2 1b',
            '_3_2_1c' => '3 2 1c',
            '_3_2_1d' => '3 2 1d',
            '_3_2_1e' => '3 2 1e',
            '_3_2_1f' => '3 2 1f',
            '_3_2_1g' => '3 2 1g',
            '_3_2_2' => '3 2 2',
            '_3_2_3' => '3 2 3',
            '_3_2_4' => '3 2 4',
            '_3_2_5' => '3 2 5',
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
    public function getDetailBorangInstitusiStandar3s()
    {
        return $this->hasMany(S7DetailBorangInstitusiStandar3::className(), ['id_borang_institusi_standar3' => 'id']);
    }
}

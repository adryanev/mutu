<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_borang_pasca_prodi_standar4".
 *
 * @property int $id
 * @property int $id_borang_pasca
 * @property string $_4_1 Sistem Seleksi dan Pengembangan
 * @property string $_4_2 Monitoring dan Evaluasi
 * @property string $_4_3 Dosen Tetap
 * @property string $_4_3_1 Data dosen tetap yang bidang keahliannya sesuai dengan bidang PS
 * @property string $_4_3_2 Data dosen tetap yang bidang keahliannya di luar bidang PS
 * @property string $_4_3_3 Aktivitas dosen tetap yang bidang bidang keahliannya sesuai dengan PS
 * @property string $_4_3_4 Data aktivitas mengajar dosen tetap
 * @property string $_4_3_5 Data aktivitas mengajar dosen tetap yang bidang keahliannya di luar PS, dalam satu tahun akademik terakhir di PS
 * @property string $_4_4 Data Dosen Tidak Tetap
 * @property string $_4_4_1 Dosen Tidak Tetap
 * @property string $_4_4_2 Data Aktivistas Mengajar Dosen Tidak Tetap Satu Tahun Terakhir
 * @property string $_4_5 Upaya Peningkatan Sumber Daya Manusia (SDM) dalam tiga tahun terakhir
 * @property string $_4_5_1 Kegiatan Tenaga Ahli/Pakar sebagai Pembicara dalam Seminar/Pelatihan
 * @property string $_4_5_2 Peningkatan kemampuan dosen tetap melalui program tugas belajar dalam bidang yang sesuai dengan bidang PS
 * @property string $_4_5_3 Kegiatan dosen tetap yang bidang keahliannya sesuai dengan PS dalam seminar ilmiah/lokakarya/penataran/workshop/ pagelaran/ pameran/peragaan yang tidak hanya melibatkan dosen PT sendiri
 * @property string $_4_5_4 Sebutkan pencapaian prestasi/reputasi dosen (misalnya prestasi dalam pendidikan, penelitian dan pelayanan/pengabdian kepada masyarakat)
 * @property string $_4_5_5 Sebutkan keikutsertaan dosen tetap dalam organisasi keilmuan atau organisasi profesi
 * @property string $_4_6 Tenaga kependidikan
 * @property string $_4_6_1 Data tenaga kependidikan yang ada di PS, Jurusan, Fakultas atau PT yang melayani mahasiswa PS Tuliskan data tenaga kependidikan yang ada di PS, Jurusan, Fakultas atau PT yang melayani mahasiswa PS
 * @property string $_4_6_2 Jelaskan upaya yang telah dilakukan PS dalam meningkatkan kualifikasi dan kompetensi tenaga kependidikan, dalam hal pemberian kesempatan belajar/pelatihan, pemberian fasilitas termasuk dana, dan jenjang karir
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangPascaProdi $borangPasca
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7DetailBorangPascaProdiStandar4[] $s7DetailBorangPascaProdiStandar4s
 */
class S7BorangPascaProdiStandar4 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_pasca_prodi_standar4';
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
            [['_4_1', '_4_2', '_4_3', '_4_3_1', '_4_3_2', '_4_3_3', '_4_3_4', '_4_3_5', '_4_4', '_4_4_1', '_4_4_2', '_4_5', '_4_5_1', '_4_5_2', '_4_5_3', '_4_5_4', '_4_5_5', '_4_6', '_4_6_1', '_4_6_2'], 'string'],
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
            '_4_1' => '4 1',
            '_4_2' => '4 2',
            '_4_3' => '4 3',
            '_4_3_1' => '4 3 1',
            '_4_3_2' => '4 3 2',
            '_4_3_3' => '4 3 3',
            '_4_3_4' => '4 3 4',
            '_4_3_5' => '4 3 5',
            '_4_4' => '4 4',
            '_4_4_1' => '4 4 1',
            '_4_4_2' => '4 4 2',
            '_4_5' => '4 5',
            '_4_5_1' => '4 5 1',
            '_4_5_2' => '4 5 2',
            '_4_5_3' => '4 5 3',
            '_4_5_4' => '4 5 4',
            '_4_5_5' => '4 5 5',
            '_4_6' => '4 6',
            '_4_6_1' => '4 6 1',
            '_4_6_2' => '4 6 2',
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
    public function getS7DetailBorangPascaProdiStandar4s()
    {
        return $this->hasMany(S7DetailBorangPascaProdiStandar4::className(), ['id_borang_pasca_prodi_standar4' => 'id']);
    }
}

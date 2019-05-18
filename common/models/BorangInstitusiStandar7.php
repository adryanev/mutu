<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_institusi_standar7".
 *
 * @property int $id
 * @property int $id_borang_institusi
 * @property string $_7_1 Penelitian
 * @property string $_7_1_1 Jelaskan kebijakan dan sistem pengelolaan penelitian (lembaga/unit yang menangani masalah penelitian, pengarahan fokus dan agenda penelitian, pedoman penyusunan usul dan pelaksanaan penelitian, pendanaan, dan jaminan atas HaKI)
 * @property string $_7_1_2 Tuliskan jumlah judul penelitian* yang dilakukan oleh dosen tetap selama tiga tahun terakhir dengan mengikuti format tabel berikut
 * @property string $_7_1_3 Tuliskan judul artikel ilmiah/karya ilmiah/karya seni/buku yang dihasilkan selama tiga tahun terakhir oleh dosen tetap dengan mengikuti format tabel berikut
 * @property string $_7_1_4 Jumlah artikel ilmiah yang tercatat dalam indeks sitasi internasional selama 3 tahun terakhir: _ artikel
 * @property string $_7_1_5 Sebutkan karya dosen dan atau mahasiswa Institusi perguruan tinggi yang telah memperoleh Paten/Hak atas Kekayaan Intelektual (HaKI)/Karya yang mendapatkan penghargaan tingkat nasional/internasional selama tiga tahun terakhir
 * @property string $_7_1_6 Jelaskan kebijakan dan upaya yang dilakukan oleh institusi dalam menjamin keberlanjutan penelitian, yang mencakup informasi tentang agenda penelitian, dukungan SDM, prasarana dan sarana, jejaring penelitian, dan pencarian berbagai sumber dana penelitian
 * @property string $_7_2 Kegiatan Pelayanan/Pengabdian kepada Masyarakat (PkM)
 * @property string $_7_2_1 Jelaskan kebijakan dan sistem pengelolaan kegiatan PkM (lembaga/unit yang menangani masalah, agenda, pedoman penyusunan usul dan pelaksanaan, serta pendanaan PkM)
 * @property string $_7_2_2 Tuliskan jumlah kegiatan PkM* berdasarkan sumber pembiayaan selama tiga tahun terakhir yang dilakukan oleh institusi dengan mengikuti format tabel berikut
 * @property string $_7_2_3 Jelaskan kebijakan dan upaya yang dilakukan oleh institusi dalam menjamin keberlanjutan dan mutu kegiatan PkM, , yang mencakup informasi tentang agenda PkM, dukungan SDM, prasarana dan sarana, jejaring PkM, dan pencarian berbagai sumber dana PkM
 * @property string $_7_3 Kerjasama
 * @property string $_7_3_1 Jelaskan kebijakan dan upaya (pengelolaan serta sistem monitoring dan evaluasi) kerjasama, dalam rangka mewujudkan visi, melaksanakan misi, dan mencapai tujuan dan sasaran institusi
 * @property string $_7_3_2 Tuliskan instansi dalam negeri yang menjalin kerjasama* yang terkait dengan institusi perguruan tinggi dalam tiga tahun terakhir
 * @property string $_7_3_3 Tuliskan instansi luar negeri yang menjalin kerjasama* yang terkait dengan institusi perguruan tinggi/jurusan dalam tiga tahun terakhir
 * @property string $_7_3_4 Jelaskan proses monitoring dan evaluasi pelaksanaan dan hasil kerjasama serta waktu pelaksanaannya
 * @property string $_7_3_5 Jelaskan manfaat dan kepuasan mitra kerja sama. Jelaskan pula cara memperoleh informasi tersebut
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BorangInstitusi $borangInstitusi
 * @property User $createdBy
 * @property User $updatedBy
 * @property DetailBorangInstitusiStandar7[] $detailBorangInstitusiStandar7s
 */
class BorangInstitusiStandar7 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_institusi_standar7';
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
            [['_7_1', '_7_1_1', '_7_1_2', '_7_1_3', '_7_1_4', '_7_1_5', '_7_1_6', '_7_2', '_7_2_1', '_7_2_2', '_7_2_3', '_7_3', '_7_3_1', '_7_3_2', '_7_3_3', '_7_3_4', '_7_3_5'], 'string'],
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
            '_7_1' => '7 1',
            '_7_1_1' => '7 1 1',
            '_7_1_2' => '7 1 2',
            '_7_1_3' => '7 1 3',
            '_7_1_4' => '7 1 4',
            '_7_1_5' => '7 1 5',
            '_7_1_6' => '7 1 6',
            '_7_2' => '7 2',
            '_7_2_1' => '7 2 1',
            '_7_2_2' => '7 2 2',
            '_7_2_3' => '7 2 3',
            '_7_3' => '7 3',
            '_7_3_1' => '7 3 1',
            '_7_3_2' => '7 3 2',
            '_7_3_3' => '7 3 3',
            '_7_3_4' => '7 3 4',
            '_7_3_5' => '7 3 5',
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
    public function getDetailBorangInstitusiStandar7s()
    {
        return $this->hasMany(DetailBorangInstitusiStandar7::className(), ['id_borang_institusi_standar7' => 'id']);
    }
}

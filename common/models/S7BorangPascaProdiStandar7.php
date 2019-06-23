<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_borang_pasca_prodi_standar7".
 *
 * @property int $id
 * @property int $id_borang_pasca
 * @property string $_7_1 Penelitian Dosen Tetap yang Bidang Keahliannya Sesuai dengan PS.
 * @property string $_7_1_1 Judul penelitian* yang sesuai dengan bidang keilmuan PS, yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan PS selama tiga tahun terakhir.
 * @property string $_7_1_2 Mahasiswa tugas akhir yang dilibatkan dalam penelitian dosen dalam tiga tahun terakhir.
 * @property string $_7_1_3 Judul artikel ilmiah/karya ilmiah/karya seni/buku yang dihasilkan selama tiga tahun terakhir oleh dosen tetap yang bidang keahliannya sesuai dengan PS.
 * @property string $_7_1_4 Karya dosen dan atau mahasiswa Program Studi yang telah memperoleh/sedang memproses perlindungan Hak atas Kekayaan Intelektual (HaKI) selama tiga tahun terakhir.
 * @property string $_7_2 Kegiatan Pengabdian kepada Masyarakat
 * @property string $_7_2_1 Pelayanan/Pengabdian kepada Masyarakat (*) yang sesuai dengan bidang keilmuan PS selama tiga tahun terakhir yang dilakukan oleh dosen tetap yang bidang keahliannya sesuai dengan PS
 * @property string $_7_2_2 Mahasiswa yang dilibatkan dalam kegiatan pelayanan/pengabdian kepada masyarakat dalam tiga tahun terakhir
 * @property string $_7_3 Kerjasama dengan Instansi Lain
 * @property string $_7_3_1 Instansi dalam negeri yang menjalin kerjasama* yang terkait dengan program studi/jurusan dalam tiga tahun terakhir.
 * @property string $_7_3_2 Instansi luar negeri yang menjalin kerjasama* yang terkait dengan program studi/jurusan dalam tiga tahun terakhir.
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangPascaProdi $borangPasca
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7DetailBorangPascaProdiStandar7[] $s7DetailBorangPascaProdiStandar7s
 */
class S7BorangPascaProdiStandar7 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_pasca_prodi_standar7';
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
            [['_7_1', '_7_1_1', '_7_1_2', '_7_1_3', '_7_1_4', '_7_2', '_7_2_1', '_7_2_2', '_7_3', '_7_3_1', '_7_3_2'], 'string'],
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
            '_7_1' => '7 1',
            '_7_1_1' => '7 1 1',
            '_7_1_2' => '7 1 2',
            '_7_1_3' => '7 1 3',
            '_7_1_4' => '7 1 4',
            '_7_2' => '7 2',
            '_7_2_1' => '7 2 1',
            '_7_2_2' => '7 2 2',
            '_7_3' => '7 3',
            '_7_3_1' => '7 3 1',
            '_7_3_2' => '7 3 2',
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
    public function getS7DetailBorangPascaProdiStandar7s()
    {
        return $this->hasMany(S7DetailBorangPascaProdiStandar7::className(), ['id_borang_pasca_prodi_standar7' => 'id']);
    }
}

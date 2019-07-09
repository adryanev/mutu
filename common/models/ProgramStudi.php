<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "program_studi".
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string $jurusan_departemen
 * @property int $id_fakultas_akademi
 * @property string $nomor_sk_pendirian
 * @property int $tanggal_sk_pendirian
 * @property string $pejabat_ttd_sk_pendirian
 * @property int $bulan_berdiri
 * @property string $tahun_berdiri
 * @property string $nomor_sk_operasional
 * @property int $tanggal_sk_operasional
 * @property string $peringkat_banpt_terakhir
 * @property int $nilai_banpt_terakhir
 * @property string $nomor_sk_banpt
 * @property string $alamat
 * @property string $kodepos
 * @property string $nomor_telp
 * @property string $homepage
 * @property string $email
 * @property string $kaprodi
 * @property string $jenjang
 * @property int $created_at
 * @property int $updated_at
 *
 * @property ProfilUser[] $profilUsers
 * @property FakultasAkademi $fakultasAkademi
 * @property S7AkreditasiProdiPasca[] $s7AkreditasiProdiPascas
 * @property S7AkreditasiProdiS1[] $s7AkreditasiProdiS1s
 * @property SertifikatProdi[] $sertifikatProdis
 */
class ProgramStudi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'program_studi';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fakultas_akademi', 'bulan_berdiri', 'nilai_banpt_terakhir', 'created_at', 'updated_at'], 'integer'],
            [['kode', 'nama', 'jurusan_departemen', 'nomor_sk_pendirian', 'pejabat_ttd_sk_pendirian', 'nomor_sk_operasional', 'peringkat_banpt_terakhir', 'nomor_sk_banpt', 'alamat', 'kodepos', 'nomor_telp', 'homepage', 'email', 'kaprodi', 'jenjang', 'tanggal_sk_pendirian', 'tanggal_sk_operasional'], 'string', 'max' => 255],
            [['tahun_berdiri'], 'string', 'max' => 4],
            [['id_fakultas_akademi'], 'exist', 'skipOnError' => true, 'targetClass' => FakultasAkademi::className(), 'targetAttribute' => ['id_fakultas_akademi' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'nama' => 'Nama',
            'jurusan_departemen' => 'Jurusan Departemen',
            'id_fakultas_akademi' => 'Id Fakultas Akademi',
            'nomor_sk_pendirian' => 'Nomor Sk Pendirian',
            'tanggal_sk_pendirian' => 'Tanggal Sk Pendirian',
            'pejabat_ttd_sk_pendirian' => 'Pejabat Ttd Sk Pendirian',
            'bulan_berdiri' => 'Bulan Berdiri',
            'tahun_berdiri' => 'Tahun Berdiri',
            'nomor_sk_operasional' => 'Nomor Sk Operasional',
            'tanggal_sk_operasional' => 'Tanggal Sk Operasional',
            'peringkat_banpt_terakhir' => 'Peringkat Banpt Terakhir',
            'nilai_banpt_terakhir' => 'Nilai Banpt Terakhir',
            'nomor_sk_banpt' => 'Nomor Sk Banpt',
            'alamat' => 'Alamat',
            'kodepos' => 'Kodepos',
            'nomor_telp' => 'Nomor Telp',
            'homepage' => 'Homepage',
            'email' => 'Email',
            'kaprodi' => 'Kaprodi',
            'jenjang' => 'Jenjang',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfilUsers()
    {
        return $this->hasMany(ProfilUser::className(), ['id_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFakultasAkademi()
    {
        return $this->hasOne(FakultasAkademi::className(), ['id' => 'id_fakultas_akademi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7AkreditasiProdiPascas()
    {
        return $this->hasMany(S7AkreditasiProdiPasca::className(), ['id_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7AkreditasiProdiS1s()
    {
        return $this->hasMany(S7AkreditasiProdiS1::className(), ['id_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSertifikatProdis()
    {
        return $this->hasMany(SertifikatProdi::className(), ['id_prodi' => 'id']);
    }
}

<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_borang_pasca_prodi_standar3".
 *
 * @property int $id
 * @property int $id_borang_pasca
 * @property string $_3_1 Profil Mahasiswa dan Lulusan
 * @property string $_3_1_1 Profil Mahasiswa dan Lulusan
 * @property string $_3_1_2 Tabel data mahasiswa non-reguler(2) dalam lima tahun terakhir
 * @property string $_3_1_3 Pencapaian prestasi/reputasi mahasiswa dalam tiga tahun terakhir di bidang akademik dan non-akademik
 * @property string $_3_1_4 Tabel data jumlah mahasiswa reguler tujuh tahun terakhir
 * @property string $_3_2 Layanan kepada Mahasiswa
 * @property string $_3_3 Evaluasi Lulusan
 * @property string $_3_3_1 Evaluasi Kinerja lulusan oleh Pihak Pengguna Lulusan
 * @property string $_3_3_2 Rata-rata waktu tunggu lulusan untuk memperoleh pekerjaan yang pertama = … bulan 
 * @property string $_3_3_3 Persentase lulusan yang bekerja pada bidang yang sesuai dengan keahliannya = … %
 * @property string $_3_4 Himpunan Alumni
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangPascaProdi $borangPasca
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7DetailBorangPascaProdiStandar3[] $s7DetailBorangPascaProdiStandar3s
 */
class S7BorangPascaProdiStandar3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_pasca_prodi_standar3';
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
            [['_3_1', '_3_1_1', '_3_1_2', '_3_1_3', '_3_1_4', '_3_2', '_3_3', '_3_3_1', '_3_3_2', '_3_3_3', '_3_4'], 'string'],
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
            '_3_1' => '3 1',
            '_3_1_1' => '3 1 1',
            '_3_1_2' => '3 1 2',
            '_3_1_3' => '3 1 3',
            '_3_1_4' => '3 1 4',
            '_3_2' => '3 2',
            '_3_3' => '3 3',
            '_3_3_1' => '3 3 1',
            '_3_3_2' => '3 3 2',
            '_3_3_3' => '3 3 3',
            '_3_4' => '3 4',
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
    public function getS7DetailBorangPascaProdiStandar3s()
    {
        return $this->hasMany(S7DetailBorangPascaProdiStandar3::className(), ['id_borang_pasca_prodi_standar3' => 'id']);
    }
}

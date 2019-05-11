<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_s1_prodi_standar3".
 *
 * @property int $id
 * @property int $id_borang_s1_prodi
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
 * @property BorangS1Prodi $borangS1Prodi
 * @property User $createdBy
 * @property User $updatedBy
 * @property DetailBorangS1ProdiStandar3[] $detailBorangS1ProdiStandar3s
 */
class BorangS1ProdiStandar3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_s1_prodi_standar3';
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
            [['_3_1', '_3_1_1', '_3_1_2', '_3_1_3', '_3_1_4', '_3_2', '_3_3', '_3_3_1', '_3_3_2', '_3_3_3', '_3_4'], 'string'],
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
    public function getDetailBorangS1ProdiStandar3s()
    {
        return $this->hasMany(DetailBorangS1ProdiStandar3::className(), ['id_borang_s1_prodi_standar3' => 'id']);
    }
}

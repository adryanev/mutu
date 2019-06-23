<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_borang_pasca_fakultas_standar3".
 *
 * @property int $id
 * @property int $id_borang_pasca
 * @property string $_3_1 Mahasiswa
 * @property string $_3_1_1 Sistem Rekrutmen dan Seleksi Calon Mahasiswa Baru dan Efektivitasnya
 * @property string $_3_1_2 Data mahasiswa reguler dan mahasiswa transfer untuk masing-masing program studi S1 pada TS (tahun akademik penuh yang terakhir) di Fakultas/Sekolah Tinggi
 * @property string $_3_1_3 Uraikan alasan/pertimbangan Fakultas/Sekolah Tinggi dalam menerima mahasiswa transfer. Jelaskan pula alasan mahasiswa melakukan transfer.
 * @property string $_3_2 Lulusan
 * @property string $_3_2_1 Rata-rata masa studi dan rata-rata IPK lulusan selama tiga tahun terakhir dari mahasiswa reguler bukan transfer untuk tiap program studi S1 yang dikelola oleh Fakultas/Sekolah Tinggi
 * @property string $_3_2_2 Pandangan Fakultas/Sekolah Tinggi tentang rara-rata masa studi dan rata-rata IPK lulusan, yang mencakup aspek : kewajaran, upaya pengembangan, dan upaya peningkatan mutu
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangPascaFakultas $borangPasca
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7DetailBorangPascaFakultasStandar3[] $s7DetailBorangPascaFakultasStandar3s
 */
class S7BorangPascaFakultasStandar3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_pasca_fakultas_standar3';
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
            [['_3_1', '_3_1_1', '_3_1_2', '_3_1_3', '_3_2', '_3_2_1', '_3_2_2'], 'string'],
            [['progress'], 'number'],
            [['id_borang_pasca'], 'exist', 'skipOnError' => true, 'targetClass' => S7BorangPascaFakultas::className(), 'targetAttribute' => ['id_borang_pasca' => 'id']],
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
            '_3_2' => '3 2',
            '_3_2_1' => '3 2 1',
            '_3_2_2' => '3 2 2',
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
        return $this->hasOne(S7BorangPascaFakultas::className(), ['id' => 'id_borang_pasca']);
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
    public function getS7DetailBorangPascaFakultasStandar3s()
    {
        return $this->hasMany(S7DetailBorangPascaFakultasStandar3::className(), ['id_borang_pasca_fakultas_standar3' => 'id']);
    }
}

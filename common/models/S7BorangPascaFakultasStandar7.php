<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_borang_pasca_fakultas_standar7".
 *
 * @property int $id
 * @property int $id_borang_pasca
 * @property string $_7_1 Penelitian
 * @property string $_7_1_1 Jumlah dan dana penelitian yang dilakukan oleh masing-masing PS di lingkungan Fakultas/Sekolah Tinggi dalam tiga tahun terakhir
 * @property string $_7_1_2 Pandangan pimpinan Fakultas/Sekolah Tinggi tentang data pada butir 7.1.1, dalam perspektif: kesesuaian dengan Visi dan Misi, kecukupan, kewajaran, upaya pengembangan dan peningkatan mutu
 * @property string $_7_2 Pelayanan/Pengabdian kepada Masyarakat
 * @property string $_7_2_1 Jumlah dan dana kegiatan pelayanan/pengabdian kepada masyarakat yang dilakukan oleh masing-masing PS di lingkungan Fakultas dalam tiga tahun terakhir
 * @property string $_7_2_2 Pandangan Fakultas/Sekolah Tinggi tentang data pada butir 7.2.1 dalam perspektif: kesesuaian dengan Visi dan Misi, kecukupan, kewajaran, upaya pengembangan dan peningkatan mutu
 * @property string $_7_3 Kerjasama dengan Instansi Lain
 * @property string $_7_3_1 Kerjasama dengan Instansi Lain
 * @property string $_7_3_2 Instansi luar negeri yang menjalin kerjasama* dengan Fakultas/Sekolah Tinggi dalam tiga tahun terakhir.
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangPascaFakultas $borangPasca
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7DetailBorangPascaFakultasStandar7[] $s7DetailBorangPascaFakultasStandar7s
 */
class S7BorangPascaFakultasStandar7 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_pasca_fakultas_standar7';
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
            [['_7_1', '_7_1_1', '_7_1_2', '_7_2', '_7_2_1', '_7_2_2', '_7_3', '_7_3_1', '_7_3_2'], 'string'],
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
            '_7_1' => '7 1',
            '_7_1_1' => '7 1 1',
            '_7_1_2' => '7 1 2',
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
    public function getS7DetailBorangPascaFakultasStandar7s()
    {
        return $this->hasMany(S7DetailBorangPascaFakultasStandar7::className(), ['id_borang_pasca_fakultas_standar7' => 'id']);
    }
}

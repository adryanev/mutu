<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_institusi_standar4".
 *
 * @property int $id
 * @property int $id_borang_institusi
 * @property string $_4_1 Sistem Pengelolaan Sumber Daya Manusia
 * @property string $_4_2 Sistem Monitoring dan Evaluasi
 * @property string $_4_3 Dosen
 * @property string $_4_3_1 Dosen Tetap
 * @property string $_4_3_2 Dosen Tidak Tetap
 * @property string $_4_4 Kegiatan peningkatan sumber daya manusia (dosen) dalam tiga tahun terakhir
 * @property string $_4_5 Tenaga Kependidikan
 * @property string $_4_5_1 Tuliskan data tenaga kependidikan yang ada di institusi yang melayani mahasiswa dengan mengikuti format tabel berikut
 * @property string $_4_5_2 Jelaskan upaya yang telah dilakukan institusi dalam meningkatkan kualifikasi dan kompetensi tenaga kependidikan, dalam hal pemberian kesempatan belajar/ pelatihan, studi banding, pemberian fasilitas termasuk dana, dan jenjang karir
 * @property string $_4_6 Kepuasan dosen dan tenaga kependidikan
 * @property string $_4_6_1 Jelaskan instrumen yang digunakan untuk mengetahui tingkat kepuasan dosen dan tenaga kependidikan terhadap sistem dan praktek pengelolaan sumber daya manusia di institusi ini
 * @property string $_4_6_2 Jelaskan pelaksanaan survei kepuasan dosen, pustakawan, laboran, teknisi, dan tenaga administrasi terhadap sistem pengelolaan sumber daya manusia
 * @property string $_4_6_3 Jelaskan bagaimana hasil penjajagan kepuasan tersebut dan apa tindak lanjutnya
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7BorangInstitusi $borangInstitusi
 * @property User $createdBy
 * @property User $updatedBy
 * @property S7DetailBorangInstitusiStandar4[] $detailBorangInstitusiStandar4s
 */
class S7BorangInstitusiStandar4 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_institusi_standar4';
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
            [['_4_1', '_4_2', '_4_3', '_4_3_1', '_4_3_2', '_4_4', '_4_5', '_4_5_1', '_4_5_2', '_4_6', '_4_6_1', '_4_6_2', '_4_6_3'], 'string'],
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
            '_4_1' => '4 1',
            '_4_2' => '4 2',
            '_4_3' => '4 3',
            '_4_3_1' => '4 3 1',
            '_4_3_2' => '4 3 2',
            '_4_4' => '4 4',
            '_4_5' => '4 5',
            '_4_5_1' => '4 5 1',
            '_4_5_2' => '4 5 2',
            '_4_6' => '4 6',
            '_4_6_1' => '4 6 1',
            '_4_6_2' => '4 6 2',
            '_4_6_3' => '4 6 3',
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
    public function getDetailBorangInstitusiStandar4s()
    {
        return $this->hasMany(S7DetailBorangInstitusiStandar4::className(), ['id_borang_institusi_standar4' => 'id']);
    }
}

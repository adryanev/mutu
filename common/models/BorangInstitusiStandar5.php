<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_institusi_standar5".
 *
 * @property int $id
 * @property int $id_borang_institusi
 * @property string $_5_1 Kurikulum
 * @property string $_5_1_1 Jelaskan kebijakan institusi dalam pengembangan kurikulum, bentuk dukungan institusi dalam pengembangan kurikulum program studi, sistem monitoring dan evaluasi kurikulum, serta keberadaan dokumen
 * @property string $_5_1_2 Jelaskan monitoring dan evaluasi pengembangan kurikulum program studi
 * @property string $_5_2 Pembelajaran
 * @property string $_5_2_1 Sistem Pembelajaran
 * @property string $_5_2_2 Pengendalian mutu proses pembelajaran
 * @property string $_5_2_3 Pedoman Pelaksanaan Tridarma PT
 * @property string $_5_3 Suasana Akademik
 * @property string $_5_3_1 Kebebasan Akademik, Kebebasan Mimbar Akademik, dan Otonomi Keilmuan
 * @property string $_5_3_2 Jelaskan kebijakan dan dukungan institusi untuk menjamin terciptanya suasana akademik di lingkungan institusi yang kondusif untuk meningkatkan proses dan mutu pembelajaran. Dukungan institusi mencakup antara lain peraturan dan sumber daya
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BorangInstitusi $borangInstitusi
 * @property User $createdBy
 * @property User $updatedBy
 * @property DetailBorangInstitusiStandar5[] $detailBorangInstitusiStandar5s
 */
class BorangInstitusiStandar5 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_institusi_standar5';
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
            [['_5_1', '_5_1_1', '_5_1_2', '_5_2', '_5_2_1', '_5_2_2', '_5_2_3', '_5_3', '_5_3_1', '_5_3_2'], 'string'],
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
            '_5_1' => '5 1',
            '_5_1_1' => '5 1 1',
            '_5_1_2' => '5 1 2',
            '_5_2' => '5 2',
            '_5_2_1' => '5 2 1',
            '_5_2_2' => '5 2 2',
            '_5_2_3' => '5 2 3',
            '_5_3' => '5 3',
            '_5_3_1' => '5 3 1',
            '_5_3_2' => '5 3 2',
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
    public function getDetailBorangInstitusiStandar5s()
    {
        return $this->hasMany(DetailBorangInstitusiStandar5::className(), ['id_borang_institusi_standar5' => 'id']);
    }
}

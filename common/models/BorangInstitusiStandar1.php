<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "borang_institusi_standar1".
 *
 * @property int $id
 * @property int $id_borang_institusi
 * @property string $_1_1 Jelaskan dasar penyusunan dan mekanisme penyusunan visi, misi, tujuan dan sasaran institusi perguruan tinggi, serta pihak-pihak yang dilibatkan dalam penyusunannya
 * @property string $_1_2 Pernyataan mengenai tonggak-tonggak capaian (milestones) tujuan yang dinyatakan dalam sasaran-sasaran yang merupakan target terukur, dan penjelasan mengenai strategi serta tahapan pencapaiannya
 * @property string $_1_3 Sosialisasi visi, misi, tujuan, sasaran dan strategi pencapaian dan penggunaannya sebagai acuan dalam penyusunan rencana kerja institusi PT
 * @property string $_1_3_1 Uraikan sosialisasi visi, misi, tujuan, dan sasaran PT agar dipahami seluruh pemangku kepentingan (sivitas akademika, tenaga kependidikan, pengguna lulusan, dan masyarakat)
 * @property string $_1_3_2 Jelaskan bahwa visi, misi, tujuan, dan sasaran PT serta strategi pencapaiannya untuk dijadikan sebagai acuan semua unit dalam institusi perguruan tinggi dalam menyusun rencana strategis (renstra) dan/atau rencana kerja unit bersangkutan
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property BorangInstitusi $borangInstitusi
 * @property User $createdBy
 * @property User $updatedBy
 * @property DetailBorangInstitusiStandar1[] $detailBorangInstitusiStandar1s
 */
class BorangInstitusiStandar1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_institusi_standar1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_borang_institusi', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['_1_1', '_1_2', '_1_3', '_1_3_1', '_1_3_2'], 'string'],
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
            '_1_1' => '1 1',
            '_1_2' => '1 2',
            '_1_3' => '1 3',
            '_1_3_1' => '1 3 1',
            '_1_3_2' => '1 3 2',
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
    public function getDetailBorangInstitusiStandar1s()
    {
        return $this->hasMany(DetailBorangInstitusiStandar1::className(), ['id_borang_institusi_standar1' => 'id']);
    }
}

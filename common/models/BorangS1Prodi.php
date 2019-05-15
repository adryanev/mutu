<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_s1_prodi".
 *
 * @property int $id
 * @property int $id_akreditasi_prodi_s1
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property AkreditasiProdiS1 $akreditasiProdiS1
 * @property BorangS1ProdiStandar1[] $borangS1ProdiStandar1s
 * @property BorangS1ProdiStandar2[] $borangS1ProdiStandar2s
 * @property BorangS1ProdiStandar3[] $borangS1ProdiStandar3s
 * @property BorangS1ProdiStandar4[] $borangS1ProdiStandar4s
 * @property BorangS1ProdiStandar5[] $borangS1ProdiStandar5s
 * @property BorangS1ProdiStandar6[] $borangS1ProdiStandar6s
 * @property BorangS1ProdiStandar7[] $borangS1ProdiStandar7s
 * @property DokumenBorangS1Prodi[] $dokumenBorangS1Prodis
 */
class BorangS1Prodi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_s1_prodi';
    }

    public function behaviors()
    {
        return[
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_akreditasi_prodi_s1', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi_prodi_s1'], 'exist', 'skipOnError' => true, 'targetClass' => AkreditasiProdiS1::className(), 'targetAttribute' => ['id_akreditasi_prodi_s1' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi_prodi_s1' => 'Id Akreditasi Prodi S1',
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiS1()
    {
        return $this->hasOne(AkreditasiProdiS1::className(), ['id' => 'id_akreditasi_prodi_s1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar1s()
    {
        return $this->hasMany(BorangS1ProdiStandar1::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar2s()
    {
        return $this->hasMany(BorangS1ProdiStandar2::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar3s()
    {
        return $this->hasMany(BorangS1ProdiStandar3::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar4s()
    {
        return $this->hasMany(BorangS1ProdiStandar4::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar5s()
    {
        return $this->hasMany(BorangS1ProdiStandar5::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar6s()
    {
        return $this->hasMany(BorangS1ProdiStandar6::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1ProdiStandar7s()
    {
        return $this->hasMany(BorangS1ProdiStandar7::className(), ['id_borang_s1_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenBorangS1Prodis()
    {
        return $this->hasMany(DokumenBorangS1Prodi::className(), ['id_borang_s1_prodi' => 'id']);
    }
}

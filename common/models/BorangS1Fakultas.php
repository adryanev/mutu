<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "borang_s1_fakultas".
 *
 * @property int $id
 * @property int $id_akreditasi_prodi_s1
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property AkreditasiProdiS1 $akreditasiProdiS1
 * @property BorangS1FakultasStandar1[] $borangS1FakultasStandar1s
 * @property BorangS1FakultasStandar2[] $borangS1FakultasStandar2s
 * @property BorangS1FakultasStandar3[] $borangS1FakultasStandar3s
 * @property BorangS1FakultasStandar4[] $borangS1FakultasStandar4s
 * @property BorangS1FakultasStandar5[] $borangS1FakultasStandar5s
 * @property BorangS1FakultasStandar6[] $borangS1FakultasStandar6s
 * @property BorangS1FakultasStandar7[] $borangS1FakultasStandar7s
 * @property DokumenBorangS1Fakultas[] $dokumenBorangS1Fakultas
 */
class BorangS1Fakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'borang_s1_fakultas';
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
    public function getBorangS1FakultasStandar1s()
    {
        return $this->hasMany(BorangS1FakultasStandar1::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1FakultasStandar2s()
    {
        return $this->hasMany(BorangS1FakultasStandar2::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1FakultasStandar3s()
    {
        return $this->hasMany(BorangS1FakultasStandar3::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1FakultasStandar4s()
    {
        return $this->hasMany(BorangS1FakultasStandar4::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1FakultasStandar5s()
    {
        return $this->hasMany(BorangS1FakultasStandar5::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1FakultasStandar6s()
    {
        return $this->hasMany(BorangS1FakultasStandar6::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1FakultasStandar7s()
    {
        return $this->hasMany(BorangS1FakultasStandar7::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenBorangS1Fakultas()
    {
        return $this->hasMany(DokumenBorangS1Fakultas::className(), ['id_borang_s1_fakultas' => 'id']);
    }
}

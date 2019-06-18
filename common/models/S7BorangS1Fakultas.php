<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "borang_s1_fakultas".
 *
 * @property int $id
 * @property int $id_akreditasi
 * @property int $id_fakultas
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7Akreditasi $akreditasi
 * @property FakultasAkademi $fakultas
 * @property S7BorangS1FakultasStandar1 $borangS1FakultasStandar1s
 * @property S7BorangS1FakultasStandar2 $borangS1FakultasStandar2s
 * @property S7BorangS1FakultasStandar3 $borangS1FakultasStandar3s
 * @property S7BorangS1FakultasStandar4 $borangS1FakultasStandar4s
 * @property S7BorangS1FakultasStandar5 $borangS1FakultasStandar5s
 * @property S7BorangS1FakultasStandar6 $borangS1FakultasStandar6s
 * @property S7BorangS1FakultasStandar7 $borangS1FakultasStandar7s
 * @property S7DokumenBorangS1Fakultas[] $dokumenBorangS1Fakultas
 */
class S7BorangS1Fakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_s1_fakultas';
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
            [['id_akreditasi', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi'], 'exist', 'skipOnError' => true, 'targetClass' => S7Akreditasi::className(), 'targetAttribute' => ['id_akreditasi_prodi_s1' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi' => 'Id Akreditasi S1',
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasi()
    {
        return $this->hasOne(S7Akreditasi::className(), ['id' => 'id_akreditasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFakultas()
    {
        return $this->hasOne(FakultasAkademi::className(), ['id' => 'id_fakultas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1FakultasStandar1s()
    {
        return $this->hasOne(S7BorangS1FakultasStandar1::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1FakultasStandar2s()
    {
        return $this->hasOne(S7BorangS1FakultasStandar2::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1FakultasStandar3s()
    {
        return $this->hasOne(S7BorangS1FakultasStandar3::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1FakultasStandar4s()
    {
        return $this->hasOne(S7BorangS1FakultasStandar4::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1FakultasStandar5s()
    {
        return $this->hasOne(S7BorangS1FakultasStandar5::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1FakultasStandar6s()
    {
        return $this->hasOne(S7BorangS1FakultasStandar6::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBorangS1FakultasStandar7s()
    {
        return $this->hasOne(S7BorangS1FakultasStandar7::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDokumenBorangS1Fakultas()
    {
        return $this->hasMany(S7DokumenBorangS1Fakultas::className(), ['id_borang_s1_fakultas' => 'id']);
    }

    public function updateProgress(){
        $s1= $this->borangS1FakultasStandar1s->progress/100;
        $s2= $this->borangS1FakultasStandar2s->progress/100;
        $s3= $this->borangS1FakultasStandar3s->progress/100;
        $s4= $this->borangS1FakultasStandar4s->progress/100;
        $s5= $this->borangS1FakultasStandar5s->progress/100;
        $s6= $this->borangS1FakultasStandar6s->progress/100;
        $s7= $this->borangS1FakultasStandar7s->progress/100;

        $progress = round((($s1+$s2+$s3+$s4+$s5+$s6+$s7)/7) *100,2);

        $this->progress = $progress;
        $this->save(false);
    }
}

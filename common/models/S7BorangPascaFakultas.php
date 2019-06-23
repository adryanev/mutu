<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_borang_pasca_fakultas".
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
 * @property S7BorangPascaFakultasStandar1[] $s7BorangPascaFakultasStandar1s
 * @property S7BorangPascaFakultasStandar2[] $s7BorangPascaFakultasStandar2s
 * @property S7BorangPascaFakultasStandar3[] $s7BorangPascaFakultasStandar3s
 * @property S7BorangPascaFakultasStandar4[] $s7BorangPascaFakultasStandar4s
 * @property S7BorangPascaFakultasStandar5[] $s7BorangPascaFakultasStandar5s
 * @property S7BorangPascaFakultasStandar6[] $s7BorangPascaFakultasStandar6s
 * @property S7BorangPascaFakultasStandar7[] $s7BorangPascaFakultasStandar7s
 * @property S7DokumenBorangPascaFakultas[] $s7DokumenBorangPascaFakultas
 * @property S7GambarBorangPascaFakultas[] $s7GambarBorangPascaFakultas
 */
class S7BorangPascaFakultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_pasca_fakultas';
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
            [['id_akreditasi', 'id_fakultas', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi'], 'exist', 'skipOnError' => true, 'targetClass' => S7Akreditasi::className(), 'targetAttribute' => ['id_akreditasi' => 'id']],
            [['id_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => FakultasAkademi::className(), 'targetAttribute' => ['id_fakultas' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi' => 'Id Akreditasi',
            'id_fakultas' => 'Id Fakultas',
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
    public function getS7BorangPascaFakultasStandar1s()
    {
        return $this->hasMany(S7BorangPascaFakultasStandar1::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaFakultasStandar2s()
    {
        return $this->hasMany(S7BorangPascaFakultasStandar2::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaFakultasStandar3s()
    {
        return $this->hasMany(S7BorangPascaFakultasStandar3::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaFakultasStandar4s()
    {
        return $this->hasMany(S7BorangPascaFakultasStandar4::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaFakultasStandar5s()
    {
        return $this->hasMany(S7BorangPascaFakultasStandar5::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaFakultasStandar6s()
    {
        return $this->hasMany(S7BorangPascaFakultasStandar6::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaFakultasStandar7s()
    {
        return $this->hasMany(S7BorangPascaFakultasStandar7::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumenBorangPascaFakultas()
    {
        return $this->hasMany(S7DokumenBorangPascaFakultas::className(), ['id_borang_pasca_fakultas' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7GambarBorangPascaFakultas()
    {
        return $this->hasMany(S7GambarBorangPascaFakultas::className(), ['id_borang_pasca_fakultas' => 'id']);
    }
}

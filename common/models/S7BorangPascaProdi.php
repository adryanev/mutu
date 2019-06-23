<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_borang_pasca_prodi".
 *
 * @property int $id
 * @property int $id_akreditasi_prodi_pasca
 * @property double $progress
 * @property int $created_at
 * @property int $updated_at
 *
 * @property S7AkreditasiProdiPasca $akreditasiProdiPasca
 * @property S7BorangPascaProdiStandar1[] $s7BorangPascaProdiStandar1s
 * @property S7BorangPascaProdiStandar2[] $s7BorangPascaProdiStandar2s
 * @property S7BorangPascaProdiStandar3[] $s7BorangPascaProdiStandar3s
 * @property S7BorangPascaProdiStandar4[] $s7BorangPascaProdiStandar4s
 * @property S7BorangPascaProdiStandar5[] $s7BorangPascaProdiStandar5s
 * @property S7BorangPascaProdiStandar6[] $s7BorangPascaProdiStandar6s
 * @property S7BorangPascaProdiStandar7[] $s7BorangPascaProdiStandar7s
 * @property S7DokumenBorangPascaProdi[] $s7DokumenBorangPascaProdis
 * @property S7GambarBorangPascaProdi[] $s7GambarBorangPascaProdis
 */
class S7BorangPascaProdi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_borang_pasca_prodi';
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
            [['id_akreditasi_prodi_pasca', 'created_at', 'updated_at'], 'integer'],
            [['progress'], 'number'],
            [['id_akreditasi_prodi_pasca'], 'exist', 'skipOnError' => true, 'targetClass' => S7AkreditasiProdiPasca::className(), 'targetAttribute' => ['id_akreditasi_prodi_pasca' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_akreditasi_prodi_pasca' => 'Id Akreditasi Prodi Pasca',
            'progress' => 'Progress',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAkreditasiProdiPasca()
    {
        return $this->hasOne(S7AkreditasiProdiPasca::className(), ['id' => 'id_akreditasi_prodi_pasca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaProdiStandar1s()
    {
        return $this->hasMany(S7BorangPascaProdiStandar1::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaProdiStandar2s()
    {
        return $this->hasMany(S7BorangPascaProdiStandar2::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaProdiStandar3s()
    {
        return $this->hasMany(S7BorangPascaProdiStandar3::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaProdiStandar4s()
    {
        return $this->hasMany(S7BorangPascaProdiStandar4::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaProdiStandar5s()
    {
        return $this->hasMany(S7BorangPascaProdiStandar5::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaProdiStandar6s()
    {
        return $this->hasMany(S7BorangPascaProdiStandar6::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7BorangPascaProdiStandar7s()
    {
        return $this->hasMany(S7BorangPascaProdiStandar7::className(), ['id_borang_pasca' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7DokumenBorangPascaProdis()
    {
        return $this->hasMany(S7DokumenBorangPascaProdi::className(), ['id_borang_pasca_prodi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getS7GambarBorangPascaProdis()
    {
        return $this->hasMany(S7GambarBorangPascaProdi::className(), ['id_borang_pasca_prodi' => 'id']);
    }

    public function updateProgress(){
        $s1= $this->s7BorangPascaProdiStandar1s->progress/100;
        $s2= $this->s7BorangPascaProdiStandar2s->progress/100;
        $s3= $this->s7BorangPascaProdiStandar3s->progress/100;
        $s4= $this->s7BorangPascaProdiStandar4s->progress/100;
        $s5= $this->s7BorangPascaProdiStandar5s->progress/100;
        $s6= $this->s7BorangPascaProdiStandar6s->progress/100;
        $s7= $this->s7BorangPascaProdiStandar7s->progress/100;

        $progress = round((($s1+$s2+$s3+$s4+$s5+$s6+$s7)/7) *100,2);

        $this->progress = $progress;
        $this->save(false);
    }
}

<?php

namespace common\models\led;

use Yii;

/**
 * This is the model class for table "s7_led_prodi_pasca".
 *
 * @property int $id
 * @property int $id_akreditasi_prodi_pasca
 * @property string $jenis_file
 * @property string $file
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7AkreditasiProdiPasca $akreditasiProdiPasca
 * @property User $createdBy
 * @property User $updatedBy
 */
class S7LedProdiPasca extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_led_prodi_pasca';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_akreditasi_prodi_pasca', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['jenis_file', 'file'], 'string', 'max' => 255],
            [['id_akreditasi_prodi_pasca'], 'exist', 'skipOnError' => true, 'targetClass' => S7AkreditasiProdiPasca::className(), 'targetAttribute' => ['id_akreditasi_prodi_pasca' => 'id']],
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
            'id_akreditasi_prodi_pasca' => 'Id Akreditasi Prodi Pasca',
            'jenis_file' => 'Jenis File',
            'file' => 'File',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
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
}

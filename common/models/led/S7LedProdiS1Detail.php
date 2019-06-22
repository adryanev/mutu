<?php

namespace common\models\led;

use common\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "s7_led_prodi_s1_detail".
 *
 * @property int $id
 * @property int $id_led_prodi_s1
 * @property string $jenis_file
 * @property string $file
 * @property int $created_at
 * @property int $updated_at
 * @property int $created_by
 * @property int $updated_by
 *
 * @property S7LedProdiS1 $ledProdiS1
 * @property User $createdBy
 * @property User $updatedBy
 */
class S7LedProdiS1Detail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 's7_led_prodi_s1_detail';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_led_prodi_s1', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['jenis_file', 'file'], 'string', 'max' => 255],
            [['id_led_prodi_s1'], 'exist', 'skipOnError' => true, 'targetClass' => S7LedProdiS1::className(), 'targetAttribute' => ['id_led_prodi_s1' => 'id']],
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
            'id_led_prodi_s1' => 'Id Led Prodi S1',
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
    public function getLedProdiS1()
    {
        return $this->hasOne(S7LedProdiS1::className(), ['id' => 'id_led_prodi_s1']);
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

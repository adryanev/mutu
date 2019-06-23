<?php

namespace admin\models;

use common\models\sertifikat\SertifikatInstitusi;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class SertifikatInstitusiForm extends SertifikatInstitusi {

    public $sertifikat;

    public function rules()
    {
        return [
            [['sertifikat'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }

    public function upload () {
        $path = Yii::getAlias('@uploadAkreditasi/sertifikat/institusi');
        $fileName = $this->sertifikat->getBaseName().'.'.$this->sertifikat->getExtension();
        $this->sertifikat->saveAs("$path/$fileName");
        return true;
    }

}
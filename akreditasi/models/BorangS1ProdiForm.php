<?php


namespace akreditasi\models;


use common\models\DokumenBorangS1Prodi;
use yii\base\InvalidArgumentException;
use yii\base\Model;
use yii\web\UploadedFile;

class BorangS1ProdiForm extends Model
{

    /**
     * @var UploadedFile
     */
    public $dokumenBorang;

    private $_dokumenBorangS1Prodi;


    public function rules()
    {
        return [
            ['dokumenBorang','file','skipOnEmpty' => false, ]
        ];
    }


    public function uploadDokumen(){

        if($this->validate()){
            $this->_dokumenBorangS1Prodi = new DokumenBorangS1Prodi();
            $fileName = $this->dokumenBorang->getBaseName().'.'.$this->dokumenBorang->getExtension();

        }

        return false;

    }

    /**
     * @return mixed
     */
    public function getDetailBorangS1Prodi()
    {
        return $this->_detailBorangS1Prodi;
    }


}
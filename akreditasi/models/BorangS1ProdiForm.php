<?php


namespace akreditasi\models;


use common\models\DokumenBorangS1Prodi;
use Yii;
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
            ['dokumenBorang','file','skipOnEmpty' => false,]
        ];
    }


    public function uploadDokumen($id){

        if($this->validate()){
            $this->_dokumenBorangS1Prodi = new DokumenBorangS1Prodi();
            $this->_dokumenBorangS1Prodi->id_borang_s1_prodi = $id;
            $fileName = $this->dokumenBorang->getBaseName().'.'.$this->dokumenBorang->getExtension();
            $this->_dokumenBorangS1Prodi->nama_dokumen = $fileName;
            $path = Yii::getAlias('@uploadAkreditasi'. "/BAN-PT/prodi/{$this->_dokumenBorangS1Prodi->borangS1Prodi->akreditasiProdiS1->akreditasi->tahun}/{$this->_dokumenBorangS1Prodi->borangS1Prodi->akreditasiProdiS1->id_prodi}/prodi/borang/dokumen");

            $this->dokumenBorang->saveAs("$path/$fileName");

            return true;
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
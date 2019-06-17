<?php


namespace akreditasi\models;


use common\models\S7DokumentasiInstitusiStandar5;

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use Yii;


class S7DokumentasiInstitusiStandar5Form extends S7DokumentasiInstitusiStandar5
{

    /**
     * @var UploadedFile
     */
    public $dokumenDokumentasi;
    public $kodeDokumen;

    private $_dokumenDokumentasi;


    public function rules()
    {
        return [
            ['dokumenDokumentasi','file','skipOnEmpty' => false,],
            ['kodeDokumen','string',],
            ['kodeDokumen','required']
        ];
    }


    public function uploadDokumen($id){


        if($this->validate()){
            $this->_dokumenDokumentasi = new S7DokumentasiInstitusiStandar5();
            $this->_dokumenDokumentasi->id_dokumentasi_institusi = $id;
            $fileName = $this->dokumenDokumentasi->getBaseName().'.'.$this->dokumenDokumentasi->getExtension();
            $this->_dokumenDokumentasi->dokumen = $fileName;
            $this->_dokumenDokumentasi->kode = $this->kodeDokumen;
            
            $path = Yii::getAlias('@uploadAkreditasi'. "/BAN-PT/institusi/{$this->_dokumenDokumentasi->dokumentasiInstitusi->akreditasiInstitusi->akreditasi->tahun}/dokumentasi");
           
            // var_dump($path);
            // exit();
            $this->dokumenDokumentasi->saveAs("$path/$fileName");
            $this->_dokumenDokumentasi->is_asesor = 0;
            $this->_dokumenDokumentasi->is_publik = 0;
            $this->_dokumenDokumentasi->progress = 0;
            
            $this->_dokumenDokumentasi->save(false);
            return true;
        }

        return false;

    }
    
    

}
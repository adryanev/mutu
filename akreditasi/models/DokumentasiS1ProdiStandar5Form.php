<?php


namespace akreditasi\models;


use Carbon\Carbon;
use common\models\S7DokumentasiS1ProdiStandar5;

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use Yii;


class DokumentasiS1ProdiStandar5Form extends S7DokumentasiS1ProdiStandar5
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

        $timestamp = Carbon::now()->timestamp;


        if($this->validate()){
            $this->_dokumenDokumentasi = new S7DokumentasiS1ProdiStandar5();
            $this->_dokumenDokumentasi->id_dokumentasi_s1_prodi = $id;
            $fileName = $this->dokumenDokumentasi->getBaseName().'.'.$this->dokumenDokumentasi->getExtension();
            $this->_dokumenDokumentasi->dokumen = $timestamp.'-'.$fileName;
            $this->_dokumenDokumentasi->kode = $this->kodeDokumen;
            
            $path = Yii::getAlias('@uploadAkreditasi'. "/BAN-PT/prodi/{$this->_dokumenDokumentasi->dokumentasiS1Prodi->akreditasiProdiS1->akreditasi->tahun}/{$this->_dokumenDokumentasi->dokumentasiS1Prodi->akreditasiProdiS1->id_prodi}/prodi/dokumentasi");
           
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
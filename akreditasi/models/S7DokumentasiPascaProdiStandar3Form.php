<?php

namespace akreditasi\models;

use common\models\S7DokumentasiPascaProdiStandar3;

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use Yii;

class S7DokumentasiPascaProdiStandar3Form extends S7DokumentasiPascaProdiStandar3 {

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
            $this->_dokumenDokumentasi = new S7DokumentasiPascaProdiStandar3();
            $this->_dokumenDokumentasi->id_dokumentasi_pasca_prodi = $id;
            $fileName = $this->dokumenDokumentasi->getBaseName().'.'.$this->dokumenDokumentasi->getExtension();
            $this->_dokumenDokumentasi->dokumen = $fileName;
            $this->_dokumenDokumentasi->kode = $this->kodeDokumen;

            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_dokumenDokumentasi->dokumentasiPascaProdi->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$this->_dokumenDokumentasi->dokumentasiPascaProdi->akreditasiProdiPasca->akreditasi->tahun}/{$this->_dokumenDokumentasi->dokumentasiPascaProdi->akreditasiProdiPasca->id_prodi}/prodi/dokumentasi");

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
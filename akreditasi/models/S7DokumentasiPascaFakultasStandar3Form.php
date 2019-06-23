<?php


namespace akreditasi\models;


use common\models\S7DokumentasiPascaFakultasStandar3;

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use Yii;


class S7DokumentasiPascaFakultasStandar3Form extends S7DokumentasiPascaFakultasStandar3
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
            $this->_dokumenDokumentasi = new S7DokumentasiPascaFakultasStandar3();
            $this->_dokumenDokumentasi->id_dokumentasi_pasca_fakultas = $id;
            $fileName = $this->dokumenDokumentasi->getBaseName().'.'.$this->dokumenDokumentasi->getExtension();
            $this->_dokumenDokumentasi->dokumen = $fileName;
            $this->_dokumenDokumentasi->kode = $this->kodeDokumen;

            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_dokumenDokumentasi->dokumentasiPascaFakultas->akreditasi->lembaga}/prodi/{$this->_dokumenDokumentasi->dokumentasiPascaFakultas->akreditasi->tahun}/fakultas/{$this->_dokumenDokumentasi->dokumentasiPascaFakultas->id_fakultas}/dokumentasi");

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
<?php


namespace akreditasi\models;


use Carbon\Carbon;
use common\models\S7DokumentasiS1ProdiStandar6;

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use Yii;


class S7DokumentasiS1ProdiStandar6Form extends S7DokumentasiS1ProdiStandar6
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
            $model = S7DokumentasiS1ProdiStandar6::find()->select('dokumen')->all();
            $this->_dokumenDokumentasi = new S7DokumentasiS1ProdiStandar6();
            $fileName = $this->dokumenDokumentasi->getBaseName().'.'.$this->dokumenDokumentasi->getExtension();

            $carbon = Carbon::now('Asia/Jakarta');
            $tgl = $carbon->format('U');
            $fileName = $tgl.'-'.$fileName;
            foreach ($model as $dok):
                if ($dok['dokumen'] == $fileName){
                    $fileName = $tgl.'-'.$fileName;
                }
            endforeach;

            $this->_dokumenDokumentasi->id_dokumentasi_s1_prodi = $id;
            $this->_dokumenDokumentasi->dokumen = $fileName;
            $this->_dokumenDokumentasi->kode = $this->kodeDokumen;

            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_dokumenDokumentasi->dokumentasiS1Prodi->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$this->_dokumenDokumentasi->dokumentasiS1Prodi->akreditasiProdiS1->akreditasi->tahun}/{$this->_dokumenDokumentasi->dokumentasiS1Prodi->akreditasiProdiS1->id_prodi}/prodi/dokumentasi");

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
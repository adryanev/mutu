<?php


namespace akreditasi\models;


use Carbon\Carbon;
use common\models\S7DokumentasiInstitusiStandar3;

use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use Yii;


class S7DokumentasiInstitusiStandar3Form extends S7DokumentasiInstitusiStandar3
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
            $this->_dokumenDokumentasi = new S7DokumentasiInstitusiStandar3();
            $fileName = $this->dokumenDokumentasi->getBaseName().'.'.$this->dokumenDokumentasi->getExtension();

            $model = S7DokumentasiInstitusiStandar3::find()->select('dokumen')->all();

            foreach ($model as $dok):
                if ($dok['dokumen'] == $fileName){

                    $carbon = Carbon::now('Asia/Jakarta');
                    $tgl = $carbon->format('U');
                    $fileName = $tgl.'-'.$fileName;

                }
            endforeach;

            $this->_dokumenDokumentasi->id_dokumentasi_institusi = $id;
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
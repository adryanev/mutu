<?php


namespace akreditasi\models;


use Carbon\Carbon;
use common\models\S7DokumenBorangS1Prodi;
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
        $timestamp = Carbon::now()->timestamp;


        if($this->validate()){
            $this->_dokumenBorangS1Prodi = new S7DokumenBorangS1Prodi();
            $this->_dokumenBorangS1Prodi->id_borang_s1_prodi = $id;
            $fileName = $this->dokumenBorang->getBaseName().'.'.$this->dokumenBorang->getExtension();
            $this->_dokumenBorangS1Prodi->nama_dokumen = $timestamp.'-'.$fileName;
            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_dokumenBorangS1Prodi->borangS1Prodi->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$this->_dokumenBorangS1Prodi->borangS1Prodi->akreditasiProdiS1->akreditasi->tahun}/{$this->_dokumenBorangS1Prodi->borangS1Prodi->akreditasiProdiS1->id_prodi}/prodi/borang/dokumen");

            $this->dokumenBorang->saveAs("$path/$fileName");

            $this->_dokumenBorangS1Prodi->save(false);
            return true;
        }

        return false;

    }

    /**
     * @return S7DokumenBorangS1Prodi
     */
    public function getDetailBorangS1Prodi()
    {
        return $this->_dokumenBorangS1Prodi;
    }


}
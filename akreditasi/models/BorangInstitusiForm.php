<?php


namespace akreditasi\models;


use common\models\DokumenBorangInstitusi;
use Yii;
use yii\base\InvalidArgumentException;
use yii\base\Model;
use yii\web\UploadedFile;

class BorangInstitusiForm extends Model
{

    /**
     * @var UploadedFile
     */
    public $dokumenBorang;

    private $_dokumenBorangInstitusi;


    public function rules()
    {
        return [
            ['dokumenBorang','file','skipOnEmpty' => false,]
        ];
    }


    public function uploadDokumen($id){


        if($this->validate()){
            $this->_dokumenBorangInstitusi = new DokumenBorangInstitusi();
            $this->_dokumenBorangInstitusi->id_borang_institusi = $id;
            $fileName = $this->dokumenBorang->getBaseName().'.'.$this->dokumenBorang->getExtension();
            $this->_dokumenBorangInstitusi->nama_dokumen = $fileName;
            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_dokumenBorangInstitusi->borangInstitusi->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$this->_dokumenBorangInstitusi->borangInstitusi->akreditasiInstitusi->akreditasi->tahun}/borang/dokumen");

            $this->dokumenBorang->saveAs("$path/$fileName");

            $this->_dokumenBorangInstitusi->save(false);
            return true;
        }

        return false;

    }

    /**
     * @return DokumenBorangInstitusi
     */
    public function getDetailBorangInstitusi()
    {
        return $this->_dokumenBorangInstitusi;
    }


}
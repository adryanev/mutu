<?php


namespace akreditasi\models;


use Carbon\Carbon;
use common\models\S7DokumenBorangInstitusi;
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
        $timestamp = Carbon::now()->timestamp;

        if($this->validate()){
            $this->_dokumenBorangInstitusi = new S7DokumenBorangInstitusi();
            $this->_dokumenBorangInstitusi->id_borang_institusi = $id;
            $fileName = $this->dokumenBorang->getBaseName().'.'.$this->dokumenBorang->getExtension();
            $this->_dokumenBorangInstitusi->nama_dokumen =$timestamp.'-'.$fileName;
            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_dokumenBorangInstitusi->borangInstitusi->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$this->_dokumenBorangInstitusi->borangInstitusi->akreditasiInstitusi->akreditasi->tahun}/borang/dokumen");

            $this->dokumenBorang->saveAs("$path/$fileName");

            $this->_dokumenBorangInstitusi->save(false);
            return true;
        }

        return false;

    }

    /**
     * @return S7DokumenBorangInstitusi
     */
    public function getDetailBorangInstitusi()
    {
        return $this->_dokumenBorangInstitusi;
    }


}
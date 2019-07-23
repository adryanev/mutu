<?php


namespace akreditasi\models;


use Carbon\Carbon;
use common\models\S7DokumenBorangPascaProdi;
use Yii;
use yii\base\InvalidArgumentException;
use yii\base\Model;
use yii\web\UploadedFile;

class BorangPascaProdiForm extends Model {
    /**
     * @var UploadedFile
     */
    public $dokumenBorang;

    private $_dokumenBorangPascaProdi;


    public function rules()
    {
        return [
            ['dokumenBorang','file','skipOnEmpty' => false,]
        ];
    }


    public function uploadDokumen($id){

        $timestamp = Carbon::now()->timestamp;

        if($this->validate()){
            $this->_dokumenBorangPascaProdi = new S7DokumenBorangPascaProdi();
            $this->_dokumenBorangPascaProdi->id_borang_pasca_prodi = $id;
            $fileName = $this->dokumenBorang->getBaseName().'.'.$this->dokumenBorang->getExtension();
            $this->_dokumenBorangPascaProdi->nama_dokumen = $timestamp.'-'.$fileName;
            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_dokumenBorangPascaProdi->borangPascaProdi->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$this->_dokumenBorangPascaProdi->borangPascaProdi->akreditasiProdiPasca->akreditasi->tahun}/{$this->_dokumenBorangPascaProdi->borangPascaProdi->akreditasiProdiPasca->id_prodi}/prodi/borang/dokumen");

            $this->dokumenBorang->saveAs("$path/$fileName");

            $this->_dokumenBorangPascaProdi->save(false);
            return true;
        }

        return false;

    }

    /**
     * @return S7DokumenBorangPascaProdi
     */
    public function getDetailBorangPascaProdi()
    {
        return $this->_dokumenBorangPascaProdi;
    }
}
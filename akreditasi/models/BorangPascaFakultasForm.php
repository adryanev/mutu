<?php


namespace akreditasi\models;


use common\models\S7DokumenBorangPascaFakultas;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class  BorangPascaFakultasForm extends Model{

    /**
     * @var UploadedFile
     */
    public $dokumenBorang;

    private $_dokumenBorangPascaFakultas;


    public function rules()
    {
        return [
            ['dokumenBorang','file','skipOnEmpty' => false,]
        ];
    }


    public function uploadDokumen($id){


        if($this->validate()){
            $this->_dokumenBorangPascaFakultas = new S7DokumenBorangPascaFakultas();
            $this->_dokumenBorangPascaFakultas->id_borang_pasca_fakultas = $id;
            $fileName = $this->dokumenBorang->getBaseName().'.'.$this->dokumenBorang->getExtension();
            $this->_dokumenBorangPascaFakultas->nama_dokumen = $fileName;
            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_dokumenBorangPascaFakultas->borangPascaFakultas->akreditasi->lembaga}/prodi/{$this->_dokumenBorangPascaFakultas->borangPascaFakultas->akreditasi->tahun}/fakultas/{$this->_dokumenBorangPascaFakultas->borangPascaFakultas->id_fakultas}/borang/dokumen");

            $this->dokumenBorang->saveAs("$path/$fileName");

            $this->_dokumenBorangPascaFakultas->save(false);
            return true;
        }

        return false;

    }

    /**
     * @return S7DokumenBorangPascaFakultas
     */
    public function getDetailBorangPascaFakultas()
    {
        return $this->_dokumenBorangPascaFakultas;
    }

}
<?php


namespace akreditasi\models;


use common\models\S7DokumenBorangS1Fakultas;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class BorangS1FakultasForm extends Model
{

    /**
     * @var UploadedFile
     */
    public $dokumenBorang;

    private $_dokumenBorangS1Fakultas;


    public function rules()
    {
        return [
            ['dokumenBorang','file','skipOnEmpty' => false,]
        ];
    }


    public function uploadDokumen($id){


        if($this->validate()){
            $this->_dokumenBorangS1Fakultas = new S7DokumenBorangS1Fakultas();
            $this->_dokumenBorangS1Fakultas->id_borang_s1_fakultas = $id;
            $fileName = $this->dokumenBorang->getBaseName().'.'.$this->dokumenBorang->getExtension();
            $this->_dokumenBorangS1Fakultas->nama_dokumen = $fileName;
            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_dokumenBorangS1Fakultas->borangS1Fakultas->akreditasi->lembaga}/prodi/{$this->_dokumenBorangS1Fakultas->borangS1Fakultas->akreditasi->tahun}/fakultas/{$this->_dokumenBorangS1Fakultas->borangS1Fakultas->id_fakultas}/borang/dokumen");

            $this->dokumenBorang->saveAs("$path/$fileName");

            $this->_dokumenBorangS1Fakultas->save(false);
            return true;
        }

        return false;

    }

    /**
     * @return S7DokumenBorangS1Fakultas
     */
    public function getDetailBorangS1Fakultas()
    {
        return $this->_dokumenBorangS1Fakultas;
    }


}
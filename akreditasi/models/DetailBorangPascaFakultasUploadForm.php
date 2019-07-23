<?php

namespace akreditasi\models;


use Carbon\Carbon;
use common\models\S7DetailBorangPascaFakultasStandar1;
use common\models\S7DokumenBorangPascaFakultas;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 *
 * @property S7DokumenBorangPascaFakultas $detailBorangPascaFakultas
 */

class DetailBorangPascaFakultasUploadForm extends Model
{


    /**
     * @var UploadedFile
     */
    public $dokumenPendukung;
    public $nomorDokumen;

    private $_detailBorangPascaFakultas;


    public function rules()
    {
        return [
            ['dokumenPendukung','file','skipOnEmpty' => false,],
            ['nomorDokumen','string',],
            ['nomorDokumen','required']
        ];
    }


    public function uploadDokumen($id,$standar){

        $timestamp = Carbon::now()->timestamp;


        if($this->validate()){
            $detailClass = 'common\\models\\S7DetailBorangPascaFakultasStandar'.$standar;
            $detailAttrId = 'id_borang_pasca_fakultas_standar'.$standar;
            $this->_detailBorangPascaFakultas = new $detailClass;
//            $this->_detailBorangPascaFakultas = new S7DetailBorangPascaFakultasStandar1();
            $this->_detailBorangPascaFakultas->$detailAttrId = $id;
            $fileName = $this->dokumenPendukung->getBaseName().'.'.$this->dokumenPendukung->getExtension();
            $this->_detailBorangPascaFakultas->nama_dokumen = $timestamp.'-'.$fileName;
            $this->_detailBorangPascaFakultas->nomor_dokumen = $this->nomorDokumen;
            $borangAttr = 'borangPascaFakultasStandar'.$standar;
            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_detailBorangPascaFakultas->$borangAttr->borangPascaFakultas->akreditasi->lembaga}/prodi/{$this->_detailBorangPascaFakultas->$borangAttr->borangPascaFakultas->akreditasi->tahun}/fakultas/{$this->_detailBorangPascaFakultas->$borangAttr->borangPascaFakultas->id_fakultas}/borang/dokumen");
            $this->dokumenPendukung->saveAs("$path/$fileName");
            $this->_detailBorangPascaFakultas->save(false);
            return true;
        }

        return false;

    }

    /**
     * @return S7DokumenBorangS1Fakultas
     */
    public function getDetailBorangS1Fakultas()
    {
        return $this->_detailBorangS1Fakultas;
    }

}
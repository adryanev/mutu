<?php
/**
 * Project: mutu.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 5/19/2019
 * Time: 12:55 PM
 */

namespace akreditasi\models;


use Carbon\Carbon;
use common\models\S7DetailBorangInstitusiStandar1;
use common\models\S7DokumenBorangInstitusi;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 *
 * @property S7DokumenBorangInstitusi $detailBorangInstitusi
 */

class DetailBorangInstitusiUploadForm extends Model
{


    /**
     * @var UploadedFile
     */
    public $dokumenPendukung;
    public $nomorDokumen;

    private $_detailBorangInstitusi;


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
            $detailClass = 'common\\models\\DetailBorangInstitusiStandar'.$standar;
            $detailAttrId = 'id_borang_institusi_standar'.$standar;
            $this->_detailBorangInstitusi = new $detailClass;
            $this->_detailBorangInstitusi->$detailAttrId = $id;
            $fileName = $this->dokumenPendukung->getBaseName().'.'.$this->dokumenPendukung->getExtension();
            $this->_detailBorangInstitusi->nama_dokumen = $timestamp.'-'. $fileName;
            $this->_detailBorangInstitusi->nomor_dokumen = $this->nomorDokumen;
            $borangAttr = 'borangInstitusiStandar'.$standar;
            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_detailBorangInstitusi->$borangAttr->borangInstitusi->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$this->_detailBorangInstitusi->$borangAttr->borangInstitusi->akreditasiInstitusi->akreditasi->tahun}/borang/dokumen");
            $this->dokumenPendukung->saveAs("$path/$fileName");
            $this->_detailBorangInstitusi->save(false);
            return true;
        }

        return false;

    }

    /**
     * @return S7DokumenBorangInstitusi
     */
    public function getDetailBorangInstitusi()
    {
        return $this->_detailBorangInstitusi;
    }

}
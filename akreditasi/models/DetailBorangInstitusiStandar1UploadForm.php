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

class DetailBorangInstitusiStandar1UploadForm extends Model
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


    public function uploadDokumen($id){

        $timestamp = Carbon::now()->timestamp;

        if($this->validate()){
            $this->_detailBorangInstitusi = new S7DetailBorangInstitusiStandar1();
            $this->_detailBorangInstitusi->id_borang_institusi_standar1 = $id;
            $fileName = $this->dokumenPendukung->getBaseName().'.'.$this->dokumenPendukung->getExtension();
            $this->_detailBorangInstitusi->nama_dokumen = $timestamp.'-'.$fileName;
            $this->_detailBorangInstitusi->nomor_dokumen = $this->nomorDokumen;
            $path = Yii::getAlias('@uploadAkreditasi'. "/BAN-PT/institusi/{$this->_detailBorangInstitusi->borangInstitusiStandar1->borangInstitusi->akreditasiInstitusi->akreditasi->tahun}/{$this->_detailBorangInstitusi->borangInstitusiStandar1->borangInstitusi->akreditasiInstitusi->id_prodi}/borang/dokumen");
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
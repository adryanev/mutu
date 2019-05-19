<?php
/**
 * Project: mutu.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 5/19/2019
 * Time: 12:55 PM
 */

namespace akreditasi\models;


use common\models\DetailBorangS1ProdiStandar1;
use common\models\DokumenBorangS1Prodi;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 *
 * @property DokumenBorangS1Prodi $detailBorangS1Prodi
 */

class DetailBorangS1ProdiStandar1UploadForm extends Model
{


    /**
     * @var UploadedFile
     */
    public $dokumenPendukung;
    public $nomorDokumen;

    private $_detailBorangS1Prodi;


    public function rules()
    {
        return [
            ['dokumenPendukung','file','skipOnEmpty' => false,],
            ['nomorDokumen','string',],
            ['nomorDokumen','required']
        ];
    }


    public function uploadDokumen($id){


        if($this->validate()){
            $this->_detailBorangS1Prodi = new DetailBorangS1ProdiStandar1();
            $this->_detailBorangS1Prodi->id_borang_s1_prodi_standar1 = $id;
            $fileName = $this->dokumenPendukung->getBaseName().'.'.$this->dokumenPendukung->getExtension();
            $this->_detailBorangS1Prodi->nama_dokumen = $fileName;
            $this->_detailBorangS1Prodi->nomor_dokumen = $this->nomorDokumen;
            $path = Yii::getAlias('@uploadAkreditasi'. "/BAN-PT/prodi/{$this->_detailBorangS1Prodi->borangS1ProdiStandar1->borangS1Prodi->akreditasiProdiS1->akreditasi->tahun}/{$this->_detailBorangS1Prodi->borangS1ProdiStandar1->borangS1Prodi->akreditasiProdiS1->id_prodi}/prodi/borang/dokumen");
            $this->dokumenPendukung->saveAs("$path/$fileName");
            $this->_detailBorangS1Prodi->save(false);
            return true;
        }

        return false;

    }

    /**
     * @return DokumenBorangS1Prodi
     */
    public function getDetailBorangS1Prodi()
    {
        return $this->_detailBorangS1Prodi;
    }

}
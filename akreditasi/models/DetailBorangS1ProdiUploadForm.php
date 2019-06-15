<?php
/**
 * Project: mutu.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 5/19/2019
 * Time: 12:55 PM
 */

namespace akreditasi\models;


use common\models\S7DetailBorangS1ProdiStandar1;
use common\models\DokumenBorangS1Prodi;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 *
 * @property DokumenBorangS1Prodi $detailBorangS1Prodi
 */

class DetailBorangS1ProdiUploadForm extends Model
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


    public function uploadDokumen($id,$standar){


        if($this->validate()){
            $detailClass = 'common\\models\\DetailBorangS1ProdiStandar'.$standar;
            $detailAttrId = 'id_borang_s1_prodi_standar'.$standar;
            $this->_detailBorangS1Prodi = new $detailClass;
//            $this->_detailBorangS1Prodi = new S7DetailBorangS1ProdiStandar1();
            $this->_detailBorangS1Prodi->$detailAttrId = $id;
            $fileName = $this->dokumenPendukung->getBaseName().'.'.$this->dokumenPendukung->getExtension();
            $this->_detailBorangS1Prodi->nama_dokumen = $fileName;
            $this->_detailBorangS1Prodi->nomor_dokumen = $this->nomorDokumen;
            $borangAttr = 'borangS1ProdiStandar'.$standar;
            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_detailBorangS1Prodi->$borangAttr->borangS1Prodi->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$this->_detailBorangS1Prodi->$borangAttr->borangS1Prodi->akreditasiProdiS1->akreditasi->tahun}/{$this->_detailBorangS1Prodi->$borangAttr->borangS1Prodi->akreditasiProdiS1->id_prodi}/prodi/borang/dokumen");
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
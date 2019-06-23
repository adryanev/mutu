<?php

namespace akreditasi\models;


use common\models\S7DetailBorangPascaProdiStandar1;
use common\models\S7DokumenBorangPascaProdi;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;


/**
 *
 * @property S7DokumenBorangPascaProdi $detailBorangPascaProdi
 */

class DetailBorangPascaProdiUploadForm extends Model {

    /**
     * @var UploadedFile
     */
    public $dokumenPendukung;
    public $nomorDokumen;

    private $_detailBorangPascaProdi;


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
            $detailClass = 'common\\models\\S7DetailBorangPascaProdiStandar'.$standar;
            $detailAttrId = 'id_borang_pasca_prodi_standar'.$standar;
            $this->_detailBorangPascaProdi = new $detailClass;
//            $this->_detailBorangPascaProdi = new S7DetailBorangPascaProdiStandar1();
            $this->_detailBorangPascaProdi->$detailAttrId = $id;
            $fileName = $this->dokumenPendukung->getBaseName().'.'.$this->dokumenPendukung->getExtension();
            $this->_detailBorangPascaProdi->nama_dokumen = $fileName;
            $this->_detailBorangPascaProdi->nomor_dokumen = $this->nomorDokumen;
            $borangAttr = 'borangPascaProdiStandar'.$standar;
            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_detailBorangPascaProdi->$borangAttr->borangPascaProdi->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$this->_detailBorangPascaProdi->$borangAttr->borangPascaProdi->akreditasiProdiPasca->akreditasi->tahun}/{$this->_detailBorangPascaProdi->$borangAttr->borangPascaProdi->akreditasiProdiPasca->id_prodi}/prodi/borang/dokumen");
            $this->dokumenPendukung->saveAs("$path/$fileName");
            $this->_detailBorangPascaProdi->save(false);
            return true;
        }

        return false;

    }

    /**
     * @return S7DokumenBorangPascaProdi
     */
    public function getDetailBorangPascaProdi()
    {
        return $this->_detailBorangPascaProdi;
    }

}
<?php
/**
 * Project: mutu.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 5/19/2019
 * Time: 12:55 PM
 */

namespace akreditasi\models;


use common\models\S7DetailBorangS1FakultasStandar1;
use common\models\S7DokumenBorangS1Fakultas;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 *
 * @property S7DokumenBorangS1Fakultas $detailBorangS1Fakultas
 */

class DetailBorangS1FakultasUploadForm extends Model
{


    /**
     * @var UploadedFile
     */
    public $dokumenPendukung;
    public $nomorDokumen;

    private $_detailBorangS1Fakultas;


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
            $detailClass = 'common\\models\\DetailBorangS1FakultasStandar'.$standar;
            $detailAttrId = 'id_borang_s1_fakultas_standar'.$standar;
            $this->_detailBorangS1Fakultas = new $detailClass;
//            $this->_detailBorangS1Fakultas = new S7DetailBorangS1FakultasStandar1();
            $this->_detailBorangS1Fakultas->$detailAttrId = $id;
            $fileName = $this->dokumenPendukung->getBaseName().'.'.$this->dokumenPendukung->getExtension();
            $this->_detailBorangS1Fakultas->nama_dokumen = $fileName;
            $this->_detailBorangS1Fakultas->nomor_dokumen = $this->nomorDokumen;
            $borangAttr = 'borangS1FakultasStandar'.$standar;
            $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_detailBorangS1Fakultas->$borangAttr->borangS1Fakultas->akreditasi->lembaga}/prodi/{$this->_detailBorangS1Fakultas->$borangAttr->borangS1Fakultas->akreditasi->tahun}/{$this->_detailBorangS1Fakultas->$borangAttr->borangS1Fakultas->id_prodi}/fakultas/borang/dokumen");
            $this->dokumenPendukung->saveAs("$path/$fileName");
            $this->_detailBorangS1Fakultas->save(false);
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
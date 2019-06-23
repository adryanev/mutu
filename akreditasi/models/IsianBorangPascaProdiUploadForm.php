<?php

namespace akreditasi\models;


use common\models\S7BorangPascaProdi;
use common\models\S7IsianBorang;
use common\models\S7IsianBorangPascaProdi;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class IsianBorangPascaProdiUploadForm extends Model {

    public $nomor_borang;

    /**
     * @var UploadedFile
     */
    public $nama_file;

    public function rules()
    {
        return [
            [['nama_file','nomor_borang'],'required'],
            ['nama_file','file','skipOnEmpty' => false],
            ['nomor_borang','string']
        ];
    }

    public function uploadFile($idBorang){

        if($this->validate()){
            $isian = S7IsianBorang::findOne(['nomor_borang'=>$this->nomor_borang,'untuk'=>'prodi']);
            $borang = S7BorangPascaProdi::findOne($idBorang);
            $model = new S7IsianBorangPascaProdi();
            $model->id_isian_borang = $isian->id;
            $model->id_borang_s1_prodi = $borang->id;

            $filename = $this->nama_file->getBaseName().'.'.$this->nama_file->getExtension();
            $model->nama_file = $filename;

            $path = Yii::getAlias('@uploadAkreditasi'. "/{$borang->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$borang->akreditasiProdiPasca->akreditasi->tahun}/{$borang->akreditasiProdiPasca->id_prodi}/prodi/borang/dokumen");

            $this->nama_file->saveAs("$path/$filename");
            $model->save(false);

            return true;
        }

        return false;

    }

}
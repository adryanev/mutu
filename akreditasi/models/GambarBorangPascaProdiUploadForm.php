<?php

namespace akreditasi\models;


use common\models\S7BorangPascaProdi;
use common\models\S7GambarBorangPascaProdi;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class GambarBorangPascaProdiUploadForm extends Model {

    public $nomor_borang;
    /**
     * @var UploadedFile[]
     */
    public $gambar_borang;

    public function rules()
    {
        return [
            ['nomor_borang','required'],
            ['nomor_borang','string'],
            [['gambar_borang'],'file','skipOnEmpty' => false,'extensions' => 'png, jpg, jpeg','maxFiles' => 5]
        ];
    }

    public function uploadGambar($id){

        if($this->validate()){
            $borang = S7BorangPascaProdi::findOne($id);
            $path = Yii::getAlias('@uploadAkreditasi/'."{$borang->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$borang->akreditasiProdiPasca->akreditasi->tahun}/{$borang->akreditasiProdiPasca->id_prodi}/prodi/gambar");

            foreach ($this->gambar_borang as $gambar){
                $model = new S7GambarBorangPascaProdi();
                $model->id_borang_pasca_prodi = $borang->id;
                $model->nomor_borang = $this->nomor_borang;
                $fileName = $gambar->getBaseName().'.'.$gambar->getExtension();
                $model->nama_file = $fileName;
                $gambar->saveAs("$path/$fileName");
                $model->save(false);
            }

            return true;
        }

        return false;
    }

}
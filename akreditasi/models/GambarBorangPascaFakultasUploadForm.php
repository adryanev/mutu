<?php


namespace akreditasi\models;


use common\models\S7BorangPascaFakultas;
use common\models\S7GambarBorangPascaFakultas;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class GambarBorangPascaFakultasUploadForm extends Model {

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
            [['gambar_borang'],'file','skipOnEmpty' => false,'maxFiles' => 5]
        ];
    }

    public function uploadGambar($id){

        if($this->validate()){
            $borang = S7BorangPascaFakultas::findOne($id);
            $path = Yii::getAlias('@uploadAkreditasi/'."{$borang->akreditasi->lembaga}/prodi/{$borang->akreditasi->tahun}/fakultas/{$borang->id_fakultas}/gambar");

            foreach ($this->gambar_borang as $gambar){
                $model = new S7GambarBorangPascaFakultas();
                $model->id_borang_s1_fakultas = $borang->id;
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
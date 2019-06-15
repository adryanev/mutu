<?php
/**
 * Project: mutu.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 5/20/2019
 * Time: 9:37 PM
 */

namespace akreditasi\models;


use common\models\S7BorangS1Prodi;
use common\models\GambarBorangS1Prodi;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class GambarBorangS1ProdiUploadForm extends Model
{

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
            $borang = S7BorangS1Prodi::findOne($id);
            $path = Yii::getAlias('@uploadAkreditasi/'."{$borang->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$borang->akreditasiProdiS1->akreditasi->tahun}/{$borang->akreditasiProdiS1->id_prodi}/prodi/gambar");

            foreach ($this->gambar_borang as $gambar){
                $model = new GambarBorangS1Prodi();
                $model->id_borang_s1_prodi = $borang->id;
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
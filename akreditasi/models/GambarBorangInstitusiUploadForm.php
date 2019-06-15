<?php
/**
 * Project: mutu.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 5/20/2019
 * Time: 9:37 PM
 */

namespace akreditasi\models;


use common\models\S7BorangInstitusi;
use common\models\GambarBorangInstitusi;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class GambarBorangInstitusiUploadForm extends Model
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
            $borang = S7BorangInstitusi::findOne($id);
            $path = Yii::getAlias('@uploadAkreditasi/'."{$borang->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$borang->akreditasiInstitusi->akreditasi->tahun}/gambar");

            foreach ($this->gambar_borang as $gambar){
                $model = new GambarBorangInstitusi();
                $model->id_borang_institusi = $borang->id;
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
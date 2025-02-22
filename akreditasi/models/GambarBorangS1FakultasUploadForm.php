<?php
/**
 * Project: mutu.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 5/20/2019
 * Time: 9:37 PM
 */

namespace akreditasi\models;


use Carbon\Carbon;
use common\models\S7BorangS1Fakultas;
use common\models\S7GambarBorangS1Fakultas;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class GambarBorangS1FakultasUploadForm extends Model
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
            [['gambar_borang'],'file','skipOnEmpty' => false,'maxFiles' => 5]
        ];
    }

    public function uploadGambar($id){

        if($this->validate()){
            $borang = S7BorangS1Fakultas::findOne($id);
            $path = Yii::getAlias('@uploadAkreditasi/'."{$borang->akreditasi->lembaga}/prodi/{$borang->akreditasi->tahun}/fakultas/{$borang->id_fakultas}/gambar");

            foreach ($this->gambar_borang as $gambar){
                $timestamp = Carbon::now()->timestamp;

                $model = new S7GambarBorangS1Fakultas();
                $model->id_borang_s1_fakultas = $borang->id;
                $model->nomor_borang = $this->nomor_borang;
                $fileName = $gambar->getBaseName().'.'.$gambar->getExtension();
                $model->nama_file = $timestamp .'-'.$fileName;
                $gambar->saveAs("$path/$fileName");
                $model->save(false);
            }

            return true;
        }

        return false;
    }
}
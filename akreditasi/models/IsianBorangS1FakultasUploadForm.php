<?php
/**
 * Project: mutu.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 5/20/2019
 * Time: 3:42 PM
 */

namespace akreditasi\models;


use common\models\S7BorangS1Fakultas;
use common\models\S7IsianBorang;
use common\models\S7IsianBorangS1Fakultas;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class IsianBorangS1FakultasUploadForm extends Model
{

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
            $isian = S7IsianBorang::findOne(['nomor_borang'=>$this->nomor_borang,'untuk'=>'fakultas']);
            $borang = S7BorangS1Fakultas::findOne($idBorang);
            $model = new S7IsianBorangS1Fakultas();
            $model->id_isian_borang = $isian->id;
            $model->id_borang_s1_fakultas = $borang->id;

            $filename = $this->nama_file->getBaseName().'.'.$this->nama_file->getExtension();
            $model->nama_file = $filename;

            $path = Yii::getAlias('@uploadAkreditasi'. "/{$borang->akreditasi->lembaga}/prodi/{$borang->akreditasi->tahun}/fakultas/{$borang->id_fakultas}/borang/dokumen");

            $this->nama_file->saveAs("$path/$filename");
            $model->save(false);

            return true;
        }

        return false;

    }
}
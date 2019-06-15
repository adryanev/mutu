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
use common\models\IsianBorang;
use common\models\IsianBorangS1Fakultas;
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
            $isian = IsianBorang::findOne(['nomor_borang'=>$this->nomor_borang,'untuk'=>'fakultas']);
            $borang = S7BorangS1Fakultas::findOne($idBorang);
            $model = new IsianBorangS1Fakultas();
            $model->id_isian_borang = $isian->id;
            $model->id_borang_s1_fakultas = $borang->id;

            $filename = $this->nama_file->getBaseName().'.'.$this->nama_file->getExtension();
            $model->nama_file = $filename;

            $path = Yii::getAlias('@uploadAkreditasi'. "/{$borang->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$borang->akreditasiProdiS1->akreditasi->tahun}/{$borang->akreditasiProdiS1->id_prodi}/fakultas/borang/dokumen");

            $this->nama_file->saveAs("$path/$filename");
            $model->save(false);

            return true;
        }

        return false;

    }
}
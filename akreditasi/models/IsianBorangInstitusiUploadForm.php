<?php
/**
 * Project: mutu.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 5/20/2019
 * Time: 3:42 PM
 */

namespace akreditasi\models;


use Carbon\Carbon;
use common\models\S7BorangInstitusi;
use common\models\S7IsianBorang;
use common\models\S7IsianBorangInstitusi;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class IsianBorangInstitusiUploadForm extends Model
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

        $timestamp = Carbon::now()->timestamp;

        if($this->validate()){
            $isian = S7IsianBorang::findOne(['nomor_borang'=>$this->nomor_borang,'untuk'=>'prodi']);
            $borang = S7BorangInstitusi::findOne($idBorang);
            $model = new S7IsianBorangInstitusi();
            $model->id_isian_borang = $isian->id;
            $model->id_borang_institusi = $borang->id;

            $filename = $this->nama_file->getBaseName().'.'.$this->nama_file->getExtension();
            $model->nama_file = $timestamp.'-'.$filename;

            $path = Yii::getAlias('@uploadAkreditasi'. "/{$borang->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$borang->akreditasiInstitusi->akreditasi->tahun}/borang/dokumen");

            $this->nama_file->saveAs("$path/$filename");
            $model->save(false);

            return true;
        }

        return false;

    }
}
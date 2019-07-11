<?php

namespace akreditasi\modules\standar7\controllers;

use common\models\led\S7LedProdiS1Detail;
use common\models\ProgramStudi;
use common\models\S7Akreditasi;
use common\models\S7AkreditasiInstitusi;
use common\models\S7AkreditasiProdiS1;
use common\models\S7DataKuantitatifInstitusi;
use common\models\S7DataKuantitatifProdi;
use Yii;
use yii\base\DynamicModel;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;

class KuantitatifController extends \yii\web\Controller {


    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }

    public function actionProdi(){

        $model = new DynamicModel(['akreditasi','prodi']);
        $model->addRule(['akreditasi'], 'required');
        $model->addRule(['prodi'], 'required');

//        $modelInstitusi = new DynamicModel(['akreditasi_ins']);
//        $modelInstitusi->addRule(['akreditasi_ins'], 'required');

        $idProdi = ProgramStudi::find()->all();
        $dataProdi = ArrayHelper::map($idProdi,'id',function($data){
            return $data->nama . " ({$data->jenjang})";
        });

        $idAkreditasi = S7Akreditasi::findAll(['id_jenis_akreditasi'=>2]);
        $dataAkreditasi = ArrayHelper::map($idAkreditasi,'id',function($data){
            return $data->lembaga. ' - '.$data->nama. ' ('.$data->tahun.')';
        });

//        $idAkreInstitusi = S7Akreditasi::findAll(['id_jenis_akreditasi'=>1]);
//        $dataAkreInstitusi = ArrayHelper::map($idAkreInstitusi, 'id', function ($data){
//            return $data->lembaga. ' - '. $data->nama. ' ('. $data->tahun.')';
//        });

        if($model->load(Yii::$app->request->post())){

            return $this->redirect(['kuantitatif/unggah', 'id'=>$model->prodi]);
        }

//        if ($modelInstitusi->load(Yii::$app->request->post())){
//            return $this->redirect(['kuantitatif/unggah-institusi', 'id'=>$modelInstitusi->akreditasi_ins]);
//        }

        return $this->render('prodi', [
            'model'=>$model,
            'dataProdi' => $dataProdi,
            'dataAkreditasi' => $dataAkreditasi,
        ]);


    }

    public function actionUnggah($id){

        $id_akre = S7AkreditasiProdiS1::find()->where(['id_prodi'=>$id])->one();

        $dataKuantitatifProdi = S7DataKuantitatifProdi::find()->where(['id_akreditasi_prodi_s1'=>$id_akre->id, ])->all();

        $model = new S7DataKuantitatifProdi();

        if ($model->load(Yii::$app->request->post())){

            $file = UploadedFile::getInstance($model,'nama_dokumen');
            $fileName = $file->getBaseName() . '.' . $file->getExtension();
            $model->id_akreditasi_prodi_s1 = $id_akre->id;
            $model->nama_dokumen = $fileName;
            $path = Yii::getAlias("@uploadAkreditasi/kuantitatif/");

            if(!$file->saveAs($path.$fileName)){
                throw new Exception("Gagal Mengupload File");
            }

            if(!$model->save()){
                throw new Exception("Gagal Menyimpan Data Kuantitatif");
            }

            Yii::$app->session->setFlash('success','Berhasil Mengupload Dokumen Kuantitatif.');

            $this->redirect(Url::current());

        }

        return $this->render('unggah', [
            'akreprodis1' => $id_akre,
            'dataKuantitatifProdi' => $dataKuantitatifProdi,
            'model' => $model
        ]);
    }

    public function actionDownloadDokumen($dokumen){
        ini_set('max_execution_time', 5*60);
        $template = S7DataKuantitatifProdi::findOne($dokumen);
        $file = Yii::getAlias('@uploadAkreditasi/kuantitatif/'.$template->nama_dokumen);
        return Yii::$app->response->sendFile($file);
    }

    public function actionHapusDokumen(){
        if(Yii::$app->request->isPost){

            $id = Yii::$app->request->post('id');
            $id_prodi = Yii::$app->request->post('id_prodi');

            $model= S7DataKuantitatifProdi::findOne($id);

            unlink(Yii::getAlias('@uploadAkreditasi/kuantitatif/'.$model->nama_dokumen));

            $model->delete();

            Yii::$app->session->setFlash('success','Berhasil Menghapus Gambar');
            return $this->redirect(['kuantitatif/unggah','id'=>$id_prodi]);

        }

        throw new BadRequestHttpException('Request Harus Post');
    }

}
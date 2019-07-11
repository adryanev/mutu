<?php

namespace akreditasi\modules\standar7\controllers;

use common\models\S7Akreditasi;
use common\models\S7AkreditasiInstitusi;
use common\models\S7DataKuantitatifInstitusi;
use Yii;
use yii\base\DynamicModel;
use yii\base\Exception;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\UploadedFile;

class KuantitatifInstitusiController extends Controller{

    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }

    public function actionArsip(){
//        $model = new DynamicModel(['akreditasi','prodi']);
//        $model->addRule(['akreditasi'], 'required');
//        $model->addRule(['prodi'], 'required');

        $modelInstitusi = new DynamicModel(['akreditasi_ins']);
        $modelInstitusi->addRule(['akreditasi_ins'], 'required');

//        $idProdi = ProgramStudi::find()->all();
//        $dataProdi = ArrayHelper::map($idProdi,'id',function($data){
//            return $data->nama . " ({$data->jenjang})";
//        });

//        $idAkreditasi = S7Akreditasi::findAll(['id_jenis_akreditasi'=>2]);
//        $dataAkreditasi = ArrayHelper::map($idAkreditasi,'id',function($data){
//            return $data->lembaga. ' - '.$data->nama. ' ('.$data->tahun.')';
//        });

        $idAkreInstitusi = S7Akreditasi::findAll(['id_jenis_akreditasi'=>1]);
        $dataAkreInstitusi = ArrayHelper::map($idAkreInstitusi, 'id', function ($data){
            return $data->lembaga. ' - '. $data->nama. ' ('. $data->tahun.')';
        });

//        if($model->load(Yii::$app->request->post())){
//
//            return $this->redirect(['kuantitatif/unggah', 'id'=>$model->prodi]);
//        }

        if ($modelInstitusi->load(Yii::$app->request->post())){
            return $this->redirect(['kuantitatif-institusi/unggah', 'id'=>$modelInstitusi->akreditasi_ins]);
        }

        return $this->render('arsip', [
            'modelInstitusi'=>$modelInstitusi,
            'dataAkreInstitusi' => $dataAkreInstitusi,
        ]);
    }

    public function actionUnggah($id){
//        $id_akre = S7AkreditasiProdiS1::find()->where(['id_prodi'=>$id])->one();
        $id_akre_institusi = S7AkreditasiInstitusi::find()->where(['id_akreditasi'=>$id])->one();

//        $dataKuantitatifProdi = S7DataKuantitatifProdi::find()->where(['id_akreditasi_prodi_s1'=>$id_akre->id, ])->all();
        $dataKuantitatifInstitusi = S7DataKuantitatifInstitusi::find()->where(['id_akreditasi'=>$id_akre_institusi->id])->all();

//        $model = new S7DataKuantitatifProdi();
        $model = new S7DataKuantitatifInstitusi();

        if ($model->load(Yii::$app->request->post())){

            $file = UploadedFile::getInstance($model,'nama_dokumen');
            $fileName = $file->getBaseName() . '.' . $file->getExtension();
            $model->id_akreditasi = $id_akre_institusi->id;
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
            'akreinstitusi' => $id_akre_institusi,
            'dataKuantitatifInstitusi' => $dataKuantitatifInstitusi,
            'model' => $model
        ]);
    }

    public function actionDownloadDokumen($dokumen){
        ini_set('max_execution_time', 5*60);
        $template = S7DataKuantitatifInstitusi::findOne($dokumen);
        $file = Yii::getAlias('@uploadAkreditasi/kuantitatif/'.$template->nama_dokumen);
        return Yii::$app->response->sendFile($file);
    }

    public function actionHapusDokumen(){
        if(Yii::$app->request->isPost){

            $id = Yii::$app->request->post('id');
            $id_institusi = Yii::$app->request->post('id_institusi');

            $model= S7DataKuantitatifInstitusi::findOne($id);

            unlink(Yii::getAlias('@uploadAkreditasi/kuantitatif/'.$model->nama_dokumen));

            $model->delete();

            Yii::$app->session->setFlash('success','Berhasil Menghapus File');
            return $this->redirect(['kuantitatif-institusi/unggah','id'=>$id_institusi]);

        }

        throw new BadRequestHttpException('Request Harus Post');
    }
}
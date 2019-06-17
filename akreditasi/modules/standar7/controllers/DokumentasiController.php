<?php

namespace akreditasi\modules\standar7\controllers;

use Yii;
use common\models\S7Akreditasi;
use common\models\PencarianDokumentasiProdiForm;
use common\models\PencarianDokumentasiInstitusiForm;
//use common\models\Program;
use common\models\ProgramStudi;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

class DokumentasiController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $this->layout="main";
        if($this->action->id === 'cari-dok'){
            $this->enableCsrfValidation = false;
        }

        return true;
    }

    public function actionArsipDok($target){

        $model = new PencarianDokumentasiProdiForm();
        $modelInstitusi = new PencarianDokumentasiInstitusiForm();

        $idAkreditasi = S7Akreditasi::findAll(['id_jenis_akreditasi'=>2]);
        $dataAkreditasi = ArrayHelper::map($idAkreditasi,'id',function($data){
            return $data->lembaga. ' - '.$data->nama. '('.$data->tahun.')';
        });

        $idAkreditasiInstitusi = S7Akreditasi::findAll(['id_jenis_akreditasi'=>1]);
        $dataAkreditasiInstitusi = ArrayHelper::map($idAkreditasiInstitusi,'id',function($data){
            return $data->lembaga. ' - '.$data->nama. '('.$data->tahun.')';
        });

        $dataProgram = ArrayHelper::map(ProgramStudi::find()->all(),'id','jenjang');
        if($model->load(\Yii::$app->request->post())){

            $url = $model->cari($target);
            $dokumentasi = $model->getDokumentasi();
            if(!$dokumentasi){
                throw new NotFoundHttpException('Data yang anda cari tidak ditemukan');
            }
            $dokId = $dokumentasi->id;
            $this->redirect([$url,'dokumentasi'=>$dokId]);

        }
        if($modelInstitusi->load(Yii::$app->request->post())){
            $url = $modelInstitusi->cari($target);
            $dokumentasi = $modelInstitusi->getDok();
            if(!$dokumentasi){
                throw new NotFoundHttpException("Data yang anda cari tidak ditemukan");
            }

            $dokId = $dokumentasi->id;
            $this->redirect([$url,'dokumentasi'=>$dokId]);
        }

        return $this->render('cari_dok',[
            'model'=>$model,
            'dataAkreditasi'=>$dataAkreditasi,
            'dataAkreditasiInstitusi'=>$dataAkreditasiInstitusi,
            'dataProgram'=>$dataProgram,
            'modelInstitusi'=>$modelInstitusi,
            'target'=>$target

        ]);

    }



    public function actionCariDok(){

        $this->enableCsrfValidation = false;

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $arrayProdi = [];

        if(isset($_POST['depdrop_parents'])){
            $parent = $_POST['depdrop_parents'];
            if($parent!==null){
                $id = $parent[0];
                $dataProdi = ProgramStudi::findAll(['id'=>$id]);
                foreach ($dataProdi as $data){
                    $id = $data->id;
                    $nama = $data->nama ;
                    $jenjang = $data->jenjang;
                    $newArray = ['id'=>$id,'name'=>$nama, 'jenjang'=>$jenjang];
                    $arrayProdi[] = $newArray;
                }


                return['output'=>$arrayProdi, 'selected'=>''];
            }
        }
        return['output'=>'', 'selected'=>''];

    }

    public function actionIsi()
    {
        return $this->render('isi');
    }
    public function actionLihatDok()
    {
        return $this->render('lihat_dok');
    }
    public function actionLihatIsiDok()
    {
        return $this->render('lihat_isi_dok');
    }
    public function actionLihatPenanggung()
    {
        return $this->render('lihat_penanggung');
    }
    public function actionLihat()
    {
        return $this->render('lihat');
    }
    public function actionPenanggung()
    {
        return $this->render('penanggung');
    }
}

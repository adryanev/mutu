<?php

namespace akreditasi\modules\standar7\controllers;

use Yii;
use common\models\S7Akreditasi;
use common\models\PencarianDokumentasiProdiForm;
use common\models\Program;
use common\models\ProgramStudi;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

class DokumentasiController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionArsipDok(){

        $model = new PencarianDokumentasiProdiForm();
        $idAkreditasi = S7Akreditasi::find()->all();
        $dataAkreditasi = ArrayHelper::map($idAkreditasi,'id',function($data){
           return $data->lembaga. ' - '.$data->nama. '('.$data->tahun.')';
        });



        $dataProgram = ArrayHelper::map(Program::find()->all(),'id','nama');
        if($model->load(\Yii::$app->request->post())){


            $url = $model->cari();
            $dokumentasi = $model->getDokumentasi();
            if(!$dokumentasi){
                throw new NotFoundHttpException('Data yang anda cari tidak ditemukan');
            }
            $dokId = $dokumentasi->id;
            $this->redirect([$url,'dokumentasi'=>$dokId]);

        }
        return $this->render('cari_dok',[
            'model'=>$model,
            'dataAkreditasi'=>$dataAkreditasi,
            'dataProgram'=>$dataProgram,
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
                $dataProdi = ProgramStudi::findAll(['id_program'=>$id]);
                foreach ($dataProdi as $data){
                    $id = $data->id;
                    $nama = $data->nama . '('.$data->program->nama.')';
                    $newArray = ['id'=>$id,'name'=>$nama];
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

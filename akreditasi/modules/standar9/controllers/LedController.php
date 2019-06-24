<?php

namespace akreditasi\modules\standar9\controllers;

use common\models\FakultasAkademi;
use common\models\PencarianDokumentasiFakultasForm;
use common\models\PencarianDokumentasiInstitusiForm;
use common\models\PencarianDokumentasiProdiForm;
use common\models\ProgramStudi;
use common\models\S7Akreditasi;
use Yii;
use yii\base\DynamicModel;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class LedController extends \yii\web\Controller
{

    public function actionArsipDok(){

        $model = new DynamicModel(['akreditasi','untuk']);
        $model->addRule('akreditasi','required');
        $model->addRule('untuk','required');

        $dataAkreditasi = [1=>'Akreditasi Program Studi (2019)'];
        $dataAkreditasiInstitusi = [1=>'Akreditasi Institusi (2019)'];
        $dataProgram = ['S1'=>'S1','S2'=>'S2'];

        $modelInstitusi = new DynamicModel(['akreditasi','untuk']);
        $modelInstitusi->addRule('akreditasi','required');
        $modelInstitusi->addRule('untuk','required');

        $modelFakultas = new DynamicModel(['akreditasi','untuk']);
        $modelFakultas->addRule('akreditasi','required');
        $modelFakultas->addRule('untuk','required');


        if($model->load(Yii::$app->request->post())){

        }

        if($modelFakultas->load(Yii::$app->request->post())){

        }

        if($modelInstitusi->load(Yii::$app->request->post())){

            return $this->redirect(['lk-institusi/arsip']);
        }
        return $this->render('cari-dok',[
            'model'=>$model,
            'dataAkreditasi'=>$dataAkreditasi,
            'dataAkreditasiInstitusi'=>$dataAkreditasiInstitusi,
            'dataProgram'=>$dataProgram,
            'modelInstitusi'=>$modelInstitusi,
            'modelFakultas'=>$modelFakultas,
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
                $dataProdi = ProgramStudi::findAll(['jenjang'=>$id]);
                foreach ($dataProdi as $data){
                    $id = $data->id;
                    $nama = $data->nama . '('.$data->jenjang.')';
                    $newArray = ['id'=>$id,'name'=>$nama];
                    $arrayProdi[] = $newArray;
                }


                return['output'=>$arrayProdi, 'selected'=>''];
            }
        }
        return['output'=>'', 'selected'=>''];

    }

    public function actionCariFakultas(){
        $this->enableCsrfValidation = false;

        Yii::$app->response->format = Response::FORMAT_JSON;
        $arrayProdi = [];

        if(isset($_POST['depdrop_parents'])){
            $parent = $_POST['depdrop_parents'];
            if($parent!==null){
                $id = $parent[0];
                $dataFakultas = FakultasAkademi::find()->all();
                foreach ($dataFakultas as $data){
                    $id = $data->id;
                    $nama = $data->nama;
                    $newArray = ['id'=>$id,'name'=>$nama];
                    $arrayProdi[] = $newArray;
                }

                return ['output'=>$arrayProdi, 'selected'=>''];
            }
        }
        return ['output'=>'', 'selected'=>''];
    }

    public function beforeAction($action)
    {
        $this->layout="main";
        if($this->action->id === 'cari-prodi'){
            $this->enableCsrfValidation = false;
        }
        if($this->action->id === 'cari-fakultas'){
            $this->enableCsrfValidation = false;
        }

        return true;
    }


}

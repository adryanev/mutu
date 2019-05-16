<?php

namespace akreditasi\controllers;

use common\models\Akreditasi;
use common\models\PencarianBorangProdiForm;
use common\models\Program;
use common\models\ProgramStudi;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

class BorangController extends \yii\web\Controller
{

    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionArsipBorang(){


        $model = new PencarianBorangProdiForm();
        $idAkreditasi = Akreditasi::find()->all();
        $dataAkreditasi = ArrayHelper::map($idAkreditasi,'id',function($data){
           return $data->lembaga. ' - '.$data->nama. '('.$data->tahun.')';
        });



        $dataProgram = ArrayHelper::map(Program::find()->all(),'id','nama');
        if($model->load(\Yii::$app->request->post())){


            $url = $model->cari();
            $borang = $model->getBorang();
            if(!$borang){
                throw new NotFoundHttpException('Data yang anda cari tidak ditemukan');
            }
            $borangId = $borang->id;
            $this->redirect([$url,'borang'=>$borangId]);

        }
        return $this->render('arsip',[
            'model'=>$model,
            'dataAkreditasi'=>$dataAkreditasi,
            'dataProgram'=>$dataProgram,
           ]);
    }
    public function actionUnggah()
    {
        return $this->render('unggah');
    }

    public function actionCari(){

        return $this->render('cari');
    }

    public function actionLihatUnggah(){
        return $this->render('lihat_unggah');
    }

    public function actionIsi(){
        return $this->render('isi');
    }

    public function actionLihatIsi(){
        return $this->render('lihat_isi');
    }

    public function actionLihat(){
        return $this->render('lihat');
    }

    public function actionLihatLihat(){
        return $this->render('lihat_lihat');
    }

    public function actionCariProdi(){
        $this->enableCsrfValidation = false;

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

                echo Json::encode(['output'=>$arrayProdi, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function beforeAction($action)
    {
        if($this->action->id === 'cari-prodi'){
            $this->enableCsrfValidation = false;
        }

        return true;
    }


}

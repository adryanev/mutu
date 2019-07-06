<?php

namespace akreditasi\modules\standar7\controllers;

use common\models\led\S7LedInstitusi;
use common\models\led\S7LedInstitusiDetail;
use common\models\S7Akreditasi;
use common\models\S7AkreditasiInstitusi;
use Yii;
use yii\base\DynamicModel;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class LedInstitusiController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [

                    ['actions' => ['arsip', 'index', 'lihat', 'download', 'hapus'],
                        'allow' => true,
                        'roles' => ['adminLpm', 'superUser', 'adminFakultas', 'userFakultas']
                    ],

                ]
            ],
        ];
    }
    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }


    public function actionArsip()
    {

        $model = new DynamicModel(['akreditasi']);
        $model->addRule('akreditasi','required');

        $dataAkreditasi  = ArrayHelper::map(S7AkreditasiInstitusi::find()->all(),'id',function($akreditasi){
            return 'Akreditasi Insitusi ('.$akreditasi->akreditasi->tahun.")";
        });
        if($model->load(Yii::$app->request->post())){

            $id_akreditasi = $model->akreditasi;

            if(empty($id_akreditasi)){
                throw new NotFoundHttpException("Halaman yang anda cari tidak ditemukan");
            }
            return $this->redirect(['led-prodi-s1/index','akreditasi'=>$id_akreditasi]);

        }

        return $this->render('arsip',[
            'model'=>$model,
            'dataAkreditasi'=>$dataAkreditasi,
        ]);

    }

    public function actionIndex($akreditasi){

        $led = S7LedInstitusi::findOne(['id_akreditasi_institusi'=>$akreditasi]);
        $model = new S7LedInstitusiDetail();
        $file = file_get_contents(Yii::getAlias('@common/required/led/led.json'));
        $json = Json::decode($file);

        $model->id_led_institusi = $led->id;

        if($model->load(Yii::$app->request->post())){
            $file = UploadedFile::getInstance($model,'file');
            $fileName = $file->getBaseName() . '.' . $file->getExtension();
            $model->file = $fileName;
            $path = Yii::getAlias("@uploadAkreditasi/{$led->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$led->akreditasiInstitusi->akreditasi->tahun}/led/");

            if(!$file->saveAs($path.$fileName)){
                throw new Exception("Gagal Mengupload File");
            }

            if(!$model->save()){
                throw new Exception("Gagal Menyimpan Data LED");
            }

            Yii::$app->session->setFlash('success','Berhasil Mengupload Dokumen Led.');

            $this->redirect(Url::current());

        }

        return $this->render('index',[
            'model'=>$model,
            'json'=>$json
        ]);

    }

    public function actionLihat($id){

        $template = S7LedInstitusiDetail::findOne($id);
        return $this->redirect(Url::to('@web/upload'."/{$template->ledInstitusi->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$template->ledInstitusi->akreditasiInstitusi->akreditasi->tahun}/led/{$template->file}"));


    }

    public function actionDownload($id){

        ini_set('max_execution_time', 5*60);
        $template = S7LedInstitusiDetail::findOne($id);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$template->ledInstitusi->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$template->ledInstitusi->akreditasiInstitusi->akreditasi->tahun}/led/{$template->file}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapus(){
        if(Yii::$app->request->isPost){

            $id = Yii::$app->request->post('id');
            $akreditasi = Yii::$app->request->post('akreditasi');

            $model= S7LedInstitusiDetail::findOne($id);

            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->ledInstitusi->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$model->ledInstitusi->akreditasiInstitusi->akreditasi->tahun}/led/{$model->file}"));

            $model->delete();

            Yii::$app->session->setFlash('success','Berhasil Menghapus Gambar');
            return $this->redirect(['led-institusi/index','akreditasi'=>$akreditasi]);


        }

        throw new BadRequestHttpException('Request Harus Post');

    }

}

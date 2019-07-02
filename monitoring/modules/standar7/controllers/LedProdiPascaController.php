<?php

namespace monitoring\modules\standar7\controllers;

use common\models\led\S7LedProdiPasca;
use common\models\led\S7LedProdiPascaDetail;
use common\models\ProgramStudi;
use common\models\S7Akreditasi;
use common\models\S7AkreditasiProdiPasca;
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

class LedProdiPascaController extends \yii\web\Controller
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

        $model = new DynamicModel(['akreditasi','prodi']);
        $model->addRule('akreditasi','required');
        $model->addRule('prodi','required');

        $dataAkreditasi  = ArrayHelper::map(S7Akreditasi::find()->all(),'id','nama');
        $dataProdi = ArrayHelper::map(ProgramStudi::findAll(['jenjang'=>'pasca']),'id','nama');
        if($model->load(Yii::$app->request->post())){

            if(empty($id_akreditasi)){
                throw new NotFoundHttpException("Halaman yang anda cari tidak ditemukan");
            }
            if(empty($id_prodi)){
                throw new NotFoundHttpException("Halaman yang anda cari tidak ditemukan");
            }
            $id_akreditasi = $model->akreditasi;
            $id_prodi = $model->prodi;


            return $this->redirect(['led-prodi-s1/index','akreditasi'=>$id_akreditasi,'prodi'=>$id_prodi]);

        }

        return $this->render('arsip',[
            'model'=>$model,
            'dataAkreditasi'=>$dataAkreditasi,
            'dataProdi'=>$dataProdi
        ]);

    }

    public function actionIndex($akreditasi,$prodi){

        $akredProdi = S7AkreditasiProdiPasca::findOne(['id_akreditasi'=>$akreditasi,'id_prodi'=>$prodi]);
        $led = S7LedProdiPasca::findOne(['id_akreditasi_prodi_s1'=>$akredProdi->id]);
        $model = new S7LedProdiPascaDetail();
        $file = file_get_contents(Yii::getAlias('@common/required/led/led.json'));
        $json = Json::decode($file);

        $model->id_led_prodi_s1 = $led->id;

        if($model->load(Yii::$app->request->post())){
            $file = UploadedFile::getInstance($model,'file');
            $fileName = $file->getBaseName() . '.' . $file->getExtension();
            $model->file = $fileName;
            $path = Yii::getAlias("@uploadAkreditasi/{$led->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$led->akreditasiProdiPasca->akreditasi->tahun}/{$led->akreditasiProdiPasca->id_prodi}/prodi/led/");

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

        $template = S7LedProdiPascaDetail::findOne($id);
        return $this->redirect(Url::to('@web/upload'."/{$template->ledProdiPasca->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$template->ledProdiPasca->akreditasiProdiPasca->akreditasi->tahun}/{$template->ledProdiPasca->akreditasiProdiPasca->id_prodi}/prodi/led/{$template->file}"));


    }

    public function actionDownload($id){

        ini_set('max_execution_time', 5*60);
        $template = S7LedProdiPascaDetail::findOne($id);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$template->ledProdiPasca->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$template->ledProdiPasca->akreditasiProdiPasca->akreditasi->tahun}/{$template->ledProdiPasca->akreditasiProdiPasca->id_prodi}/prodi/led/{$template->file}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapus(){
        if(Yii::$app->request->isPost){

            $id = Yii::$app->request->post('id');
            $akreditasi = Yii::$app->request->post('akreditasi');
            $prodi = Yii::$app->request->post('prodi');

            $model= S7LedProdiPascaDetail::findOne($id);

            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->ledProdiPasca->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$model->ledProdiPasca->akreditasiProdiPasca->akreditasi->tahun}/{$model->ledProdiPasca->akreditasiProdiPasca->id_prodi}/prodi/led/{$model->file}"));

            $model->delete();

            Yii::$app->session->setFlash('success','Berhasil Menghapus Gambar');
            return $this->redirect(['led-prodi-s1/index','akreditasi'=>$akreditasi,'prodi'=>$prodi]);


        }

        throw new BadRequestHttpException('Request Harus Post');

    }

}

<?php

namespace akreditasi\modules\standar7\controllers;

use common\models\led\S7LedProdiS1;
use common\models\led\S7LedProdiS1Detail;
use common\models\ProgramStudi;
use common\models\S7Akreditasi;
use common\models\S7AkreditasiProdiS1;
use Yii;
use yii\base\DynamicModel;
use yii\base\Exception;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;

class LedProdiS1Controller extends \yii\web\Controller
{
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
        $dataProdi = ArrayHelper::map(ProgramStudi::findAll(['jenjang'=>'S1']),'id','nama');
        if($model->load(Yii::$app->request->post())){

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

        $akredProdi = S7AkreditasiProdiS1::findOne(['id_akreditasi'=>$akreditasi,'id_prodi'=>$prodi]);
        $led = S7LedProdiS1::findOne(['id_akreditasi_prodi_s1'=>$akredProdi->id]);
        $model = new S7LedProdiS1Detail();
        $file = file_get_contents(Yii::getAlias('@common/required/led/led.json'));
        $json = Json::decode($file);

        $model->id_led_prodi_s1 = $led->id;

        if($model->load(Yii::$app->request->post())){
            $file = UploadedFile::getInstance($model,'file');
            $fileName = $file->getBaseName() . '.' . $file->getExtension();
            $model->file = $fileName;
            $path = Yii::getAlias("@uploadAkreditasi/{$led->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$led->akreditasiProdiS1->akreditasi->tahun}/{$led->akreditasiProdiS1->id_prodi}/prodi/led/");

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

        $template = S7LedProdiS1Detail::findOne($id);
       return $this->redirect(Url::to('@web/upload'."/{$template->ledProdiS1->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$template->ledProdiS1->akreditasiProdiS1->akreditasi->tahun}/{$template->ledProdiS1->akreditasiProdiS1->id_prodi}/prodi/led/{$template->file}"));


    }

    public function actionDownload($id){

        ini_set('max_execution_time', 5*60);
        $template = S7LedProdiS1Detail::findOne($id);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$template->ledProdiS1->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$template->ledProdiS1->akreditasiProdiS1->akreditasi->tahun}/{$template->ledProdiS1->akreditasiProdiS1->id_prodi}/prodi/led/{$template->file}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapus(){
        if(Yii::$app->request->isPost){

            $id = Yii::$app->request->post('id');
            $akreditasi = Yii::$app->request->post('akreditasi');
            $prodi = Yii::$app->request->post('prodi');

            $model= S7LedProdiS1Detail::findOne($id);

            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->ledProdiS1->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$model->ledProdiS1->akreditasiProdiS1->akreditasi->tahun}/{$model->ledProdiS1->akreditasiProdiS1->id_prodi}/prodi/led/{$model->file}"));

            $model->delete();

            Yii::$app->session->setFlash('success','Berhasil Menghapus Gambar');
            return $this->redirect(['led-prodi-s1/index','akreditasi'=>$akreditasi,'prodi'=>$prodi]);


        }

        throw new BadRequestHttpException('Request Harus Post');

    }


}

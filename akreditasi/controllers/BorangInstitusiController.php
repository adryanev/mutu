<?php

namespace akreditasi\controllers;

use akreditasi\models\BorangInstitusiForm;

use akreditasi\models\GambarBorangInstitusiUploadForm;
use akreditasi\models\IsianBorangInstitusiUploadForm;
use common\models\S7BorangInstitusi;
use common\models\S7BorangInstitusiStandar1;
use common\models\S7BorangInstitusiStandar2;
use common\models\S7BorangInstitusiStandar3;
use common\models\S7BorangInstitusiStandar4;
use common\models\S7BorangInstitusiStandar5;
use common\models\S7BorangInstitusiStandar6;
use common\models\S7BorangInstitusiStandar7;
use common\models\S7DokumenBorangInstitusi;
use common\models\GambarBorangInstitusi;
use common\models\IsianBorang;
use common\models\IsianBorangInstitusi;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;

class BorangInstitusiController extends \yii\web\Controller
{

    public function actionUnggah($borang){

        $borangInstitusi = S7BorangInstitusi::findOne($borang);
        return $this->render('gambar',[
            'borangInstitusi'=>$borangInstitusi,

        ]);
    }

    public function actionUnggahStandar($id,$borang){

        $file_json = 'borang_institusi.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $decode = Json::decode($json);
        $data = $decode[$id-1];
        $poin = $data['poin'];

        $gambarForm = new GambarBorangInstitusiUploadForm();

        $dataBorang = S7BorangInstitusi::findOne($borang);
        if($gambarForm->load(Yii::$app->request->post())){
            $gambarForm->gambar_borang = UploadedFile::getInstances($gambarForm,'gambar_borang');
            if($gambarForm->uploadGambar($borang)){
                Yii::$app->session->setFlash('success','Berhasil mengunggah gambar borang');
                return $this->redirect(Url::current());
            }

        }

        return $this->render('gambar-standar',[
            'dataBorang'=>$dataBorang,
            'json'=>$data,
            'poin'=>$poin,
            'gambarForm'=>$gambarForm,
        ]);
    }

    public function actionHapusGambar(){

        if(Yii::$app->request->isPost){

            $id = Yii::$app->request->post('id');
            $id_borang = Yii::$app->request->post('borang');
            $standar = Yii::$app->request->post('standar');

            $model= GambarBorangInstitusi::findOne($id);

            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangInstitusi->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$model->borangInstitusi->akreditasiInstitusi->akreditasi->tahun}/gambar/{$model->nama_file}"));
            $model->delete();

            Yii::$app->session->setFlash('success','Berhasil Menghapus Gambar');
            return $this->redirect(['borang-institusi/unggah-standar','id'=>$standar,'borang'=>$id_borang]);


        }

        throw new BadRequestHttpException('Request Harus Post');


    }

    public function actionIsi($borang)
    {
        $file_json = 'borang_institusi.json';
        $borangInstitusi = S7BorangInstitusi::findOne($borang);
        $dokumenBorang = new BorangInstitusiForm();
        $dataDokumenBorang = S7DokumenBorangInstitusi::find()->where(['id_borang_institusi'=>$borang])->all();
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $standar1 = S7BorangInstitusiStandar1::find()->where(['id_borang_institusi'=>$borang])->one();
        $standar2 = S7BorangInstitusiStandar2::find()->where(['id_borang_institusi'=>$borang])->one();
        $standar3 = S7BorangInstitusiStandar3::find()->where(['id_borang_institusi'=>$borang])->one();
        $standar4 = S7BorangInstitusiStandar4::find()->where(['id_borang_institusi'=>$borang])->one();
        $standar5 = S7BorangInstitusiStandar5::find()->where(['id_borang_institusi'=>$borang])->one();
        $standar6 = S7BorangInstitusiStandar6::find()->where(['id_borang_institusi'=>$borang])->one();
        $standar7 = S7BorangInstitusiStandar7::find()->where(['id_borang_institusi'=>$borang])->one();


        if($dokumenBorang->load(Yii::$app->request->post())){
            $dokumenBorang->dokumenBorang = UploadedFile::getInstance($dokumenBorang,'dokumenBorang');
            $uploaded = $dokumenBorang->uploadDokumen($borang);
            if($uploaded){
                Yii::$app->session->setFlash('success','Berhasil Mengunggah Dokumen Borang');
                return $this->redirect(Url::current());
            }

        }
        return $this->render('isi',[
            'borangInstitusi'=>$borangInstitusi,
            'dokumenBorang'=>$dokumenBorang,
            'dataDokumenBorang'=>$dataDokumenBorang,
            'standar1'=>$standar1,
            'standar2'=>$standar2,
            'standar3'=>$standar3,
            'standar4'=>$standar4,
            'standar5'=>$standar5,
            'standar6'=>$standar6,
            'standar7'=>$standar7,
            'json'=>$json
        ]);
    }

    public function actionLihat($borang){

        $borangInstitusi = S7BorangInstitusi::findOne($borang);
        $dataDokumenBorang = S7DokumenBorangInstitusi::find()->where(['id_borang_institusi'=>$borang])->all();
        $standar1 = S7BorangInstitusiStandar1::find()->where(['id_borang_institusi'=>$borang])->one();
        $standar2 = S7BorangInstitusiStandar2::find()->where(['id_borang_institusi'=>$borang])->one();
        $standar3 = S7BorangInstitusiStandar3::find()->where(['id_borang_institusi'=>$borang])->one();
        $standar4 = S7BorangInstitusiStandar4::find()->where(['id_borang_institusi'=>$borang])->one();
        $standar5 = S7BorangInstitusiStandar5::find()->where(['id_borang_institusi'=>$borang])->one();
        $standar6 = S7BorangInstitusiStandar6::find()->where(['id_borang_institusi'=>$borang])->one();
        $standar7 = S7BorangInstitusiStandar7::find()->where(['id_borang_institusi'=>$borang])->one();

        return $this->render('lihat',[
            'borangInstitusi'=>$borangInstitusi,
            'dataDokumenBorang'=>$dataDokumenBorang,
            'standar1'=>$standar1,
            'standar2'=>$standar2,
            'standar3'=>$standar3,
            'standar4'=>$standar4,
            'standar5'=>$standar5,
            'standar6'=>$standar6,
            'standar7'=>$standar7,
        ]);

    }

    public function actionLihatStandar($id,$borang){
        $standarClass = 'common\\models\\BorangInstitusiStandar'.$id;

        $model = call_user_func($standarClass.'::findOne',['id_borang_institusi'=>$borang]);

        $file_json = 'borang_institusi.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $decode = Json::decode($json);
        $data = $decode[$id-1];
        $poin = $data['poin'];
        $detailClass = "common\\models\\DetailBorangInstitusiStandar".$id;
        $detail = call_user_func($detailClass.'::find')->where(['id_borang_institusi_standar'.$id=>$model->id]);
        $template = IsianBorang::find()->where(['untuk'=>'institusi']);
        $isian = IsianBorangInstitusi::find()->where(['id_borang_institusi'=>$borang]);



        return $this->render('lihat-standar',[
            'model'=>$model,
            'json'=>$data,
            'poin'=>$poin,
            'detail'=>$detail,
            'template'=>$template,
            'isian'=>$isian
            ]);
    }

    public function actionIsiStandar($standar,$borang){
        $file_json = 'borang_institusi.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));

        $modelClass = 'akreditasi\\models\\BorangInstitusiStandar'.$standar.'Form';
        $model = call_user_func($modelClass.'::findOne',$borang);

        $decode = Json::decode($json);
        $data = $decode[$standar-1];
        $poin = $data['poin'];
        $detailClass = 'common\\models\\DetailBorangInstitusiStandar'.$standar;
        $detail = call_user_func($detailClass."::find")->where(['id_borang_institusi_standar1'=>$model->id]);
        $detailModelClass = 'akreditasi\\models\\DetailBorangInstitusiUploadForm';
        $detailModel = new $detailModelClass;

        $template = IsianBorang::find()->where(['untuk'=>'institusi']);

        $isian = IsianBorangInstitusi::find()->where(['id_borang_institusi'=>$borang]);
        $modelIsian  = new IsianBorangInstitusiUploadForm();


        if($model->load(Yii::$app->request->post())){
            $model->save();
            Yii::$app->session->setFlash('success','Berhasil Memperbarui Entri');
            return $this->redirect(Url::current());

        }
        if($detailModel->load(Yii::$app->request->post())){
            $detailModel->dokumenPendukung = UploadedFile::getInstance($detailModel,'dokumenPendukung');
            if($detailModel->uploadDokumen($model->id,$standar)){
                Yii::$app->session->setFlash('success','Berhasil Mengunggah Dokumen Pendukung');

            }
            return $this->redirect(Url::current());

        }

        if($modelIsian->load(Yii::$app->request->post())){

            $modelIsian->nama_file = UploadedFile::getInstance($modelIsian,'nama_file');

            if($modelIsian->uploadFile($borang)){
                Yii::$app->session->setFlash('success','Berhasil mengupload isian borang');
            }
            return $this->redirect(Url::current());

        }

        return $this->render('standar',[
            'model'=>$model,
            'json'=>$data,
            'poin'=>$poin,
            'detail'=>$detail,
            'detailModel'=>$detailModel,
            'template'=>$template,
            'isian'=>$isian,
            'modelIsian'=>$modelIsian,

        ]);
    }

    public function actionDownloadIsian($id,$borang){
        ini_set('max_execution_time', 5*60);
        $template = IsianBorangInstitusi::findOne($id);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$template->borangInstitusi->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$template->borangInstitusi->akreditasiInstitusi->akreditasi->tahun}/borang/dokumen/{$template->nama_file}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusIsian(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $model = IsianBorangInstitusi::findOne($id);
            $borang = Yii::$app->request->post('borang');
            $standar = Yii::$app->request->post('standar');
            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangInstitusi->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$model->borangInstitusi->akreditasiInstitusi->akreditasi->tahun}/borang/dokumen/{$model->nama_file}"));
            $model->delete();
            Yii::$app->session->setFlash('success','Berhasil Menghapus Isian Borang');
            return $this->redirect(['borang-institusi/isi-standar','standar'=>$standar,'borang'=>$borang]);
        }
        throw new BadRequestHttpException('Request Harus Post');

    }
    public function actionDownloadTemplate($id){
        ini_set('max_execution_time', 5*60);
        $template = IsianBorang::findOne($id);
        $file = Yii::getAlias('@templateBorang/institusi/'.$template->nama_file);
        return Yii::$app->response->sendFile($file);

    }

    public function actionDownload($dokumen){

        ini_set('max_execution_time', 5*60);
        $model = S7DokumenBorangInstitusi::findOne($dokumen);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$model->borangInstitusi->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$model->borangInstitusi->akreditasiInstitusi->akreditasi->tahun}/borang/dokumen/{$model->nama_dokumen}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusDokumen(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $model = S7DokumenBorangInstitusi::findOne($id);
            $borangId = $model->borangInstitusi->id;
            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangInstitusi->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$model->borangInstitusi->akreditasiInstitusi->akreditasi->tahun}/borang/dokumen/{$model->nama_dokumen}"));
            $model->delete();

            Yii::$app->session->setFlash('success','Berhasil Menghapus Dokumen Borang');

            return $this->redirect(['borang-institusi/isi','borang'=>$borangId]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }

    public function actionDownloadDetail($standar,$dokumen,$borang){

        ini_set('max_execution_time', 5*60);
        $borang = S7BorangInstitusi::findOne($borang);
        $namespace = 'common\\models\\';
        $class = $namespace.'DetailBorangInstitusiStandar'.$standar;
        $model = call_user_func($class.'::findOne',$dokumen);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$borang->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$borang->akreditasiInstitusi->akreditasi->tahun}/borang/dokumen/{$model->nama_dokumen}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusDetail(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $standar = Yii::$app->request->post('standar');
            $borangid = Yii::$app->request->post('borang');
            $namespace = 'common\\models\\';
            $class = $namespace.'DetailBorangInstitusiStandar'.$standar;
            $model = call_user_func($class.'::findOne',$id);
            $borang = S7BorangInstitusi::findOne($borangid);
            $file = Yii::getAlias('@uploadAkreditasi'."/{$borang->akreditasiInstitusi->akreditasi->lembaga}/institusi/{$borang->akreditasiInstitusi->akreditasi->tahun}/borang/dokumen/{$model->nama_dokumen}");
            unlink($file);
            Yii::$app->session->setFlash('success','Berhasil Menghapus Dokumen Pendukung');

            $model->delete();

            return $this->redirect(['borang-institusi/isi-standar','standar'=>$standar,'borang'=>$borang->id]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }

}

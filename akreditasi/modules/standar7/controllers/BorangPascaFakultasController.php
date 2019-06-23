<?php

namespace akreditasi\modules\standar7\controllers;

use akreditasi\models\BorangPascaFakultasForm;

use akreditasi\models\GambarBorangPascaFakultasUploadForm;
use akreditasi\models\IsianBorangPascaFakultasUploadForm;
use common\models\S7BorangPascaFakultas;
use common\models\S7BorangPascaFakultasStandar1;
use common\models\S7BorangPascaFakultasStandar2;
use common\models\S7BorangPascaFakultasStandar3;
use common\models\S7BorangPascaFakultasStandar4;
use common\models\S7BorangPascaFakultasStandar5;
use common\models\S7BorangPascaFakultasStandar6;
use common\models\S7BorangPascaFakultasStandar7;
use common\models\S7DetailBorangPascaFakultasStandar1;
use common\models\S7DokumenBorangPascaFakultas;
use common\models\S7GambarBorangPascaFakultas;
use common\models\S7IsianBorang;
use common\models\S7IsianBorangPascaFakultas;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;

class BorangPascaFakultasController extends yii\web\Controller {

    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }

    public function actionUnggah($borang){

        $borangFakultas = S7BorangPascaFakultas::findOne($borang);
        return $this->render('gambar',[
            'borangFakultas'=>$borangFakultas,

        ]);
    }

    public function actionUnggahStandar($id,$borang){

        $file_json = 'borang_fakultas_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $decode = Json::decode($json);
        $data = $decode[$id-1];
        $poin = $data['poin'];

        $gambarForm = new GambarBorangPascaFakultasUploadForm();

        $dataBorang = S7BorangPascaFakultas::findOne($borang);
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

            $model= S7GambarBorangPascaFakultas::findOne($id);

            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangPascaFakultas->akreditasi->lembaga}/prodi/{$model->borangPascaFakultas->akreditasi->tahun}/fakultas/{$model->borangPascaFakultas->id_fakultas}/gambar/{$model->nama_file}"));
            $model->delete();

            Yii::$app->session->setFlash('success','Berhasil Menghapus Gambar');
            return $this->redirect(['borang-s1-fakultas/unggah-standar','id'=>$standar,'borang'=>$id_borang]);


        }

        throw new BadRequestHttpException('Request Harus Post');


    }

    public function actionIsi($borang)
    {
        $file_json = 'borang_fakultas_s1.json';
        $borangFakultas = S7BorangPascaFakultas::findOne($borang);
        $dokumenBorang = new BorangPascaFakultasForm();
        $dataDokumenBorang = S7DokumenBorangPascaFakultas::find()->where(['id_borang_s1_fakultas'=>$borang])->all();
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $standar1 = S7BorangPascaFakultasStandar1::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar2 = S7BorangPascaFakultasStandar2::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar3 = S7BorangPascaFakultasStandar3::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar4 = S7BorangPascaFakultasStandar4::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar5 = S7BorangPascaFakultasStandar5::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar6 = S7BorangPascaFakultasStandar6::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar7 = S7BorangPascaFakultasStandar7::find()->where(['id_borang_s1_fakultas'=>$borang])->one();


        if($dokumenBorang->load(Yii::$app->request->post())){
            $dokumenBorang->dokumenBorang = UploadedFile::getInstance($dokumenBorang,'dokumenBorang');
            $uploaded = $dokumenBorang->uploadDokumen($borang);
            if($uploaded){
                Yii::$app->session->setFlash('success','Berhasil Mengunggah Dokumen Borang');
                return $this->redirect(Url::current());
            }

        }
        return $this->render('isi',[
            'borangProdi'=>$borangFakultas,
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

        $borangFakultas = S7BorangPascaFakultas::findOne($borang);
        $dataDokumenBorang = S7DokumenBorangPascaFakultas::find()->where(['id_borang_s1_fakultas'=>$borang])->all();
        $standar1 = S7BorangPascaFakultasStandar1::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar2 = S7BorangPascaFakultasStandar2::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar3 = S7BorangPascaFakultasStandar3::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar4 = S7BorangPascaFakultasStandar4::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar5 = S7BorangPascaFakultasStandar5::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar6 = S7BorangPascaFakultasStandar6::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar7 = S7BorangPascaFakultasStandar7::find()->where(['id_borang_s1_fakultas'=>$borang])->one();

        return $this->render('lihat',[
            'borangProdi'=>$borangFakultas,
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
        $standarClass = 'common\\models\\S7BorangPascaFakultasStandar'.$id;

        $model = call_user_func($standarClass.'::findOne',['id_borang_s1_fakultas'=>$borang]);

        $file_json = 'borang_fakultas_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $decode = Json::decode($json);
        $data = $decode[$id-1];
        $poin = $data['poin'];
        $detail = S7DetailBorangPascaFakultasStandar1::find()->where(['id_borang_s1_fakultas_standar1'=>$model->id]);
        $template = S7IsianBorang::find()->where(['untuk'=>'fakultas']);
        $isian = S7IsianBorangPascaFakultas::find()->where(['id_borang_s1_fakultas'=>$borang]);

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
        $file_json = 'borang_fakultas_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));

        $modelClass = 'akreditasi\\models\\S7BorangPascaFakultasStandar'.$standar.'Form';
        $model = call_user_func($modelClass.'::findOne',$borang);

        $decode = Json::decode($json);
        $data = $decode[$standar-1];
        $poin = $data['poin'];
        $detailClass = 'common\\models\\S7DetailBorangPascaFakultasStandar'.$standar;
        $detail = call_user_func($detailClass."::find")->where(['id_borang_s1_fakultas_standar1'=>$model->id]);
        $detailModelClass = 'akreditasi\\models\\DetailBorangPascaFakultasUploadForm';
        $detailModel = new $detailModelClass;

        $template = S7IsianBorang::find()->where(['untuk'=>'fakultas']);

        $isian = S7IsianBorangPascaFakultas::find()->where(['id_borang_s1_fakultas'=>$borang]);
        $modelIsian  = new IsianBorangPascaFakultasUploadForm();


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
        $template = S7IsianBorangPascaFakultas::findOne($id);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$template->borangPascaFakultas->akreditasi->lembaga}/prodi/{$template->borangPascaFakultas->akreditasi->tahun}/fakultas/{$template->borangPascaFakultas->id_fakultas}/borang/dokumen/{$template->nama_file}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusIsian(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $borang = Yii::$app->request->post('borang');
            $standar = Yii::$app->request->post('standar');
            $model = S7IsianBorangPascaFakultas::findOne($id);
            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangPascaFakultas->akreditasi->lembaga}/prodi/{$model->borangPascaFakultas->akreditasi->tahun}/fakultas/{$model->borangPascaFakultas->id_fakultas}/borang/dokumen/{$model->nama_file}"));
            $model->delete();
            Yii::$app->session->setFlash('success','Berhasil Menghapus Isian Borang');

            return $this->redirect(['borang-s1-fakultas/isi-standar','standar'=>$standar,'borang'=>$borang]);
        }
        throw new BadRequestHttpException('Request Harus Post');

    }
    public function actionDownloadTemplate($id){
        ini_set('max_execution_time', 5*60);
        $template = S7IsianBorang::findOne($id);
        $file = Yii::getAlias('@templateBorang/fakultas/'.$template->nama_file);
        return Yii::$app->response->sendFile($file);

    }

    public function actionDownload($dokumen){

        ini_set('max_execution_time', 5*60);
        $model = S7DokumenBorangPascaFakultas::findOne($dokumen);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$model->borangPascaFakultas->akreditasi->lembaga}/prodi/{$model->borangPascaFakultas->akreditasi->tahun}/fakultas/{$model->borangPascaFakultas->id_fakultas}/borang/dokumen/{$model->nama_dokumen}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusDokumen(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $model = S7DokumenBorangPascaFakultas::findOne($id);
            $borangId = $model->borangPascaFakultas->id;
            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangPascaFakultas->akreditasi->lembaga}/prodi/{$model->borangPascaFakultas->akreditasi->tahun}/fakultas/{$model->borangPascaFakultas->id_fakultas}/borang/dokumen/{$model->nama_dokumen}"));
            $model->delete();
            Yii::$app->session->setFlash('success','Berhasil Menghapus Dokumen Borang');

            return $this->redirect(['borang-s1-fakultas/isi','borang'=>$borangId]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }

    public function actionDownloadDetail($standar,$dokumen,$borang){

        ini_set('max_execution_time', 5*60);
        $borang = S7BorangPascaFakultas::findOne($borang);
        $namespace = 'common\\models\\';
        $class = $namespace.'S7DetailBorangPascaFakultasStandar'.$standar;
        $model = call_user_func($class.'::findOne',$dokumen);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$borang->akreditasi->lembaga}/prodi/{$borang->akreditasi->tahun}/fakultas/{$borang->id_fakultas}/borang/dokumen/{$model->nama_dokumen}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusDetail(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $standar = Yii::$app->request->post('standar');
            $borangid = Yii::$app->request->post('borang');
            $namespace = 'common\\models\\';
            $class = $namespace.'S7DetailBorangPascaFakultasStandar'.$standar;
            $model = call_user_func($class.'::findOne',$id);
            $borang = S7BorangPascaFakultas::findOne($borangid);
            $file = Yii::getAlias('@uploadAkreditasi'."/{$borang->akreditasi->lembaga}/prodi/{$borang->akreditasi->tahun}/fakultas/{$borang->id_fakultas}/borang/dokumen/{$model->nama_dokumen}");
            unlink($file);
            Yii::$app->session->setFlash('success','Berhasil Menghapus Dokumen Pendukung Borang');

            $model->delete();

            return $this->redirect(['borang-s1-fakultas/isi-standar','standar'=>$standar,'borang'=>$borang->id]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }

}
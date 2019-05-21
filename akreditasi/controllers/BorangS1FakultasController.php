<?php

namespace akreditasi\controllers;

use akreditasi\models\BorangS1FakultasForm;

use akreditasi\models\GambarBorangS1FakultasUploadForm;
use akreditasi\models\IsianBorangS1FakultasUploadForm;
use common\models\BorangS1Fakultas;
use common\models\BorangS1FakultasStandar1;
use common\models\BorangS1FakultasStandar2;
use common\models\BorangS1FakultasStandar3;
use common\models\BorangS1FakultasStandar4;
use common\models\BorangS1FakultasStandar5;
use common\models\BorangS1FakultasStandar6;
use common\models\BorangS1FakultasStandar7;
use common\models\DetailBorangS1FakultasStandar1;
use common\models\DokumenBorangS1Fakultas;
use common\models\GambarBorangS1Fakultas;
use common\models\IsianBorang;
use common\models\IsianBorangS1Fakultas;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;

class BorangS1FakultasController extends \yii\web\Controller
{

    public function actionUnggah($borang){

        $borangFakultas = BorangS1Fakultas::findOne($borang);
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

        $gambarForm = new GambarBorangS1FakultasUploadForm();

        $dataBorang = BorangS1Fakultas::findOne($borang);
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

            $model= GambarBorangS1Fakultas::findOne($id);

            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangS1Fakultas->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$model->borangS1Fakultas->akreditasiProdiS1->akreditasi->tahun}/{$model->borangS1Fakultas->akreditasiProdiS1->id_prodi}/fakultas/gambar/{$model->nama_file}"));
            $model->delete();

            Yii::$app->session->setFlash('success','Berhasil Menghapus Gambar');
            return $this->redirect(['borang-s1-fakultas/unggah-standar','id'=>$standar,'borang'=>$id_borang]);


        }

        throw new BadRequestHttpException('Request Harus Post');


    }

    public function actionIsi($borang)
    {
        $file_json = 'borang_fakultas_s1.json';
        $borangFakultas = BorangS1Fakultas::findOne($borang);
        $dokumenBorang = new BorangS1FakultasForm();
        $dataDokumenBorang = DokumenBorangS1Fakultas::find()->where(['id_borang_s1_fakultas'=>$borang])->all();
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $standar1 = BorangS1FakultasStandar1::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar2 = BorangS1FakultasStandar2::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar3 = BorangS1FakultasStandar3::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar4 = BorangS1FakultasStandar4::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar5 = BorangS1FakultasStandar5::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar6 = BorangS1FakultasStandar6::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar7 = BorangS1FakultasStandar7::find()->where(['id_borang_s1_fakultas'=>$borang])->one();


        if($dokumenBorang->load(Yii::$app->request->post())){
            $dokumenBorang->dokumenBorang = UploadedFile::getInstance($dokumenBorang,'dokumenBorang');
            $uploaded = $dokumenBorang->uploadDokumen($borang);
            if($uploaded){
                Yii::$app->session->setFlash('success','Berhasil Mengunggah Dokumen Borang');
                return $this->redirect(Url::current());
            }

        }
        return $this->render('isi',[
            'borangFakultas'=>$borangFakultas,
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

        $borangFakultas = BorangS1Fakultas::findOne($borang);
        $dataDokumenBorang = DokumenBorangS1Fakultas::find()->where(['id_borang_s1_fakultas'=>$borang])->all();
        $standar1 = BorangS1FakultasStandar1::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar2 = BorangS1FakultasStandar2::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar3 = BorangS1FakultasStandar3::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar4 = BorangS1FakultasStandar4::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar5 = BorangS1FakultasStandar5::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar6 = BorangS1FakultasStandar6::find()->where(['id_borang_s1_fakultas'=>$borang])->one();
        $standar7 = BorangS1FakultasStandar7::find()->where(['id_borang_s1_fakultas'=>$borang])->one();

        return $this->render('lihat',[
            'borangFakultas'=>$borangFakultas,
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
        $standarClass = 'common\\models\\BorangS1FakultasStandar'.$id;

        $model = call_user_func($standarClass.'::findOne',['id_borang_s1_fakultas'=>$borang]);

        $file_json = 'borang_fakultas_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $decode = Json::decode($json);
        $data = $decode[$id-1];
        $poin = $data['poin'];
        $detail = DetailBorangS1FakultasStandar1::find()->where(['id_borang_s1_fakultas_standar1'=>$model->id]);
        $template = IsianBorang::find()->where(['untuk'=>'fakultas'])->all();
        $isian = IsianBorangS1Fakultas::find()->where(['id_borang_s1_fakultas'=>$borang]);





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

        $modelClass = 'akreditasi\\models\\BorangS1FakultasStandar'.$standar.'Form';
        $model = call_user_func($modelClass.'::findOne',$borang);

        $decode = Json::decode($json);
        $data = $decode[$standar-1];
        $poin = $data['poin'];
        $detailClass = 'common\\models\\DetailBorangS1FakultasStandar'.$standar;
        $detail = call_user_func($detailClass."::find")->where(['id_borang_s1_fakultas_standar1'=>$model->id]);
        $detailModelClass = 'akreditasi\\models\\DetailBorangS1FakultasUploadForm';
        $detailModel = new $detailModelClass;

        $template = IsianBorang::find()->where(['untuk'=>'fakultas']);

        $isian = IsianBorangS1Fakultas::find()->where(['id_borang_s1_fakultas'=>$borang]);
        $modelIsian  = new IsianBorangS1FakultasUploadForm();


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
        $template = IsianBorangS1Fakultas::findOne($id);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$template->borangS1Fakultas->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$template->borangS1Fakultas->akreditasiProdiS1->akreditasi->tahun}/{$template->borangS1Fakultas->akreditasiProdiS1->id_prodi}/fakultas/borang/dokumen/{$template->nama_file}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusIsian(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $model = IsianBorangS1Fakultas::findOne($id);
            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangS1Fakultas->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$model->borangS1Fakultas->akreditasiProdiS1->akreditasi->tahun}/{$model->borangS1Fakultas->akreditasiProdiS1->id_prodi}/fakultas/borang/dokumen/{$model->nama_file}"));
            $model->delete();
            return $this->redirect(['borang-s1-fakultas/isi','borang'=>$model->borangS1Fakultas->id]);
        }
        throw new BadRequestHttpException('Request Harus Post');

    }
    public function actionDownloadTemplate($id){
        ini_set('max_execution_time', 5*60);
        $template = IsianBorang::findOne($id);
        $file = Yii::getAlias('@templateBorang/fakultas/'.$template->nama_file);
        return Yii::$app->response->sendFile($file);

    }

    public function actionDownload($dokumen){

        ini_set('max_execution_time', 5*60);
        $model = DokumenBorangS1Fakultas::findOne($dokumen);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$model->borangS1Fakultas->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$model->borangS1Fakultas->akreditasiProdiS1->akreditasi->tahun}/{$model->borangS1Fakultas->akreditasiProdiS1->id_prodi}/fakultas/borang/dokumen/{$model->nama_dokumen}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusDokumen(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $model = DokumenBorangS1Fakultas::findOne($id);
            $borangId = $model->borangS1Fakultas->id;
            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangS1Fakultas->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$model->borangS1Fakultas->akreditasiProdiS1->akreditasi->tahun}/{$model->borangS1Fakultas->akreditasiProdiS1->id_prodi}/fakultas/borang/dokumen/{$model->nama_dokumen}"));
            $model->delete();

            return $this->redirect(['borang-s1-fakultas/isi','borang'=>$borangId]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }

    public function actionDownloadDetail($standar,$dokumen,$borang){

        ini_set('max_execution_time', 5*60);
        $borang = BorangS1Fakultas::findOne($borang);
        $namespace = 'common\\models\\';
        $class = $namespace.'DetailBorangS1FakultasStandar'.$standar;
        $model = call_user_func($class.'::findOne',$dokumen);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$borang->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$borang->akreditasiProdiS1->akreditasi->tahun}/{$borang->akreditasiProdiS1->id_prodi}/fakultas/borang/dokumen/{$model->nama_dokumen}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusDetail(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $standar = Yii::$app->request->post('standar');
            $borangid = Yii::$app->request->post('borang');
            $namespace = 'common\\models\\';
            $class = $namespace.'DetailBorangS1FakultasStandar'.$standar;
            $model = call_user_func($class.'::findOne',$id);
            $borang = BorangS1Fakultas::findOne($borangid);
            $file = Yii::getAlias('@uploadAkreditasi'."/{$borang->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$borang->akreditasiProdiS1->akreditasi->tahun}/{$borang->akreditasiProdiS1->id_prodi}/fakultas/borang/dokumen/{$model->nama_dokumen}");
            $model->delete();

            return $this->redirect(['borang-s1-fakultas/standar1','borang'=>$borangid]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }

}

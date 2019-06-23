<?php

namespace akreditasi\modules\standar7\controllers;

use akreditasi\models\BorangPascaProdiForm;

use akreditasi\models\GambarBorangPascaProdiUploadForm;
use akreditasi\models\IsianBorangPascaProdiUploadForm;
use common\models\S7BorangPascaProdi;
use common\models\S7BorangPascaProdiStandar1;
use common\models\S7BorangPascaProdiStandar2;
use common\models\S7BorangPascaProdiStandar3;
use common\models\S7BorangPascaProdiStandar4;
use common\models\S7BorangPascaProdiStandar5;
use common\models\S7BorangPascaProdiStandar6;
use common\models\S7BorangPascaProdiStandar7;
use common\models\S7DokumenBorangPascaProdi;
use common\models\S7GambarBorangPascaProdi;
use common\models\S7IsianBorang;
use common\models\S7IsianBorangPascaProdi;
use Yii;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;

class BorangPascaProdiController extends \yii\web\Controller{

    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }

    public function actionUnggah($borang){

        $borangProdi = S7BorangPascaProdi::findOne($borang);
        return $this->render('gambar',[
            'borangProdi'=>$borangProdi,

        ]);
    }

    public function actionUnggahStandar($id,$borang){

        $file_json = 'borang_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $decode = Json::decode($json);
        $data = $decode[$id-1];
        $poin = $data['poin'];

        $gambarForm = new GambarBorangPascaProdiUploadForm();

        $dataBorang = S7BorangPascaProdi::findOne($borang);
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

            $model= S7GambarBorangPascaProdi::findOne($id);

            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangPascaProdi->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$model->borangPascaProdi->akreditasiProdiPasca->akreditasi->tahun}/{$model->borangPascaProdi->akreditasiProdiPasca->id_prodi}/prodi/gambar/{$model->nama_file}"));
            $model->delete();

            Yii::$app->session->setFlash('success','Berhasil Menghapus Gambar');
            return $this->redirect(['borang-pasca-prodi/unggah-standar','id'=>$standar,'borang'=>$id_borang]);


        }

        throw new BadRequestHttpException('Request Harus Post');


    }

    public function actionIsi($borang)
    {
        $file_json = 'borang_prodi_s1.json';
        $borangProdi = S7BorangPascaProdi::findOne($borang);
        $dokumenBorang = new BorangPascaProdiForm();
        $dataDokumenBorang = S7DokumenBorangPascaProdi::find()->where(['id_borang_pasca_prodi'=>$borang])->all();
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $standar1 = S7BorangPascaProdiStandar1::find()->where(['id_borang_pasca'=>$borang])->one();
        $standar2 = S7BorangPascaProdiStandar2::find()->where(['id_borang_pasca'=>$borang])->one();
        $standar3 = S7BorangPascaProdiStandar3::find()->where(['id_borang_pasca'=>$borang])->one();
        $standar4 = S7BorangPascaProdiStandar4::find()->where(['id_borang_pasca'=>$borang])->one();
        $standar5 = S7BorangPascaProdiStandar5::find()->where(['id_borang_pasca'=>$borang])->one();
        $standar6 = S7BorangPascaProdiStandar6::find()->where(['id_borang_pasca'=>$borang])->one();
        $standar7 = S7BorangPascaProdiStandar7::find()->where(['id_borang_pasca'=>$borang])->one();


        if($dokumenBorang->load(Yii::$app->request->post())){
            $dokumenBorang->dokumenBorang = UploadedFile::getInstance($dokumenBorang,'dokumenBorang');
            $uploaded = $dokumenBorang->uploadDokumen($borang);
            if($uploaded){
                Yii::$app->session->setFlash('success','Berhasil Mengunggah Dokumen Borang');
                return $this->redirect(Url::current());
            }

        }
        return $this->render('isi',[
            'borangProdi'=>$borangProdi,
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

        $borangProdi = S7BorangPascaProdi::findOne($borang);
        $dataDokumenBorang = S7DokumenBorangPascaProdi::find()->where(['id_borang_pasca_prodi'=>$borang])->all();
        $standar1 = S7BorangPascaProdiStandar1::find()->where(['id_borang_pasca'=>$borang])->one();
        $standar2 = S7BorangPascaProdiStandar2::find()->where(['id_borang_pasca'=>$borang])->one();
        $standar3 = S7BorangPascaProdiStandar3::find()->where(['id_borang_pasca'=>$borang])->one();
        $standar4 = S7BorangPascaProdiStandar4::find()->where(['id_borang_pasca'=>$borang])->one();
        $standar5 = S7BorangPascaProdiStandar5::find()->where(['id_borang_pasca'=>$borang])->one();
        $standar6 = S7BorangPascaProdiStandar6::find()->where(['id_borang_pasca'=>$borang])->one();
        $standar7 = S7BorangPascaProdiStandar7::find()->where(['id_borang_pasca'=>$borang])->one();

        return $this->render('lihat',[
            'borangProdi'=>$borangProdi,
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
        $standarClass = 'common\\models\\S7BorangPascaProdiStandar'.$id;

        $model = call_user_func($standarClass.'::findOne',['id_borang_pasca'=>$borang]);

        $file_json = 'borang_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $decode = Json::decode($json);
        $data = $decode[$id-1];
        $poin = $data['poin'];
        $detailClass = "common\\models\\S7DetailBorangPascaProdiStandar".$id;
        $detail = call_user_func($detailClass.'::find')->where(['id_borang_pasca_standar'.$id=>$model->id]);
        $template = S7IsianBorang::find()->where(['untuk'=>'prodi']);
        $isian = S7IsianBorangPascaProdi::find()->where(['id_borang_pasca'=>$borang]);





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
        $file_json = 'borang_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));

        $modelClass = 'akreditasi\\models\\S7BorangPascaProdiStandar'.$standar.'Form';
        $model = call_user_func($modelClass.'::findOne',$borang);

        $decode = Json::decode($json);
        $data = $decode[$standar-1];
        $poin = $data['poin'];
        $detailClass = 'common\\models\\S7DetailBorangPascaProdiStandar'.$standar;
        $detail = call_user_func($detailClass."::find")->where(['id_borang_pasca_standar1'=>$model->id]);
        $detailModelClass = 'akreditasi\\models\\DetailBorangPascaProdiUploadForm';
        $detailModel = new $detailModelClass;

        $template = S7IsianBorang::find()->where(['untuk'=>'prodi']);

        $isian = S7IsianBorangPascaProdi::find()->where(['id_borang_pasca'=>$borang]);
        $modelIsian  = new IsianBorangPascaProdiUploadForm();


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
        $template = S7IsianBorangPascaProdi::findOne($id);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$template->borangPascaProdi->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$template->borangPascaProdi->akreditasiProdiPasca->akreditasi->tahun}/{$template->borangPascaProdi->akreditasiProdiPasca->id_prodi}/prodi/borang/dokumen/{$template->nama_file}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusIsian(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $borang = Yii::$app->request->post('borang');
            $standar = Yii::$app->request->post('standar');
            $model = S7IsianBorangPascaProdi::findOne($id);
            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangPascaProdi->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$model->borangPascaProdi->akreditasiProdiPasca->akreditasi->tahun}/{$model->borangPascaProdi->akreditasiProdiPasca->id_prodi}/prodi/borang/dokumen/{$model->nama_file}"));
            $model->delete();
            Yii::$app->session->setFlash('success','Berhasil Menghapus Isian Borang');

            return $this->redirect(['borang-pasca-prodi/isi-standar','standar'=>$standar,'borang'=>$borang]);
        }
        throw new BadRequestHttpException('Request Harus Post');

    }
    public function actionDownloadTemplate($id){
        ini_set('max_execution_time', 5*60);
        $template = S7IsianBorang::findOne($id);
        $file = Yii::getAlias('@templateBorang/prodi/'.$template->nama_file);
        return Yii::$app->response->sendFile($file);

    }

    public function actionDownload($dokumen){

        ini_set('max_execution_time', 5*60);
        $model = S7DokumenBorangPascaProdi::findOne($dokumen);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$model->borangPascaProdi->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$model->borangPascaProdi->akreditasiProdiPasca->akreditasi->tahun}/{$model->borangPascaProdi->akreditasiProdiPasca->id_prodi}/prodi/borang/dokumen/{$model->nama_dokumen}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusDokumen(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $model = S7DokumenBorangPascaProdi::findOne($id);
            $borangId = $model->borangPascaProdi->id;
            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangPascaProdi->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$model->borangPascaProdi->akreditasiProdiPasca->akreditasi->tahun}/{$model->borangPascaProdi->akreditasiProdiPasca->id_prodi}/prodi/borang/dokumen/{$model->nama_dokumen}"));
            $model->delete();
            Yii::$app->session->setFlash('success','Berhasil Menghapus Dokumen Borang');

            return $this->redirect(['borang-pasca-prodi/isi','borang'=>$borangId]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }

    public function actionDownloadDetail($standar,$dokumen,$borang){

        ini_set('max_execution_time', 5*60);
        $borang = S7BorangPascaProdi::findOne($borang);
        $namespace = 'common\\models\\';
        $class = $namespace.'S7DetailBorangPascaProdiStandar'.$standar;
        $model = call_user_func($class.'::findOne',$dokumen);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$borang->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$borang->akreditasiProdiPasca->akreditasi->tahun}/{$borang->akreditasiProdiPasca->id_prodi}/prodi/borang/dokumen/{$model->nama_dokumen}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusDetail(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $standar = Yii::$app->request->post('standar');
            $borangid = Yii::$app->request->post('borang');
            $namespace = 'common\\models\\';
            $class = $namespace.'S7DetailBorangPascaProdiStandar'.$standar;
            $model = call_user_func($class.'::findOne',$id);
            $borang = S7BorangPascaProdi::findOne($borangid);
            $file = Yii::getAlias('@uploadAkreditasi'."/{$borang->akreditasiProdiPasca->akreditasi->lembaga}/prodi/{$borang->akreditasiProdiPasca->akreditasi->tahun}/{$borang->akreditasiProdiPasca->id_prodi}/prodi/borang/dokumen/{$model->nama_dokumen}");
            unlink($file);
            $model->delete();
            Yii::$app->session->setFlash('success','Berhasil Menghapus Dokumen Pendukung Borang');

            return $this->redirect(['borang-pasca-prodi/isi-standar','standar'=>$standar,'borang'=>$borang->id]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }

}
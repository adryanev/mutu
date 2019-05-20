<?php

namespace akreditasi\controllers;

use akreditasi\models\BorangS1ProdiForm;
use akreditasi\models\BorangS1ProdiStandar1Form;
use akreditasi\models\BorangS1ProdiStandar2Form;
use akreditasi\models\BorangS1ProdiStandar3Form;
use akreditasi\models\BorangS1ProdiStandar5Form;
use akreditasi\models\BorangS1ProdiStandar6Form;
use akreditasi\models\BorangS1ProdiStandar7Form;
use akreditasi\models\DetailBorangS1ProdiStandar1UploadForm;
use akreditasi\models\DetailBorangS1ProdiStandar2UploadForm;
use akreditasi\models\DetailBorangS1ProdiStandar3UploadForm;
use akreditasi\models\DetailBorangS1ProdiStandar4UploadForm;
use akreditasi\models\DetailBorangS1ProdiStandar5UploadForm;
use akreditasi\models\DetailBorangS1ProdiStandar6UploadForm;
use akreditasi\models\DetailBorangS1ProdiStandar7UploadForm;
use akreditasi\models\IsianBorangS1ProdiUploadForm;
use common\models\BorangS1Prodi;
use common\models\BorangS1ProdiStandar1;
use common\models\BorangS1ProdiStandar2;
use common\models\BorangS1ProdiStandar3;
use common\models\BorangS1ProdiStandar4;
use common\models\BorangS1ProdiStandar5;
use common\models\BorangS1ProdiStandar6;
use common\models\BorangS1ProdiStandar7;
use common\models\DetailBorangS1ProdiStandar1;
use common\models\DetailBorangS1ProdiStandar2;
use common\models\DetailBorangS1ProdiStandar3;
use common\models\DetailBorangS1ProdiStandar4;
use common\models\DokumenBorangS1Prodi;
use common\models\IsianBorang;
use common\models\IsianBorangS1Prodi;
use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;

class BorangS1ProdiController extends \yii\web\Controller
{

    public function actionIsi($borang)
    {
        $file_json = 'borang_prodi_s1.json';
        $borangProdi = BorangS1Prodi::findOne($borang);
        $dokumenBorang = new BorangS1ProdiForm();
        $dataDokumenBorang = DokumenBorangS1Prodi::find()->where(['id_borang_s1_prodi'=>$borang])->all();
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $standar1 = BorangS1ProdiStandar1::find()->where(['id_borang_s1_prodi'=>$borang])->one();
        $standar2 = BorangS1ProdiStandar2::find()->where(['id_borang_s1_prodi'=>$borang])->one();
        $standar3 = BorangS1ProdiStandar3::find()->where(['id_borang_s1_prodi'=>$borang])->one();
        $standar4 = BorangS1ProdiStandar4::find()->where(['id_borang_s1_prodi'=>$borang])->one();
        $standar5 = BorangS1ProdiStandar5::find()->where(['id_borang_s1_prodi'=>$borang])->one();
        $standar6 = BorangS1ProdiStandar6::find()->where(['id_borang_s1_prodi'=>$borang])->one();
        $standar7 = BorangS1ProdiStandar7::find()->where(['id_borang_s1_prodi'=>$borang])->one();


        if($dokumenBorang->load(Yii::$app->request->post())){
            $dokumenBorang->dokumenBorang = UploadedFile::getInstance($dokumenBorang,'dokumenBorang');
            $uploaded = $dokumenBorang->uploadDokumen($borang);
            if($uploaded){
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

    public function actionStandar1($borang){

        $file_json = 'borang_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $model = BorangS1ProdiStandar1Form::findOne($borang);
        $decode = Json::decode($json);
        $data = $decode[0];
        $poin = $data['poin'];
        $detail = DetailBorangS1ProdiStandar1::find()->where(['id_borang_s1_prodi_standar1'=>$model->id]);
        $detailModel = new DetailBorangS1ProdiStandar1UploadForm();
        $template = IsianBorang::find()->where(['untuk'=>'prodi'])->all();
        $isian = IsianBorangS1Prodi::find()->where(['id_borang_s1_prodi'=>$borang]);
        $modelIsian  = new IsianBorangS1ProdiUploadForm();


        if($model->load(Yii::$app->request->post())){
            $model->save();
            Yii::$app->session->setFlash('success','Berhasil Memperbarui Entri');


        }
        if($detailModel->load(Yii::$app->request->post())){
            $detailModel->dokumenPendukung = UploadedFile::getInstance($detailModel,'dokumenPendukung');
            $detailModel->uploadDokumen($model->id);
        }

        if($modelIsian->load(Yii::$app->request->post())){

            $modelIsian->nama_file = UploadedFile::getInstance($modelIsian,'nama_file');

            if($modelIsian->uploadFile($borang)){
                Yii::$app->session->setFlash('success','Berhasil mengupload isian borang');
            }
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
    public function actionStandar2($borang){

        $file_json = 'borang_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $model = BorangS1ProdiStandar2Form::findOne($borang);
        $decode = Json::decode($json);
        $data = $decode[1];
        $poin = $data['poin'];
        $detail = DetailBorangS1ProdiStandar2::find()->where(['id_borang_s1_prodi_standar2'=>$model->id]);
        $detailModel = new DetailBorangS1ProdiStandar2UploadForm();
        $template = IsianBorang::find()->where(['untuk'=>'prodi']);
        $isian = IsianBorangS1Prodi::find()->where(['id_borang_s1_prodi'=>$borang]);
        $modelIsian  = new IsianBorangS1ProdiUploadForm();

        if($model->load(Yii::$app->request->post())){
            $model->save();
            Yii::$app->session->setFlash('success','Berhasil Memperbarui Entri');


        }
        if($detailModel->load(Yii::$app->request->post())){
            $detailModel->dokumenPendukung = UploadedFile::getInstance($detailModel,'dokumenPendukung');
            $detailModel->uploadDokumen($model->id);
        }
        if($modelIsian->load(Yii::$app->request->post())){

            $modelIsian->nama_file = UploadedFile::getInstance($modelIsian,'nama_file');

            if($modelIsian->uploadFile($borang)){
                Yii::$app->session->setFlash('success','Berhasil mengupload isian borang');
            }
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
    public function actionStandar3($borang){

        $file_json = 'borang_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $model = BorangS1ProdiStandar3Form::findOne($borang);
        $decode = Json::decode($json);
        $data = $decode[2];
        $poin = $data['poin'];
        $detail = DetailBorangS1ProdiStandar3::find()->where(['id_borang_s1_prodi_standar2'=>$model->id]);
        $detailModel = new DetailBorangS1ProdiStandar3UploadForm();
        $template = IsianBorang::find()->where(['untuk'=>'prodi']);
        $isian = IsianBorangS1Prodi::find()->where(['id_borang_s1_prodi'=>$borang]);
        $modelIsian  = new IsianBorangS1ProdiUploadForm();

        if($model->load(Yii::$app->request->post())){
            $model->save();
            Yii::$app->session->setFlash('success','Berhasil Memperbarui Entri');


        }
        if($detailModel->load(Yii::$app->request->post())){
            $detailModel->dokumenPendukung = UploadedFile::getInstance($detailModel,'dokumenPendukung');
            $detailModel->uploadDokumen($model->id);
            Yii::$app->session->setFlash('success','Berhasil mengupload dokumen pendukung');

        }

        if($modelIsian->load(Yii::$app->request->post())){

            $modelIsian->nama_file = UploadedFile::getInstance($modelIsian,'nama_file');

            if($modelIsian->uploadFile($borang)){
                Yii::$app->session->setFlash('success','Berhasil mengupload isian borang');
            }
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
    public function actionStandar4($borang){

        $file_json = 'borang_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $model = BorangS1ProdiStandar3Form::findOne($borang);
        $decode = Json::decode($json);
        $data = $decode[3];
        $poin = $data['poin'];
        $detail = DetailBorangS1ProdiStandar4::find()->where(['id_borang_s1_prodi_standar2'=>$model->id]);
        $detailModel = new DetailBorangS1ProdiStandar4UploadForm();
        $template = IsianBorang::find()->where(['untuk'=>'prodi']);
        $isian = IsianBorangS1Prodi::find();
        $modelIsian  = new IsianBorangS1ProdiUploadForm();


        if($model->load(Yii::$app->request->post())){
            $model->save();
            Yii::$app->session->setFlash('success','Berhasil Memperbarui Entri');


        }
        if($detailModel->load(Yii::$app->request->post())){
            $detailModel->dokumenPendukung = UploadedFile::getInstance($detailModel,'dokumenPendukung');
            $detailModel->uploadDokumen($model->id);
        }

        if($modelIsian->load(Yii::$app->request->post())){

            $modelIsian->nama_file = UploadedFile::getInstance($modelIsian,'nama_file');

            if($modelIsian->uploadFile($borang)){
                Yii::$app->session->setFlash('success','Berhasil mengupload isian borang');
            }
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
    public function actionStandar5($borang){

        $file_json = 'borang_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $model = BorangS1ProdiStandar5Form::findOne($borang);
        $decode = Json::decode($json);
        $data = $decode[4];
        $poin = $data['poin'];
        $detail = DetailBorangS1ProdiStandar3::find()->where(['id_borang_s1_prodi_standar2'=>$model->id]);
        $detailModel = new DetailBorangS1ProdiStandar5UploadForm();
        $template = IsianBorang::find()->where(['untuk'=>'prodi']);
        $isian = IsianBorangS1Prodi::find()->where(['id_borang_s1_prodi'=>$borang]);
        $modelIsian  = new IsianBorangS1ProdiUploadForm();


        if($model->load(Yii::$app->request->post())){
            $model->save();
            Yii::$app->session->setFlash('success','Berhasil Memperbarui Entri');


        }
        if($detailModel->load(Yii::$app->request->post())){
            $detailModel->dokumenPendukung = UploadedFile::getInstance($detailModel,'dokumenPendukung');
            $detailModel->uploadDokumen($model->id);
        }

        if($modelIsian->load(Yii::$app->request->post())){

            $modelIsian->nama_file = UploadedFile::getInstance($modelIsian,'nama_file');

            if($modelIsian->uploadFile($borang)){
                Yii::$app->session->setFlash('success','Berhasil mengupload isian borang');
            }
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
    public function actionStandar6($borang){

        $file_json = 'borang_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $model = BorangS1ProdiStandar6Form::findOne($borang);
        $decode = Json::decode($json);
        $data = $decode[5];
        $poin = $data['poin'];
        $detail = DetailBorangS1ProdiStandar3::find()->where(['id_borang_s1_prodi_standar2'=>$model->id]);
        $detailModel = new DetailBorangS1ProdiStandar6UploadForm();
        $template = IsianBorang::find()->where(['untuk'=>'prodi']);
        $isian = IsianBorangS1Prodi::find()->where(['id_borang_s1_prodi'=>$borang]);
        $modelIsian  = new IsianBorangS1ProdiUploadForm();


        if($model->load(Yii::$app->request->post())){
            $model->save();
            Yii::$app->session->setFlash('success','Berhasil Memperbarui Entri');


        }
        if($detailModel->load(Yii::$app->request->post())){
            $detailModel->dokumenPendukung = UploadedFile::getInstance($detailModel,'dokumenPendukung');
            $detailModel->uploadDokumen($model->id);
        }

        if($modelIsian->load(Yii::$app->request->post())){

            $modelIsian->nama_file = UploadedFile::getInstance($modelIsian,'nama_file');

            if($modelIsian->uploadFile($borang)){
                Yii::$app->session->setFlash('success','Berhasil mengupload isian borang');
            }
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
    public function actionStandar7($borang){

        $file_json = 'borang_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/borang/'.$file_json));
        $model = BorangS1ProdiStandar7Form::findOne($borang);
        $decode = Json::decode($json);
        $data = $decode[6];
        $poin = $data['poin'];
        $detail = DetailBorangS1ProdiStandar3::find()->where(['id_borang_s1_prodi_standar2'=>$model->id]);
        $detailModel = new DetailBorangS1ProdiStandar7UploadForm();
        $template = IsianBorang::find()->where(['untuk'=>'prodi']);
        $isian = IsianBorangS1Prodi::find()->where(['id_borang_s1_prodi'=>$borang]);
        $modelIsian  = new IsianBorangS1ProdiUploadForm();


        if($model->load(Yii::$app->request->post())){
            $model->save();
            Yii::$app->session->setFlash('success','Berhasil Memperbarui Entri');


        }
        if($detailModel->load(Yii::$app->request->post())){
            $detailModel->dokumenPendukung = UploadedFile::getInstance($detailModel,'dokumenPendukung');
            $detailModel->uploadDokumen($model->id);
        }

        if($modelIsian->load(Yii::$app->request->post())){

            $modelIsian->nama_file = UploadedFile::getInstance($modelIsian,'nama_file');

            if($modelIsian->uploadFile($borang)){
                Yii::$app->session->setFlash('success','Berhasil mengupload isian borang');
            }
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
        $template = IsianBorangS1Prodi::findOne($id);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$template->borangS1Prodi->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$template->borangS1Prodi->akreditasiProdiS1->akreditasi->tahun}/{$template->borangS1Prodi->akreditasiProdiS1->id_prodi}/prodi/borang/dokumen/{$template->nama_file}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusIsian(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $model = IsianBorangS1Prodi::findOne($id);
            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangS1Prodi->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$model->borangS1Prodi->akreditasiProdiS1->akreditasi->tahun}/{$model->borangS1Prodi->akreditasiProdiS1->id_prodi}/prodi/borang/dokumen/{$model->nama_file}"));
            $model->delete();
            return $this->redirect(['borang-s1-prodi/isi','borang'=>$model->borangS1Prodi->id]);
        }
        throw new BadRequestHttpException('Request Harus Post');

    }
    public function actionDownloadTemplate($id){
        ini_set('max_execution_time', 5*60);
        $template = IsianBorang::findOne($id);
        $file = Yii::getAlias('@templateBorang/prodi/'.$template->nama_file);
        return Yii::$app->response->sendFile($file);

    }

    public function actionDownload($dokumen){

        ini_set('max_execution_time', 5*60);
        $model = DokumenBorangS1Prodi::findOne($dokumen);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$model->borangS1Prodi->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$model->borangS1Prodi->akreditasiProdiS1->akreditasi->tahun}/{$model->borangS1Prodi->akreditasiProdiS1->id_prodi}/prodi/borang/dokumen/{$model->nama_dokumen}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusDokumen(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $model = DokumenBorangS1Prodi::findOne($id);
            $borangId = $model->borangS1Prodi->id;
            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangS1Prodi->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$model->borangS1Prodi->akreditasiProdiS1->akreditasi->tahun}/{$model->borangS1Prodi->akreditasiProdiS1->id_prodi}/prodi/borang/dokumen/{$model->nama_dokumen}"));
            $model->delete();

            return $this->redirect(['borang-s1-prodi/isi','borang'=>$borangId]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }

    public function actionDownloadDetail($standar,$dokumen){

        ini_set('max_execution_time', 5*60);
        $namespace = 'common\\models\\';
        $class = $namespace.'DetailBorangS1ProdiStandar'.$standar;
        $model = call_user_func($class.'::findOne',$dokumen);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$model->borangS1ProdiStandar1->borangS1Prodi->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$model->borangS1ProdiStandar1->borangS1Prodi->akreditasiProdiS1->akreditasi->tahun}/{$model->borangS1ProdiStandar1->borangS1Prodi->akreditasiProdiS1->id_prodi}/prodi/borang/dokumen/{$model->nama_dokumen}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapusDetail(){

        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $standar = Yii::$app->request->post('standar');
            $namespace = 'common\\models\\';
            $class = $namespace.'DetailBorangS1ProdiStandar'.$standar;
            $model = call_user_func($class.'::findOne',$id);
            $borangId = $model->borangS1ProdiStandar1->borangS1Prodi->id;
            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->borangS1ProdiStandar1->borangS1Prodi->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$model->borangS1ProdiStandar1->borangS1Prodi->akreditasiProdiS1->akreditasi->tahun}/{$model->borangS1ProdiStandar1->borangS1Prodi->akreditasiProdiS1->id_prodi}/prodi/borang/dokumen/{$model->nama_dokumen}"));
            $model->delete();

            return $this->redirect(['borang-s1-prodi/standar1','borang'=>$borangId]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }

}

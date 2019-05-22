<?php

namespace akreditasi\controllers;

// use akreditasi\models\DokumentasiS1ProdiForm;
use akreditasi\models\DokumentasiS1ProdiStandar1Form;
use akreditasi\models\DokumentasiS1ProdiStandar2Form;
use akreditasi\models\DokumentasiS1ProdiStandar3Form;
use akreditasi\models\DokumentasiS1ProdiStandar4Form;
use akreditasi\models\DokumentasiS1ProdiStandar5Form;
use akreditasi\models\DokumentasiS1ProdiStandar6Form;
use akreditasi\models\DokumentasiS1ProdiStandar7Form;
use common\models\DokumentasiS1Prodi;
use common\models\DokumentasiS1ProdiStandar1;
use common\models\DokumentasiS1ProdiStandar2;
use common\models\DokumentasiS1ProdiStandar3;
use common\models\DokumentasiS1ProdiStandar4;
use common\models\DokumentasiS1ProdiStandar5;
use common\models\DokumentasiS1ProdiStandar6;
use common\models\DokumentasiS1ProdiStandar7;
// use common\models\DokumenDokumentasiS1Prodi;
use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;

class DokumentasiS1ProdiController extends \yii\web\Controller
{
    public function actionIndex($dokumentasi)
    {
        $file_json = 'standar_prodi_s1.json';
        $dokumentasiProdi = DokumentasiS1Prodi::findOne($dokumentasi);

        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));
        $standar1 = DokumentasiS1ProdiStandar1::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();
        $standar2 = DokumentasiS1ProdiStandar2::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();
        $standar3 = DokumentasiS1ProdiStandar3::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();
        $standar4 = DokumentasiS1ProdiStandar4::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();
        $standar5 = DokumentasiS1ProdiStandar5::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();
        $standar6 = DokumentasiS1ProdiStandar6::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();
        $standar7 = DokumentasiS1ProdiStandar7::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();

        $decode = Json::decode($json);

        $cekisi1 = DokumentasiS1ProdiStandar1::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();
        $cekisi2 = DokumentasiS1ProdiStandar2::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();
        $cekisi3 = DokumentasiS1ProdiStandar3::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();
        $cekisi4 = DokumentasiS1ProdiStandar4::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();
        $cekisi5 = DokumentasiS1ProdiStandar5::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();
        $cekisi6 = DokumentasiS1ProdiStandar6::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();
        $cekisi7 = DokumentasiS1ProdiStandar7::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();

        $data1 = $decode[0];
        $butir1 = $data1['butir'];
        $data2 = $decode[1];
        $butir2 = $data2['butir'];
        $data3 = $decode[2];
        $butir3 = $data3['butir'];
        $data4 = $decode[3];
        $butir4 = $data4['butir'];
        $data5 = $decode[4];
        $butir5 = $data5['butir'];
        $data6 = $decode[5];
        $butir6 = $data6['butir'];
        $data7 = $decode[6];
        $butir7 = $data7['butir'];
        
        $standar1json = 0;
        $standar2json = 0;
        $standar3json = 0;
        $standar4json = 0;
        $standar5json = 0;
        $standar6json = 0;
        $standar7json = 0;

        foreach ($butir1 as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar1json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar1json++;  
            }
        }
        foreach ($butir2 as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar2json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar2json++;  
            }
        }
        foreach ($butir3 as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar3json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar3json++;  
            }
        }
        foreach ($butir4 as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar4json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar4json++;  
            }
        }
        foreach ($butir5 as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar5json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar5json++;  
            }
        }
        foreach ($butir6 as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar6json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar6json++;  
            }
        }
        foreach ($butir7 as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar7json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar7json++;  
            }
        }

        $progress1 = round(($cekisi1/$standar1json)*100,2);
        $progress2 = round(($cekisi2/$standar2json)*100,2);
        $progress3 = round(($cekisi3/$standar3json)*100,2);
        $progress4 = round(($cekisi4/$standar4json)*100,2);
        $progress5 = round(($cekisi5/$standar5json)*100,2);
        $progress6 = round(($cekisi6/$standar6json)*100,2);
        $progress7 = round(($cekisi7/$standar7json)*100,2);

        $progressDok = round(($progress1+$progress2+$progress3+$progress4+$progress5+$progress6+$progress7)/100*100,2);

        // simpan progress Dok
        $dokumentasiProdi->progress = $progressDok;
        $dokumentasiProdi->save(false);

        return $this->render('index',[
            'dokumentasiProdi'=>$dokumentasiProdi,
            'progressDok'=>$progressDok,
            'standar1'=>$standar1,
            'progress1'=>$progress1,
            'standar2'=>$standar2,
            'progress2'=>$progress2,
            'standar3'=>$standar3,
            'progress3'=>$progress3,
            'standar4'=>$standar4,
            'progress4'=>$progress4,
            'standar5'=>$standar5,
            'progress5'=>$progress5,
            'standar6'=>$standar6,
            'progress6'=>$progress6,
            'standar7'=>$standar7,
            'progress7'=>$progress7,
            'json'=>$json
        ]);
    }

    public function actionUbahPublik(){
        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $status = Yii::$app->request->post('publik');

            $model = DokumentasiS1Prodi::findOne($id);
            $model->is_publik = $status;
            $model->save();
            
            return $this->redirect(['dokumentasi-s1-prodi/index','dokumentasi'=>$id]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }

    public function actionStandar1($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));

        $dokProdi = DokumentasiS1Prodi::findOne($dokumentasi);
        $model = DokumentasiS1ProdiStandar1Form::find('kode')->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->all();
        $cekisi = DokumentasiS1ProdiStandar1::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();
        
        
        // $itemSumber = DokumentasiS1ProdiStandar1Form::find()->where(['kode'=>$model->kode])->all();
        // var_dump(!empty($cek));
        // if(!empty($cek)) {
        //     echo 'tidak kosong';
        // }
        // else{
        //     echo 'kosong';
        // }
        // exit();

        $decode = Json::decode($json);
        $data = $decode[0];
        $butir = $data['butir'];

        
        
        // Json ambil kode
        // var_dump($model);
        // foreach ($model as $key => $value) {
        //     echo $value['kode'].'aa';
        // }
        $standar1json = 0;
        foreach ($butir as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar1json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar1json++;  
            }
        }

        // echo $standar1json;
        // echo $cek;
        $progress = round(($cekisi/$standar1json)*100,2);
        // echo $progres;

        // exit();

        $dokModel = new DokumentasiS1ProdiStandar1Form();

        if($dokModel->load(Yii::$app->request->post())){
            
            $dokModel->dokumenDokumentasi = UploadedFile::getInstance($dokModel,'dokumenDokumentasi');

            if($dokModel->uploadDokumen($dokumentasi)){
                Yii::$app->session->setFlash('success','Berhasil Upload');
                return $this->redirect(Url::current());
            }
            else{
                Yii::$app->session->setFlash('danger','Gagal Upload');
                return $this->redirect(Url::current());
            }
            return $this->redirect(Url::current());
            
        }



        return $this->render('standar',[
            'model'=>$model,
            'dokProdi'=>$dokProdi,
            'json'=>$data,
            'butir'=>$butir,
            'dokModel'=>$dokModel,
            'progress'=>$progress
            // 'itemSumber'=>$itemSumber
        ]);

    }
    public function actionStandar2($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));

        $dokProdi = DokumentasiS1Prodi::findOne($dokumentasi);
        $model = DokumentasiS1ProdiStandar2Form::find('kode')->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->all();
        $cekisi = DokumentasiS1ProdiStandar2::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();

        $decode = Json::decode($json);
        $data = $decode[1];
        $butir = $data['butir'];
        
        $standar1json = 0;
        foreach ($butir as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar1json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar1json++;  
            }
        }

        $progress = round(($cekisi/$standar1json)*100,2);

        $dokModel = new DokumentasiS1ProdiStandar2Form();

        if($dokModel->load(Yii::$app->request->post())){
            
            $dokModel->dokumenDokumentasi = UploadedFile::getInstance($dokModel,'dokumenDokumentasi');

            if($dokModel->uploadDokumen($dokumentasi)){
                Yii::$app->session->setFlash('success','Berhasil Upload');
                return $this->redirect(Url::current());
            }
            else{
                Yii::$app->session->setFlash('danger','Gagal Upload');
                return $this->redirect(Url::current());
            }
            return $this->redirect(Url::current());
            
        }

        return $this->render('standar',[
            'model'=>$model,
            'dokProdi'=>$dokProdi,
            'json'=>$data,
            'butir'=>$butir,
            'dokModel'=>$dokModel,
            'progress'=>$progress
        ]);
    }

    public function actionStandar3($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));

        $dokProdi = DokumentasiS1Prodi::findOne($dokumentasi);
        $model = DokumentasiS1ProdiStandar3Form::find('kode')->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->all();
        $cekisi = DokumentasiS1ProdiStandar3::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();

        $decode = Json::decode($json);
        $data = $decode[2];
        $butir = $data['butir'];
        
        $standar1json = 0;
        foreach ($butir as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar1json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar1json++;  
            }
        }

        $progress = round(($cekisi/$standar1json)*100,2);

        $dokModel = new DokumentasiS1ProdiStandar3Form();

        if($dokModel->load(Yii::$app->request->post())){
            
            $dokModel->dokumenDokumentasi = UploadedFile::getInstance($dokModel,'dokumenDokumentasi');

            if($dokModel->uploadDokumen($dokumentasi)){
                Yii::$app->session->setFlash('success','Berhasil Upload');
                return $this->redirect(Url::current());
            }
            else{
                Yii::$app->session->setFlash('danger','Gagal Upload');
                return $this->redirect(Url::current());
            }
            return $this->redirect(Url::current());
            
        }

        return $this->render('standar',[
            'model'=>$model,
            'dokProdi'=>$dokProdi,
            'json'=>$data,
            'butir'=>$butir,
            'dokModel'=>$dokModel,
            'progress'=>$progress
        ]);
    }
    public function actionStandar4($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));

        $dokProdi = DokumentasiS1Prodi::findOne($dokumentasi);
        $model = DokumentasiS1ProdiStandar4Form::find('kode')->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->all();
        $cekisi = DokumentasiS1ProdiStandar4::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();

        $decode = Json::decode($json);
        $data = $decode[3];
        $butir = $data['butir'];
        
        $standar1json = 0;
        foreach ($butir as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar1json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar1json++;  
            }
        }

        $progress = round(($cekisi/$standar1json)*100,2);

        $dokModel = new DokumentasiS1ProdiStandar4Form();

        if($dokModel->load(Yii::$app->request->post())){
            
            $dokModel->dokumenDokumentasi = UploadedFile::getInstance($dokModel,'dokumenDokumentasi');

            if($dokModel->uploadDokumen($dokumentasi)){
                Yii::$app->session->setFlash('success','Berhasil Upload');
                return $this->redirect(Url::current());
            }
            else{
                Yii::$app->session->setFlash('danger','Gagal Upload');
                return $this->redirect(Url::current());
            }
            return $this->redirect(Url::current());
            
        }

        return $this->render('standar',[
            'model'=>$model,
            'dokProdi'=>$dokProdi,
            'json'=>$data,
            'butir'=>$butir,
            'dokModel'=>$dokModel,
            'progress'=>$progress
        ]);

    }
    public function actionStandar5($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));

        $dokProdi = DokumentasiS1Prodi::findOne($dokumentasi);
        $model = DokumentasiS1ProdiStandar5Form::find('kode')->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->all();
        $cekisi = DokumentasiS1ProdiStandar5::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();

        $decode = Json::decode($json);
        $data = $decode[4];
        $butir = $data['butir'];
        
        $standar1json = 0;
        foreach ($butir as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar1json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar1json++;  
            }
        }

        $progress = round(($cekisi/$standar1json)*100,2);

        $dokModel = new DokumentasiS1ProdiStandar5Form();

        if($dokModel->load(Yii::$app->request->post())){
            
            $dokModel->dokumenDokumentasi = UploadedFile::getInstance($dokModel,'dokumenDokumentasi');

            if($dokModel->uploadDokumen($dokumentasi)){
                Yii::$app->session->setFlash('success','Berhasil Upload');
                return $this->redirect(Url::current());
            }
            else{
                Yii::$app->session->setFlash('danger','Gagal Upload');
                return $this->redirect(Url::current());
            }
            return $this->redirect(Url::current());
            
        }

        return $this->render('standar',[
            'model'=>$model,
            'dokProdi'=>$dokProdi,
            'json'=>$data,
            'butir'=>$butir,
            'dokModel'=>$dokModel,
            'progress'=>$progress
        ]);

    }
    public function actionStandar6($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));

        $dokProdi = DokumentasiS1Prodi::findOne($dokumentasi);
        $model = DokumentasiS1ProdiStandar6Form::find('kode')->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->all();
        $cekisi = DokumentasiS1ProdiStandar6::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();

        $decode = Json::decode($json);
        $data = $decode[5];
        $butir = $data['butir'];
        
        $standar1json = 0;
        foreach ($butir as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar1json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar1json++;  
            }
        }

        $progress = round(($cekisi/$standar1json)*100,2);

        $dokModel = new DokumentasiS1ProdiStandar6Form();

        if($dokModel->load(Yii::$app->request->post())){
            
            $dokModel->dokumenDokumentasi = UploadedFile::getInstance($dokModel,'dokumenDokumentasi');

            if($dokModel->uploadDokumen($dokumentasi)){
                Yii::$app->session->setFlash('success','Berhasil Upload');
                return $this->redirect(Url::current());
            }
            else{
                Yii::$app->session->setFlash('danger','Gagal Upload');
                return $this->redirect(Url::current());
            }
            return $this->redirect(Url::current());
            
        }

        return $this->render('standar',[
            'model'=>$model,
            'dokProdi'=>$dokProdi,
            'json'=>$data,
            'butir'=>$butir,
            'dokModel'=>$dokModel,
            'progress'=>$progress
        ]);

    }
    public function actionStandar7($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));

        $dokProdi = DokumentasiS1Prodi::findOne($dokumentasi);
        $model = DokumentasiS1ProdiStandar7Form::find('kode')->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->all();
        $cekisi = DokumentasiS1ProdiStandar7::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->count();

        $decode = Json::decode($json);
        $data = $decode[6];
        $butir = $data['butir'];
        
        $standar1json = 0;
        foreach ($butir as $key => $value) {
            foreach ($value['dokumen_sumber'] as $key => $sumber) {
                $standar1json++;
            }
            foreach ($value['dokumen_pendukung'] as $key => $pendukung) {
                $standar1json++;  
            }
        }

        $progress = round(($cekisi/$standar1json)*100,2);

        $dokModel = new DokumentasiS1ProdiStandar7Form();

        if($dokModel->load(Yii::$app->request->post())){
            
            $dokModel->dokumenDokumentasi = UploadedFile::getInstance($dokModel,'dokumenDokumentasi');

            if($dokModel->uploadDokumen($dokumentasi)){
                Yii::$app->session->setFlash('success','Berhasil Upload');
                return $this->redirect(Url::current());
            }
            else{
                Yii::$app->session->setFlash('danger','Gagal Upload');
                return $this->redirect(Url::current());
            }
            return $this->redirect(Url::current());
            
        }

        return $this->render('standar',[
            'model'=>$model,
            'dokProdi'=>$dokProdi,
            'json'=>$data,
            'butir'=>$butir,
            'dokModel'=>$dokModel,
            'progress'=>$progress
        ]);


    }

    public function actionDownloadDok($standar, $dok, $dokumentasi){

        ini_set('max_execution_time', 5*60);
        $dokumentasi = DokumentasiS1Prodi::findOne($dokumentasi);
        $namespace = 'common\\models\\';
        $class = $namespace.'DokumentasiS1ProdiStandar'.$standar;
        $model = call_user_func($class.'::findOne',$dok);
        $file = Yii::getAlias('@uploadAkreditasi'."/{$dokumentasi->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$dokumentasi->akreditasiProdiS1->akreditasi->tahun}/{$dokumentasi->akreditasiProdiS1->id_prodi}/prodi/dokumentasi/{$model->dokumen}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionPublikStandar($id, $publik, $standar, $dokumentasi){

        $namespace = 'common\\models\\';
        $class = $namespace.'DokumentasiS1ProdiStandar'.$standar;
        $model = call_user_func($class.'::findOne',$id);

        $status;
        if($publik === 1){
            $status = 'Tidak Publik';
        }
        else{
            $status = 'Publik';
        }
       
        $model->is_publik = $publik;
        if ($model->save()){
            Yii::$app->session->setFlash('success',"Dokumen $model->dokumen jadi $status");
            return $this->redirect(["dokumentasi-s1-prodi/standar$standar","dokumentasi"=>$dokumentasi]);
        }
        else{
            Yii::$app->session->setFlash('danger','Tidak Berhasil');
            return $this->redirect(["dokumentasi-s1-prodi/standar$standar","dokumentasi"=>$dokumentasi]);
        }
        
        return $this->redirect(["dokumentasi-s1-prodi/standar$standar","dokumentasi"=>$dokumentasi]);
        
    }

    public function actionAsesorStandar($id, $asesor, $standar, $dokumentasi){

        $namespace = 'common\\models\\';
        $class = $namespace.'DokumentasiS1ProdiStandar'.$standar;
        $model = call_user_func($class.'::findOne',$id);

        $status;
        if($asesor === 1){
            $status = 'Tidak Asesor';
        }
        else{
            $status = 'Asesor';
        }
       
        $model->is_asesor = $asesor;
        if ($model->save()){
            Yii::$app->session->setFlash('success',"Dokumen $model->dokumen jadi $status");
            return $this->redirect(["dokumentasi-s1-prodi/standar$standar","dokumentasi"=>$dokumentasi]);
        }
        else{
            Yii::$app->session->setFlash('danger','Tidak Berhasil');
            return $this->redirect(["dokumentasi-s1-prodi/standar$standar","dokumentasi"=>$dokumentasi]);
        }
        
        return $this->redirect(["dokumentasi-s1-prodi/standar$standar","dokumentasi"=>$dokumentasi]);
        
    }

    public function actionHapusStandar(){
        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $standar = Yii::$app->request->post('standar');
            $dokumentasi = Yii::$app->request->post('dokumentasi');

            $namespace = 'common\\models\\';
            $class = $namespace.'DokumentasiS1ProdiStandar'.$standar;
            $model = call_user_func($class.'::findOne',$id);
    
            
            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->dokumentasiS1Prodi->akreditasiProdiS1->akreditasi->lembaga}/prodi/{$model->dokumentasiS1Prodi->akreditasiProdiS1->akreditasi->tahun}/{$model->dokumentasiS1Prodi->akreditasiProdiS1->id_prodi}/prodi/dokumentasi/{$model->dokumen}"));
            $model->delete();

            return $this->redirect(["dokumentasi-s1-prodi/standar$standar","dokumentasi"=>$dokumentasi]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }


}

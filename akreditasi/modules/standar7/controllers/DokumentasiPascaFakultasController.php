<?php

namespace akreditasi\modules\standar7\controllers;

// use akreditasi\models\DokumentasiPascaProdiForm;
use akreditasi\models\S7DokumentasiPascaFakultasStandar1Form;
use akreditasi\models\S7DokumentasiPascaFakultasStandar2Form;
use akreditasi\models\S7DokumentasiPascaFakultasStandar3Form;
use akreditasi\models\S7DokumentasiPascaFakultasStandar4Form;
use akreditasi\models\S7DokumentasiPascaFakultasStandar5Form;
use akreditasi\models\S7DokumentasiPascaFakultasStandar6Form;
use akreditasi\models\S7DokumentasiPascaFakultasStandar7Form;
use common\models\S7DokumentasiPascaFakultas;
use common\models\S7DokumentasiPascaFakultasStandar1;
use common\models\S7DokumentasiPascaFakultasStandar2;
use common\models\S7DokumentasiPascaFakultasStandar3;
use common\models\S7DokumentasiPascaFakultasStandar4;
use common\models\S7DokumentasiPascaFakultasStandar5;
use common\models\S7DokumentasiPascaFakultasStandar6;
use common\models\S7DokumentasiPascaFakultasStandar7;
// use common\models\DokumenDokumentasiPascaFakultas;
use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;

class DokumentasiPascaFakultasController extends \yii\web\Controller
{

//    public function behaviors()
//    {
//        return[
//            'access'=>[
//                'class'=>AccessControl::className(),
//                'rules'=>[
//                    [
//                        'actions'=>[
//                            'unggah','unggah-standar','hapus-gambar','isi','isi-standar','hapus-dokumen','hapus-detail',
//                            'allow'=>true,
//                            'roles'=>['userFakultas']
//                        ]
//                    ],
//                    ['actions'=>['lihat','lihat-standar','download-isian','download-template','download','download-detail'],
//                        'allow'=>true,
//                        'roles'=>['adminLpm','superUser','adminFakultas','userFakultas']
//                    ],
//
//                ]
//            ],
//        ];
//    }

    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }

    public function actionIsi($dokumentasi)
    {
        $file_json = 'standar_fakultas_s1.json';
        $dokumentasiProdi = S7DokumentasiPascaFakultas::findOne($dokumentasi);

        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));
        $standar1 = S7DokumentasiPascaFakultasStandar1::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar2 = S7DokumentasiPascaFakultasStandar2::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar3 = S7DokumentasiPascaFakultasStandar3::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar4 = S7DokumentasiPascaFakultasStandar4::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar5 = S7DokumentasiPascaFakultasStandar5::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar6 = S7DokumentasiPascaFakultasStandar6::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar7 = S7DokumentasiPascaFakultasStandar7::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();

        $decode = Json::decode($json);

        $cekisi1 = S7DokumentasiPascaFakultasStandar1::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->count();
        $cekisi2 = S7DokumentasiPascaFakultasStandar2::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->count();
        $cekisi3 = S7DokumentasiPascaFakultasStandar3::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->count();
        $cekisi4 = S7DokumentasiPascaFakultasStandar4::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->count();
        $cekisi5 = S7DokumentasiPascaFakultasStandar5::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->count();
        $cekisi6 = S7DokumentasiPascaFakultasStandar6::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->count();
        $cekisi7 = S7DokumentasiPascaFakultasStandar7::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->count();

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

        // var_dump($butir5);
        // exit();

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

        return $this->render('isi',[
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
            'json'=>$json,
            'cari'=>'isi'
        ]);
    }

    public function actionUbahPublik(){
        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $status = Yii::$app->request->post('publik');


            $model = S7DokumentasiPascaFakultas::findOne($id);
            $model->is_publik = $status;
//            var_dump($model);
//            exit();
            $model->save();

            return $this->redirect(['dokumentasi-pasca-fakultas/isi','dokumentasi'=>$id]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }


    public function actionIsiStandar($standar, $dokumentasi){

        $file_json = 'standar_fakultas_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));

        $dokProdi = S7DokumentasiPascaFakultas::findOne($dokumentasi);
        $sourceModel = 'akreditasi\\models\\S7DokumentasiPascaFakultasStandar'.$standar.'Form';
        // $model = DokumentasiPascaProdiStandar2Form::find('kode')->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->all();
        $model = call_user_func($sourceModel.'::find')->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->all();

        $sourceCek = 'common\\models\\S7DokumentasiPascaFakultasStandar'.$standar;
        // $cekisi = DokumentasiPascaProdiStandar2::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->count();
        $cekisi = call_user_func($sourceCek.'::find')->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->count();

        $decode = Json::decode($json);
        $data = $decode[$standar-1];
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

        $dokModel = new $sourceModel;

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
            'progress'=>$progress,
            'cari'=>'isi'
        ]);
    }


    public function actionDownloadDok($standar, $dok, $dokumentasi){

        ini_set('max_execution_time', 5*60);
        $dokumentasi = S7DokumentasiPascaFakultas::findOne($dokumentasi);
        $namespace = 'common\\models\\S7';
        $class = $namespace.'DokumentasiPascaFakultasStandar'.$standar;
        $model = call_user_func($class.'::findOne',$dok);

        $file = Yii::getAlias('@uploadAkreditasi'."/{$dokumentasi->akreditasi->lembaga}/prodi/{$dokumentasi->akreditasi->tahun}/fakultas/{$dokumentasi->id_fakultas}/dokumentasi/{$model->dokumen}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionPublikStandar($id, $publik, $standar, $dokumentasi){

        $namespace = 'common\\models\\S7';
        $class = $namespace.'DokumentasiPascaFakultasStandar'.$standar;
        $model = call_user_func($class.'::findOne',$id);


        if($publik == 0){
            $status = 'Tidak Publik';
            $model->is_publik = $publik;
            if ($model->save()){
                Yii::$app->session->setFlash('success',"Dokumen $model->dokumen jadi $status");
                return $this->redirect(['dokumentasi-pasca-fakultas/isi-standar','standar'=>$standar,'dokumentasi'=>$dokumentasi]);
            }
            else{
                Yii::$app->session->setFlash('danger','Tidak Berhasil');
                return $this->redirect(['dokumentasi-pasca-fakultas/isi-standar','standar'=>$standar,'dokumentasi'=>$dokumentasi]);
            }
        }
        else{
            $status = 'Publik';
            $model->is_publik = $publik;
            if ($model->save()){
                Yii::$app->session->setFlash('success',"Dokumen $model->dokumen jadi $status");
                return $this->redirect(['dokumentasi-pasca-fakultas/isi-standar','standar'=>$standar,'dokumentasi'=>$dokumentasi]);
            }
            else{
                Yii::$app->session->setFlash('danger','Tidak Berhasil');
                return $this->redirect(['dokumentasi-pasca-fakultas/isi-standar','standar'=>$standar,'dokumentasi'=>$dokumentasi]);
            }
        }



//        return $this->redirect(["dokumentasi-pasca-fakultas/standar$standar","dokumentasi"=>$dokumentasi]);

    }

    public function actionAsesorStandar($id, $asesor, $standar, $dokumentasi){

        $namespace = 'common\\models\\S7';
        $class = $namespace.'DokumentasiPascaFakultasStandar'.$standar;
        $model = call_user_func($class.'::findOne',$id);


        if($asesor == 0){
            $status = 'Tidak Asesor';
            $model->is_asesor = $asesor;
            if ($model->save()){
                Yii::$app->session->setFlash('success',"Dokumen $model->dokumen jadi $status");
                return $this->redirect(['dokumentasi-pasca-fakultas/isi-standar','standar'=>$standar,'dokumentasi'=>$dokumentasi]);
            }
            else{
                Yii::$app->session->setFlash('danger','Tidak Berhasil');
                return $this->redirect(['dokumentasi-pasca-fakultas/isi-standar','standar'=>$standar,'dokumentasi'=>$dokumentasi]);
            }
        }
        else{
            $status = 'Asesor';
            $model->is_asesor = $asesor;
            if ($model->save()){
                Yii::$app->session->setFlash('success',"Dokumen $model->dokumen jadi $status");
                return $this->redirect(['dokumentasi-pasca-fakultas/isi-standar','standar'=>$standar,'dokumentasi'=>$dokumentasi]);
            }
            else{
                Yii::$app->session->setFlash('danger','Tidak Berhasil');
                return $this->redirect(['dokumentasi-pasca-fakultas/isi-standar','standar'=>$standar,'dokumentasi'=>$dokumentasi]);
            }
        }



//        return $this->redirect(["dokumentasi-pasca-fakultas/standar$standar","dokumentasi"=>$dokumentasi]);

    }

    public function actionHapusStandar(){
        if(Yii::$app->request->isPost){
            $id = Yii::$app->request->post('id');
            $standar = Yii::$app->request->post('standar');
            $dokumentasi = Yii::$app->request->post('dokumentasi');

            $namespace = 'common\\models\\S7';
            $class = $namespace.'DokumentasiPascaFakultasStandar'.$standar;
            $model = call_user_func($class.'::findOne',$id);


            unlink(Yii::getAlias('@uploadAkreditasi'."/{$model->dokumentasiPascaFakultas->akreditasi->lembaga}/prodi/{$model->dokumentasiPascaFakultas->akreditasi->tahun}/fakultas/{$model->dokumentasiPascaFakultas->id_fakultas}/dokumentasi/{$model->dokumen}"));
            $model->delete();

            return $this->redirect(['dokumentasi-pasca-fakultas/isi-standar','standar'=>$standar,'dokumentasi'=>$dokumentasi]);
        }
        throw new BadRequestHttpException('Request Harus Post');
    }

    public function actionPj($dokumentasi){
        $file_json = 'standar_fakultas_s1.json';
        $dokumentasiProdi = S7DokumentasiPascaFakultas::findOne($dokumentasi);

        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));
        $standar1 = S7DokumentasiPascaFakultasStandar1::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar2 = S7DokumentasiPascaFakultasStandar2::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar3 = S7DokumentasiPascaFakultasStandar3::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar4 = S7DokumentasiPascaFakultasStandar4::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar5 = S7DokumentasiPascaFakultasStandar5::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar6 = S7DokumentasiPascaFakultasStandar6::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar7 = S7DokumentasiPascaFakultasStandar7::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();

        $decode = Json::decode($json);

        return $this->render('pj',[
            'dokumentasiProdi'=>$dokumentasiProdi,
            'standar1'=>$standar1,
            'standar2'=>$standar2,
            'standar3'=>$standar3,
            'standar4'=>$standar4,
            'standar5'=>$standar5,
            'standar6'=>$standar6,
            'standar7'=>$standar7,
            'json'=>$json,
            'cari'=>'pj'
        ]);
    }

    public function actionPjStandar($standar, $dokumentasi){

        $file_json = 'standar_fakultas_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));

        $dokProdi = S7DokumentasiPascaFakultas::findOne($dokumentasi);
        $sourceModel = 'akreditasi\\models\\S7DokumentasiPascaFakultasStandar'.$standar.'Form';
        // $model = DokumentasiPascaProdiStandar2Form::find('kode')->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->all();
        $model = call_user_func($sourceModel.'::find')->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->all();

        $sourceCek = 'common\\models\\S7DokumentasiPascaFakultasStandar'.$standar;
        // $cekisi = DokumentasiPascaProdiStandar2::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->count();
        $cekisi = call_user_func($sourceCek.'::find')->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->count();

        $decode = Json::decode($json);
        $data = $decode[$standar-1];
        $butir = $data['butir'];



        $dokModel = new $sourceModel;

        return $this->render('pj-standar',[
            'model'=>$model,
            'dokProdi'=>$dokProdi,
            'json'=>$data,
            'butir'=>$butir,
            'dokModel'=>$dokModel,
            'cari'=>'pj'
        ]);

    }

    public function actionLihat($dokumentasi){
        $file_json = 'standar_fakultas_s1.json';
        $dokumentasiProdi = S7DokumentasiPascaFakultas::findOne($dokumentasi);

        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));
        $standar1 = S7DokumentasiPascaFakultasStandar1::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar2 = S7DokumentasiPascaFakultasStandar2::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar3 = S7DokumentasiPascaFakultasStandar3::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar4 = S7DokumentasiPascaFakultasStandar4::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar5 = S7DokumentasiPascaFakultasStandar5::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar6 = S7DokumentasiPascaFakultasStandar6::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();
        $standar7 = S7DokumentasiPascaFakultasStandar7::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->one();

        $decode = Json::decode($json);

        return $this->render('lihat',[
            'dokumentasiProdi'=>$dokumentasiProdi,
            'standar1'=>$standar1,
            'standar2'=>$standar2,
            'standar3'=>$standar3,
            'standar4'=>$standar4,
            'standar5'=>$standar5,
            'standar6'=>$standar6,
            'standar7'=>$standar7,
            'json'=>$json,
            'cari'=>'lihat'
        ]);
    }

    public function actionLihatStandar($standar, $dokumentasi){
        $file_json = 'standar_fakultas_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));

        $dokProdi = S7DokumentasiPascaFakultas::findOne($dokumentasi);
        $sourceModel = 'akreditasi\\models\\S7DokumentasiPascaFakultasStandar'.$standar.'Form';
        // $model = DokumentasiPascaProdiStandar2Form::find('kode')->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->all();
        $model = call_user_func($sourceModel.'::find')->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->all();

        $sourceCek = 'common\\models\\S7DokumentasiPascaFakultasStandar'.$standar;
        // $cekisi = DokumentasiPascaProdiStandar2::find()->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->count();
        $cekisi = call_user_func($sourceCek.'::find')->where(['id_dokumentasi_pasca_fakultas'=>$dokumentasi])->count();

        $decode = Json::decode($json);
        $data = $decode[$standar-1];
        $butir = $data['butir'];

        $standar1json = 0;


        $dokModel = new $sourceModel;


        return $this->render('lihat-standar',[
            'model'=>$model,
            'dokProdi'=>$dokProdi,
            'json'=>$data,
            'butir'=>$butir,
            'dokModel'=>$dokModel,
            'cari'=>'lihat'
        ]);
    }

}
<?php

namespace akreditasi\modules\standar7\controllers;

use common\models\sertifikat\SertifikatForm;
use Yii;

use common\models\sertifikat\SertifikatProdiForm;
use common\models\sertifikat\SertifikatInstitusiForm;
use yii\web\NotFoundHttpException;

class SertifikatController extends \yii\web\Controller {

    public function actionArsipSertifikat () {

        $dataSertifikat = ['institusi' => 'Institusi', 'prodi' => 'Program Studi'];

//        $modelInstitusi  = new SertifikatInstitusiForm();
//        $modelProdi = new SertifikatProdiForm() ;
        $modelSertifikat = new SertifikatForm();

        if ($modelSertifikat->load(Yii::$app->request->post())){

            $url = $modelSertifikat->cari();
            $sertifikat = $modelSertifikat->getSertifikat();
            if(!$sertifikat){
                throw new NotFoundHttpException('Data yang anda cari tidak ditemukan');
            }

            $this->redirect([$url]);
        }

        return $this->render('arsip-sertifikat', [
            'dataSertifikat'=>$dataSertifikat,
            'modelSertifikat'=>$modelSertifikat
        ]);

    }

    public function actionGrafikSertifikat(){
        return $this->render('grafik-sertifikat');
    }

    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }

}
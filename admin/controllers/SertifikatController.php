<?php

namespace admin\controllers;

use common\models\FakultasAkademi;
use common\models\ProgramStudi;
use common\models\sertifikat\SertifikatForm;
use common\models\sertifikat\SertifikatInstitusi;
use common\models\sertifikat\SertifikatProdi;
use Yii;

use common\models\sertifikat\SertifikatProdiForm;
use common\models\sertifikat\SertifikatInstitusiForm;
use yii\db\Query;
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

        $modelInstitusi = SertifikatInstitusi::find()->orderBy(['id' => SORT_DESC])->one();

        $sqlFSI = 'SELECT * FROM sertifikat_prodi INNER JOIN program_studi ON sertifikat_prodi.id_prodi = program_studi.id WHERE program_studi.id_fakultas_akademi = 1';
        $sertifikatFSI = Yii::$app->db->createCommand($sqlFSI)->queryAll();
        $sqlFTK = 'SELECT * FROM sertifikat_prodi INNER JOIN program_studi ON sertifikat_prodi.id_prodi = program_studi.id WHERE program_studi.id_fakultas_akademi = 2';
        $sertifikatFTK = Yii::$app->db->createCommand($sqlFTK)->queryAll();
        $sqlFDK = 'SELECT * FROM sertifikat_prodi INNER JOIN program_studi ON sertifikat_prodi.id_prodi = program_studi.id WHERE program_studi.id_fakultas_akademi = 3';
        $sertifikatFDK = Yii::$app->db->createCommand($sqlFDK)->queryAll();
        $sqlFEB = 'SELECT * FROM sertifikat_prodi INNER JOIN program_studi ON sertifikat_prodi.id_prodi = program_studi.id WHERE program_studi.id_fakultas_akademi = 4';
        $sertifikatFEB = Yii::$app->db->createCommand($sqlFEB)->queryAll();
        $sqlPASCA = 'SELECT * FROM sertifikat_prodi INNER JOIN program_studi ON sertifikat_prodi.id_prodi = program_studi.id WHERE program_studi.id_fakultas_akademi = 5';
        $sertifikatPASCA = Yii::$app->db->createCommand($sqlPASCA)->queryAll();



        return $this->render('grafik-sertifikat', [
            'modelInstitusi' => $modelInstitusi,
            'sertifikatFSI' => $sertifikatFSI,
            'sertifikatFTK' => $sertifikatFTK,
            'sertifikatFDK' => $sertifikatFDK,
            'sertifikatFEB' => $sertifikatFEB,
            'sertifikatPASCA' => $sertifikatPASCA
//
        ]);
    }

    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }

}
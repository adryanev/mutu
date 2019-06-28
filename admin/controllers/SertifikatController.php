<?php

namespace admin\controllers;

use common\models\FakultasAkademi;
use common\models\ProgramStudi;
use common\models\sertifikat\SertifikatForm;
use common\models\sertifikat\SertifikatInstitusi;
use common\models\sertifikat\SertifikatProdi;
use DateTime;
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

        $konversiakre = DateTime::createFromFormat('U',$modelInstitusi->tgl_akreditasi);
        $timeakre = $konversiakre->format('d-M-Y');
        $konversikdl = DateTime::createFromFormat('U',$modelInstitusi->tgl_kadaluarsa);
        $timekdl = $konversikdl->format('d-M-Y');
        $konversiterima = DateTime::createFromFormat('U',$modelInstitusi->tanggal_diterima);
        $timeterima = $konversiterima->format('d-M-Y');
        $konversiaju = DateTime::createFromFormat('U',$modelInstitusi->tanggal_pengajuan);
        $timeaju = $konversiaju->format('d-M-Y');


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

        $countProdi = ProgramStudi::find()->count();
        $countA = SertifikatProdi::find()->where(['nilai_huruf'=>'A'])->count();
        $countB = SertifikatProdi::find()->where(['nilai_huruf'=>'B'])->count();
        $countC = SertifikatProdi::find()->where(['nilai_huruf'=>'C'])->count();
        $countNon = $countProdi-($countA+$countB+$countC);

        $persenProdi = round(($countProdi/$countProdi)*100, 0);
        $persenA = round(($countA/$countProdi)*100 , 0);
        $persenB = round(($countB/$countProdi)*100, 0);
        $persenC = round(($countC/$countProdi)*100, 0);
        $persenNon = round(($countNon/$countProdi)*100, 0);

        return $this->render('grafik-sertifikat', [
            'modelInstitusi' => $modelInstitusi,
            'sertifikatFSI' => $sertifikatFSI,
            'sertifikatFTK' => $sertifikatFTK,
            'sertifikatFDK' => $sertifikatFDK,
            'sertifikatFEB' => $sertifikatFEB,
            'sertifikatPASCA' => $sertifikatPASCA,
            'timeakre' => $timeakre,
            'timekdl' => $timekdl,
            'timeterima' => $timeterima,
            'timeaju' => $timeaju,
            'countProdi' => $countProdi,
            'countA' => $countA,
            'countB' => $countB,
            'countC' => $countC,
            'countNon' => $countNon,
            'persenProdi' => $persenProdi,
            'persenA' => $persenA,
            'persenB' => $persenB,
            'persenC' => $persenC,
            'persenNon' => $persenNon,
        ]);
    }

    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }

}
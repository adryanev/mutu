<?php

namespace akreditasi\controllers;

use akreditasi\models\DokumentasiS1ProdiForm;
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
use yii\helpers\Url;

class DokumentasiS1ProdiController extends \yii\web\Controller
{
    public function actionIndex($dokumentasi)
    {
        $file_json = 'standar_prodi_s1.json';
        $dokumentasiProdi = DokumentasiS1Prodi::findOne($dokumentasi);
        // $dokumentasiStatus = DokumentasiS1Prodi::findOne($dokumentasi);
        // $dokumenDokumentasi = new DokumentasiS1ProdiForm();
        // $dataDokumenDokumentasi = DokumenDokumentasiS1Prodi::find()->where(['id_borang_s1_prodi'=>$dokumentasi])->all();
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));
        $standar1 = DokumentasiS1ProdiStandar1::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();
        $standar2 = DokumentasiS1ProdiStandar2::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();
        $standar3 = DokumentasiS1ProdiStandar3::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();
        $standar4 = DokumentasiS1ProdiStandar4::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();
        $standar5 = DokumentasiS1ProdiStandar5::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();
        $standar6 = DokumentasiS1ProdiStandar6::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();
        $standar7 = DokumentasiS1ProdiStandar7::find()->where(['id_dokumentasi_s1_prodi'=>$dokumentasi])->one();


        // if($dokumenBorang->load(Yii::$app->request->post())){

        //     var_dump($dokumenBorang);
        //     exit();
            
        //     $dokumenBorang->uploadDokumen();

        //     return $this->redirect(Url::current());
        // }

        // var_dump($dokumentasiStatus);
        // exit();

        return $this->render('index',[
            'dokumentasiProdi'=>$dokumentasiProdi,
            // 'dokumenBorang'=>$dokumenBorang,
            // 'dataDokumenBorang'=>$dataDokumenBorang,
            // 'progress' => $dokumentasiStatus,
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

    public function actionStandar1($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));

        return $this->render('standar1');
    }
    public function actionStandar2($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));
        return $this->render('standar2');
    }
    public function actionStandar3($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));
        return $this->render('standar3');
    }
    public function actionStandar4($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));
        return $this->render('standar4');

    }
    public function actionStandar5($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));
        return $this->render('standar5');

    }
    public function actionStandar6($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));
        return $this->render('standar6');

    }
    public function actionStandar7($dokumentasi){

        $file_json = 'standar_prodi_s1.json';
        $json = file_get_contents(Yii::getAlias('@common/required/dokumentasi/'.$file_json));
        return $this->render('standar7');


    }

}

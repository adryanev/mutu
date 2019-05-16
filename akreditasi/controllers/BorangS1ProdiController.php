<?php

namespace akreditasi\controllers;

use akreditasi\models\BorangS1ProdiForm;
use common\models\BorangS1ProdiStandar1;
use common\models\BorangS1ProdiStandar2;
use common\models\BorangS1ProdiStandar3;
use common\models\BorangS1ProdiStandar4;
use common\models\BorangS1ProdiStandar5;
use common\models\BorangS1ProdiStandar6;
use common\models\BorangS1ProdiStandar7;
use common\models\DokumenBorangS1Prodi;
use Yii;
use yii\helpers\Url;

class BorangS1ProdiController extends \yii\web\Controller
{
    public function actionIndex($borang)
    {
        $file_json = 'borang_prodi_s1.json';
        $dokumenBorang = new BorangS1ProdiForm();
        $dataDokumenBorang = DokumenBorangS1Prodi::find()->where(['id_borang_s1_prodi'=>$borang])->all();
        $json = file_get_contents(Yii::getAlias('@common/required/'.$file_json));
        $standar1 = BorangS1ProdiStandar1::find()->where(['id_borang_s1_prodi'=>$borang])->one();
        $standar2 = BorangS1ProdiStandar2::find()->where(['id_borang_s1_prodi'=>$borang])->one();
        $standar3 = BorangS1ProdiStandar3::find()->where(['id_borang_s1_prodi'=>$borang])->one();
        $standar4 = BorangS1ProdiStandar4::find()->where(['id_borang_s1_prodi'=>$borang])->one();
        $standar5 = BorangS1ProdiStandar5::find()->where(['id_borang_s1_prodi'=>$borang])->one();
        $standar6 = BorangS1ProdiStandar6::find()->where(['id_borang_s1_prodi'=>$borang])->one();
        $standar7 = BorangS1ProdiStandar7::find()->where(['id_borang_s1_prodi'=>$borang])->one();


        if($dokumenBorang->load(Yii::$app->request->post())){
            var_dump($dokumenBorang);
            exit();
            $dokumenBorang->uploadDokumen();

            return $this->redirect(Url::current());
        }
        return $this->render('index',[
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

}

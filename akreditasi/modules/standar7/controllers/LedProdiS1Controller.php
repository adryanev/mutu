<?php

namespace akreditasi\modules\standar7\controllers;

use common\models\ProgramStudi;
use common\models\S7Akreditasi;
use Yii;
use yii\base\DynamicModel;
use yii\helpers\ArrayHelper;

class LedProdiS1Controller extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }

    public function actionIndex($akreditasi, $prodi)
    {
        return $this->render('index');
    }

    public function actionArsip()
    {

        $model = new DynamicModel(['akreditasi','prodi']);
        $model->addRule('akreditasi','required');
        $model->addRule('prodi','required');

        $dataAkreditasi  = ArrayHelper::map(S7Akreditasi::find()->all(),'id','nama');
        $dataProdi = ArrayHelper::map(ProgramStudi::findAll(['jenjang'=>'S1']),'id','nama');
        if($model->load(Yii::$app->request->post())){

            $id_akreditasi = $model->akreditasi;
            $id_prodi = $model->prodi;


            return $this->redirect(['led-prodi-s1/index','akreditasi'=>$id_akreditasi,'prodi'=>$id_prodi]);

        }

        return $this->render('arsip',[
            'model'=>$model,
            'dataAkreditasi'=>$dataAkreditasi,
            'dataProdi'=>$dataProdi
        ]);

    }

}

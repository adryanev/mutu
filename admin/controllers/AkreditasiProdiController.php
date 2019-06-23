<?php

namespace admin\controllers;

use common\models\Program;
use Yii;
use yii\base\DynamicModel;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class AkreditasiProdiController extends Controller
{
    public function actionIndex()
    {
        $model = new DynamicModel(['program']);
        $dataProgram =['S1'=>'Sarjana','S2'=>'Pascasarjana'];
        $model->addRule('program','required');

        if($model->load(Yii::$app->request->post())){

            $redirect = '';
            $program = strtolower($model->program);
            $redirect .= "akreditasi-prodi-$program/index";
            return $this->redirect([$redirect]);
        }
        return $this->render('index',['model'=>$model,'dataProgram'=>$dataProgram]);
    }

}

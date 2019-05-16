<?php

namespace admin\controllers;

use common\models\Program;
use yii\base\DynamicModel;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class AkreditasiProdiController extends Controller
{
    public function actionIndex()
    {
        $model = new DynamicModel(['program']);
        $dataProgram = ArrayHelper::map(Program::find()->all(),'id','nama');
        $model->addRule('program','required');

        if($model->load(\Yii::$app->request->post())){

            $redirect = '';
            $idProgram = (int)$model->getAttributes(['program']);
            $nama = Program::findOne($idProgram)->nama;
            $program = strtolower($nama);
            $redirect .= "akreditasi-prodi-$program/index";
            return $this->redirect([$redirect]);
        }
        return $this->render('index',['model'=>$model,'dataProgram'=>$dataProgram]);
    }

}

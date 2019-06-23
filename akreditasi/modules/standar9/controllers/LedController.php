<?php

namespace akreditasi\modules\standar9\controllers;

use common\models\ProgramStudi;
use Yii;
use yii\base\DynamicModel;

class LedController extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }

    public function actionProdi()
    {
        $model = new DynamicModel(['jenjang']);
        $model->addRule('jenjang','required');
        $prodi = Yii::$app->user->identity->profilUser->id_prodi;
        if($prodi){
            $p = ProgramStudi::findOne($prodi);

            if($p->jenjang == 'S1'){
                $dataJenjang = ['S1'=>'Sarjana (S1)'];

            }else{
                $dataJenjang = ['pasca'=>'Pasca Sarjana'];

            }
        }else{
            $dataJenjang = ['S1'=>'Sarjana (S1)','pasca'=>'Pasca Sarjana'];

        }

        if($model->load(Yii::$app->request->post())){
            $url = "led-prodi-";
            $url .= strtolower($model->jenjang);

            return $this->redirect([$url.'/arsip']);
        }
        return $this->render('prodi',[
            'model'=>$model,
            'dataJenjang'=>$dataJenjang
        ]);

    }

}

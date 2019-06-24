<?php

namespace akreditasi\modules\standar7\controllers;

use common\models\ProgramStudi;
use Yii;
use yii\base\DynamicModel;
use yii\web\Controller;

/**
 * Default controller for the `standar7` module
 */
class DefaultController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {

        $prodi = Yii::$app->user->identity->profilUser->id_prodi;
        if($prodi != null){
            $prodiuser = ProgramStudi::findOne($prodi);

        return $this->render('index',[
            'prodiuser' => $prodiuser
        ]);

        }

        return $this->render('index2');
    }
}

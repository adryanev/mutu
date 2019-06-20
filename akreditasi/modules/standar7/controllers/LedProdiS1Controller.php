<?php

namespace akreditasi\modules\standar7\controllers;

class LedProdiS1Controller extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}

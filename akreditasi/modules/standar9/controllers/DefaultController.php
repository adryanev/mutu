<?php

namespace akreditasi\modules\standar9\controllers;

use yii\web\Controller;

/**
 * Default controller for the `standar9` module
 */
class DefaultController extends Controller
{
    public function beforeAction($action)
    {
        $this->layout="main";
        return parent::beforeAction($action);
    }

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
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}

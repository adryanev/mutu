<?php

namespace akreditasi\modules\standar7\controllers;

use yii\web\Controller;

/**
 * Default controller for the `standar7` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}

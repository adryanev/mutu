<?php

namespace akreditasi\controllers;

use yii\web\Controller;

class PenilaianController extends Controller
{
    public function actionArsipPenilaian()
    {
        return $this->render('arsip-penilaian');
    }

}

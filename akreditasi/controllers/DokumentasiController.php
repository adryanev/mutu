<?php

namespace akreditasi\controllers;

class DokumentasiController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionIsi()
    {
        return $this->render('isi');
    }
    public function actionLihatDok()
    {
        return $this->render('lihat_dok');
    }
    public function actionLihatIsiDok()
    {
        return $this->render('lihat_isi_dok');
    }
    public function actionLihatPenanggung()
    {
        return $this->render('lihat_penanggung');
    }
    public function actionLihat()
    {
        return $this->render('lihat');
    }
    public function actionPenanggung()
    {
        return $this->render('penanggung');
    }

}

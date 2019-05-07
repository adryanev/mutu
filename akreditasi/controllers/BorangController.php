<?php

namespace akreditasi\controllers;

class BorangController extends \yii\web\Controller
{
    public function actionUnggah()
    {
        return $this->render('unggah');
    }

    public function actionCari(){
        return $this->render('cari');
    }

    public function actionLihatUnggah(){
        return $this->render('lihat_unggah');
    }

    public function actionIsi(){
        return $this->render('isi');
    }

    public function actionLihatIsi(){
        return $this->render('lihat_isi');
    }

    public function actionLihat(){
        return $this->render('lihat');
    }

    public function actionLihatLihat(){
        return $this->render('lihat_lihat');
    }

}

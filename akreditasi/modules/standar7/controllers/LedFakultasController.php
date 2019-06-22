<?php

namespace akreditasi\modules\standar7\controllers;

use common\models\FakultasAkademi;
use common\models\led\S7LedFakultas;
use common\models\led\S7LedFakultasDetail;
use common\models\S7Akreditasi;
use Yii;
use yii\base\DynamicModel;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\UploadedFile;

class LedFakultasController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [

                    ['actions' => ['arsip', 'index', 'lihat', 'download', 'hapus'],
                        'allow' => true,
                        'roles' => ['adminLpm', 'superUser', 'adminFakultas', 'userFakultas']
                    ],

                ]
            ],
        ];
    }

    public function beforeAction($action)
    {
        $this->layout = "main";
        return parent::beforeAction($action);
    }


    public function actionArsip()
    {

        $model = new DynamicModel(['akreditasi', 'fakultas']);
        $model->addRule('akreditasi', 'required');
        $model->addRule('fakultas', 'required');

        $dataAkreditasi = ArrayHelper::map(S7Akreditasi::find()->all(), 'id', 'nama');
        $dataFakultas = ArrayHelper::map(FakultasAkademi::find()->all(), 'id', 'nama');
        if ($model->load(Yii::$app->request->post())) {

            $id_akreditasi = $model->akreditasi;
            $id_fakultas = $model->fakultas;


            return $this->redirect(['led-fakultas/index', 'akreditasi' => $id_akreditasi, 'fakultas' => $id_fakultas]);

        }

        return $this->render('arsip', [
            'model' => $model,
            'dataAkreditasi' => $dataAkreditasi,
            'dataFakultas' => $dataFakultas
        ]);

    }

    public function actionIndex($akreditasi, $fakultas)
    {

        $akredProdi = S7Akreditasi::findOne(['id' => $akreditasi]);
        $led = S7LedFakultas::findOne(['id_akreditasi' => $akredProdi->id, 'id_fakultas' => $fakultas]);
        $model = new S7LedFakultasDetail();
        $file = file_get_contents(Yii::getAlias('@common/required/led/led.json'));
        $json = Json::decode($file);

        $model->id_led_fakultas = $led->id;

        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstance($model, 'file');
            $fileName = $file->getBaseName() . '.' . $file->getExtension();
            $model->file = $fileName;
            $path = Yii::getAlias("@uploadAkreditasi/{$led->akreditasi->lembaga}/prodi/{$led->akreditasi->tahun}/fakultas/{$led->id_fakultas}/led/");

            if (!$file->saveAs($path . $fileName)) {
                throw new Exception("Gagal Mengupload File");
            }

            if (!$model->save()) {
                throw new Exception("Gagal Menyimpan Data LED");
            }

            Yii::$app->session->setFlash('success', 'Berhasil Mengupload Dokumen Led.');

            return $this->redirect(Url::current());

        }

        return $this->render('index', [
            'model' => $model,
            'json' => $json
        ]);

    }

    public function actionLihat($id)
    {

        $template = S7LedFakultasDetail::findOne($id);
        return $this->redirect(Url::to('@web/upload' . "/{$template->ledFakultas->akreditasi->lembaga}/prodi/{$template->ledFakultas->akreditasi->tahun}/fakultas/{$template->ledFakultas->id_fakultas}/led/{$template->file}"));


    }

    public function actionDownload($id)
    {

        ini_set('max_execution_time', 5 * 60);
        $template = S7LedFakultasDetail::findOne($id);
        $file = Yii::getAlias('@uploadAkreditasi' . "/{$template->ledFakultas->akreditasi->lembaga}/prodi/{$template->ledFakultas->akreditasi->tahun}/fakultas/{$template->ledFakultas->id_fakultas}/led/{$template->file}");
        return Yii::$app->response->sendFile($file);

    }

    public function actionHapus()
    {
        if (Yii::$app->request->isPost) {

            $id = Yii::$app->request->post('id');
            $akreditasi = Yii::$app->request->post('akreditasi');
            $fakultas = Yii::$app->request->post('fakultas');

            $model = S7LedFakultasDetail::findOne($id);

            unlink(Yii::getAlias('@uploadAkreditasi' . "/{$model->ledFakultas->akreditasi->lembaga}/prodi/{$model->ledFakultas->akreditasi->tahun}/fakultas/{$model->ledFakultas->id_fakultas}/led/{$model->file}"));

            $model->delete();

            Yii::$app->session->setFlash('success', 'Berhasil Menghapus Gambar');
            return $this->redirect(['led-fakultas/index', 'akreditasi' => $akreditasi, 'fakultas' => $fakultas]);


        }

        throw new BadRequestHttpException('Request Harus Post');

    }

}

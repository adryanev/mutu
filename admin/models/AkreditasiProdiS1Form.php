<?php
/**
 * Project: mutu.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 5/17/2019
 * Time: 9:39 PM
 */

namespace admin\models;


use common\models\led\S7LedFakultas;
use common\models\led\S7LedProdiS1;
use common\models\S7AkreditasiProdiS1;
use common\models\S7BorangS1Fakultas;
use common\models\S7BorangS1FakultasStandar1;
use common\models\S7BorangS1FakultasStandar2;
use common\models\S7BorangS1FakultasStandar3;
use common\models\S7BorangS1FakultasStandar4;
use common\models\S7BorangS1FakultasStandar5;
use common\models\S7BorangS1FakultasStandar6;
use common\models\S7BorangS1FakultasStandar7;
use common\models\S7BorangS1Prodi;
use common\models\S7BorangS1ProdiStandar1;
use common\models\S7BorangS1ProdiStandar2;
use common\models\S7BorangS1ProdiStandar3;
use common\models\S7BorangS1ProdiStandar4;
use common\models\S7BorangS1ProdiStandar5;
use common\models\S7BorangS1ProdiStandar6;
use common\models\S7BorangS1ProdiStandar7;
use common\models\S7DokumentasiS1Fakultas;
use common\models\S7DokumentasiS1Prodi;
use common\models\S7DokumentasiS1ProdiStandar1;
use common\models\S7DokumentasiS1ProdiStandar2;
use common\models\S7DokumentasiS1ProdiStandar3;
use common\models\S7DokumentasiS1ProdiStandar4;
use common\models\S7DokumentasiS1ProdiStandar5;
use common\models\S7DokumentasiS1ProdiStandar6;
use common\models\S7DokumentasiS1ProdiStandar7;
use RuntimeException;
use Yii;
use yii\base\InvalidArgumentException;
use yii\base\Model;
use yii\db\Exception;
use yii\db\Transaction;

class AkreditasiProdiS1Form extends Model
{

    public $id_akreditasi;
    public $id_prodi;

    /**
     * @var S7AkreditasiProdiS1
     */
    private $_akreditasiProdiS1;

    /**
     * @var S7BorangS1Prodi
     */
    private $_borangS1Prodi;

    /**
     * @var S7BorangS1Fakultas
     */
    private $_borangS1Fakultas;

    /**
     * @var S7DokumentasiS1Prodi
     */
    private $_dokumentasiS1Prodi;

    /**
     * @var S7DokumentasiS1Fakultas
     */
    private $_dokumentasiS1Fakultas;


    /**
     * @var S7LedProdiS1
     */
    private $_led_prodi_s1;

    /**
     * var S7LedFakultas
     */

    private $_led_fakultas;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['id_akreditasi', 'id_prodi'], 'required'],
            [['id_prodi', 'id_akreditasi'], 'integer'],
        ];
    }

    /**
     * @throws Exception
     */
    public function createAkreditasi()
    {


        $transaction = Yii::$app->db->beginTransaction();


        try {
            $this->_akreditasiProdiS1 = new S7AkreditasiProdiS1();
            $this->_akreditasiProdiS1->progress = 0;
            $this->_akreditasiProdiS1->id_akreditasi = $this->id_akreditasi;
            $this->_akreditasiProdiS1->id_prodi = $this->id_prodi;

            $this->_akreditasiProdiS1->save();

            $this->createBorang($transaction);
            $this->createDokumentasi($transaction);
            $this->createLed($transaction);

            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollBack();
            throw new Exception($e->getMessage());
        }


        return true;
    }


    private function createFolder()
    {
        $path = Yii::getAlias('@uploadAkreditasi' . '/BAN-PT/prodi');

        $pathP = $path . "/{$this->_akreditasiProdiS1->akreditasi->tahun}/{$this->_akreditasiProdiS1->id_prodi}/prodi";
        $pathBorang = $pathP . '/borang';
        $pathBorangDokumen = $pathP . '/borang/dokumen';
        $pathDokumentasi = $pathP . '/dokumentasi';
        $pathGambar = $pathP . '/gambar';
        $pathLed = $pathP . '/led';


        if (!file_exists($pathBorang) && !mkdir($pathBorang, 0777, true) && !is_dir($pathBorang)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathBorang));
        }

        if (!file_exists($pathBorangDokumen) && !mkdir($pathBorangDokumen, 0777, true) && !is_dir($pathBorangDokumen)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathBorangDokumen));
        }

        if (!file_exists($pathDokumentasi) && !mkdir($pathDokumentasi, 0777, true) && !is_dir($pathDokumentasi)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathDokumentasi));
        }

        if (!file_exists($pathGambar) && !mkdir($pathGambar, 0777, true) && !is_dir($pathGambar)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathGambar));
        }
        if (!file_exists($pathLed) && !mkdir($pathLed, 0777, true) && !is_dir($pathLed)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathLed));
        }


        $pathF = $path . "/{$this->_akreditasiProdiS1->akreditasi->tahun}/fakultas/{$this->_borangS1Fakultas->id_fakultas}";
        $pathFBorang = $pathF . '/borang';
        $pathFBorangDokumen = $pathF . '/borang/dokumen';
        $pathFDokumentasi = $pathF . '/dokumentasi';
        $pathFGambar = $pathF . '/gambar';
        $pathFLed = $pathF . '/led';


        if (!file_exists($pathFBorang) && !mkdir($pathFBorang, 0777, true) && !is_dir($pathFBorang)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathFBorang));
        }

        if (!file_exists($pathFBorangDokumen) && !mkdir($pathFBorangDokumen, 0777, true) && !is_dir($pathFBorangDokumen)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathFBorangDokumen));
        }
        if (!file_exists($pathFDokumentasi) && !mkdir($pathFDokumentasi, 0777, true) && !is_dir($pathFDokumentasi)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathFDokumentasi));
        }

        if (!file_exists($pathFGambar) && !mkdir($pathFGambar, 0777, true) && !is_dir($pathFGambar)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathFGambar));
        }

        if (!file_exists($pathFLed) && !mkdir($pathFLed, 0777, true) && !is_dir($pathFLed)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathFLed));
        }


    }


    /**
     * @param $transaction Transaction
     */
    private function createBorang($transaction)
    {
        $this->_borangS1Prodi = new S7BorangS1Prodi();


        $this->_borangS1Prodi->id_akreditasi_prodi_s1 = $this->_akreditasiProdiS1->id;
        $this->_borangS1Prodi->progress = 0;


        $cekFakultas = S7BorangS1Fakultas::find()->where(['id_akreditasi' => $this->id_akreditasi, 'id_fakultas' => $this->_akreditasiProdiS1->prodi->id_fakultas_akademi])->all();
        if (empty($cekFakultas)) {
            $this->_borangS1Fakultas = new S7BorangS1Fakultas();
            $this->_borangS1Fakultas->id_akreditasi = $this->id_akreditasi;
            $this->_borangS1Fakultas->id_fakultas = $this->_akreditasiProdiS1->prodi->id_fakultas_akademi;
            $this->_borangS1Fakultas->progress = 0;
            if (!$this->_borangS1Fakultas->save(false)) {
                $transaction->rollBack();
                throw new InvalidArgumentException($this->_borangS1Fakultas->errors);
            }
            $attr = ['id_borang_s1_fakultas' => $this->_borangS1Fakultas->id, 'progress' => 0];
            $standar1Fakultas = new S7BorangS1FakultasStandar1();
            $standar2Fakultas = new S7BorangS1FakultasStandar2();
            $standar3Fakultas = new S7BorangS1FakultasStandar3();
            $standar4Fakultas = new S7BorangS1FakultasStandar4();
            $standar5Fakultas = new S7BorangS1FakultasStandar5();
            $standar6Fakultas = new S7BorangS1FakultasStandar6();
            $standar7Fakultas = new S7BorangS1FakultasStandar7();


            $standar1Fakultas->attributes = $attr;
            $standar2Fakultas->attributes = $attr;
            $standar3Fakultas->attributes = $attr;
            $standar4Fakultas->attributes = $attr;
            $standar5Fakultas->attributes = $attr;
            $standar6Fakultas->attributes = $attr;
            $standar7Fakultas->attributes = $attr;


            if (!$standar1Fakultas->save()) {
                $transaction->rollBack();
                throw new InvalidArgumentException($standar1Fakultas->errors);
            }
            if (!$standar2Fakultas->save()) {
                $transaction->rollBack();
                throw new InvalidArgumentException($standar2Fakultas->errors);
            }
            if (!$standar3Fakultas->save()) {
                $transaction->rollBack();
                throw new InvalidArgumentException($standar3Fakultas->errors);
            }
            if (!$standar4Fakultas->save()) {
                $transaction->rollBack();
                throw new InvalidArgumentException($standar4Fakultas->errors);
            }
            if (!$standar5Fakultas->save()) {
                $transaction->rollBack();
                throw new InvalidArgumentException($standar5Fakultas->errors);
            }
            if (!$standar6Fakultas->save()) {
                $transaction->rollBack();
                throw new InvalidArgumentException($standar6Fakultas->errors);
            }
            if (!$standar7Fakultas->save()) {
                $transaction->rollBack();
                throw new InvalidArgumentException($standar7Fakultas->errors);
            }

            $this->createFolder();

        }


        if (!$this->_borangS1Prodi->save(false)) {
            $transaction->rollback();
            throw new InvalidArgumentException($this->_borangS1Prodi->errors);

        }

        $standar1Prodi = new S7BorangS1ProdiStandar1();
        $standar2Prodi = new S7BorangS1ProdiStandar2();
        $standar3Prodi = new S7BorangS1ProdiStandar3();
        $standar4Prodi = new S7BorangS1ProdiStandar4();
        $standar5Prodi = new S7BorangS1ProdiStandar5();
        $standar6Prodi = new S7BorangS1ProdiStandar6();
        $standar7Prodi = new S7BorangS1ProdiStandar7();

        $standar1Prodi->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar1Prodi->progress = 0;

        $standar2Prodi->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar2Prodi->progress = 0;

        $standar3Prodi->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar3Prodi->progress = 0;

        $standar4Prodi->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar4Prodi->progress = 0;

        $standar5Prodi->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar5Prodi->progress = 0;

        $standar6Prodi->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar6Prodi->progress = 0;

        $standar7Prodi->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar7Prodi->progress = 0;

        if (!$standar1Prodi->save()) {
            $transaction->rollBack();
            throw new InvalidArgumentException($standar1Prodi->errors);
        }

        if (!$standar2Prodi->save()) {
            $transaction->rollBack();
            throw new InvalidArgumentException($standar2Prodi->errors);
        }
        if (!$standar3Prodi->save()) {
            $transaction->rollBack();
            throw new InvalidArgumentException($standar3Prodi->errors);
        }

        if (!$standar4Prodi->save()) {
            $transaction->rollBack();
            throw new InvalidArgumentException($standar4Prodi->errors);
        }

        if (!$standar5Prodi->save()) {
            $transaction->rollBack();
            throw new InvalidArgumentException($standar5Prodi->errors);
        }

        if (!$standar6Prodi->save()) {
            $transaction->rollBack();
            throw new InvalidArgumentException($standar6Prodi->errors);
        }
        if (!$standar7Prodi->save()) {
            $transaction->rollBack();
            throw new InvalidArgumentException($standar7Prodi->errors);
        }


    }

    /**
     * @param $transaction Transaction
     */
    private function createDokumentasi($transaction)
    {
        $this->_dokumentasiS1Prodi = new S7DokumentasiS1Prodi();


        $this->_dokumentasiS1Prodi->id_akreditasi_prodi_s1 = $this->_akreditasiProdiS1->id;
        $this->_dokumentasiS1Prodi->progress = 0;
        $this->_dokumentasiS1Prodi->is_publik = 0;

        $cekFakultas = S7DokumentasiS1Fakultas::find()->where(['id_akreditasi' => $this->id_akreditasi, 'id_fakultas' => $this->_akreditasiProdiS1->prodi->id_fakultas_akademi])->all();
        if (empty($cekFakultas)) {
            $this->_dokumentasiS1Fakultas = new S7DokumentasiS1Fakultas();
            $this->_dokumentasiS1Fakultas->id_akreditasi = $this->_akreditasiProdiS1->id_akreditasi;
            $this->_dokumentasiS1Fakultas->id_fakultas = $this->_akreditasiProdiS1->prodi->id_fakultas_akademi;
            $this->_dokumentasiS1Fakultas->progress = 0;
            $this->_dokumentasiS1Fakultas->is_publik = 0;


            if (!$this->_dokumentasiS1Fakultas->save(false)) {
                $transaction->rollBack();
                throw new InvalidArgumentException($this->_dokumentasiS1Fakultas->errors);
            }
        }


        if (!$this->_dokumentasiS1Prodi->save(false)) {
            $transaction->rollback();
            throw new InvalidArgumentException($this->_dokumentasiS1Prodi->errors);

        }


    }

    public static function findOne($id)
    {

        $model = new AkreditasiProdiS1Form();
        $data = S7AkreditasiProdiS1::findOne($id);
        $id_akreditasi = $data->id_akreditasi;

        $model->id_prodi = $data->id_prodi;
        $model->id_akreditasi = $data->id_akreditasi;
        $model->_borangS1Prodi = $data->borangS1Prodis;
        $model->_borangS1Fakultas = S7BorangS1Fakultas::findOne(['id_akreditasi' => $id_akreditasi]);
        $model->_dokumentasiS1Prodi = $data->dokumentasiS1Prodis;
        $model->_dokumentasiS1Fakultas = S7DokumentasiS1Fakultas::findOne(['id_akreditasi' => $id_akreditasi]);

        $model->_led_prodi_s1 = $data->ledProdiS1s;
        $model->_led_fakultas = S7LedFakultas::find()->where(['id_akreditasi' => $id_akreditasi, 'id_fakultas' => $data->prodi->id_fakultas_akademi])->all();

        return $model;
    }

    private function createLed(Transaction $transaction)
    {
        $modelProdi = new S7LedProdiS1();
        $modelProdi->id_akreditasi_prodi_s1 = $this->_akreditasiProdiS1->id;

        $cekFakultas = S7LedFakultas::find()->where(['id_akreditasi' => $this->id_akreditasi, 'id_fakultas' => $this->_akreditasiProdiS1->prodi->id_fakultas_akademi])->all();

        if (empty($cekFakultas)) {
            $modelFakultas = new S7LedFakultas();
            $modelFakultas->id_fakultas = $this->_akreditasiProdiS1->prodi->id_fakultas_akademi;
            $modelFakultas->id_akreditasi = $this->id_akreditasi;


            if (!$modelFakultas->save()) {
                $transaction->rollBack();
                throw new InvalidArgumentException($modelFakultas->errors);
            }
            $this->_led_fakultas = $modelFakultas;

        }

        if (!$modelProdi->save()) {
            $transaction->rollBack();
            throw new InvalidArgumentException($modelProdi->errors);
        }

        $this->_led_prodi_s1 = $modelProdi;


    }


}
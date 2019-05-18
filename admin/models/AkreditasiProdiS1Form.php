<?php
/**
 * Project: mutu.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 5/17/2019
 * Time: 9:39 PM
 */

namespace admin\models;


use common\models\AkreditasiProdiS1;
use common\models\BorangS1Fakultas;
use common\models\BorangS1Prodi;
use common\models\BorangS1ProdiStandar1;
use common\models\BorangS1ProdiStandar2;
use common\models\BorangS1ProdiStandar3;
use common\models\BorangS1ProdiStandar4;
use common\models\BorangS1ProdiStandar5;
use common\models\BorangS1ProdiStandar6;
use common\models\BorangS1ProdiStandar7;
use common\models\DokumentasiS1Fakultas;
use common\models\DokumentasiS1Prodi;
use common\models\DokumentasiS1ProdiStandar1;
use common\models\DokumentasiS1ProdiStandar2;
use common\models\DokumentasiS1ProdiStandar3;
use common\models\DokumentasiS1ProdiStandar4;
use common\models\DokumentasiS1ProdiStandar5;
use common\models\DokumentasiS1ProdiStandar6;
use common\models\DokumentasiS1ProdiStandar7;
use Yii;
use yii\base\InvalidArgumentException;
use yii\base\Model;
use yii\db\Exception;

class AkreditasiProdiS1Form extends Model
{

    public $id_akreditasi;
    public $id_prodi;

    /**
     * @var AkreditasiProdiS1
     */
    private $_akreditasiProdiS1;

    /**
     * @var BorangS1Prodi
     */
    private $_borangS1Prodi;

    /**
     * @var BorangS1Fakultas
     */
    private $_borangS1Fakultas;

    /**
     * @var DokumentasiS1Prodi
     */
    private $_dokumentasiS1Prodi;

    /**
     * @var DokumentasiS1Fakultas
     */
    private $_dokumentasiS1Fakultas;

    public function rules()
    {
        return [
            [['id_akreditasi','id_prodi'],'required'],
            [['id_prodi','id_akreditasi'],'integer'],
        ];
    }

    /**
     * @throws Exception
     */
    public function createAkreditasi(){

        $this->createFolder();

        $transaction = Yii::$app->db->beginTransaction();


        try {
            $this->_akreditasiProdiS1 = new AkreditasiProdiS1();
            $this->_akreditasiProdiS1->progress = 0;
            $this->_akreditasiProdiS1->id_akreditasi = $this->id_akreditasi;
            $this->_akreditasiProdiS1->id_prodi = $this->id_prodi;

            $this->_akreditasiProdiS1->save();

            $this->createBorang($transaction);
            $this->createDokumentasi($transaction);

            $transaction->commit();
        } catch (Exception $e) {
            $transaction->rollBack();
            throw new Exception($e->getMessage());
        }


        return true;
    }



    private function createFolder()
    {
        $path = Yii::getAlias('@uploadAkreditasi'. '/BAN-PT/prodi');

        $pathP = $path. "/{$this->_akreditasiProdiS1->akreditasi->tahun}/{$this->_akreditasiProdiS1->id_prodi}/prodi";
        $pathBorang = $pathP . '/borang';
        $pathBorangDokumen = $pathP . '/borang/dokumen';
        $pathDokumentasi = $pathP. '/dokumentasi';
        $pathGambar = $pathP. '/gambar';


        if(!file_exists($pathBorang) && !mkdir($pathBorang, 0777, true) && !is_dir($pathBorang)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathBorang));
        }

        if(!file_exists($pathBorangDokumen) && !mkdir($pathBorangDokumen, 0777, true) && !is_dir($pathBorangDokumen)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathBorangDokumen));
        }

        if(!file_exists($pathDokumentasi) && !mkdir($pathDokumentasi, 0777, true) && !is_dir($pathDokumentasi)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathDokumentasi));
        }

        if(!file_exists($pathGambar) && !mkdir($pathGambar, 0777, true) && !is_dir($pathGambar)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathGambar));
        }


        $pathF = $path. "/{$this->_akreditasiProdiS1->akreditasi->tahun}/{$this->_akreditasiProdiS1->id_prodi}/fakultas";
        $pathFBorang = $pathF . '/borang';
        $pathFDokumentasi = $pathF. '/dokumentasi';
        $pathFGambar = $pathF. '/gambar';


        if(!file_exists($pathFBorang) && !mkdir($pathFBorang, 0777, true) && !is_dir($pathFBorang)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathFBorang));
        }

        if(!file_exists($pathFDokumentasi) && !mkdir($pathFDokumentasi, 0777, true) && !is_dir($pathFDokumentasi)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathFDokumentasi));
        }

        if(!file_exists($pathFGambar) && !mkdir($pathFGambar, 0777, true) && !is_dir($pathFGambar)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $pathFGambar));
        }

    }


    /**
     * @param $transaction \yii\db\Transaction
     */
    private function createBorang($transaction)
    {
        $this->_borangS1Prodi = new BorangS1Prodi();
        $this->_borangS1Fakultas = new BorangS1Fakultas();


        $this->_borangS1Prodi->id_akreditasi_prodi_s1= $this->_akreditasiProdiS1->id;
        $this->_borangS1Prodi->progress = 0;
        $this->_borangS1Fakultas->id_akreditasi_prodi_s1 = $this->_akreditasiProdiS1->id;
        $this->_borangS1Fakultas->progress = 0;

        if(!$this->_borangS1Prodi->save(false)){
            $transaction->rollback();
            throw new InvalidArgumentException($this->_borangS1Prodi->errors );

        }
        if(!$this->_borangS1Fakultas->save(false)){
            $transaction->rollBack();
            throw new InvalidArgumentException($this->_borangS1Fakultas->errors);
        }

        $standar1 = new BorangS1ProdiStandar1();
        $standar2 = new BorangS1ProdiStandar2();
        $standar3 = new BorangS1ProdiStandar3();
        $standar4 = new BorangS1ProdiStandar4();
        $standar5 = new BorangS1ProdiStandar5();
        $standar6 = new BorangS1ProdiStandar6();
        $standar7 = new BorangS1ProdiStandar7();

        $standar1->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar1->progress = 0;

        $standar2->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar2->progress = 0;

        $standar3->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar3->progress = 0;

        $standar4->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar4->progress = 0;

        $standar5->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar5->progress = 0;

        $standar6->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar6->progress = 0;

        $standar7->id_borang_s1_prodi = $this->_borangS1Prodi->id;
        $standar7->progress = 0;

        if(!$standar1->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar1->errors);
        }

        if(!$standar2->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar2->errors);
        }
        if(!$standar3->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar3->errors);
        }

        if(!$standar4->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar4->errors);
        }

        if(!$standar5->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar5->errors);
        }

        if(!$standar6->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar6->errors);
        }
        if(!$standar7->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar7->errors);
        }



    }

    /**
     * @param $transaction \yii\db\Transaction
     */
    private function createDokumentasi($transaction)
    {
        $this->_dokumentasiS1Prodi = new DokumentasiS1Prodi();
        $this->_dokumentasiS1Fakultas = new DokumentasiS1Fakultas();


        $this->_dokumentasiS1Prodi->id_akreditasi_prodi_s1= $this->_akreditasiProdiS1->id;
        $this->_dokumentasiS1Prodi->progress = 0;
        $this->_dokumentasiS1Fakultas->id_akreditasi_prodi_s1 = $this->_akreditasiProdiS1->id;
        $this->_dokumentasiS1Fakultas->progress = 0;

        if(!$this->_dokumentasiS1Prodi->save(false)){
            $transaction->rollback();
            throw new InvalidArgumentException($this->_dokumentasiS1Prodi->errors );

        }
        if(!$this->_dokumentasiS1Fakultas->save(false)){
            $transaction->rollBack();
            throw new InvalidArgumentException($this->_dokumentasiS1Fakultas->errors);
        }

        $standar1 = new DokumentasiS1ProdiStandar1();
        $standar2 = new DokumentasiS1ProdiStandar2();
        $standar3 = new DokumentasiS1ProdiStandar3();
        $standar4 = new DokumentasiS1ProdiStandar4();
        $standar5 = new DokumentasiS1ProdiStandar5();
        $standar6 = new DokumentasiS1ProdiStandar6();
        $standar7 = new DokumentasiS1ProdiStandar7();

        $standar1->id_dokumentasi_s1_prodi = $this->_dokumentasiS1Prodi->id;
        $standar1->is_publik = 0;
        $standar1->is_asesor = 0;
        $standar1->progress = 0;

        $standar2->id_dokumentasi_s1_prodi = $this->_dokumentasiS1Prodi->id;
        $standar2->is_publik = 0;
        $standar2->is_asesor =0;
        $standar2->progress=0;

        $standar3->id_dokumentasi_s1_prodi = $this->_dokumentasiS1Prodi->id;
        $standar3->is_publik=0;
        $standar3->is_asesor =0;
        $standar3->progress = 0;

        $standar4->id_dokumentasi_s1_prodi = $this->_dokumentasiS1Prodi->id;
        $standar4->is_publik = 0;
        $standar4->is_asesor= 0;
        $standar4->progress = 0;

        $standar5->id_dokumentasi_s1_prodi = $this->_dokumentasiS1Prodi->id;
        $standar5->is_publik = 0;
        $standar5->is_asesor = 0;
        $standar5->progress = 0;

        $standar6->id_dokumentasi_s1_prodi = $this->_dokumentasiS1Prodi->id;
        $standar6->is_publik =0;
        $standar6->is_asesor = 0;
        $standar6->progress = 0;

        $standar7->id_dokumentasi_s1_prodi = $this->_dokumentasiS1Prodi->id;
        $standar7->is_publik = 0;
        $standar7->is_asesor = 0;
        $standar7->progress = 0;

        if(!$standar1->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar1->errors);
        }

        if(!$standar2->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar2->errors);
        }
        if(!$standar3->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar3->errors);
        }

        if(!$standar4->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar4->errors);
        }

        if(!$standar5->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar5->errors);
        }

        if(!$standar6->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar6->errors);
        }
        if(!$standar7->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar7->errors);
        }

    }

    public static function findOne($id){

        $model = new AkreditasiProdiS1Form();
        $data = AkreditasiProdiS1::findOne($id);
        $model->id_prodi = $data->id_prodi;
        $model->id_akreditasi = $data->id_akreditasi;
        $model->_borangS1Prodi = $data->borangS1Prodis;
        $model->_borangS1Fakultas = $data->borangS1Fakultas;
        $model->_dokumentasiS1Prodi = $data->dokumentasiS1Prodi;
        $model->_dokumentasiS1Fakultas = $data->dokumentasiS1Fakultas;

        return $model;
    }


}
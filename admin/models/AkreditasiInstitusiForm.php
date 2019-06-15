<?php
/**
 * Project: mutu.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 5/21/2019
 * Time: 2:00 PM
 */

namespace admin\models;


use common\models\S7AkreditasiInstitusi;
use common\models\S7BorangInstitusi;
use common\models\S7BorangInstitusiStandar1;
use common\models\S7BorangInstitusiStandar2;
use common\models\S7BorangInstitusiStandar3;
use common\models\S7BorangInstitusiStandar4;
use common\models\S7BorangInstitusiStandar5;
use common\models\S7BorangInstitusiStandar6;
use common\models\S7BorangInstitusiStandar7;
use common\models\DokumentasiInstitusi;
use RuntimeException;
use Yii;
use yii\base\InvalidArgumentException;
use yii\base\Model;
use yii\db\Exception;
use yii\db\Transaction;

class AkreditasiInstitusiForm extends Model
{

    public $id_akreditasi;
    /**
     * @var S7AkreditasiInstitusi
     */
    private $_akreditasiInstitusi;

    /**
     * @var S7BorangInstitusi
     */
    private $_borangInstitusi;

    /**
     * @var DokumentasiInstitusi
     */
    private $_dokumentasiInstitusi;
    public function rules()
    {
        return [
            [['id_akreditasi'],'required'],
            [['id_akreditasi'],'integer'],
        ];
    }
    
    public function createAkreditasiInstitusi(){
        $transaction = Yii::$app->db->beginTransaction();

        try {
            $this->_akreditasiInstitusi = new S7AkreditasiInstitusi();
            $this->_akreditasiInstitusi->progress = 0;
            $this->_akreditasiInstitusi->id_akreditasi = $this->id_akreditasi;

            $this->_akreditasiInstitusi->save();

            $this->createFolder();
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
        $path = Yii::getAlias('@uploadAkreditasi'. "/{$this->_akreditasiInstitusi->akreditasi->lembaga}/institusi");

        $pathP = $path. "/{$this->_akreditasiInstitusi->akreditasi->tahun}";
        $pathBorang = $pathP . '/borang';
        $pathBorangDokumen = $pathP . '/borang/dokumen';
        $pathDokumentasi = $pathP. '/dokumentasi';
        $pathGambar = $pathP. '/gambar';


        if(!file_exists($pathBorang) && !mkdir($pathBorang, 0777, true) && !is_dir($pathBorang)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathBorang));
        }

        if(!file_exists($pathBorangDokumen) && !mkdir($pathBorangDokumen, 0777, true) && !is_dir($pathBorangDokumen)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathBorangDokumen));
        }

        if(!file_exists($pathDokumentasi) && !mkdir($pathDokumentasi, 0777, true) && !is_dir($pathDokumentasi)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathDokumentasi));
        }

        if(!file_exists($pathGambar) && !mkdir($pathGambar, 0777, true) && !is_dir($pathGambar)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathGambar));
        }


    }

    private function createBorang(Transaction $transaction)
    {
        $this->_borangInstitusi = new S7BorangInstitusi();
        $this->_borangInstitusi->progress = 0;
        $this->_borangInstitusi->id_akreditasi_institusi = $this->_akreditasiInstitusi->id;

        if(!$this->_borangInstitusi->save(false)){
            $transaction->rollBack();
            throw new InvalidArgumentException($this->_borangInstitusi->errors );

        }

        $standar1 = new S7BorangInstitusiStandar1();
        $standar2 = new S7BorangInstitusiStandar2();
        $standar3 = new S7BorangInstitusiStandar3();
        $standar4 = new S7BorangInstitusiStandar4();
        $standar5 = new S7BorangInstitusiStandar5();
        $standar6 = new S7BorangInstitusiStandar6();
        $standar7 = new S7BorangInstitusiStandar7();

        $attr = ['id_borang_institusi'=>$this->_borangInstitusi->id,'progress'=>0];
        $standar1->attributes = $attr;
        $standar2->attributes = $attr;
        $standar3->attributes = $attr;
        $standar4->attributes = $attr;
        $standar5->attributes = $attr;
        $standar6->attributes = $attr;
        $standar7->attributes = $attr;

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

    private function createDokumentasi(Transaction $transaction)
    {
        $this->_dokumentasiInstitusi = new DokumentasiInstitusi();
        $this->_dokumentasiInstitusi->id_akreditasi_institusi = $this->_akreditasiInstitusi->id;
        $this->_dokumentasiInstitusi->progress = 0;
        $this->_dokumentasiInstitusi->is_publik = 0;

        if(!$this->_dokumentasiInstitusi->save(false)){
            $transaction->rollback();
            throw new InvalidArgumentException($this->_dokumentasiInstitusi->errors);
        }
    }

    public static function findOne($id){
        $model = new AkreditasiInstitusiForm();
        $data = S7AkreditasiInstitusi::findOne($id);
        $model->id_akreditasi = $data->id_akreditasi;
        $model->_borangInstitusi = $data->borangInstitusis;
        $model->_dokumentasiInstitusi = $data->dokumentasiInstitusis;
        $model->_akreditasiInstitusi = $data;

    }

}
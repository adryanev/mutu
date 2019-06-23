<?php


namespace admin\models;


use common\models\S7AkreditasiProdiPasca;
use common\models\S7BorangPascaFakultas;
use common\models\S7BorangPascaFakultasStandar1;
use common\models\S7BorangPascaFakultasStandar2;
use common\models\S7BorangPascaFakultasStandar3;
use common\models\S7BorangPascaFakultasStandar4;
use common\models\S7BorangPascaFakultasStandar5;
use common\models\S7BorangPascaFakultasStandar6;
use common\models\S7BorangPascaFakultasStandar7;
use common\models\S7BorangPascaProdi;
use common\models\S7BorangPascaProdiStandar1;
use common\models\S7BorangPascaProdiStandar2;
use common\models\S7BorangPascaProdiStandar3;
use common\models\S7BorangPascaProdiStandar4;
use common\models\S7BorangPascaProdiStandar5;
use common\models\S7BorangPascaProdiStandar6;
use common\models\S7BorangPascaProdiStandar7;
use common\models\S7DokumentasiPascaFakultas;
use common\models\S7DokumentasiPascaProdi;
use common\models\S7DokumentasiPascaProdiStandar1;
use common\models\S7DokumentasiPascaProdiStandar2;
use common\models\S7DokumentasiPascaProdiStandar3;
use common\models\S7DokumentasiPascaProdiStandar4;
use common\models\S7DokumentasiPascaProdiStandar5;
use common\models\S7DokumentasiPascaProdiStandar6;
use common\models\S7DokumentasiPascaProdiStandar7;
use RuntimeException;
use Yii;
use yii\base\InvalidArgumentException;
use yii\base\Model;
use yii\db\Exception;

class AkreditasiProdiS2Form extends Model
{

    public $id_akreditasi;
    public $id_prodi;

    /**
     * @var S7AkreditasiProdiPasca
     */
    private $_akreditasiProdiPasca;

    /**
     * @var S7BorangPascaProdi
     */
    private $_borangPascaProdi;

    /**
     * @var S7BorangPascaFakultas
     */
    private $_borangPascaFakultas;

    /**
     * @var S7DokumentasiPascaProdi
     */
    private $_dokumentasiPascaProdi;

    /**
     * @var S7DokumentasiPascaFakultas
     */
    private $_dokumentasiPascaFakultas;

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



        $transaction = Yii::$app->db->beginTransaction();


        try {
            $this->_akreditasiProdiPasca = new S7AkreditasiProdiPasca();
            $this->_akreditasiProdiPasca->progress = 0;
            $this->_akreditasiProdiPasca->id_akreditasi = $this->id_akreditasi;
            $this->_akreditasiProdiPasca->id_prodi = $this->id_prodi;

            $this->_akreditasiProdiPasca->save();

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

        $pathP = $path. "/{$this->_akreditasiProdiPasca->akreditasi->tahun}/{$this->_akreditasiProdiPasca->id_prodi}/prodi";
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



        $pathF = $path. "/{$this->_akreditasiProdiPasca->akreditasi->tahun}/fakultas/{$this->_borangPascaFakultas->id_fakultas}";
        $pathFBorang = $pathF . '/borang';
        $pathFBorangDokumen = $pathF . '/borang/dokumen';
        $pathFDokumentasi = $pathF. '/dokumentasi';
        $pathFGambar = $pathF. '/gambar';


        if(!file_exists($pathFBorang) && !mkdir($pathFBorang, 0777, true) && !is_dir($pathFBorang)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathFBorang));
        }

        if(!file_exists($pathFBorangDokumen) && !mkdir($pathFBorangDokumen, 0777, true) && !is_dir($pathFBorangDokumen)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathFBorangDokumen));
        }
        if(!file_exists($pathFDokumentasi) && !mkdir($pathFDokumentasi, 0777, true) && !is_dir($pathFDokumentasi)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathFDokumentasi));
        }

        if(!file_exists($pathFGambar) && !mkdir($pathFGambar, 0777, true) && !is_dir($pathFGambar)) {
            throw new RuntimeException(sprintf('Directory "%s" was not created', $pathFGambar));
        }


    }


    /**
     * @param $transaction \yii\db\Transaction
     */
    private function createBorang($transaction)
    {
        $this->_borangPascaProdi = new S7BorangPascaProdi();


        $this->_borangPascaProdi->id_akreditasi_prodi_pasca= $this->_akreditasiProdiPasca->id;
        $this->_borangPascaProdi->progress = 0;


        $cekFakultas = S7BorangPascaFakultas::find()->where(['id_akreditasi'=>$this->id_akreditasi,'id_fakultas'=>$this->_akreditasiProdiPasca->prodi->id_fakultas_akademi])->all();
        if(empty($cekFakultas)){
            $this->_borangPascaFakultas = new S7BorangPascaFakultas();
            $this->_borangPascaFakultas->id_akreditasi = $this->id_akreditasi;
            $this->_borangPascaFakultas->id_fakultas = $this->_akreditasiProdiPasca->prodi->id_fakultas_akademi;
            $this->_borangPascaFakultas->progress = 0;
            if(!$this->_borangPascaFakultas->save(false)){
                $transaction->rollBack();
                throw new InvalidArgumentException($this->_borangPascaFakultas->errors);
            }
            $attr = ['id_borang_pasca'=>$this->_borangPascaFakultas->id,'progress'=>0];
            $standar1Fakultas = new S7BorangPascaFakultasStandar1();
            $standar2Fakultas = new S7BorangPascaFakultasStandar2();
            $standar3Fakultas = new S7BorangPascaFakultasStandar3();
            $standar4Fakultas = new S7BorangPascaFakultasStandar4();
            $standar5Fakultas = new S7BorangPascaFakultasStandar5();
            $standar6Fakultas = new S7BorangPascaFakultasStandar6();
            $standar7Fakultas = new S7BorangPascaFakultasStandar7();


            $standar1Fakultas->attributes = $attr;
            $standar2Fakultas->attributes = $attr;
            $standar3Fakultas->attributes = $attr;
            $standar4Fakultas->attributes = $attr;
            $standar5Fakultas->attributes = $attr;
            $standar6Fakultas->attributes = $attr;
            $standar7Fakultas->attributes = $attr;


            if(!$standar1Fakultas->save()){
                $transaction->rollBack();
                throw new InvalidArgumentException($standar1Fakultas->errors);
            }
            if(!$standar2Fakultas->save()){
                $transaction->rollBack();
                throw new InvalidArgumentException($standar2Fakultas->errors);
            }
            if(!$standar3Fakultas->save()){
                $transaction->rollBack();
                throw new InvalidArgumentException($standar3Fakultas->errors);
            }
            if(!$standar4Fakultas->save()){
                $transaction->rollBack();
                throw new InvalidArgumentException($standar4Fakultas->errors);
            }
            if(!$standar5Fakultas->save()){
                $transaction->rollBack();
                throw new InvalidArgumentException($standar5Fakultas->errors);
            }
            if(!$standar6Fakultas->save()){
                $transaction->rollBack();
                throw new InvalidArgumentException($standar6Fakultas->errors);
            }
            if(!$standar7Fakultas->save()){
                $transaction->rollBack();
                throw new InvalidArgumentException($standar7Fakultas->errors);
            }

            $this->createFolder();

        }


        if(!$this->_borangPascaProdi->save(false)){
            $transaction->rollback();
            throw new InvalidArgumentException($this->_borangPascaProdi->errors );

        }


        $standar1Prodi = new S7BorangPascaProdiStandar1();
        $standar2Prodi = new S7BorangPascaProdiStandar2();
        $standar3Prodi = new S7BorangPascaProdiStandar3();
        $standar4Prodi = new S7BorangPascaProdiStandar4();
        $standar5Prodi = new S7BorangPascaProdiStandar5();
        $standar6Prodi = new S7BorangPascaProdiStandar6();
        $standar7Prodi = new S7BorangPascaProdiStandar7();

        $standar1Prodi->id_borang_pasca = $this->_borangPascaProdi->id;
        $standar1Prodi->progress = 0;

        $standar2Prodi->id_borang_pasca = $this->_borangPascaProdi->id;
        $standar2Prodi->progress = 0;

        $standar3Prodi->id_borang_pasca = $this->_borangPascaProdi->id;
        $standar3Prodi->progress = 0;

        $standar4Prodi->id_borang_pasca = $this->_borangPascaProdi->id;
        $standar4Prodi->progress = 0;

        $standar5Prodi->id_borang_pasca = $this->_borangPascaProdi->id;
        $standar5Prodi->progress = 0;

        $standar6Prodi->id_borang_pasca = $this->_borangPascaProdi->id;
        $standar6Prodi->progress = 0;

        $standar7Prodi->id_borang_pasca = $this->_borangPascaProdi->id;
        $standar7Prodi->progress = 0;

        if(!$standar1Prodi->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar1Prodi->errors);
        }

        if(!$standar2Prodi->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar2Prodi->errors);
        }
        if(!$standar3Prodi->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar3Prodi->errors);
        }

        if(!$standar4Prodi->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar4Prodi->errors);
        }

        if(!$standar5Prodi->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar5Prodi->errors);
        }

        if(!$standar6Prodi->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar6Prodi->errors);
        }
        if(!$standar7Prodi->save()){
            $transaction->rollBack();
            throw new InvalidArgumentException($standar7Prodi->errors);
        }


    }

    /**
     * @param $transaction \yii\db\Transaction
     */
    private function createDokumentasi($transaction)
    {
        $this->_dokumentasiPascaProdi = new S7DokumentasiPascaProdi();


        $this->_dokumentasiPascaProdi->id_akreditasi_prodi_pasca= $this->_akreditasiProdiPasca->id;
        $this->_dokumentasiPascaProdi->progress = 0;
        $this->_dokumentasiPascaProdi->is_publik = 0;

        $cekFakultas = S7DokumentasiPascaFakultas::find()->where(['id_akreditasi'=>$this->id_akreditasi,'id_fakultas'=>$this->_akreditasiProdiPasca->prodi->id_fakultas_akademi])->all();
        if(empty($cekFakultas)){
            $this->_dokumentasiPascaFakultas = new S7DokumentasiPascaFakultas();
            $this->_dokumentasiPascaFakultas->id_akreditasi = $this->_akreditasiProdiPasca->id;
            $this->_dokumentasiPascaFakultas->id_fakultas = $this->_akreditasiProdiPasca->prodi->id_fakultas_akademi;
            $this->_dokumentasiPascaFakultas->progress = 0;
            $this->_dokumentasiPascaFakultas->is_publik = 0;


            if(!$this->_dokumentasiPascaFakultas->save(false)){
                $transaction->rollBack();
                throw new InvalidArgumentException($this->_dokumentasiPascaFakultas->errors);
            }
        }


        if(!$this->_dokumentasiPascaProdi->save(false)){
            $transaction->rollback();
            throw new InvalidArgumentException($this->_dokumentasiPascaProdi->errors );

        }


    }

    public static function findOne($id){

        $model = new AkreditasiProdiS2Form();
        $data = S7AkreditasiProdiPasca::findOne($id);
        $id_akreditasi = $data->id_akreditasi;

        $model->id_prodi = $data->id_prodi;
        $model->id_akreditasi = $data->id_akreditasi;
        $model->_borangPascaProdi = $data->s7BorangPascaProdis;
        $model->_borangPascaFakultas = S7BorangPascaFakultas::findOne(['id_akreditasi'=>$id_akreditasi]);
        $model->_dokumentasiPascaProdi = $data->s7DokumentasiPascaProdis;
        $model->_dokumentasiPascaFakultas = S7DokumentasiPascaFakultas::findOne(['id_akreditasi'=>$id_akreditasi]);

        return $model;
    }


}
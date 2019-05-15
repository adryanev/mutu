<?php


namespace common\models;


use yii\base\Model;

class PencarianBorangProdiForm extends Model
{


    public const DIPLOMA = 4;
    public const S1 = 1;
    public const S2 = 2;
    public const S3 = 3;
    public $akreditasi;
    public $program;
    public $id_prodi;
    public $borang_untuk;

    private $_akreditasi;
    private $_akreditasi_prodi;
    private $_borang;


    public function rules() :array
    {
        return [
            [['akreditasi','program','id_prodi','borang_untuk',],'required']
        ];
    }

    public function cari(): string
    {

        $url ='';
        $this->_akreditasi = Akreditasi::find()->where(['id'=>$this->akreditasi])->one();
        switch ($this->program){
            case self::S1:
                $this->_akreditasi_prodi = AkreditasiProdiS1::find()->where(['id_prodi'=>$this->id_prodi,'id_akreditasi'=>$this->akreditasi])->one();
                if($this->borang_untuk === 'fakultas'){
                    $this->_borang = BorangS1Fakultas::find()->where(['id_akreditasi_prodi_s1'=>$this->_akreditasi_prodi->id])->one();
                    $url .= 'borang-s1-fakultas/index';

                }else{
                    $this->_borang = BorangS1Prodi::find()->where(['id_akreditasi_prodi_s1'=>$this->_akreditasi_prodi->id])->one();
                    $url .= 'borang-s1-prodi/index';

                }

                break;
            case self::S2:
                $this->_akreditasi_prodi = AkreditasiProdiS2::find()->where(['id_prodi'=>$this->id_prodi,'id_akreditasi'=>$this->akreditasi])->one();
//                $this->_borang = new BorangS2Prodi();

                break;
            case self::S3:
                $this->_akreditasi_prodi = AkreditasiProdiS3::find()->where(['id_prodi'=>$this->id_prodi,'id_akreditasi'=>$this->akreditasi])->one();
//                $this->_borang = new BorangS3Prodi();

                break;
            case self::DIPLOMA:
                $this->_akreditasi_prodi = AkreditasiProdiDiploma::find()->where(['id_prodi'=>$this->id_prodi,'id_akreditasi'=>$this->akreditasi])->one();
//                $this->_borang = new BorangDiplomaProdi();

                break;

        }


        return $url;


    }

    /**
     * @return mixed
     */
    public function getAkreditasi()
    {
        return $this->_akreditasi;
    }

    /**
     * @return mixed
     */
    public function getAkreditasiProdi()
    {
        return $this->_akreditasi_prodi;
    }

    /**
     * @return mixed
     */
    public function getBorang()
    {
        return $this->_borang;
    }


}
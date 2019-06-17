<?php

namespace common\models;

use yii\base\Model;

class PencarianDokumentasiProdiForm extends Model {

    // public const DIPLOMA = 4;
    // public const S1 = 1;
    // public const S2 = 2;
    // public const S3 = 3;
    public $akreditasi;
    public $jenjang;
    public $id_prodi;
    public $dokumentasi_untuk;

    private $_akreditasi;
    private $_akreditasi_prodi;
    private $_dokumentasi;

    public function rules() :array {
        return [
            [['akreditasi','jenjang','id_prodi','dokumentasi_untuk',],'required']
        ];
    }

    public function cari($target) :string {

        $url = '';
        $this->_akreditasi = S7Akreditasi::find()->where(['id'=>$this->akreditasi])->one();
        $program = ProgramStudi::findOne(['id'=>$this->jenjang]);
        // var_dump($this->jenjang);
        // exit();

        $akreditasiProdiClass = 'common\\models\\'.'S7AkreditasiProdi'.$program->jenjang;
        $dokumentasifakultasClass = 'common\\models\\S7Dokumentasi'.$program->jenjang.'Fakultas';
        $dokumentasiProdiClass = 'common\\models\\S7Dokumentasi'.$program->jenjang.'Prodi';

        $this->_akreditasi_prodi = call_user_func($akreditasiProdiClass.'::findOne',['id_prodi'=>$this->id_prodi,'id_akreditasi'=>$this->akreditasi]);

        if($this->dokumentasi_untuk === 'fakultas'){
            $this->_dokumentasi = call_user_func($dokumentasifakultasClass.'::findOne',['id_akreditasi_prodi_'.strtolower($program->jenjang)=>$this->_akreditasi_prodi->id]);
            $url .= 'dokumentasi-'.strtolower($program->jenjang).'-fakultas/'.$target;

        }else{
            $this->_dokumentasi = call_user_func($dokumentasiProdiClass.'::findOne',['id_akreditasi_prodi_'.strtolower($program->jenjang)=>$this->_akreditasi_prodi->id]);
            $url .= 'dokumentasi-'.strtolower($program->jenjang).'-prodi/'.$target;
        }

//         switch ($this->program){
//             case self::S1:
//                 $this->_akreditasi_prodi = AkreditasiProdiS1::find()->where(['id_prodi'=>$this->id_prodi,'id_akreditasi'=>$this->akreditasi])->one();
//                 if($this->dokumentasi_untuk === 'fakultas'){
//                     $this->_dokumentasi = DokumentasiS1Fakultas::find()->where(['id_akreditasi_prodi_s1'=>$this->_akreditasi_prodi->id])->one();
//                     $url .= 'dokumentasi-s1-fakultas/index';

//                 }else{
//                     $this->_dokumentasi = DokumentasiS1Prodi::find()->where(['id_akreditasi_prodi_s1'=>$this->_akreditasi_prodi->id])->one();
//                     $url .= 'dokumentasi-s1-prodi/index';

//                 }

//                 break;
//             case self::S2:
//                 $this->_akreditasi_prodi = AkreditasiProdiS2::find()->where(['id_prodi'=>$this->id_prodi,'id_akreditasi'=>$this->akreditasi])->one();
// //                $this->_borang = new BorangS2Prodi();

//                 break;
//             case self::S3:
//                 $this->_akreditasi_prodi = AkreditasiProdiS3::find()->where(['id_prodi'=>$this->id_prodi,'id_akreditasi'=>$this->akreditasi])->one();
// //                $this->_borang = new BorangS3Prodi();

//                 break;
//             case self::DIPLOMA:
//                 $this->_akreditasi_prodi = AkreditasiProdiDiploma::find()->where(['id_prodi'=>$this->id_prodi,'id_akreditasi'=>$this->akreditasi])->one();
// //                $this->_borang = new BorangDiplomaProdi();

//                 break;

//         }

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
    public function getDokumentasi()
    {
        return $this->_dokumentasi;
    }
}
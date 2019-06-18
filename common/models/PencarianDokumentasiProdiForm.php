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
        $program = $this->jenjang;
        // var_dump($this->jenjang);
        // exit();

        $akreditasiProdiClass = 'common\\models\\'.'S7AkreditasiProdi'.$program;
        $dokumentasifakultasClass = 'common\\models\\S7Dokumentasi'.$program.'Fakultas';
        $dokumentasiProdiClass = 'common\\models\\S7Dokumentasi'.$program.'Prodi';

        $this->_akreditasi_prodi = call_user_func($akreditasiProdiClass.'::findOne',['id_prodi'=>$this->id_prodi,'id_akreditasi'=>$this->akreditasi]);

        if($this->dokumentasi_untuk === 'fakultas'){
            $this->_dokumentasi = call_user_func($dokumentasifakultasClass.'::findOne',['id_akreditasi_prodi_'.strtolower($program->jenjang)=>$this->_akreditasi_prodi->id]);
            $url .= 'dokumentasi-'.strtolower($program).'-fakultas/'.$target;

        }else{
            $this->_dokumentasi = call_user_func($dokumentasiProdiClass.'::findOne',['id_akreditasi_prodi_'.strtolower($program)=>$this->_akreditasi_prodi->id]);
            $url .= 'dokumentasi-'.strtolower($program).'-prodi/'.$target;
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
    public function getDokumentasi()
    {
        return $this->_dokumentasi;
    }
}
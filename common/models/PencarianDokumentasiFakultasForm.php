<?php

namespace common\models;

use yii\base\Model;

class PencarianDokumentasiFakultasForm extends Model {
    public $akreditasi;
    public $id_fakultas;
    public $dokumentasi_untuk;
    public $jenjang;

    private $_akreditasi;
    private $_akreditasi_prodi;
    private $_dokumentasi;


    public function rules(): array
    {
        return [
            [['akreditasi', 'jenjang', 'id_fakultas', 'dokumentasi_untuk_untuk',], 'required']
        ];
    }

    public function cari($target): string
    {

        $url = '';
        $this->_akreditasi = S7Akreditasi::find()->where(['id' => $this->akreditasi])->one();
        $program = $this->jenjang;

        if($program == 'S2'){
            $program = 'Pasca';
        }

        $dokumentasifakultasClass = 'common\\models\\S7Dokumentasi' . $program . 'Fakultas';
        $this->_dokumentasi = call_user_func($dokumentasifakultasClass . '::findOne', ['id_akreditasi' => $this->akreditasi, 'id_fakultas' => $this->id_fakultas]);
        $url .= 'dokumentasi-' . strtolower($program) . '-fakultas/' . $target;


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
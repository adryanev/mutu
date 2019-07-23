<?php
/**
 * Project: mutu.
 * @author Adryan Eka Vandra <adryanekavandra@gmail.com>
 *
 * Date: 6/24/2019
 * Time: 5:16 AM
 */

namespace common\models\kriteria9;


use common\models\S7Akreditasi;
use common\models\S7AkreditasiInstitusi;
use common\models\S7DokumentasiInstitusi;
use yii\base\Model;

class PencarianLedInstitusiForm extends Model
{

    public $akreditasi;
    public $lk_untuk;

    private $_akreditasi;
    private $_akreditasi_Institusi;
    private $_dokumentasi;


    public function rules() :array
    {
        return [
            [['akreditasi','lk_untuk',],'required']
        ];
    }

    public function cari($target): string
    {

        $url ='';
        $this->_akreditasi = S7Akreditasi::find()->where(['id'=>$this->akreditasi])->one();

        $this->_akreditasi_Institusi = S7AkreditasiInstitusi::findOne(['id_akreditasi'=>$this->_akreditasi->id]);

        if($this->lk_untuk ==='institusi'){
            $this->_dokumentasi = S7DokumentasiInstitusi::findOne(['id_akreditasi_institusi'=>$this->_akreditasi_Institusi->id]);
            $url .= "dokumentasi-institusi/$target";
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
    public function getDok()
    {
        return $this->_dokumentasi;
    }



}